<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $token
 * @property string $firstname
 * @property string $lastname
 * @property int $subid
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
	
	//Nate Kaldor 4/21/16
	//This function hashes user passwords on account creation.
	//As of writing this, it's bcrypt version 2y and 10 iterations.
	//Tested to be working on 4/21/16
	protected function _setPassword($password)
	{
		if (strlen($password) > 0) {
			return (new DefaultPasswordHasher)->hash($password);
		}
	}

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];
}
