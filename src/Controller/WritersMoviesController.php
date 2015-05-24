<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WritersMovies Controller
 *
 * @property \App\Model\Table\WritersMoviesTable $WritersMovies
 */
class WritersMoviesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Writers']
        ];
        $this->set('writersMovies', $this->paginate($this->WritersMovies));
        $this->set('_serialize', ['writersMovies']);
    }

    /**
     * View method
     *
     * @param string|null $id Writers Movie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $writersMovie = $this->WritersMovies->get($id, [
            'contain' => ['Movies', 'Writers']
        ]);
        $this->set('writersMovie', $writersMovie);
        $this->set('_serialize', ['writersMovie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $writersMovie = $this->WritersMovies->newEntity();
        if ($this->request->is('post')) {
            $writersMovie = $this->WritersMovies->patchEntity($writersMovie, $this->request->data);
            if ($this->WritersMovies->save($writersMovie)) {
                $this->Flash->success('The writers movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The writers movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->WritersMovies->Movies->find('list', ['limit' => 200]);
        $writers = $this->WritersMovies->Writers->find('list', ['limit' => 200]);
        $this->set(compact('writersMovie', 'movies', 'writers'));
        $this->set('_serialize', ['writersMovie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Writers Movie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $writersMovie = $this->WritersMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $writersMovie = $this->WritersMovies->patchEntity($writersMovie, $this->request->data);
            if ($this->WritersMovies->save($writersMovie)) {
                $this->Flash->success('The writers movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The writers movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->WritersMovies->Movies->find('list', ['limit' => 200]);
        $writers = $this->WritersMovies->Writers->find('list', ['limit' => 200]);
        $this->set(compact('writersMovie', 'movies', 'writers'));
        $this->set('_serialize', ['writersMovie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Writers Movie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $writersMovie = $this->WritersMovies->get($id);
        if ($this->WritersMovies->delete($writersMovie)) {
            $this->Flash->success('The writers movie has been deleted.');
        } else {
            $this->Flash->error('The writers movie could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
