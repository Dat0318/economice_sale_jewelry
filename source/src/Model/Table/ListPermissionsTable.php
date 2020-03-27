<?php
 namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListPermissions Model
 *
 * @method \App\Model\Entity\ListPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\ListPermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ListPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListPermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListPermission saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ListPermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListPermission findOrCreate($search, callable $callback = null, $options = [])
 */
class ListPermissionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('list_permissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('action')
            ->maxLength('action', 255)
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        return $validator;
    }
    public function getOne($conditions = [], $order = [], $contain = []){
        $this->_one = true;
        $this->_datas = $this->find()->select(['ListPermissions.id'])->contain($contain)->where($conditions)->order($order)->first();
        return $this;
    }
    public function getMany($conditions = [], $order = [], $contain = [], $limit = 20) {
        $this->_one = false;
        $table = $this->find()->select(['ListPermissions.id'])->contain($contain)->where($conditions);
        if ($order) $table->order($order);
        if ($limit) $table->limit($limit);
        $this->_datas = $table->toArray();
        return $this;
    }
    public function add($data, $auto = false) {
        $conditions2 = !isset($data['name']) || empty(trim($data['name']));

        if (!isset($data['description'])) {
            $description = '';
            if (strpos($data['name'], 'can_edit') !== false) {
                $description .= __('Có thể sửa');
            } elseif (strpos($data['name'], 'can_add') !== false) {
                $description .= __('Có thể thêm');
            } elseif (strpos($data['name'], 'can_delete') !== false) {
                $description .= __('Có thể xóa');
            } elseif (strpos($data['name'], 'can_view') !== false) {
                if (strpos($data['name'], 'can_view_list') !== false) {
                    $description .= __('Có thể xem danh sách');
                } else {
                    $description .= __('Có thể xem');
                }
            }
            $data['description'] = $description . ' ' ;
        }

        $listPermissions = $this->newEntity();
        $connection = ConnectionManager::get('default');
        $connection->begin();
        $listPermissions = $this->patchEntity($listPermissions, $data);
        if (!$this->save($listPermissions)) {
            $this->_status = 1;
        }

        if ($this->_status == 0) {
            $tableGroups = TableRegistry::get('groups');
            $groups = $tableGroups->find('list', ['keyField' => 'slug', 'valueField' => 'id'])->toArray();

            $tablePermissions = TableRegistry::get('Permissions');
            foreach ($groups as $key => $value) {
                if ($auto) {
                    $Permissions = ($value == SYSTEM_ROLE_ADMIN ? SYSTEM_ACTIVE_1 : SYSTEM_ACTIVE_0);
                } else {
                    $Permissions = (isset($data['groups']) && in_array($value, $data['groups']) ? SYSTEM_ACTIVE_1 : SYSTEM_ACTIVE_0);
                }

                $Permissions = $tablePermissions->add([
                    'groups_id' => $value,
                    'list_permissions_id' => $ListPermissions->id,
                    'value' => $Permissions,
                ]);

                if ($Permissions !== true) {
                    $this->_status = 1;
                    break;
                }
            }
        }

        if ($this->_status == 0) {
            $connection->commit();
            return true;
        }

        $connection->rollback();
        return false;
    }
}
