<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActorsMovie Entity.
 */
class ActorsMovie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'movie' => true,
        'actor' => true,
    ];
}
