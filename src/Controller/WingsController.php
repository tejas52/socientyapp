<?php
namespace App\Controller;

use App\Controller\AppController;

class WingsController extends AppController
{
    public function index()
    {
        $wings = $this->fetchTable('Wings')->find('all')->contain(['Societies']);
        $this->set(compact('wings'));
    }

    public function view($id = null)
    {
        // $wing = $this->fetchTable('Wings')->get($id, ['contain' => ['Societies']]);
        $wing = $this->Wings->get($id, ['contain' => ['Societies']]);

        $this->set(compact('wing'));
        
    }

    public function add()
    {
        $wingsTable = $this->fetchTable('Wings');
        $societiesTable = $this->fetchTable('Societies');

        $wing = $wingsTable->newEmptyEntity();
        $societies = $societiesTable->find('list');

        if ($this->request->is('post')) {
            $wing = $wingsTable->patchEntity($wing, $this->request->getData());
            if ($wingsTable->save($wing)) {
                $this->Flash->success(__('Wing saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to save wing.'));
        }

        $this->set(compact('wing', 'societies'));
    }

    public function edit($id = null)
    {
        $wingsTable = $this->fetchTable('Wings');
        $societiesTable = $this->fetchTable('Societies');

        $wing = $wingsTable->get($id);
        $societies = $societiesTable->find('list');

        if ($this->request->is(['post', 'put'])) {
            $wing = $wingsTable->patchEntity($wing, $this->request->getData());
            if ($wingsTable->save($wing)) {
                $this->Flash->success(__('Wing updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update wing.'));
        }

        $this->set(compact('wing', 'societies'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wingsTable = $this->fetchTable('Wings');
        $wing = $wingsTable->get($id);
        if ($wingsTable->delete($wing)) {
            $this->Flash->success(__('Wing deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete wing.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
