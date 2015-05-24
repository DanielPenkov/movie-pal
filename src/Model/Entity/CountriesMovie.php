<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CountriesMovie Entity.
 */
class CountriesMovie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'movie' => true,
        'country' => true,
    ];
}
