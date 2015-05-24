<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WritersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WritersController Test Case
 */
class WritersControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
