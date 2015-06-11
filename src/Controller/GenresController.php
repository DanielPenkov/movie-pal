<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Genres Controller
 *
 * @property \App\Model\Table\GenresTable $Genres
 */
class GenresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('genres', $this->paginate($this->Genres));
        $this->set('_serialize', ['genres']);
    }

    /**
     * View method
     *
     * @param string|null $id Genre id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $genre = $this->Genres->get($id, [
            'contain' => ['Movies']
        ]);
        $this->set('genre', $genre);
        $this->set('_serialize', ['genre']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genre = $this->Genres->newEntity();
        if ($this->request->is('post')) {
            $genre = $this->Genres->patchEntity($genre, $this->request->data);
            if ($this->Genres->save($genre)) {
                $this->Flash->success('The genre has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The genre could not be saved. Please, try again.');
            }
        }
        $movies = $this->Genres->Movies->find('list', ['limit' => 200]);
        $this->set(compact('genre', 'movies'));
        $this->set('_serialize', ['genre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Genre id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
     
        $genre = $this->Genres->get($id, [
            'contain' => ['Movies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genre = $this->Genres->patchEntity($genre, $this->request->data);
            if ($this->Genres->save($genre)) {
                $this->Flash->success('The genre has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The genre could not be saved. Please, try again.');
            }
        }
        $movies = $this->Genres->Movies->find('list', ['limit' => 200]);
        $this->set(compact('genre', 'movies'));
        $this->set('_serialize', ['genre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Genre id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genre = $this->Genres->get($id);
        if ($this->Genres->delete($genre)) {
            $this->Flash->success('The genre has been deleted.');
        } else {
            $this->Flash->error('The genre could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
