<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
/**
 * Configs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Config get($primaryKey, $options = [])
 * @method \App\Model\Entity\Config newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Config[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Config|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Config saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Config patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Config[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Config findOrCreate($search, callable $callback = null, $options = [])
 */
class ConfigsTable extends Table
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

        $this->setTable('configs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'created_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'updated_id'
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
            ->scalar('name_key')
            ->maxLength('name_key', 255)
            ->requirePresence('name_key', 'create')
            ->notEmptyString('name_key');

        $validator
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('special')
            ->maxLength('special', 255)
            ->allowEmptyString('special');

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
        return $rules;
    }
    public static function getValueByNameKey($nameKey){
          $configTable = TableRegistry::get('Configs');
          $result = $configTable->find()->select(['name_key','value'])->where(['name_key' => $nameKey])->first();
          return $result;
    }
}
