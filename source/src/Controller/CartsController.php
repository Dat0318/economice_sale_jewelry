<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use App\View\Helper\CartsHelper;


/**
 * Carts Controller
 *
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */   
     public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
        $this->Carts = new CartsHelper(new \Cake\View\View());       
    }
    public function index()
    {
        $cart = $this->Carts->getCart();
        $this->set(compact('cart'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    
    public function add() { //  add 1 sp vào giỏ
        $this->loadModel('Products');
        $this->autoRender = false;  
        if ($this->request->is('post')) {
            $quantity=null;
            if(isset($this->request->data['quantity'])){
                $quantity=(int)$this->request->data['quantity'];
            }
            $productId=$this->request->data['product_id'];
            $product=$this->Products->get($productId);
            $cart=[
                    'path_image' =>$product->url,
                    'product_title' => $product->name,
                    'price' => $product->price_sale,
                    'price_sale' => $product->price_commercial,
                    'price_entered'=>$product->price_entered,
                    'quantity' => $quantity,
                    'sub_total' => '',
                    'product_id' =>$productId,
                    'link_product' => '/products/'.$productId,
                ];
            $this->Carts->addProduct($cart); // Helper viet addProduct($data) . Ở đây use truyền vào $cart[]
        }
        return $this->redirect($this->referer());

    }
    

    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function update() { // update toàn giỏ
        if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                $this->Carts->update($this->request->data['quantity']);
            }
        }
        return $this->redirect(['action' => 'index']);
    }
    /*
    *
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $this->Carts->delete($id);
        return $this->redirect(['action' => 'index']);
    }

    public function deleteCart(){
         $this->request->allowMethod(['post', 'delete','get']);
         $this->Carts->deleteCart();
         return $this->redirect(['action' => 'index']);
    }
}
