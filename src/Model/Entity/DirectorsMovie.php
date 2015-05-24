<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DirectorsMovie Entity.
 */
class DirectorsMovie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'movie' => true,
        'director' => true,
    ];
}
