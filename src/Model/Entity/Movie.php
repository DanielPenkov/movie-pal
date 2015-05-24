<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class Movie extends Entity
{

    protected $_accessible = [
        'title' => true,
        'year' => true,
        'description' => true,
        'rating' => true,
        'poster' => true,
        'type' => true,
        'recommendations' => true,
        'actors' => true,
        'countries' => true,
        'directors' => true,
        'genres' => true,
        'users' => true,
        'writers' => true,
    ];

     protected function _getFullTitle()
    {
        return $this->_properties['title'] . '  ' .
            'KUR';
    }

}


