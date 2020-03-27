<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    

    /**
     * Display method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function display($slug= null)
    {
        
        
        $product = $this->Products->find()->where(['slug'=>$slug])->first();
        //pr($product);die();
        //console.log('1212');
        //$relate_products=$this->Products->find()->where(['categories_id'=>$product->categories_id])->limit(5);
        $this->set(compact('product','relate_products'));
    }
}
