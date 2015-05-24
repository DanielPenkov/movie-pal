<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WritersMoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WritersMoviesTable Test Case
 */
class WritersMoviesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.writers_movies',
        'app.movies',
        'app.recommendations',
        'app.users',
        'app.friends',
        'app.users_movies',
        'app.notifications',
        'app.actors',
        'app.actors_movies',
        'app.countries',
        'app.countries_movies',
        'app.directors',
        'app.directors_movies',
        'app.genres',
        'app.genres_movies',
        'app.writers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WritersMovies') ? [] : ['className' => 'App\Model\Table\WritersMoviesTable'];
        $this->WritersMovies = TableRegistry::get('WritersMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WritersMovies);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
