<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WritersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WritersTable Test Case
 */
class WritersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.writers',
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
        $config = TableRegistry::exists('Writers') ? [] : ['className' => 'App\Model\Table\WritersTable'];
        $this->Writers = TableRegistry::get('Writers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Writers);

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
