<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GenresMovie Entity.
 */
class GenresMovie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'movie' => true,
        'genre' => true,
    ];
}
