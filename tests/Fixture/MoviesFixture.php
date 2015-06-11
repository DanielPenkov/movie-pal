<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class MoviesFixture extends TestFixture
{

      // Optional. Set this property to load fixtures to a different test datasource
      public $connection = 'test_movies';

  	 public $import = ['table' => 'movies'];
      public $records = [
          [
              'id' => 1,
          		'title' => 'Title',
          		'year'=>'2014',
          		'description' => 'text',
          'rating' => '9',
          'poster' => 'url',
          'type' => 'action',
          ]
      ];
 }