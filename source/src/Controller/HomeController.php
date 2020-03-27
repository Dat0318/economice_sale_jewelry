<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();     
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->Products= TableRegistry::get('Products');
        $best_seller=$this->Products->find()
            ->select(['Products.name','Products.id','Products.url','Products.price_sale','Products.price_commercial', 'orders_products__quantity' => 'SUM(OrdersProducts.quantity)'])
            ->contain(['OrdersProducts'])
            ->group(['Products.id'])
            ->order(['orders_products__quantity' => 'DESC'])
            ->limit(10);
            

        // select products.name , SUM(orders_products.quantity)FROM products INNER JOIN orders_products ON products.id=orders_products.products_id GROUP BY  products.id ORDER BY SUM(orders_products.quantity)DESC LIMIT 3;
        
        $new_products = $this->Products->find()->order(['created_at'=>'DESC'])->limit(10);
        $this->set(compact('new_products','best_seller'));
    }
}
