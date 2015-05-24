<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WritersMovie Entity.
 */
class WritersMovie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'movie' => true,
        'writer' => true,
    ];
}
