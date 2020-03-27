<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;
use Cake\Core\Configure;


class CartsTable extends Table
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

        $this->setTable('carts');  
    }

}