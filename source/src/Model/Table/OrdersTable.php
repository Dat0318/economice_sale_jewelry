<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'orders_id',
            'targetForeignKey' => 'products_id',
            'joinTable' => 'orders_products'
        ]);
        $this->hasMany('OrdersProducts', [
            'foreignKey' => 'orders_id'
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
            ->dateTime('delivery_at')
            ->requirePresence('delivery_at', 'create')
            ->notEmptyDateTime('delivery_at');

        $validator
            ->scalar('code')
            ->maxLength('code', 255)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->integer('phone_repicient')
            ->requirePresence('phone_recipient', 'create')
            ->notEmptyString('phone_recipient');
            
        $validator
            ->scalar('name_recipient')
            ->maxLength('name_recipient', 255)
            ->requirePresence('name_recipient', 'create')
            ->notEmptyString('name_recipient');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

         $validator
            ->scalar('note')
            ->maxLength('note', 255)
            //->requirePresence('note', 'create')
            ->AllowEmptyString('note');

         $validator
            ->scalar('email')
            ->maxLength('email', 255)
            //->requirePresence('email', 'create')
            ->AllowEmptyString('email');

         $validator
            ->integer('total_cost');
            //->requirePresence('total_cost', 'create');
            //->notEmptyString('total_cost');
         $validator
            ->requirePresence('type_ship', 'create')
            ->notEmptyString('type_ship');
        
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
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }

    // public function total($data){
        
    //     $total=0;
    //     foreach($data->orders_products as $item){
    //         $total+= ($item->price*$item->quantity *(1- $item->price_entered/100));
    //     }
    //     //pr($data->orders_products->price_entered);die();

    //     return $total;
    // }
}
