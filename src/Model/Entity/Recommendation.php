<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recommendation Entity.
 */
class Recommendation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'sender_id' => true,
        'reciever_id' => true,
        'movie_id' => true,
        'notification_id' => true,
        'user' => true,
        'movie' => true,
        'notification' => true,
    ];
}
