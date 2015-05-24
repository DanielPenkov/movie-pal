<?php
namespace App\Model\Table;

use App\Model\Entity\Genre;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Genres Model
 */
class GenresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('genres');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsToMany('Movies', [
            'foreignKey' => 'genre_id',
            'targetForeignKey' => 'movie_id',
            'joinTable' => 'genres_movies'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        return $validator;
    }
    

    public function findGenresList(Query $query, array $options)
    {
       
    }
}
