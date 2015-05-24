<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Writers Controller
 *
 * @property \App\Model\Table\WritersTable $Writers
 */
class WritersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('writers', $this->paginate($this->Writers));
        $this->set('_serialize', ['writers']);
    }

    /**
     * View method
     *
     * @param string|null $id Writer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $writer = $this->Writers->get($id, [
            'contain' => ['Movies']
        ]);
        $this->set('writer', $writer);
        $this->set('_serialize', ['writer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $writer = $this->Writers->newEntity();
        if ($this->request->is('post')) {
            $writer = $this->Writers->patchEntity($writer, $this->request->data);
            if ($this->Writers->save($writer)) {
                $this->Flash->success('The writer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The writer could not be saved. Please, try again.');
            }
        }
        $movies = $this->Writers->Movies->find('list', ['limit' => 200]);
        $this->set(compact('writer', 'movies'));
        $this->set('_serialize', ['writer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Writer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $writer = $this->Writers->get($id, [
            'contain' => ['Movies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $writer = $this->Writers->patchEntity($writer, $this->request->data);
            if ($this->Writers->save($writer)) {
                $this->Flash->success('The writer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The writer could not be saved. Please, try again.');
            }
        }
        $movies = $this->Writers->Movies->find('list', ['limit' => 200]);
        $this->set(compact('writer', 'movies'));
        $this->set('_serialize', ['writer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Writer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $writer = $this->Writers->get($id);
        if ($this->Writers->delete($writer)) {
            $this->Flash->success('The writer has been deleted.');
        } else {
            $this->Flash->error('The writer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
