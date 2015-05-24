<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recommendations Controller
 *
 * @property \App\Model\Table\RecommendationsTable $Recommendations
 */
class RecommendationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Movies', 'Notifications']
        ];
        $this->set('recommendations', $this->paginate($this->Recommendations));
        $this->set('_serialize', ['recommendations']);
    }

    /**
     * View method
     *
     * @param string|null $id Recommendation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recommendation = $this->Recommendations->get($id, [
            'contain' => ['Users', 'Movies', 'Notifications']
        ]);
        $this->set('recommendation', $recommendation);
        $this->set('_serialize', ['recommendation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recommendation = $this->Recommendations->newEntity();
        if ($this->request->is('post')) {
            $recommendation = $this->Recommendations->patchEntity($recommendation, $this->request->data);
            if ($this->Recommendations->save($recommendation)) {
                $this->Flash->success('The recommendation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The recommendation could not be saved. Please, try again.');
            }
        }
        $users = $this->Recommendations->Users->find('list', ['limit' => 200]);
        $movies = $this->Recommendations->Movies->find('list', ['limit' => 200]);
        $notifications = $this->Recommendations->Notifications->find('list', ['limit' => 200]);
        $this->set(compact('recommendation', 'users', 'movies', 'notifications'));
        $this->set('_serialize', ['recommendation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recommendation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recommendation = $this->Recommendations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recommendation = $this->Recommendations->patchEntity($recommendation, $this->request->data);
            if ($this->Recommendations->save($recommendation)) {
                $this->Flash->success('The recommendation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The recommendation could not be saved. Please, try again.');
            }
        }
        $users = $this->Recommendations->Users->find('list', ['limit' => 200]);
        $movies = $this->Recommendations->Movies->find('list', ['limit' => 200]);
        $notifications = $this->Recommendations->Notifications->find('list', ['limit' => 200]);
        $this->set(compact('recommendation', 'users', 'movies', 'notifications'));
        $this->set('_serialize', ['recommendation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recommendation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recommendation = $this->Recommendations->get($id);
        if ($this->Recommendations->delete($recommendation)) {
            $this->Flash->success('The recommendation has been deleted.');
        } else {
            $this->Flash->error('The recommendation could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
