<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Donation Entity.
 *
 * @property int $transaction_id
 * @property \App\Model\Entity\Transaction $transaction
 * @property int $user
 * @property int $campaign
 * @property int $amount
 * @property \Cake\I18n\Time $time
 */
class Donation extends Entity
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
        'transaction_id' => false,
    ];
}
