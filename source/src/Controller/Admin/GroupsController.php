<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public $nameTitle = '';


    public function initialize()
    {
        parent::initialize();
        $this->nameTitle = __('nhóm thành viên');

        $this->namePermissionAdd    = SYSTEM_MODULE_ROLES . '.can_add_role';
        $this->namePermissionEdit   = SYSTEM_MODULE_ROLES . '.can_edit_role';
        $this->namePermissionView   = SYSTEM_MODULE_ROLES . '.can_view_role';
        $this->namePermissionDelete = SYSTEM_MODULE_ROLES . '.can_delete_role';

        $this->permissionAdd    = $this->permission($this->namePermissionAdd);
        $this->permissionEdit   = $this->permission($this->namePermissionEdit);
        $this->permissionView   = $this->permission($this->namePermissionView);
        $this->permissionDelete = $this->permission($this->namePermissionDelete);

        $permissionRolesKeysEdit   = $this->permission(SYSTEM_MODULE_ROLES_KEYS . '.can_edit_roles_keys');
        $this->set('permissionRolesKeysEdit', $permissionRolesKeysEdit);
    }
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->permission($this->namePermissionEdit, true);
        $this->_createDataSearch();
        $role = $this->Roles->get($id, [ 'contain' => [] ]);
        $this->paginate = [
            'contain' => [
                'RolesSettings' => [
                    'conditions' => ['RolesSettings.role_id' => $id]
                ]
            ],
            'conditions' => $this->condition,
            'order' => ['RolesKeys.module' => 'ASC']
        ];

        $this->loadModel('RolesKeys');
        $rolesKeys = $this->paginate($this->RolesKeys);

        $this->_seoTitle = __($this->aMessages['title_detail'], ['name' => $this->nameTitle]);
        $this->set(compact('rolesKeys', 'role'));
        $this->set('_serialize', ['rolesKeys', 'role']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
