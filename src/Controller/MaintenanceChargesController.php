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
        $this->Flat = $this->fetchTable('Flats');

        $this->loadComponent('Flash'); // ✅ REQUIRED
        $this->viewBuilder()->setLayout('admin');

    }   

   public function index()
{
    $query = $this->MaintenanceCharges
        ->find()
        ->contain([
            'Societies',
            'Wings',
            'Members' => ['Flats']
        ]);

    // 🔹 Get filter values from URL (GET)
    $month = $this->request->getQuery('month');
    $year  = $this->request->getQuery('year');

    // 🔹 Apply filters
    if (!empty($month)) {
        $query->where(['MaintenanceCharges.month' => $month]);
    }

    if (!empty($year)) {
        $query->where(['MaintenanceCharges.year' => $year]);
    }

    // 🔹 Pagination config
    $this->paginate = [
        'limit' => 25,
        'order' => [
            'MaintenanceCharges.paid_date'    => 'DESC'
        ]
    ];

    // ❗ IMPORTANT: use paginate(), not all()
    $charges = $this->paginate($query);

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
            $flat = $this->Flat->get($reqdata['flat_id']);
            $totalpaid = $reqdata['amount']+$reqdata['penalty_paid'];
            $amountinword = $this->numberToWords(number: $totalpaid);
            // Prepare data for PDF
            $receiptData = [
                'receipt_no' => $maintenanceCharge->id,
                'date' => date('d/m/Y'),
                'name' => $member->name,
                'month' => $months[$reqdata['month']],
                'year' => $reqdata['year'],
                'flat' => $flat->flat_no,
                'amount' => $totalpaid,
                'amount_words' => $amountinword // You can implement this
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

<style>
@page {
    size: 1000px 650px;
    margin: 0;
}
</style>

</head>

<body style="margin:0; padding:0;">

<div style="
    width:1000px;
    height:650px;
    position:relative;
    overflow:hidden;
">

    <!-- BACKGROUND IMAGE -->
    <img src="$bgImage" style="
        position:absolute;
        top:0;
        left:0;
        width:1000px;
        height:650px;
        z-index:0;
    ">

    <!-- TEXT LAYER -->
    <div style="position:absolute; inset:0; z-index:1; font-family:Arial, Helvetica, sans-serif;">

        <div style="
            position:absolute;
            top:200px;
            left:153px;
            font-size:27px;
            font-weight:800;
            color:#b21913;
            background:#fff;
            width:121px;
        ">$data[receipt_no]</div>

        <div style="
            position:absolute;
            top:216px;
            left:711px;
            font-size:20px;
            font-weight:800;
            color:#b21913;
            background:#fff;
            width:160px;
        ">$data[date]</div>

        <div style="
            position:absolute;
            top:300px;
            left:120px;
            font-size:20px;
            font-weight:600;
            color:#003366;
        ">$data[name]</div>

        <div style="
            position:absolute;
            top:390px;
            left:720px;
            font-size:20px;
            font-weight:800;
            color:#003366;
            width:160px;
        ">$data[month] $data[year]</div>

        <div style="
            position:absolute;
            top:415px;
            left:165px;
            font-size:20px;
            font-weight:800;
            color:#003366;
            background:#fff;
        ">$data[flat]</div>

        <div style="
            position:absolute;
            top:421px;
            left:372px;
            font-size:20px;
            font-weight:800;
            color:#003366;
        ">$data[amount]</div>

        <div style="
            position:absolute;
            top:488px;
            left:231px;
            font-size:20px;
            font-weight:800;
            color:#003366;
            background:#fff;
            width:600px;
        ">
           $data[amount_words]
        </div>

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
if($totalpanelty < 0)
{
    $totalpanelty = 0;
}
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

    //Number to word for amount
    function convertToWord($number)
    {
        $words = [
            0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
            5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
            14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen',
            17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen',
            20 => 'twenty', 30 => 'thirty', 40 => 'forty',
            50 => 'fifty', 60 => 'sixty', 70 => 'seventy',
            80 => 'eighty', 90 => 'ninety'
        ];

        if ($number < 21) {
            return $words[$number];
        }

        if ($number < 100) {
            return $words[intval($number / 10) * 10]
                . ($number % 10 ? ' ' . $words[$number % 10] : '');
        }

        if ($number < 1000) {
            return $words[intval($number / 100)] . ' hundred'
                . ($number % 100 ? ' ' . numberToWords($number % 100) : '');
        }

        if ($number < 100000) {
            return numberToWords(intval($number / 1000)) . ' thousand'
                . ($number % 1000 ? ' ' . numberToWords($number % 1000) : '');
        }

        if ($number == 100000) {
            return 'one lakh';
        }

        return 'number out of range';
    }

    //Send receipt
    public function sendReceipt($maintenanceChargeid)
    {
        $charge = $this->MaintenanceCharges
            ->get($maintenanceChargeid, ['contain' => ['Societies', 'Wings', 'Flats', 'MaintenancePayments']]);
        // $this->set(compact('charge'));
        $flat = $this->Flat->get($charge->flat_id);
        $member = $this->Members->get($charge->member_id);
        $totalpaid = $charge->amount + $charge->penalty_paid;
        $amountinword = $this->numberToWords(number: $totalpaid);

        // echo "<pre>"; print_r($charge); exit;
        // print_r($member);
$months = [
        1 => 'January',2 => 'February',3 => 'March',4 => 'April',
        5 => 'May',6 => 'June',7 => 'July',8 => 'August',
        9 => 'September',10 => 'October',11 => 'November',12 => 'December'
    ];
    $paid_date =  $charge->paid_date->format('d/m/Y');


    $years = range(2025, 2034);
        $receiptData = [
                'receipt_no' => $charge->id,
                'date' => $paid_date,
                'name' => $member->name,
                'month' => $months[$charge->month],
                'year' => $charge->year,
                'flat' => $flat->flat_no,
                'amount' => $totalpaid,
                'amount_words' => $amountinword // You can implement this
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
            $this->Flash->success(__('Maintenance Receipt Sent to member email.'));
            return $this->redirect(['action' => 'index']);
    }
}
