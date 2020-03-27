<?php
namespace App\Model\Table;
use App\Model\Entity\Permissions;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Permissions Model
 *
 * @property \App\Model\Table\ListPermissionsTable|\Cake\ORM\Association\BelongsTo $ListPermissions
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 *
 * @method \App\Model\Entity\Permission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permission saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permission findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public $_cachePermission = [];
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('permissions');

        $this->belongsTo('ListPermissions', [
            'foreignKey' => 'list_permissions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'groups_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['list_permissions_id'], 'ListPermissions'));
        $rules->add($rules->existsIn(['groups_id'], 'Groups'));

        return $rules;
    }
    public function afterSave($event, $entity, $options)
    {
        $this->clearCacheRoles($entity->groups_id, $entity->list_permissions_id);
    }
    public function afterDelete($event, $entity, $options)
    {
        $this->clearCacheRoles($entity->groups_id, $entity->list_permissions_id);
    }
     public function add($data)
    {
        if (!$data) return false;
        $entity = $this->newEntity();
        $entity = $this->patchEntity($entity, $data);
        if ($this->save($entity)) {
            return true;
        }

        return $entity;
    }
    public function changePermission($groupsId, $listpermissionsId, $value = false){
        $connection = ConnectionManager::get('default');
        $connection->begin();

        $permissions = $this->get([$groupsId, $listpermissionsId]);
        if ($value === false) {
            $value = ($permissions->value == SYSTEM_ACTIVE_0 ? SYSTEM_ACTIVE_1 : SYSTEM_ACTIVE_0);
        } else {
            $value = ($value ? SYSTEM_ACTIVE_1 : SYSTEM_ACTIVE_0);
        }

        $data = ['value' => $value];
        $entity = $this->patchEntity($permissions, $data);
        if ($this->save($entity)) {
            $connection->commit();
            return true;
        }

        $connection->rollback();
        return $entity;
    }
    public function checkPermission($roleId, $key)
    {
        $return = [];
        if (!$this->_cachePermission) {
            $this->_cachePermission = $this->getPermission($roleId);
            $return[] = $this->_cachePermission;
        } else {
            $return[] = false;
        }

        if (array_key_exists($key, $this->_cachePermission)) {
            $return[] = $this->_cachePermission[$key];
        } else {
            $return[] = $this->checkIssetKey($roleId, $key);
        }

        return $return;
    }
    public function getPermission($groupsId, $key = ''){
        if ($groupsId) {
            $dataSelects = $this->find('all')->select([
            'permissions.value',
            'ListPermissions.action',
        ])
                ->contain(['ListPermissions'])
                ->where(['permissions.groups_id'=> $groupsId])
                ->toArray();
                $dataSelects=[];

                if ($dataSelects) {
                    return $dataSelects;
                }  
        }
        return false;
    }
    public function checkIssetKey($groupsId, $key)
    {
        $list = ['can_add_', 'can_edit_', 'can_delete_', 'can_view_', 'can_view_list_'];

        if (in_array($key, $list)) {
            if (Configure::read('debug')) {
                throw new NotFoundException('Permission key: ' . $key . ' Not Found');
            }
        } else {
            $rolesKeysTable = TableRegistry::get('ListPermissions');
            $roleKey = $rolesKeysTable->getOne(['ListPermissions.action' => $key])->toCache();
            if ($roleKey) {
                $this->clearCacheRoles($groupsId);
            } else {
                $data = ['action' => $key ];
                if ($rolesKeysTable->add($data, true)) {
                    $this->clearCacheRoles($groupsId);
                }
            }
        }
        
        return false;
    }
    

}

