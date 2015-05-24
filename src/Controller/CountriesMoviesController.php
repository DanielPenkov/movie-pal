<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CountriesMovies Controller
 *
 * @property \App\Model\Table\CountriesMoviesTable $CountriesMovies
 */
class CountriesMoviesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Countries']
        ];
        $this->set('countriesMovies', $this->paginate($this->CountriesMovies));
        $this->set('_serialize', ['countriesMovies']);
    }

    /**
     * View method
     *
     * @param string|null $id Countries Movie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $countriesMovie = $this->CountriesMovies->get($id, [
            'contain' => ['Movies', 'Countries']
        ]);
        $this->set('countriesMovie', $countriesMovie);
        $this->set('_serialize', ['countriesMovie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $countriesMovie = $this->CountriesMovies->newEntity();
        if ($this->request->is('post')) {
            $countriesMovie = $this->CountriesMovies->patchEntity($countriesMovie, $this->request->data);
            if ($this->CountriesMovies->save($countriesMovie)) {
                $this->Flash->success('The countries movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The countries movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->CountriesMovies->Movies->find('list', ['limit' => 200]);
        $countries = $this->CountriesMovies->Countries->find('list', ['limit' => 200]);
        $this->set(compact('countriesMovie', 'movies', 'countries'));
        $this->set('_serialize', ['countriesMovie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Countries Movie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $countriesMovie = $this->CountriesMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $countriesMovie = $this->CountriesMovies->patchEntity($countriesMovie, $this->request->data);
            if ($this->CountriesMovies->save($countriesMovie)) {
                $this->Flash->success('The countries movie has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The countries movie could not be saved. Please, try again.');
            }
        }
        $movies = $this->CountriesMovies->Movies->find('list', ['limit' => 200]);
        $countries = $this->CountriesMovies->Countries->find('list', ['limit' => 200]);
        $this->set(compact('countriesMovie', 'movies', 'countries'));
        $this->set('_serialize', ['countriesMovie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Countries Movie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $countriesMovie = $this->CountriesMovies->get($id);
        if ($this->CountriesMovies->delete($countriesMovie)) {
            $this->Flash->success('The countries movie has been deleted.');
        } else {
            $this->Flash->error('The countries movie could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
