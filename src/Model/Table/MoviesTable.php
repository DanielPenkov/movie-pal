<?php
namespace App\Model\Table;

use App\Model\Entity\Movie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

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
        $this->hasMany('UsersMovies', [
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

    public function findMovieTitles(Query $query, array $options)
    {
        $fields = ['Movies.title'];
        return $query
            ->select($fields)
            ->distinct($fields)
            ->where(['Movies.title LIKE' => '%'.$options['title'].'%']);
    }

     public function findMoviesByTitle(Query $query, array $options)
     {
        $query
            ->where(['Movies.type' =>'movie','Movies.poster !=' =>'N/A', 
                'Movies.year !=' =>'N/A','Movies.description !=' =>'N/A' ,'Movies.title LIKE' => '%'.$options['title'].'%'])
            ->order (['Movies.year' => 'DESC', 'Movies.rating' => 'DESC'])
            ->contain(['Genres']);

        return $query;
    }

    public function findMoviesByGenre(Query $query, array $options)
    {
        $genreId = $options['genre'];
        $query = $this->find()
            ->where(['Movies.type' =>'movie','Movies.poster !=' =>'N/A', 
                'Movies.year !=' =>'N/A','Movies.description !=' =>'N/A' ])
            ->order (['Movies.year' => 'DESC', 'Movies.rating' => 'DESC'])
            ->contain(['Genres'])
            ->matching('Genres', function ($q) use ( $genreId) {
                 return $q->where(['Genres.id' => $genreId]);
                });

        return $query;
    }

    public function findMoviesByGenreAndTitle(Query $query, array $options)
    {     
        $genreId = $options['genre'];
        $title = $options['title'];
   
        $query = $this->find()
            ->where(['Movies.title LIKE' => '%'.$title.'%', 'Movies.type' =>'movie','Movies.poster !=' =>'N/A', 
                'Movies.year !=' =>'N/A','Movies.description !=' =>'N/A' ])
            ->order (['Movies.year' => 'DESC', 'Movies.rating' => 'DESC'])
            ->contain(['Genres'])
            ->matching('Genres', function ($q) use ( $genreId) {
                 return $q->where(['Genres.id' => $genreId]);
                });

        return $query;
    }



    public function findRecommendedMovies(Query $query, array $options)
    {
        $userId = $options['user_id'];
        $query = $this->find()
            ->where(['Movies.type' =>'movie','Movies.poster !=' =>'N/A', 
                'Movies.year !=' =>'N/A','Movies.description !=' =>'N/A' ])
            ->order (['Movies.year' => 'DESC', 'Movies.rating' => 'DESC'])
            ->contain(['Recommendations','Genres'])
            ->matching('Recommendations', function ($q) use ( $userId) {
                 return $q->where(['Recommendations.reciever_id' => $userId]);
                });

        return $query;
    }

    public function findWatchedMovies(Query $query, array $options)
    {
        $userId = $options['user_id'];
        $query = $this->find()
            ->where(['Movies.type' =>'movie','Movies.poster !=' =>'N/A', 
                'Movies.year !=' =>'N/A','Movies.description !=' =>'N/A' ])
            ->order (['Movies.year' => 'DESC', 'Movies.rating' => 'DESC'])
            ->contain(['UsersMovies','Genres'])
            ->matching('UsersMovies', function ($q) use ( $userId) {
                 return $q->where(['UsersMovies.user_id' => $userId, 'UsersMovies.status' => 2 ]);
                });

        return $query;
    }

        public function findWatchingMovies(Query $query, array $options)
    {
        $userId = $options['user_id'];
        $query = $this->find()
            ->where(['Movies.type' =>'movie','Movies.poster !=' =>'N/A', 
                'Movies.year !=' =>'N/A','Movies.description !=' =>'N/A' ])
            ->order (['Movies.year' => 'DESC', 'Movies.rating' => 'DESC'])
            ->contain(['UsersMovies','Genres'])
            ->matching('UsersMovies', function ($q) use ( $userId) {
                 return $q->where(['UsersMovies.user_id' => $userId, 'UsersMovies.status' => 1 ]);
                });

        return $query;
    }

public function addToWatchingList($movie_id, $user_id)
{



$UsersMovies = TableRegistry::get('UsersMovies');


        $data = array(
            'UsersMovies' =>array(
                'user_id' =>$user_id,
                'movie_id'=>$movie_id,
                'status' => 1
            )
        );

        if($this->isInList($movie_id, $user_id) == false){

            $this->UsersMovies->save($data);
           
                
        }

          
  
    }

        public function addToWatchedList($movie_id, $user_id)
        {

        $data = array(
            'UsersMovies' =>array(
                'user_id' =>$user_id,
                'movie_id'=>$movie_id,
                'status' => 2
            )
        );

        if($this->isInList($movie_id, $user_id) == false){

            $this->UsersMovies->save($data);
  
                
        }else{

           $this->UsersMovies->updateAll(array('status' => '2'),array('user_id'=>$user_id,'movie_id' => $movie_id));

        } 



    }

     public function isInList($movie_id, $user_id)
     {

        $response=false;
        return $response;
    }



}
