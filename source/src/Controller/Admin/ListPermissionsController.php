<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionAdmin;
/**
 * ListPermissions Controller
 *
 * @property \App\Model\Table\ListPermissionsTable $ListPermissions
 *
 * @method \App\Model\Entity\ListPermission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListPermissionsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

        public function initialize()
    {
        parent::initialize();
        $this->loadModel('groups');
        $this->nameTitle = __('phân quyền');

        $this->namePermissionAdd    = 'can_add_roles_keys';
        $this->namePermissionEdit   = 'can_edit_roles_keys';
        $this->namePermissionView   = 'can_view_roles_keys';
        $this->namePermissionDelete = 'can_delete_roles_keys';

        $this->permissionAdd    = $this->permission($this->namePermissionAdd);
        $this->permissionEdit   = $this->permission($this->namePermissionEdit);
        $this->permissionView   = $this->permission($this->namePermissionView);
        $this->permissionDelete = $this->permission($this->namePermissionDelete);
    }


      public function index($id = null)
    {
        $this->loadModel('Groups');
        $groups = $this->Groups->find('list', ['limit' => 200]);
         $this->permission($this->namePermissionView, true);
         $this->paginate = [
            'conditions' => $this->condition,
           'order' => ['ListPermissions.id' => 'DESC']
         ];

        $listPermissions = $this->paginate($this->ListPermissions);
        if ($this->request->is('post')) {
            $this->add();
        }
         $bEdit = false;
         if ($id) {
             $bEdit = true;
             if ($this->permissionEdit) {
                $this->edit($id);
            }
         } else {
            if ($this->permissionAdd) {
                $this->add();
             }
         }
       
        $this->set(compact('listPermissions','groups','bEdit'));
        
    }

    /**
     * View method
     *
     * @param string|null $id List Permission id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listPermission = $this->ListPermissions->get($id, [
            'contain' => []
        ]);

        $this->set('listPermission', $listPermission);

        $this->set(compact('listPermissions'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $this->permission($this->namePermissionAdd, true);
    //     $listPermission = $this->ListPermissions->newEntity();
    //     if ($this->request->is('post')) {
    //         $connection = ConnectionManager::get('default');
    //         $connection->begin();
    //         $data = $this->request->data;
    //         $listPermission = $this->listPermissions->patchEntity($listPermission, $data);

    //         if (!$this->ListPermissions->save($listPermission)) {
    //             $this->_status = 1;
    //         }

    //         if ($this->_status == 0) {
    //             $tableGroups = TableRegistry::get('groups');
    //             $groups = $tableGroups->find('list', [ 'valueField' => 'id'])->toArray();

    //             $tablePermissions = TableRegistry::get('Permissions');
    //             foreach ($groups as $key => $value) {
    //                 $Permissions = (isset($data['groups']) && in_array($value, $data['groups']) ? SYSTEM_ACTIVE_1 : SYSTEM_ACTIVE_0);
    //                 $Permissions = $tablePermissions->add([
    //                     'groups_id' => $value,
    //                     'list_permissions_id' => $Permissions->id,
    //                     'value' => $Permissions,
    //                 ]);

    //                 if ($Permissions !== true) {
    //                     $this->_status = 1;
    //                     break;
    //                 }
    //             }
    //         }


    //         if ($this->_status == 0) {
    //             $connection->commit();
    //             $this->Flash->success(__($this->aMessages['success_add'], ['name' => $this->nameTitle]));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__($this->aMessages['error_add'], ['name' => $this->nameTitle]));
    //             $connection->rollback();
    //         }
    //     }
        
    //     $this->_seoTitle = __($this->aMessages['title_add'], ['name' => $this->nameTitle]);
    //     $roles = $this->Roles->getMany([], [], [], false)->toCache();
    //     $this->set(compact('rolesKey', 'roles'));
    //     $this->set('_serialize', ['rolesKey', 'roles']);
    // }
    public function add()
    {   $this->permission($this->namePermissionAdd, true);
        $listPermission = $this->ListPermissions->newEntity();
        if ($this->request->is('post')) {
            $listPermission = $this->ListPermissions->patchEntity($listPermission, $this->request->getData());
            if ($this->ListPermissions->save($listPermission)) {
                $this->Flash->success(__('The list permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list permission could not be saved. Please, try again.'));
        }
        $groups = $this->ListPermissions->Groups->find('list', ['limit' => 200]);
        $this->set(compact('listPermission', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id List Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->permission($this->namePermissionEdit, true);
        $listPermission = $this->ListPermissions->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $listPermission = $this->ListPermissions->patchEntity($listPermission, $this->request->getData());
            if ($this->ListPermissions->save($listPermission)) {
                $this->Flash->success(__('The list permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list permission could not be saved. Please, try again.'));
        }
        $groups = $this->ListPermissions->Groups->find('list', ['limit' => 200]);

        $this->set(compact('listPermission', 'groups'));

    }
    
    /**
     * Delete method
     *
     * @param string|null $id List Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listPermission = $this->ListPermissions->get($id);
        if ($this->ListPermissions->delete($listPermission)) {
            $this->Flash->success(__('The list permission has been deleted.'));
        } else {
            $this->Flash->error(__('The list permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
