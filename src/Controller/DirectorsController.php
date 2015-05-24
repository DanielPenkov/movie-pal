<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Directors Controller
 *
 * @property \App\Model\Table\DirectorsTable $Directors
 */
class DirectorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('directors', $this->paginate($this->Directors));
        $this->set('_serialize', ['directors']);
    }

    /**
     * View method
     *
     * @param string|null $id Director id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $director = $this->Directors->get($id, [
            'contain' => ['Movies']
        ]);
        $this->set('director', $director);
        $this->set('_serialize', ['director']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $director = $this->Directors->newEntity();
        if ($this->request->is('post')) {
            $director = $this->Directors->patchEntity($director, $this->request->data);
            if ($this->Directors->save($director)) {
                $this->Flash->success('The director has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The director could not be saved. Please, try again.');
            }
        }
        $movies = $this->Directors->Movies->find('list', ['limit' => 200]);
        $this->set(compact('director', 'movies'));
        $this->set('_serialize', ['director']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Director id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $director = $this->Directors->get($id, [
            'contain' => ['Movies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $director = $this->Directors->patchEntity($director, $this->request->data);
            if ($this->Directors->save($director)) {
                $this->Flash->success('The director has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The director could not be saved. Please, try again.');
            }
        }
        $movies = $this->Directors->Movies->find('list', ['limit' => 200]);
        $this->set(compact('director', 'movies'));
        $this->set('_serialize', ['director']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Director id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $director = $this->Directors->get($id);
        if ($this->Directors->delete($director)) {
            $this->Flash->success('The director has been deleted.');
        } else {
            $this->Flash->error('The director could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
