<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DirectorsMoviesFixture
 *
 */
class DirectorsMoviesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'movie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'director_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'director_id' => ['type' => 'index', 'columns' => ['director_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['movie_id', 'director_id'], 'length' => []],
            'directors_movies_ibfk_1' => ['type' => 'foreign', 'columns' => ['movie_id'], 'references' => ['movies', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'directors_movies_ibfk_2' => ['type' => 'foreign', 'columns' => ['director_id'], 'references' => ['directors', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'movie_id' => 1,
            'director_id' => 1
        ],
    ];
}
