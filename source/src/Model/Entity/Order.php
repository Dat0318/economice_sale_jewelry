<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Core\Configure;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $delivery_at
 * @property string $code
 * @property int $status
 * @property string $address
 * @property int $phone_repicient
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property string $name_repicient
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product[] $products
 */
class Order extends Entity
{
    //protected $primaryKey = 'id';
    protected $_accessible = [
        'users_id' => true,'user_id' => true, 'product_id' => true,
        'delivery_at' => true,
        'code' => true,
        'status' => true,
        'address' => true,
        'phone_recipient' => true,
        'email'=>true,
        'name_recipient' => true,
        'note'=>true,
        'total_cost'=>true,
        'created_at' => true,'updated_at' => true,
        'user' => true,'product' => true,
        'type_ship'=>true,
    ];

    protected $_virtual = ['total_order', 'free_ship'];
    
    protected function _getTotalOrder(){
        $total = 0;
        if (isset($this->orders_products) && !empty($this->orders_products)) {
            foreach ($this->orders_products as $key => $product) {
                $total += $product->total_product;
            }
        }
        return $total;
    }

    protected function _getFreeShip(){
        $feeship = 0;
        if($this->total_order >= Configure::read('FREE_SHIP')){
            return $feeship  ;
        }else if ($this->total_order == 0){
            return $feeship + 1;
        }else {
            return $feeship = 1111;
        }
    }
}
