<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActorsMovies Controller
 *
 * @property \App\Model\Table\ActorsMoviesTable $ActorsMovies
 */
class ActorsMoviesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Actors']
        ];
        $this->set('actorsMovies', $this->paginate($this->ActorsMovies));
        $this->set('_serialize', ['actorsMovies']);
    }

    /**
     * View method
     *
     * @param string|null $id Actors Movie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actorsMovie = $this->ActorsMovies->get($id, [
            'contain' => ['Movies', 'Actors']
        ]);
        $this->set('actorsMovie', $actorsMovie);
        $this->set('_serialize', ['actorsMovie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actorsMovie = $this->ActorsMovies->newEntity();
        if ($this->request->is('post')) {
            $actorsMovie = $this->ActorsMovies->patchEntity($actorsMovie, $this->request->data);
            if ($this->ActorsMovies->save($actorsMovie)) {
                $this->Flash->success('The actors movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The actors movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->ActorsMovies->Movies->find('list', ['limit' => 200]);
        $actors = $this->ActorsMovies->Actors->find('list', ['limit' => 200]);
        $this->set(compact('actorsMovie', 'movies', 'actors'));
        $this->set('_serialize', ['actorsMovie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Actors Movie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actorsMovie = $this->ActorsMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actorsMovie = $this->ActorsMovies->patchEntity($actorsMovie, $this->request->data);
            if ($this->ActorsMovies->save($actorsMovie)) {
                $this->Flash->success('The actors movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The actors movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->ActorsMovies->Movies->find('list', ['limit' => 200]);
        $actors = $this->ActorsMovies->Actors->find('list', ['limit' => 200]);
        $this->set(compact('actorsMovie', 'movies', 'actors'));
        $this->set('_serialize', ['actorsMovie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Actors Movie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actorsMovie = $this->ActorsMovies->get($id);
        if ($this->ActorsMovies->delete($actorsMovie)) {
            $this->Flash->success('The actors movie has been deleted.');
        } else {
            $this->Flash->error('The actors movie could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
