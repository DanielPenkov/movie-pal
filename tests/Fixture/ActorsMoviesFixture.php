<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActorsMoviesFixture
 *
 */
class ActorsMoviesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'movie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'actor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'actor_id' => ['type' => 'index', 'columns' => ['actor_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['movie_id', 'actor_id'], 'length' => []],
            'actors_movies_ibfk_1' => ['type' => 'foreign', 'columns' => ['movie_id'], 'references' => ['movies', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'actors_movies_ibfk_2' => ['type' => 'foreign', 'columns' => ['actor_id'], 'references' => ['actors', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'actor_id' => 1
        ],
    ];
}
