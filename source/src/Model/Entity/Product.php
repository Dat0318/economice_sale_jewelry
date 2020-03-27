<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $price_sale
 * @property int $price_entered
 * @property int|null $price_commercial
 * @property int $quantity
 * @property string|null $url
 * @property string|null $description
 * @property int $categories_id
 * @property string $slug
 * @property int $count_views
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Order[] $orders
 */
class Products extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    
    //protected $primaryKey = 'id';


    protected $_accessible = [

        'name' => true,
        'price_sale' => true,
        'price_entered' => true,
        'price_commercial' => true,
        'quantity' => true,
        'url' => true,
        'description' => true,
        'categories_id' => true,
        'slug' => true,
        'count_views' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'category' => true,
        'orders' => true
    ];
}
