<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * ConfigformController Controller
 *
 *
 * @method \Admin\Model\Entity\ConfigformController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfigformControllerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $configformController = $this->paginate($this->ConfigformController);

        $this->set(compact('configformController'));
    }

    /**
     * View method
     *
     * @param string|null $id Configform Controller id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $configformController = $this->ConfigformController->get($id, [
            'contain' => []
        ]);

        $this->set('configformController', $configformController);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $configformController = $this->ConfigformController->newEntity();
        if ($this->request->is('post')) {
            $configformController = $this->ConfigformController->patchEntity($configformController, $this->request->getData());
            if ($this->ConfigformController->save($configformController)) {
                $this->Flash->success(__('The configform controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configform controller could not be saved. Please, try again.'));
        }
        $this->set(compact('configformController'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Configform Controller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $configformController = $this->ConfigformController->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $configformController = $this->ConfigformController->patchEntity($configformController, $this->request->getData());
            if ($this->ConfigformController->save($configformController)) {
                $this->Flash->success(__('The configform controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configform controller could not be saved. Please, try again.'));
        }
        $this->set(compact('configformController'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Configform Controller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $configformController = $this->ConfigformController->get($id);
        if ($this->ConfigformController->delete($configformController)) {
            $this->Flash->success(__('The configform controller has been deleted.'));
        } else {
            $this->Flash->error(__('The configform controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
