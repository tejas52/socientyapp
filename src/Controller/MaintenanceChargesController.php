<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Members;
use Cake\I18n\FrozenDate;
use Cake\Log\Log;

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
    $phone = $member->phone;
            if ($this->MaintenanceCharges->save($maintenanceCharge)) {
                $this->Flash->success(__('Maintenance charge saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to save maintenance charge.'));
        }

        $this->set(compact('maintenanceCharge', 'societies', 'wings', 'flats', 'months', 'yearOptions'));
    }


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
