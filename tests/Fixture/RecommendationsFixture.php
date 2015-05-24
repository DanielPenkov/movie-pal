<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecommendationsFixture
 *
 */
class RecommendationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sender_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reciever_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'movie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'notification_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'movie_id' => ['type' => 'index', 'columns' => ['movie_id'], 'length' => []],
            'sender_id' => ['type' => 'index', 'columns' => ['sender_id'], 'length' => []],
            'reciever_id' => ['type' => 'index', 'columns' => ['reciever_id'], 'length' => []],
            'notification_id' => ['type' => 'index', 'columns' => ['notification_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'recommendations_ibfk_1' => ['type' => 'foreign', 'columns' => ['sender_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'recommendations_ibfk_2' => ['type' => 'foreign', 'columns' => ['reciever_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'recommendations_ibfk_3' => ['type' => 'foreign', 'columns' => ['movie_id'], 'references' => ['movies', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'recommendations_ibfk_4' => ['type' => 'foreign', 'columns' => ['notification_id'], 'references' => ['notifications', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id' => 1,
            'sender_id' => 1,
            'reciever_id' => 1,
            'movie_id' => 1,
            'notification_id' => 1
        ],
    ];
}
