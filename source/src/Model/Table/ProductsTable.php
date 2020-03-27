<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsToMany $Orders
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'categories_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('OrdersProducts', [
            'foreignKey' => ['id'],
            'bindingKey' => ['products_id'],
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Orders', [
            'foreignKey' => 'products_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'orders_products'
        ]);
    }

    
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');
        $validator
            ->integer('price_sale')
            ->requirePresence('price_sale', 'create')
            ->notEmptyString('price_sale');

        $validator
            ->integer('price_entered')
            ->requirePresence('price_entered', 'create')
            ->notEmptyString('price_entered');

        $validator
            ->integer('categories_id')
            ->requirePresence('categories_id', 'create')
            ->notEmptyString('categories_id');

        $validator
            ->integer('price_commercial')
            ->allowEmptyString('price_commercial');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->notEmpty('url');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->add( 'slug', 
                ['unique' => [ 
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'Slug not unique']
                ]);

        $validator
            ->integer('count_views')
            ->requirePresence('count_views', 'create')
            ->allowEmptyString('count_views');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

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
        $rules->add($rules->existsIn(['categories_id'], 'Categories'));
          
        return $rules;
    }

    public static function slugify($text){
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
      // trim
      $text = trim($text, '-');
      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);
      // lowercase
      $text = strtolower($text);
      if (empty($text)) {
        return 'n-a';
      }
      return $text;
    }

}
