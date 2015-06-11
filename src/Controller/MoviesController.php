<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class MoviesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([ 'index','viewDetails']);
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $this->set('title','');
        $this->set('genre','');

        $genres = TableRegistry::get('Genres');
        $genresList = $genres->find('allGenres');
        $this->set('genres', $genresList);

        if ($this->request->is('ajax')) 
        {
            $this->loadMatchingTitles($this->request->query['q']);
        } 

        $config = array('limit' => 9);

        if(empty($this->request->query['title']) == false && empty($this->request->query['genre']))
        {
            $this->set('title',$this->request->query['title']);
            $result = $this->Movies->find('moviesByTitle', ['title' =>  $this->request->query['title']]);
        }

        if( empty($this->request->query['genre']) == false && empty($this->request->query['title']) )
        {       
            $this->set('genre', $this->request->query['genre']);
            $result =$this->Movies->find('moviesByGenre', ['genre' => $this->request->query['genre']]);
        }

        if(empty($this->request->query['genre']) == false && empty($this->request->query['title'])==false)
        {    
            $this->set('title',$this->request->query['title']);
            $this->set('genre', $this->request->query['genre']);
            $result = $this->Movies->find('moviesByGenreAndTitle', 
                    ['genre' => $this->request->query['genre'], 'title' => $this->request->query['title']]);          
        }
        
        if(empty($this->request->query['title']) && empty($this->request->query['genre']))
        {
            $result = $this->Movies->find('indexMovies'); 
        }

        $this->set('movies', $this->Paginator->paginate( $result,  $config));
        $this->set('_serialize', ['movies']);
    }

    public function viewDetails($id = null)
    {

        
        if ($this->request->is('ajax')) 
        {
            $movie = $this->Movies->get($id, [
            'contain' => ['Actors', 'Countries', 'Genres', 'Directors', 'Writers']
        ]);
        $this->set('movie', $movie);
        $this->set('_serialize', ['movie']);
            
        }else{
            $this->autoRender = false;
        }



    }

    public function loadMatchingTitles($title)
    {
        $this->autoRender = false;
        $results = $this->Movies->find('movieTitles', ['title' => $title]);

        foreach($results as $result) 
        {
            echo $result->title . "\n";
        }
    }

    public function getRecommendedMovies($user_id = null)
    {

        
        if ($this->request->is('ajax')) 
        {
            $config = array('limit' => 9);

            $result =$this->Movies->find('recommendedMovies', ['user_id' => $user_id]);
            $this->set('movies', $this->Paginator->paginate( $result,  $config));
            //$this->set('_serialize', ['movies']);
            
        }else{
            $this->autoRender = false;
        }
    }

    public function getWatchedMovies($user_id = null)
    {

      
        if ($this->request->is('ajax')) 
        {
            $config = array('limit' => 9);

            $result =$this->Movies->find('watchedMovies', ['user_id' => $user_id]);
            $this->set('movies', $this->Paginator->paginate( $result,  $config));
            //$this->set('_serialize', ['movies']);
            
        }else{
            $this->autoRender = false;
        }
    }

    public function getWatchingMovies($user_id = null)
    {

        
        if ($this->request->is('ajax')) 
        {
            $config = array('limit' => 9);

            $result =$this->Movies->find('watchingMovies', ['user_id' => $user_id]);
            $this->set('movies', $this->Paginator->paginate( $result,  $config));
            //$this->set('_serialize', ['movies']);
            
        }else{
            $this->autoRender = false;
        }
    }


    public function addMovieWatchedList(){

        $this->autoRender = false;

        $movie_id = json_encode($this->request->data['id']);
        $user_id = $this->Auth->user('id');
 
        $message = $this->Movies->addToWatchedList($movie_id, $user_id);
       

    }

    public function addMovieWatchingList(){

        $this->autoRender = false; 
       

        $movie_id = json_encode($this->request->data['id']);
        $user_id = 1;
 
        $message = $this->Movies->addToWatchingList($movie_id, $user_id);
        $this->set('_serialize', 'message');
      
    }


}
