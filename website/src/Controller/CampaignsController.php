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

		//Ben Stout
		//5-19-16
		//Function to search all campaigns
		function search() {
			// the page we will redirect to
			$url['action'] = 'index';

			// build a URL will all the search elements in it
			// the resulting URL will be
			// example.com/cake/campaigns/index/Search.keywords:mykeyword/Search.tag_id:3
			foreach ($this->data as $k=>$v){
				foreach ($v as $kk=>$vv){
					if ($vv) {
						$url[$k.'.'.$kk]=$vv;
					}
				}
			}

			// redirect the user to the url
			$this->redirect($url, null, true);
		}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

		$this->paginate = [
            'contain' => ['Users'],

			//Nate Kaldor
			//6-4-16
			//Only approved campaigns are shown in the list
			'conditions' => ['approved' => '1']
        ];
        $campaigns = $this->paginate($this->Campaigns);

			// Ben Stout
			// 6-8-2016
			$urole = $this->Auth->User('role');
			$this->set('urole', $urole);

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
		 // Ben Stout
		 // 6-7-2016
		 // Set user id
    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
            'contain' => ['Users']
        ]);
				$uid = $this->Auth->User('id');

				$this->set('uid', $uid);
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


			//Nate Kaldor
			//5-15-16
			//This sets the founder_id to the user_id upon campaign creation
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
		$this->log('Got here', 'debug');



		//Julia Foote
		//Adding image testing
		/*
		if ($this->request->is('post'))
		{
		if(!empty($this->data))
		{
			//Check if image has been uploaded
			if(!empty($this->data['campaign']['image']['name']))
			{
				$file = $this->data['campaign']['image'];
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png');
				if(in_array($ext, $arr_ext))
				{
					//Uploading of file
					if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload_folder' . DS . $file['name']))
					{
						//prepare the filename for database entry
						$this->request->data['campaign']['image'] = $file['name'];
						pr($this->data);
						if ($this->campaign>save($this->request->data))
						{
							$this->Session->setFlash(__('The data has been saved'), 'default',array('class'=>'success'));
							$this->redirect(array('action'=>'admin_index'));
						}
						else
						{
							$this->Session->setFlash(__('The data could not be saved. Please, try again.'), 'default',array('class'=>'errors'));
						}
					}
				}
			}
			else
			{
				$this->Session->setFlash(__('The data could not be saved. Please, Choose your image.'), 'default',array('class'=>'errors'));
			}
		}
		}
*/
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
	// Ben Stout
	// 6-7-2016
	// Blocked list action unless admin
	public function beforeFilter(\Cake\Event\Event $event){

		//Blank args after allow means all actions are allowed, rather than just ('view' or 'list')
		//Because of this, we'll need  have some sort of check where if founder_id == user_id of logged in user, reveal delete and edit buttons...
		if($this->Auth->User('role') === 'admin'){
			$this->Auth->allow('list');
		}
		$this->Auth->allow('index');
		$this->Auth->allow('view');
		//$this->Auth->allow['action' => 'view'];
		//$this->_eventManager->on($this);
	}

	//Nate Kaldor
	//6-4-16
	//Granting logged in users permission to create campaigns
	public function isAuthorized($user)
	{
		//All users can view their account page
		if ($this->request->action === 'add') {
			return true;
		}

		return parent::isAuthorized($user);
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
			//$id = $this->Auth->User('id');
			//$campaign->founder_id = $id;
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));
                return $this->redirect(['action' => 'list']);
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
