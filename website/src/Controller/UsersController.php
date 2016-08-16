<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController 
{
	    public function initialize() {
        parent::initialize();
		//Nate Kaldor
		//5-30-16
		//This makes a lot of the functions in here obsolete
		//Please see the online documentation for Burzum/UserTools
        $this->loadComponent('Burzum/UserTools.UserTool');
    }

    // To use the helper you'll have to set the user data to the view!
    public function beforeRender(\Cake\Event\Event $event) {
        /** 
         * It is expected that you have the Auth component 
         * loaded and configured in your AppController!
         * Otherwise this will thow an error.
         */
        $this->set('userData', $this->Auth->user());
		
		// Nate Kaldor
  		// 4-23-16 
		// Modified for UserTools plugin 5-31-16
  		// Check Login
  		if($this->request->session()->read('Auth.User')){
  			$this->set('loggedIn', true);
  		}	else {
  			$this->set('loggedIn', false);
  		}
    }
		//Nate Kaldor
		//5-7-16
		//This allows users with the role of admin to access the parallel admin prefix
		//This also allows logged in users to access specific pages on the website
	public function isAuthorized($user)
	{
		//Logged in users specific pages
		
		//All users can view their account page
		if ($this->request->action == 'myAccount') {
			return true;
		}
		//All users can edit their accounts
		if ($this->request->action == 'editAccount') {
			return true;
		}
		//This was for campaigns -- Unsure if it needs to be here.
		if ($this->request->action == 'add'){
			return true;
		}
		
		//Admin prefix
		if ($user['role'] != 'admin')
			{$this->Flash->error('You are not authorized to view that page');}
		return ($user['role'] == 'admin');

	}
		//Ben Stout
		//5-19-16
		//Function to retrieve all campaigns created by a user
		/*
		public function campaigns($user)
		{
			$campaigns = $this->find('all')
    ->where(['Articles.created >' => new DateTime('-10 days')])
    ->contain(['Comments', 'Authors'])
    ->limit(10)

			if ($user['role'] != 'admin')
				{$this->Flash->error('You are not authorized to view that page');}

			return ($user['role'] == 'admin');

		}
		*/
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

	//Nate Kaldor
	//4-23
	//This function is what causes users to be able to log in.
	public function login()
	{
		if ($this->request->is('post')){
			$user = $this->Auth->identify();

			//Ben Stout
			//5-7-16
			//Redirect to original URL
			//'lastUrl' defined in AppController > beforeFilter
			if($user) {
				$this->Auth->setUser($user);
				if($this->request->session()->read('lastUrl')){
					$this->redirect($this->request->session()->read('lastUrl'));
				}else{
					return $this->redirect($this->Auth->redirectUrl());
				}
			}

			//User not identified
			$this->Flash->error('Your username or password is incorrect');
		}
	}

	//Nate Kaldor
	//4-23-16
	//This allows users to log out.
	//Tested working 4-23 Bug fix 5-7
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		//Nate Kaldor
		//5-7-16
		//This ends the user session and allows users to log out
		$this->request->session()->destroy();
		return $this->redirect($this->Auth->logout());
	}

	//Nate Kaldor
	//4-23
	//This allows users to register.
	//Tested working 4-23
	public function register()
	{
		$user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration successful!'));
                //return $this->redirect(['action' => 'index']);
				return $this->redirect('/');
            } else {
                $this->Flash->error(__('Error registering. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
	}

	//Nate Kaldor
	//4-23
	//Before Filter Method
	//This allows users who are not authenticated to be able to navigate to the registration page
	public function beforeFilter(\Cake\Event\Event $event){
		$this->Auth->allow('register');
		$this->Auth->allow('reset');
		$this->Auth->allow('home');

		//Nate Kaldor
		//5-7-16
		//This fixed a bug with logging out not working properly
		$this->Auth->allow('logout');
		//$this->_eventManager->on($this);
	}

	//Nate Kaldor
	//5-2-16
	//Adds a my account page to output user data according to ID
	public function myAccount()
	{
		$id = $this->Auth->User('id');

		$user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
	}
	
	//Nate Kaldor
	//5-24-2016
	//Working on adding a page so users can edit their account information
	public function editAccount($id = null)
	{
		$id = $this->Auth->User('id');

		//if (!$this->User->exists()) {
		//	throw new NotFoundException(__('Invalid user'));
		//}
		
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
			
		//Testing right now 5/24/16
		//Not working
		//This code is meant to verify current user password if a user wants to change to a new password
		//if(!empty($new_password = $this->request->data['new_password']) 
		//		&& $current_password == $this->request->data['User']['password'])
		//	$this->request->data['User']['password'] = $new_password;
		//else // else, we remove the rules on password
			//$user = $users->patchEntity($user, $current_password, ['validate' => false]);
  
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your changes have been saved.'));
                return $this->redirect(['action' => 'myAccount']);
            } else {
                $this->Flash->error(__('These changes could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
	}
	
	//Nate Kaldor
	//6-3-16
	//This was for instructions on configuring Burzum tools to work.
	//Seems to be working.
	public function change_password() {}
}
