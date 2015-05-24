<?php
namespace App\Model\Table;

use App\Model\Entity\Movie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movies Model
 */
class MoviesTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('movies');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->hasMany('Recommendations', [
            'foreignKey' => 'movie_id'
        ]);
        $this->belongsToMany('Actors', [
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'actor_id',
            'joinTable' => 'actors_movies'
        ]);
        $this->belongsToMany('Countries', [
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'country_id',
            'joinTable' => 'countries_movies'
        ]);
        $this->belongsToMany('Directors', [
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'director_id',
            'joinTable' => 'directors_movies'
        ]);
        $this->belongsToMany('Genres', [
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'genre_id',
            'joinTable' => 'genres_movies'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_movies'
        ]);
        $this->belongsToMany('Writers', [
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'writer_id',
            'joinTable' => 'writers_movies'
        ]);
    }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
            
        $validator
            ->requirePresence('year', 'create')
            ->notEmpty('year');
            
        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');
            
        $validator
            ->add('rating', 'valid', ['rule' => 'numeric'])
            ->requirePresence('rating', 'create')
            ->notEmpty('rating');
            
        $validator
            ->requirePresence('poster', 'create')
            ->notEmpty('poster');
            
        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }

       public function findIndexMovies(Query $query)
       {
        $query
        ->where(['Movies.type' =>'movie','Movies.poster !=' =>'N/A', 
            'Movies.year !=' =>'N/A','Movies.description !=' =>'N/A' ])
        ->order (['Movies.year' => 'DESC', 'Movies.rating' => 'DESC'])
        ->contain(['Genres']);
        return $query;
    }

    public function findMoviesByTitle(Query $query, array $options)
    {
        $fields = ['Movies.title'];

        return $query
            ->select($fields)
            ->distinct($fields)
             ->where(['Movies.title LIKE' => '%'.$options['title'].'%']);
    }
    
}
