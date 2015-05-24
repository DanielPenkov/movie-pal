<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Actors Controller
 *
 * @property \App\Model\Table\ActorsTable $Actors
 */
class ActorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('actors', $this->paginate($this->Actors));
        $this->set('_serialize', ['actors']);
    }

    /**
     * View method
     *
     * @param string|null $id Actor id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actor = $this->Actors->get($id, [
            'contain' => ['Movies']
        ]);
        $this->set('actor', $actor);
        $this->set('_serialize', ['actor']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actor = $this->Actors->newEntity();
        if ( $this->request->is('post')) {
            $actor = $this->Actors->patchEntity($actor, $this->request->data);
            if ($this->Actors->save($actor)) {
                $this->Flash->success('The actor has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The actor could not be saved. Please, try again.');
            }
        }
        $movies = $this->Actors->Movies->find('list', ['limit' => 200]);
        $this->set(compact('actor', 'movies'));
        $this->set('_serialize', ['actor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Actor id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actor = $this->Actors->get($id, [
            'contain' => ['Movies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actor = $this->Actors->patchEntity($actor, $this->request->data);
            if ($this->Actors->save($actor)) {
                $this->Flash->success('The actor has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The actor could not be saved. Please, try again.');
            }
        }
        $movies = $this->Actors->Movies->find('list', ['limit' => 200]);
        $this->set(compact('actor', 'movies'));
        $this->set('_serialize', ['actor']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Actor id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actor = $this->Actors->get($id);
        if ($this->Actors->delete($actor)) {
            $this->Flash->success('The actor has been deleted.');
        } else {
            $this->Flash->error('The actor could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
