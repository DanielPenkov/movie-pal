<?php


namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class MoviesTableTest extends TestCase
{
    public $fixtures = ['app.movies'];

    public function setUp()
    {
        parent::setUp();
        $this->Movies = TableRegistry::get('Movies');
    }

    public function testFindMoviesByGenre()
    {
        $query = $this->Movies->find('moviesByGenre');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 3, 'title' => 'Third Article']
        ];

        $this->assertEquals($expected, $result);
    }

}