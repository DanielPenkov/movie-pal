<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoviesTable Test Case
 */
class MoviesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movies',
        'app.recommendations',
        'app.actors',
        'app.actors_movies',
        'app.countries',
        'app.countries_movies',
        'app.directors',
        'app.directors_movies',
        'app.genres',
        'app.genres_movies',
        'app.users',
        'app.users_movies',
        'app.writers',
        'app.writers_movies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Movies') ? [] : ['className' => 'App\Model\Table\MoviesTable'];
        $this->Movies = TableRegistry::get('Movies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Movies);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
