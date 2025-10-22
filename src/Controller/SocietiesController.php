<?php
namespace App\Controller;

use App\Controller\AppController;

class SocietiesController extends AppController
{
    public function index()
{
        $societies = $this->fetchTable('Societies')->find('all')->enableHydration(true);
        $this->set(compact('societies'));
}



    public function view($id = null)
    {
        $society = $this->fetchTable('Societies')->get($id);
        $this->set(compact('society'));
    }

    public function add()
    {
        $societiesTable = $this->fetchTable('Societies');
        $society = $societiesTable->newEmptyEntity();
        if ($this->request->is('post')) {
            $society = $societiesTable->patchEntity($society, $this->request->getData());
            if ($societiesTable->save($society)) {
                $this->Flash->success(__('Society saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to save society.'));
        }
        $this->set(compact('society'));
    }

    public function edit($id = null)
    {
        $societiesTable = $this->fetchTable('Societies');
        $society = $societiesTable->get($id);
        if ($this->request->is(['post', 'put'])) {
            $society = $societiesTable->patchEntity($society, $this->request->getData());
            if ($societiesTable->save($society)) {
                $this->Flash->success(__('Society updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update society.'));
        }
        $this->set(compact('society'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $societiesTable = $this->fetchTable('Societies');
        $society = $societiesTable->get($id);
        if ($societiesTable->delete($society)) {
            $this->Flash->success(__('Society deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete society.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
