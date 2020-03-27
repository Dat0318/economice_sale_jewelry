<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 *
 * @method \App\Model\Entity\Permission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->namePermissionEdit   = SYSTEM_MODULE_ROLES_KEYS . '.can_edit_roles_keys';
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['ListPermissions', 'Groups']
        ];
        $permissions = $this->paginate($this->Permissions);

        $this->set(compact('permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['ListPermissions', 'Groups']
        ]);

        $this->set('permission', $permission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $listPermissions = $this->Permissions->ListPermissions->find('list', ['limit' => 200]);
        $groups = $this->Permissions->Groups->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'listPermissions', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $listPermissions = $this->Permissions->ListPermissions->find('list', ['limit' => 200]);
        $groups = $this->Permissions->Groups->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'listPermissions', 'groups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('The permission has been deleted.'));
        } else {
            $this->Flash->error(__('The permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function changePermission(){
        $this->permission($this->namePermissionEdit, true);
        
        $data = $this->request->data;
        $groupsId = $data['groups_id'];
        $listPermissionsId = $data['list_permissions_id'];

        $changePermission = $this->Permissions->changePermission($groupsId, $listPermissionsId);
        if ($changePermission !== true) {
            $this->_status = 1;
        }
        $this->responAjax();
    }
}
