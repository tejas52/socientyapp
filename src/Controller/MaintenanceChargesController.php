<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Members;
use Cake\I18n\FrozenDate;
use Cake\Mailer\Mailer;
use Cake\Log\Log;
use Cake\Http\Response;
use Dompdf\Dompdf;

class MaintenanceChargesController extends AppController
{
    protected $Members;
    public function initialize(): void
    {
        parent::initialize();
        $this->Members = $this->fetchTable('Members');
        $this->loadComponent('Flash'); // ✅ REQUIRED
        $this->viewBuilder()->setLayout('admin');

    }   

    public function index()
    {
       $charges = $this->MaintenanceCharges
    ->find()
    ->contain([
        'Societies',
        'Wings',
        'Flats' => ['Members'] // ✅ correct
    ])
    ->all();
        $this->set(compact('charges'));
    }

  


public function add()
{
    // Use TableLocator instead of loadModel
    $societiesTable = $this->getTableLocator()->get('Societies');
    $wingsTable = $this->getTableLocator()->get('Wings');
    $flatsTable = $this->getTableLocator()->get('Flats');

    $societies = $societiesTable->find('list')->toArray();
    $wings = $wingsTable->find('list')->toArray();
    $flats = $flatsTable->find('list')->toArray();

    // Months and years
    $months = [
        1 => 'January',2 => 'February',3 => 'March',4 => 'April',
        5 => 'May',6 => 'June',7 => 'July',8 => 'August',
        9 => 'September',10 => 'October',11 => 'November',12 => 'December'
    ];
    $years = range(2025, 2034);
    $yearOptions = array_combine($years, $years);

    $maintenanceCharge = $this->MaintenanceCharges->newEmptyEntity();

    if ($this->request->is('post')) {
        $maintenanceCharge = $this->MaintenanceCharges->patchEntity($maintenanceCharge, $this->request->getData());
        $reqdata = $this->request->getData();
        $member = $this->Members->find()
            ->where(['Members.flat_id' => $reqdata['flat_id']])
            ->first();

        if(!$member){
            $this->Flash->error(__('No member found for the selected flat.'));
            return $this->redirect(['action' => 'add']);
        }

        if ($this->MaintenanceCharges->save($maintenanceCharge)) {

            // Prepare data for PDF
            $receiptData = [
                'receipt_no' => $maintenanceCharge->id,
                'date' => date('d/m/Y'),
                'name' => $member->name,
                'month' => $months[$reqdata['month']],
                'flat' => $reqdata['flat_id'],
                'amount' => $reqdata['amount'],
                'amount_words' => $this->numberToWords($reqdata['amount']) // You can implement this
            ];

            // Generate PDF
            $html = $this->renderReceiptHtml($receiptData); // see function below
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $pdfContent = $dompdf->output();

            // Send Email with PDF attachment
            $mailer = new Mailer('default');
            $mailer->setTo($member->email ?: 'default@example.com')
                ->setSubject('Maintenance Receipt')
                ->setEmailFormat('html')
                ->setViewVars([
                    'name' => $member->name,
                    'message' => 'Your maintenance payment is received.'
                ])
                ->setAttachments([
                    "receipt_{$receiptData['receipt_no']}.pdf" => [
                        'data' => $pdfContent,
                        'mimetype' => 'application/pdf'
                    ]
                ])
                ->deliver();

            $this->Flash->success(__('Maintenance Paid Successfully'));
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('Unable to save maintenance charge.'));
    }

    $this->set(compact('maintenanceCharge', 'societies', 'wings', 'flats', 'months', 'yearOptions'));
}


private function normalizeImage($relativePath)
{
    $path = WWW_ROOT . $relativePath;

    $image = imagecreatefromjpeg($path);
    $exif = @exif_read_data($path);

    if (!empty($exif['Orientation'])) {
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;
            case 6:
                $image = imagerotate($image, -90, 0);
                break;
            case 8:
                $image = imagerotate($image, 90, 0);
                break;
        }
        imagejpeg($image, $path, 100);
    }
}

private function getBase64Image($relativePath)
{
    $this->normalizeImage('img/receipt-bg.jpeg');

    $fullPath = WWW_ROOT . $relativePath;

    if (!file_exists($fullPath)) {
        return '';
    }

    $type = pathinfo($fullPath, PATHINFO_EXTENSION);
    $data = file_get_contents($fullPath);

    return 'data:image/' . $type . ';base64,' . base64_encode($data);
}

/**
 * Generate HTML for PDF
 */
private function renderReceiptHtml($data)
{
    $bgImage = $this->getBase64Image('img/receipt-bg.jpeg');

    $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Maintenance Receipt</title>
</head>
<body style="margin:0; padding:0;">
<div style="width:1000px;height:650px;position:relative;">

<img src="$bgImage"
     style="width:100%;height:auto;position:absolute;top:0;left:0;z-index:1;">

<div style="position:absolute;top:231px;left:153px;font-size:27px;font-weight:800;color:#b21913;z-index:2;">
{$data['receipt_no']}
</div>

<div style="position:absolute;top:247px;left:711px;font-size:19px;font-weight:800;color:#b21913;z-index:2;">
{$data['date']}
</div>

<div style="position:absolute;top:351px;left:120px;font-size:20px;font-weight:600;z-index:2;">
{$data['name']}
</div>

<div style="position:absolute;top:441px;left:720px;font-size:19px;font-weight:800;z-index:2;">
{$data['month']}
</div>

<div style="position:absolute;top:476px;left:165px;font-size:19px;font-weight:800;z-index:2;">
{$data['flat']}
</div>

<div style="position:absolute;top:472px;left:372px;font-size:23px;font-weight:800;z-index:2;">
{$data['amount']}
</div>

<div style="position:absolute;top:539px;left:241px;font-weight:800;z-index:2;width:500px;">
{$data['amount_words']}
</div>

</div>
</body>
</html>
HTML;

    return $html;
}


/**
 * Optional: Convert number to words (basic example)
 */
private function numberToWords($number)
{
    // For simplicity, using NumberFormatter
    $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
    return ucfirst($f->format($number)) . ' Only';
}

//END PDF ATTACH

    public function view($id)
    {
        $charge = $this->MaintenanceCharges
            ->get($id, ['contain' => ['Societies', 'Wings', 'Flats', 'MaintenancePayments']]);
        $this->set(compact('charge'));
    }


    public function setRate()
    {
        $reside_type = ['Owner' => 'Owner', 'Tenant' => 'Tenant'];

        // Use TableLocator instead of loadModel
        $reside_type = $this->getTableLocator()->get('Societies');
        $wingsTable = $this->getTableLocator()->get('Wings');
        // $flatsTable = $this->getTableLocator()->get('Flats');

        // $societies = $societiesTable->find('list')->toArray();
        $wings = $wingsTable->find('list')->toArray();
        // $flats = $flatsTable->find('list')->toArray();

        // Months and years
       
        $this->set(compact('reside_type', 'wings'));
    }

    //Calculate Panalty Amount
    public function calculatePenalty($paymentdate, $duemonth, $dueyear){
            $currentDate = new FrozenDate();
            $formattedDate = $currentDate->format('d-m-Y');
            $duedate = "10-".$duemonth."-".$dueyear;


$currentDate = new FrozenDate(); // today

$dueDate = FrozenDate::createFromFormat(
    'd-m-Y',
    '10-' . $duemonth . '-' . $dueyear
);

$daysDiff = $dueDate->diffInDays($currentDate, false); // negative if overdue
$totalpanelty = (ceil($daysDiff/5))*100;
Log::debug("Total ".$totalpanelty);
        Log::debug("Difference ".$daysDiff);
            Log::debug(print_r($formattedDate, true));
            Log::debug(print_r($duedate,true));
            
        
        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'total_panelty' => $totalpanelty
        ]));     
    }
}
