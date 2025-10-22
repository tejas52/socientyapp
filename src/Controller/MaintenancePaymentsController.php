<?php
namespace App\Controller;

use App\Controller\AppController;

class MaintenancePaymentsController extends AppController
{
    public function index()
{
    $maintenancePaymentsTable = $this->getTableLocator()->get('MaintenancePayments');

    // Get all payments with related maintenance charges
    $payments = $maintenancePaymentsTable->find()
        ->contain(['MaintenanceCharges', 'MaintenanceCharges.Flats', 'MaintenanceCharges.Wings', 'MaintenanceCharges.Societies'])
        ->orderBy(['MaintenancePayments.payment_date' => 'DESC'])
        ->all();

    // Pass payments to the view
    $this->set(compact('payments'));

    // Optionally, if you need $charges as list for dropdown/filter
    $maintenanceChargesTable = $this->getTableLocator()->get('MaintenanceCharges');
    $charges = $maintenanceChargesTable->find('list')->toArray();
    $this->set(compact('charges'));
}


    public function view($id = null)
    {
        $maintenancePaymentsTable = $this->getTableLocator()->get('MaintenancePayments');

        $payment = $maintenancePaymentsTable->get($id, [
            'contain' => ['MaintenanceCharges', 'MaintenanceCharges.Flats', 'MaintenanceCharges.Wings', 'MaintenanceCharges.Societies']
        ]);

        $this->set(compact('payment'));
    }

    public function add($chargeId = null)
{
    $maintenancePaymentsTable = $this->getTableLocator()->get('MaintenancePayments');
    $maintenanceChargesTable = $this->getTableLocator()->get('MaintenanceCharges');

    $payment = $maintenancePaymentsTable->newEmptyEntity();

    // Load the related charge if $chargeId is provided
    $charge = null;
    if ($chargeId) {
        $charge = $maintenanceChargesTable->get($chargeId, [
            'contain' => ['Flats', 'Wings', 'Societies']
        ]);
    }

    if ($this->request->is('post')) {
        $payment = $maintenancePaymentsTable->patchEntity($payment, $this->request->getData());
        if ($maintenancePaymentsTable->save($payment)) {
            $this->Flash->success(__('Payment saved successfully.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to save payment.'));
    }

    $charges = $maintenanceChargesTable->find('list')->toArray();

    $this->set(compact('payment', 'charges', 'charge'));
}


    public function edit($id = null)
    {
        $maintenancePaymentsTable = $this->getTableLocator()->get('MaintenancePayments');
        $maintenanceChargesTable = $this->getTableLocator()->get('MaintenanceCharges');

        $payment = $maintenancePaymentsTable->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $payment = $maintenancePaymentsTable->patchEntity($payment, $this->request->getData());
            if ($maintenancePaymentsTable->save($payment)) {
                $this->Flash->success(__('Payment updated successfully.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update payment.'));
        }

        $charges = $maintenanceChargesTable->find('list')->toArray();
        $this->set(compact('payment', 'charges'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $maintenancePaymentsTable = $this->getTableLocator()->get('MaintenancePayments');
        $payment = $maintenancePaymentsTable->get($id);

        if ($maintenancePaymentsTable->delete($payment)) {
            $this->Flash->success(__('Payment deleted successfully.'));
        } else {
            $this->Flash->error(__('Unable to delete payment.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
