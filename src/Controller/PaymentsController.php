<?php
namespace App\Controller;

use App\Controller\AppController;

class PaymentsController extends AppController
{
    public function add()
    {
        $paymentsTable = $this->fetchTable('Payments');
        $payment = $paymentsTable->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $paymentsTable->patchEntity($payment, $this->request->getData());
            if ($paymentsTable->save($payment)) {
                // mark fee paid
                $feesTable = $this->fetchTable('MaintenanceFees');
                $fee = $feesTable->get($payment->fee_id);
                $fee->status = 'Paid';
                $feesTable->save($fee);
                $this->Flash->success(__('Payment recorded.'));
                return $this->redirect(['controller' => 'MaintenanceFees', 'action' => 'index']);
            }
            $this->Flash->error(__('Unable to save payment.'));
        }
        $this->set(compact('payment'));
    }
}
