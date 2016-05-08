<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Donations Controller
 *
 * @property \App\Model\Table\DonationsTable $Donations
 */
class DonationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Transactions']
        ];
        $donations = $this->paginate($this->Donations);

        $this->set(compact('donations'));
        $this->set('_serialize', ['donations']);
    }

    /**
     * View method
     *
     * @param string|null $id Donation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $donation = $this->Donations->get($id, [
            'contain' => ['Transactions']
        ]);

        $this->set('donation', $donation);
        $this->set('_serialize', ['donation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $donation = $this->Donations->newEntity();
        if ($this->request->is('post')) {
            $donation = $this->Donations->patchEntity($donation, $this->request->data);
            if ($this->Donations->save($donation)) {
                $this->Flash->success(__('The donation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The donation could not be saved. Please, try again.'));
            }
        }
        $transactions = $this->Donations->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('donation', 'transactions'));
        $this->set('_serialize', ['donation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Donation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $donation = $this->Donations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $donation = $this->Donations->patchEntity($donation, $this->request->data);
            if ($this->Donations->save($donation)) {
                $this->Flash->success(__('The donation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The donation could not be saved. Please, try again.'));
            }
        }
        $transactions = $this->Donations->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('donation', 'transactions'));
        $this->set('_serialize', ['donation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Donation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $donation = $this->Donations->get($id);
        if ($this->Donations->delete($donation)) {
            $this->Flash->success(__('The donation has been deleted.'));
        } else {
            $this->Flash->error(__('The donation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
