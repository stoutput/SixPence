<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campaign Entity.
 *
 * @property int $id
 * @property int $founder_id
 * @property \App\Model\Entity\User $user
 * @property string $title
 * @property string $image
 * @property string $body
 * @property bool $approved
 * @property \Cake\I18n\Time $creation
 * @property \Cake\I18n\Time $expiration
 */
class Campaign extends Entity
{
	public $actsAs = array(
		'Route.Routable' => array(
			'template' => 'campaigns/:title'
		)
	);


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
}
