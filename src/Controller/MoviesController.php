<?php
namespace App\Controller;

use App\Controller\AppController;


class MoviesController extends AppController
{

  
        public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $this->loadmodel('Genre');
        $dropdownitems = $this->Genre->find('list',  array('fields' => array('Genre.genre')));
        $this->set(compact(  'dropdownitems'));

        if ($this->request->is('ajax')) 
        {
            $this->autoRender = false;
            $results = $test = $this->Movies->find('moviesByTitle', ['title' => $this->request->query['q']]);

            foreach($results as $result) 
            {
                echo $result->title . "\n";
            }
        } 

        $config = [ 'limit' => 9];
        $data = $this->Movies->find('indexMovies'); 
        $this->set('movies', $this->Paginator->paginate( $data,  $config));
        $this->set('_serialize', ['movies']);
    }

    /**
     * View method
     *
     * @param string|null $id Movie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => ['Actors', 'Countries', 'Directors', 'Genres', 'Users', 'Writers', 'Recommendations']
        ]);
        $this->set('movie', $movie);
        $this->set('_serialize', ['movie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movie = $this->Movies->newEntity();
        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->data);
            if ($this->Movies->save($movie)) {
                $this->Flash->success('The movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The movie could not be saved. Please, try again.');
            }
        }
        $actors = $this->Movies->Actors->find('list', ['limit' => 200]);
        $countries = $this->Movies->Countries->find('list', ['limit' => 200]);
        $directors = $this->Movies->Directors->find('list', ['limit' => 200]);
        $genres = $this->Movies->Genres->find('list', ['limit' => 200]);
        $users = $this->Movies->Users->find('list', ['limit' => 200]);
        $writers = $this->Movies->Writers->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'actors', 'countries', 'directors', 'genres', 'users', 'writers'));
        $this->set('_serialize', ['movie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => ['Actors', 'Countries', 'Directors', 'Genres', 'Users', 'Writers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->data);
            if ($this->Movies->save($movie)) {
                $this->Flash->success('The movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The movie could not be saved. Please, try again.');
            }
        }
        $actors = $this->Movies->Actors->find('list', ['limit' => 200]);
        $countries = $this->Movies->Countries->find('list', ['limit' => 200]);
        $directors = $this->Movies->Directors->find('list', ['limit' => 200]);
        $genres = $this->Movies->Genres->find('list', ['limit' => 200]);
        $users = $this->Movies->Users->find('list', ['limit' => 200]);
        $writers = $this->Movies->Writers->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'actors', 'countries', 'directors', 'genres', 'users', 'writers'));
        $this->set('_serialize', ['movie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movie = $this->Movies->get($id);
        if ($this->Movies->delete($movie)) {
            $this->Flash->success('The movie has been deleted.');
        } else {
            $this->Flash->error('The movie could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}