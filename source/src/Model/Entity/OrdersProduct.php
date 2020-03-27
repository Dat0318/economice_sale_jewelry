<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

/**
 * OrdersProduct Entity
 *
 * @property int $orders_id
 * @property int $products_id
 * @property int $price
 * @property int $quantity
 * @property string|null $products_name
 * @property int|null $price_sale
 * @property int|null $price_entered
 * @property int|null $price_comercial
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 */
class OrdersProduct extends Entity
{
    //protected $primaryKey = 'id';
    protected $_accessible = [
        'id' =>true,
        'orders_id' => true,
        'products_id' => true,
        'price' => true,
        'quantity' => true,
        'products_name' => true,
        'url' => true,
        'price_entered' => true,
        'order' => true,
        'product' => true
    ];

    protected $_virtual = ['total_product'];
    
    protected function _getTotalProduct(){
        return $this->price * $this->quantity * (100 - $this->price_entered)/100 ;
    }
}
