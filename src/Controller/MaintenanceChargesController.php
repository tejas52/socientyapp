<?php
namespace App\Controller;

use App\Controller\AppController;

class MaintenanceChargesController extends AppController
{
    public function index()
    {
        $charges = $this->MaintenanceCharges
            ->find()
            ->contain(['Societies', 'Wings', 'Flats'])
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
            '01' => 'January','02' => 'February','03' => 'March','04' => 'April',
            '05' => 'May','06' => 'June','07' => 'July','08' => 'August',
            '09' => 'September','10' => 'October','11' => 'November','12' => 'December'
        ];

        $years = range(2025, 2034);
        $yearOptions = array_combine($years, $years);

        $maintenanceCharge = $this->MaintenanceCharges->newEmptyEntity();

        if ($this->request->is('post')) {
            $maintenanceCharge = $this->MaintenanceCharges->patchEntity($maintenanceCharge, $this->request->getData());
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
}
