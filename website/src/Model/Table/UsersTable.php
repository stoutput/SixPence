<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')

			//Nate Kaldor
			//4-24
			//This requires the password to be a minimum of 6 characters in length
			     ->add('password', 'minLength', [
				    'rule' => ['minLength', 6],
				    'message' => 'Passwords must be a minimum of 6 characters'
				    ])

      //Nate Kaldor
			//Bug fixed after testing with EMPRS group
			//This requires the password and the 'confirm password' to match
			/*->add('password', 'compareWith', [
				'rule' => ['compareWith', 'confirm_password'],
				'message' => 'Passwords must match.'
				])*/

            ->notEmpty('password', 'A password is required');

		//Nate Kaldor
		//5-19-16
		//Has the error show up under 'Confirm Password' when passwords do not match
		//Tested working - 5-19-16
		  $validator
			   ->add('confirm_password', 'compareWith', [
				       'rule' => ['compareWith', 'password'],
				       'message' => 'Passwords must match'
				       ])
			  ->notEmpty('confirm_password', 'Passwords must match');


        $validator
            ->allowEmpty('token');

        $validator
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->allowEmpty('subid');

		    $validator
            ->allowEmpty('ticket');

		    $validator
            ->allowEmpty('ticket_creation_date');

       //Nate Kaldor
       //Added column to the database 5-7-16
		   //This is the code that recognizes it
		   $validator
            ->allowEmpty('role');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
    /*public function checkCurrentPassword($data) {
        $this->id = AuthComponent::user('id');
        $password = $this->field('password');
        return(AuthComponent::password($data['current_password']) == $password);
    }*/

    public function validationUpdatePassword(Validator $validator)
    {
      $validator
        ->notEmpty('current_password')
  		  ->add('current_password', 'compareWith', [
  				       'rule' => ['compareWith', 'password'],
  				       'message' => 'Current password does not match'
               ]);
      $validator
        ->notEmpty('new_password')
        ->add('new_password', 'minLength', [
      		    'rule' => ['minLength', 6],
  				    'message' => 'Passwords must be a minimum of 6 characters'
            ]);
      $validator
        ->notEmpty('new_password2')
        ->add('new_password2', 'compareWith', [
              'rule' => ['compareWith', 'new_password'],
              'message' => 'Passwords must match'
              ])
       ->notEmpty('new_password2', 'Passwords must match');
       return $validator;
    }
}
