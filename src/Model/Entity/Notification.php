<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity.
 */
class Notification extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'sender_id' => true,
        'recipient_id' => true,
        'date_sent' => true,
        'status' => true,
        'type' => true,
        'user' => true,
        'recommendations' => true,
    ];
}
