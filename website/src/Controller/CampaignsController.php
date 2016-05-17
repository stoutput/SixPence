<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Campaigns Controller
 *
 * @property \App\Model\Table\CampaignsTable $Campaigns
 */
class CampaignsController extends AppController
{
	
		/*public function isAuthorized($user)
	{
		$action = $this->request->params['action'];

		// The add and index actions are always allowed.
		if (in_array($action, ['index', 'add', 'edit'])) {
        return true;
		}
		// All other actions require an id.
		if (empty($this->request->params['pass'][0])) {
			return false;
		}

		// Check that the bookmark belongs to the current user.
		$id = $this->request->params['pass'][0];
		$campaign = $this->Campaigns->get($id);
		if ($campaign->founder_id == $user['id']) {
			return true;
		}
		return parent::isAuthorized($user);
	}*/

	
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
        $campaigns = $this->paginate($this->Campaigns);

        $this->set(compact('campaigns'));
        $this->set('_serialize', ['campaigns']);
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
        $campaign = $this->Campaigns->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('campaign', $campaign);
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campaign = $this->Campaigns->newEntity();
        //$campaign->founder_id = $this->Auth->User('id');
		if ($this->request->is('post')) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->data);
			//$campaign->founder_id = $this->Auth->User('id');

            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
            }
        }		
		
		/*Testing
		if(!empty($this->data)) {
			$this->data['Campaigns']['founder_id'] = $this->Auth->Users('id');
			if ($this->Campaigns->save($this->data))
				{
                $this->Flash->success(__('The campaign has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
            }
		}
        */
		//End test
		$users = $this->Campaigns->Users->find('list', ['limit' => 200]);
        $this->set(compact('campaign', 'users'));
        $this->set('_serialize', ['campaign']);
		

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
        $campaign = $this->Campaigns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->data);
			//$campaign->founder_id = $this->Auth->User('id');
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
            }
        }
        $users = $this->Campaigns->Users->find('list', ['limit' => 200]);
        $this->set(compact('campaign', 'users'));
        $this->set('_serialize', ['campaign']);
		
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
        $campaign = $this->Campaigns->get($id);
        if ($this->Campaigns->delete($campaign)) {
            $this->Flash->success(__('The campaign has been deleted.'));
        } else {
            $this->Flash->error(__('The campaign could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
		
    }
	
	//Nate Kaldor
	//4-24
	//Allows users to view a list of campaigns without being logged in
	//Sort of working.
	//Need to figure out how to get them to view individual campaigns.
	public function beforeFilter(\Cake\Event\Event $event){
		
		//Blank args after allow means all actions are allowed, rather than just ('view' or 'list') 
		//Because of this, we'll need  have some sort of check where if founder_id == user_id of logged in user, reveal delete and edit buttons...
		$this->Auth->allow('list', 'index', 'view');
		//$this->Auth->allow['action' => 'view'];
		//$this->_eventManager->on($this);	
	}
	
	//Nate Kaldor
	//Working on using this as a public facing campaigns thing...
	//4-24
	public function list()
    {		
               $this->paginate = [
            'contain' => ['Users']
        ];
        $campaigns = $this->paginate($this->Campaigns);

        $this->set(compact('campaigns'));
        $this->set('_serialize', ['campaigns']);
    }
	
	public function create()
	{
		
		      $campaign = $this->Campaigns->newEntity();
        if ($this->request->is('post')) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->data);
			$campaign->founder_id = $this->Auth->User('id');
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
            }
        }		
		
		/*Testing
		if(!empty($this->data)) {
			$this->data['Campaigns']['founder_id'] = $this->Auth->Users('id');
			if ($this->Campaigns->save($this->data))
				{
                $this->Flash->success(__('The campaign has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
            }
		}
        */
		//End test
		$users = $this->Campaigns->Users->find('list', ['limit' => 200]);
        $this->set(compact('campaign', 'users'));
        $this->set('_serialize', ['campaign']);
		
	}
	

	
}
