<?php
declare(strict_types=1);

namespace App\Controller;

class FlatsController extends AppController
{
    public function index()
    {
       $flats = $this->fetchTable('Flats')
    ->find()
    ->contain([
        'Wings.Societies', // nested contain
        'Members'
    ])
    ->all(); // assuming flats belongsTo wings + members
        $this->set(compact('flats'));
    }

    public function view($id = null)
    {
      $flat = $this->fetchTable('Flats')->get($id, [
    'contain' => [
        'Wings.Societies', // include the society related to the wing
        'Members'
    ],
]);
        $this->set(compact('flat'));
    }

    public function add()
{
    $flatsTable = $this->fetchTable('Flats');
    $flat = $flatsTable->newEmptyEntity();
    try {
        if ($this->request->is('post')) {
            $flat = $flatsTable->patchEntity($flat, $this->request->getData());
            // echo "<pre>"; print_r($flat);
            // echo "*****************";
            // print($this->request->getData());
            

            if ($flatsTable->save($flat)) {
                $this->Flash->success(__('The flat has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to save the flat. Please check for validation errors.'));
            }
        }
    } catch (\Exception $e) {
        // Log or show the error
        $this->Flash->error(__('An unexpected error occurred: {0}', $e->getMessage()));

        // Optionally log the full error for debugging
        \Cake\Log\Log::error('Error saving flat: ' . $e->getMessage());
    }

    $wings = $this->fetchTable('Wings')->find('list')->all();
    $members = $this->fetchTable('Members')->find('list')->all();

    $this->set(compact('flat', 'wings', 'members'));
}

    public function edit($id = null)
    {
        $flatsTable = $this->fetchTable('Flats');
        $flat = $flatsTable->get($id);
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $flat = $flatsTable->patchEntity($flat, $this->request->getData());
            if ($flatsTable->save($flat)) {
                $this->Flash->success(__('The flat has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the flat. Please try again.'));
        }
        $wings = $this->fetchTable('Wings')->find('list');
        $members = $this->fetchTable('Members')->find('list');
        $societies = $this->fetchTable('Societies')->find('list');
        $this->set(compact('flat', 'wings', 'members','societies'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flatsTable = $this->fetchTable('Flats');
        $flat = $flatsTable->get($id);

        if ($flatsTable->delete($flat)) {
            $this->Flash->success(__('The flat has been deleted.'));
        } else {
            $this->Flash->error(__('The flat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getWings($societyId = null)
    {
        $this->request->allowMethod(['get']);
        $this->autoRender = false;

        $wings = $this->Wings->find('list')
            ->where(['society_id' => $societyId])
            ->toArray();

        echo json_encode($wings);
    }

    public function getFlats($wingId = null)
    {
        $this->request->allowMethod(['get']);
        $this->autoRender = false;

        $flats = $this->Flats->find('list')
            ->where(['wing_id' => $wingId])
            ->toArray();

        echo json_encode($flats);
    }

}
