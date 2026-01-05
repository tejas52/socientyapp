<?php
namespace App\Controller;

use App\Controller\AppController;

class MembersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash'); // ✅ REQUIRED

    }

    public function index()
    {
        $members = $this->Members->find('all')
            ->contain(['Societies', 'Wings', 'Flats'])->order(['Flats.flat_no' => 'ASC']);
        $this->set(compact('members'));
    }

    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => ['Societies', 'Wings', 'Flats', 'MaintenanceCharges'],
        ]);
        $this->set(compact('member'));
    }

    public function add()
    {
        $member = $this->Members->newEmptyEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->getData());
            if ($this->Members->save($member)) {
                $this->Flash->success(__('Member has been added.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add member.'));
        }

        $societies = $this->Members->Societies->find('list');
        $wings = $this->Members->Wings->find('list');
        $flats = $this->Members->Flats->find('list', keyField: 'id', valueField: 'flat_no')->toArray();

        $this->set(compact('member', 'societies', 'wings', 'flats'));
    }

    public function edit($id = null)
    {
        $member = $this->Members->get($id);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $member = $this->Members->patchEntity($member, $this->request->getData());
            if ($this->Members->save($member)) {
                $this->Flash->success(__('Member has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update member.'));
        }

        $societies = $this->Members->Societies->find('list');
        $wings = $this->Members->Wings->find('list');
        $flats = $this->Members->Flats->find('list', keyField: 'id', valueField: 'flat_no')->toArray();

        $this->set(compact('member', 'societies', 'wings', 'flats'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('Member has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete member.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
