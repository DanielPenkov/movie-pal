<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GenresMovies Controller
 *
 * @property \App\Model\Table\GenresMoviesTable $GenresMovies
 */
class GenresMoviesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Genres']
        ];
        $this->set('genresMovies', $this->paginate($this->GenresMovies));
        $this->set('_serialize', ['genresMovies']);
    }

    /**
     * View method
     *
     * @param string|null $id Genres Movie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view( $id = null  )
    {
        $genresMovie = $this->GenresMovies->get($id, [
            'contain' => ['Movies', 'Genres']
        ]);
        $this->set('genresMovie', $genresMovie);
        $this->set('_serialize', ['genresMovie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genresMovie = $this->GenresMovies->newEntity();
        if ($this->request->is('post')) {
            $genresMovie = $this->GenresMovies->patchEntity($genresMovie, $this->request->data);
            if ($this->GenresMovies->save($genresMovie)) {
                $this->Flash->success('The genres movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The genres movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->GenresMovies->Movies->find('list', ['limit' => 200]);
        $genres = $this->GenresMovies->Genres->find('list', ['limit' => 200]);
        $this->set(compact('genresMovie', 'movies', 'genres'));
        $this->set('_serialize', ['genresMovie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Genres Movie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $genresMovie = $this->GenresMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genresMovie = $this->GenresMovies->patchEntity($genresMovie, $this->request->data);
            if ($this->GenresMovies->save($genresMovie)) {
                $this->Flash->success('The genres movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The genres movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->GenresMovies->Movies->find('list', ['limit' => 200]);
        $genres = $this->GenresMovies->Genres->find('list', ['limit' => 200]);
        $this->set(compact('genresMovie', 'movies', 'genres'));
        $this->set('_serialize', ['genresMovie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Genres Movie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genresMovie = $this->GenresMovies->get($id);
        if ($this->GenresMovies->delete($genresMovie)) {
            $this->Flash->success('The genres movie has been deleted.');
        } else {
            $this->Flash->error('The genres movie could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
