<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DirectorsMovies Controller
 *
 * @property \App\Model\Table\DirectorsMoviesTable $DirectorsMovies
 */
class DirectorsMoviesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Directors']
        ];
        $this->set('directorsMovies', $this->paginate($this->DirectorsMovies));
        $this->set('_serialize', ['directorsMovies']);
    }

    /**
     * View method
     *
     * @param string|null $id Directors Movie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $directorsMovie = $this->DirectorsMovies->get($id, [
            'contain' => ['Movies', 'Directors']
        ]);
        $this->set('directorsMovie', $directorsMovie);
        $this->set('_serialize', ['directorsMovie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $directorsMovie = $this->DirectorsMovies->newEntity();
        if ($this->request->is('post')) {
            $directorsMovie = $this->DirectorsMovies->patchEntity($directorsMovie, $this->request->data);
            if ($this->DirectorsMovies->save($directorsMovie)) {
                $this->Flash->success('The directors movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The directors movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->DirectorsMovies->Movies->find('list', ['limit' => 200]);
        $directors = $this->DirectorsMovies->Directors->find('list', ['limit' => 200]);
        $this->set(compact('directorsMovie', 'movies', 'directors'));
        $this->set('_serialize', ['directorsMovie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Directors Movie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $directorsMovie = $this->DirectorsMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $directorsMovie = $this->DirectorsMovies->patchEntity($directorsMovie, $this->request->data);
            if ($this->DirectorsMovies->save($directorsMovie)) {
                $this->Flash->success('The directors movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The directors movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->DirectorsMovies->Movies->find('list', ['limit' => 200]);
        $directors = $this->DirectorsMovies->Directors->find('list', ['limit' => 200]);
        $this->set(compact('directorsMovie', 'movies', 'directors'));
        $this->set('_serialize', ['directorsMovie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Directors Movie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $directorsMovie = $this->DirectorsMovies->get($id);
        if ($this->DirectorsMovies->delete($directorsMovie)) {
            $this->Flash->success('The directors movie has been deleted.');
        } else {
            $this->Flash->error('The directors movie could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
