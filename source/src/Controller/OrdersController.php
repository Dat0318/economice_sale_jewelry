<?php
namespace App\Controller;

use App\Controller\AppController;
use App\View\Helper\CartsHelper;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index(){
        $user_order=$this->Auth->user();
        $this->OrdersProducts=TableRegistry::get('OrdersProducts');
        $this->Carts = new CartsHelper(new \Cake\View\View());
        if($this->request->is('post')){
            $cart= $this->Carts->getCart();
            $user= $this->request->data;
            $now = Time::now(); 
            $order = $this->Orders->newEntity();
            $user_id=($this->Auth->user()!=null)?$this->Auth->user('id'):null;
            $data = 
            [
                'users_id'=>$user_id,
                'delivery_at'=>($now->addDays(5))->i18nFormat('yyyy-MM-dd HH:MM:ss'),
                'code'=>$now->i18nFormat('yyyy-MM-dd'),
                'status'=>1,
                'address'=>$user['address'],
                'phone_recipient'=>$user['phone'],
                'name_recipient'=>$user['last_name'].' '.$user['first_name'],
                'note'=>$user['note'],
                'email'=>$user['email'],
                'total_cost'=>$cart['total_cost'],
                'type_ship'=>0
            ];
            // dd($data);
            $order = $this->Orders->patchEntity($order, $data);
            $order= $this->Orders->save($order);
            // dd($order);
            if ($order) {
                $order_id= $order->id;
                foreach($cart['products'] as $item){
                    $orderProduct= $this->OrdersProducts->newEntity();
                    $data_product=[
                        'orders_id'=>$order_id,
                        'products_id'=>$item['product_id'],
                        'price'=>($item['price_sale']!=null)?$item['price_sale']:$item['price'],
                        'price_entered'=>$item['price_entered'],
                        'quantity'=>$item['quantity'],
                        'url'=>$item['link_product'],
                        'products_name'=>$item['product_title'],
                    ];
                    // dd($data_product);
                     $product = $this->OrdersProducts->patchEntity($orderProduct, $data_product);
                     // dd($product);
                     $this->OrdersProducts->save($product);
                }

                $this->Carts->deleteCart();
                return $this->redirect(['controller'=>'Home','action' => 'index']);
            }
             $this->Flash->error(__('Đặt hàng không thành công. Vui lòng thử lại!'));
        }
        // dd($user_order);
        $this->set(compact('user_order'));
    }
    

    
}
