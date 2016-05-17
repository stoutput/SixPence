<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CampaignList Controller
 *
 * @property \App\Model\Table\CampaignListTable $CampaignList
 */
class CampaignListController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $campaignlist = $this->paginate($this->CampaignList);

        $this->set(compact('campaignlist'));
        $this->set('_serialize', ['campaignlist']);
    }
	

    /**
     * View method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {		
        $campaignlist = $this->CampaignList->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('campaignlist', $campaignlist);
        $this->set('_serialize', ['campaignlist']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campaignlist = $this->CampaignList->newEntity();
        if ($this->request->is('post')) {
            $campaignlist = $this->CampaignList->patchEntity($campaign, $this->request->data);
            if ($this->CampaignList->save($campaignlist)) {
                $this->Flash->success(__('The campaignlist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campaignlist could not be saved. Please, try again.'));
            }
        }
        $users = $this->CampaignList->Users->find('list', ['limit' => 200]);
        $this->set(compact('campaignlist', 'users'));
        $this->set('_serialize', ['campaignlist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $campaignlist = $this->CampaignList->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaignlist = $this->CampaignList->patchEntity($campaignlist, $this->request->data);
            if ($this->CampaignList->save($campaignlist)) {
                $this->Flash->success(__('The campaignlist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campaignlist could not be saved. Please, try again.'));
            }
        }
        $users = $this->CampaignList->Users->find('list', ['limit' => 200]);
        $this->set(compact('campaignlist', 'users'));
        $this->set('_serialize', ['campaignlist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campaignlist = $this->CampaignList->get($id);
        if ($this->CampaignList->delete($campaignlist)) {
            $this->Flash->success(__('The campaignlist has been deleted.'));
        } else {
            $this->Flash->error(__('The campaignlist could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


	
	
}
