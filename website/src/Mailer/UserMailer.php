<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';
	
	public function welcome($user)
	{
		$this->from('donotreply@domain.com', 'SixpenceApp')
			->to($user->email)
			->template('default', 'default')
	}
	
	public function resetPassword($user)
	{
		$this
			->subject('Reset Password')
			->to($user->email)
			->set(['token'] => $user->token]);
		
	}
}
