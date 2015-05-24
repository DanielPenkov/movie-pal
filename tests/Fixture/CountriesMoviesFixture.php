<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CountriesMoviesFixture
 *
 */
class CountriesMoviesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'movie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'country_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'country_id' => ['type' => 'index', 'columns' => ['country_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['movie_id', 'country_id'], 'length' => []],
            'countries_movies_ibfk_1' => ['type' => 'foreign', 'columns' => ['movie_id'], 'references' => ['movies', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'countries_movies_ibfk_2' => ['type' => 'foreign', 'columns' => ['country_id'], 'references' => ['countries', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'country_id' => 1
        ],
    ];
}
