<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Genre Entity.
 */
class Genre extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'genre' => true,
        'movies' => true,
    ];
}
