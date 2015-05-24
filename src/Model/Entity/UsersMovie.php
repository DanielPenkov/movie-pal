<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersMovie Entity.
 */
class UsersMovie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status' => true,
        'user' => true,
        'movie' => true,
    ];
}
