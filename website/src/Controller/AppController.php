<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
		 $this->loadComponent('Csrf', ['secure' => 'true']);

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		//Nate Kaldor
		//Loading a plugin to make user management easier
		//$this->loadComponent('Burzum/UserTools.UserTool');




		//Nate Kaldor
		//4-23-16
		//This is for login in function
		$this->loadComponent('Auth', [
			//Added 5-2-16
			//'authorize' => 'Controller',
			'authorize' => 'Controller',
			
			'authenticate'=> [
				'Form' => [
					'fields' => [
						'username' => 'email',
						'password' => 'password'
								]
						]
				],

			'loginAction' => [
						'controller' => 'Users',
						'action' => 'login'
				],

			

			]);



    }

    //Ben Stout
    //5-7-16
    //Include Bootstrap helper
    public $helpers = [
        'Html' => [
            'className' => 'Bootstrap.BootstrapHtml'
        ],
        'Form' => [
            'className' => 'Bootstrap.BootstrapForm',
            'useCustomFileInput' => true
        ],
        'Paginator' => [
            'className' => 'Bootstrap.BootstrapPaginator'
        ],
        'Modal' => [
            'className' => 'Bootstrap.BootstrapModal'
        ]
    ];

    //Ben Stout
    //5-7-16
    //Added beforeFilter callback to capture login redirection URL
    public function beforeFilter(\Cake\Event\Event $event){
      parent::beforeFilter($event);

      $url = Router::url($this->referer(), true); //complete url
      if (!preg_match('/login|logout/i', $url)){
        $this->request->session()->write('lastUrl', $url);
      }
	  
	  //This was for User Tools
	  //$this->set('authUser', $this->Auth-user());
  	}

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
		//For Burzum Tools
		$this->set('userData', $this->Auth->user());

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
				 // Removing this 5-19-16 to see what it did
			     // $this->set('CampaignName','Campaign One');
        }


		// Nate Kaldor
  		// 4-23
  		// Check Login
  		if($this->request->session()->read('Auth.User')){
  			$this->set('loggedIn', true);
  		}	else {
  			$this->set('loggedIn', false);
  		}


    }
	
	//Nate Kaldor
	//5-7-16
	//This created an 'admin' prefix that allows a user with the role == admin to be able to 
	//navigate and modify all. It's a backend control panel to users and campaigns.
	
	//Quirks - User must be logged in to view it right now. We'll need to create a controller method for it.
	
	public function isAuthorized($user)
	{
		if ($this->request->action == 'myAccount') {
			return true;
		}
		
		if(isset($this->request->params['prefix'])
			&& ('admin' == $this->request->params['prefix'])) {
				return ($user['role'] == 'admin');
				return true;
		}

	}
}
