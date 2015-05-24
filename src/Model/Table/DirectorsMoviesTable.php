<?php
namespace App\Model\Table;

use App\Model\Entity\DirectorsMovie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DirectorsMovies Model
 */
class DirectorsMoviesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('directors_movies');
        $this->displayField('movie_id');
        $this->primaryKey(['movie_id', 'director_id']);
        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Directors', [
            'foreignKey' => 'director_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['movie_id'], 'Movies'));
        $rules->add($rules->existsIn(['director_id'], 'Directors'));
        return $rules;
    }
}
