<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersMovies Controller
 *
 * @property \App\Model\Table\UsersMoviesTable $UsersMovies
 */
class UsersMoviesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Movies']
        ];
        $this->set('usersMovies', $this->paginate($this->UsersMovies));
        $this->set('_serialize', ['usersMovies']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Movie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersMovie = $this->UsersMovies->get($id, [
            'contain' => ['Users', 'Movies']
        ]);
        $this->set('usersMovie', $usersMovie);
        $this->set('_serialize', ['usersMovie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersMovie = $this->UsersMovies->newEntity();
        if ($this->request->is('post')) {
            $usersMovie = $this->UsersMovies->patchEntity($usersMovie, $this->request->data);
            if ($this->UsersMovies->save($usersMovie)) {
                $this->Flash->success('The users movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The users movie could not be saved. Please, try again.');
            }
        }
        $users = $this->UsersMovies->Users->find('list', ['limit' => 200]);
        $movies = $this->UsersMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('usersMovie', 'users', 'movies'));
        $this->set('_serialize', ['usersMovie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Movie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersMovie = $this->UsersMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersMovie = $this->UsersMovies->patchEntity($usersMovie, $this->request->data);
            if ($this->UsersMovies->save($usersMovie)) {
                $this->Flash->success('The users movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The users movie could not be saved. Please, try again.');
            }
        }
        $users = $this->UsersMovies->Users->find('list', ['limit' => 200]);
        $movies = $this->UsersMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('usersMovie', 'users', 'movies'));
        $this->set('_serialize', ['usersMovie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Movie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersMovie = $this->UsersMovies->get($id);
        if ($this->UsersMovies->delete($usersMovie)) {
            $this->Flash->success('The users movie has been deleted.');
        } else {
            $this->Flash->error('The users movie could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
