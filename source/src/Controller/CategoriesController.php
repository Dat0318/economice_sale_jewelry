<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function display($id=null)
    {
        
    	$products = TableRegistry::get('Products')->find()->where(['categories_id'=>$id]);
    	
    	$product_news= TableRegistry::get('Products')->find()->order(['created_at'=>'DESC'])->limit(4);

        if($this->request->is('post')){
            $data= $this->request->data;
            $min=$data['from'];
            $max=$data['to'];
            $products=TableRegistry::get('Products')->find()->where(['categories_id'=>$id])->where(function ($exp) use($min,$max) {

                    return $exp->between('price_sale', $min, $max); //Consider $min=100 ; $max =1000; product_price BETWEEN 100 AND 1000;
                })->toArray();
            
        }
    	$this->set(compact('products','product_news'));
    }

    

    

}
