<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

/**
 * OrdersProducts Controller
 *
 * @property \App\Model\Table\OrdersProductsTable $OrdersProducts
 *
 * @method \App\Model\Entity\OrdersProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersProductsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products' , 'Orders'],
            'limit' => 30,
        ];
        $ordersProducts = $this->paginate($this->OrdersProducts);
        //pr($ordersProducts); die;
        $this->set(compact('ordersProducts'));
    }
   
    /**
     * View method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersProduct = $this->OrdersProducts->get($id, [
            'contain' => ['Products', 'Orders'] // sử dụng get.  tải một thực thể single entity từ cơ sở dữ liệu khi chỉnh sửa hoặc xem các thực thể và dữ liệu liên quan của chúng
        ]);

        $this->set('ordersProduct', $ordersProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersProduct = $this->OrdersProducts->newEntity();
        if ($this->request->is('post')) {
            $ordersProduct = $this->OrdersProducts->patchEntity($ordersProduct, $this->request->getData());
            if ($this->OrdersProducts->save($ordersProduct)) {
                $this->Flash->success(__('The orders product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders product could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersProducts->Orders->find('list', ['limit' => 200]);
        $products = $this->OrdersProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('ordersProduct', 'orders', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editop($id = null)
    {
        $ordersProduct = $this->OrdersProducts->get($id, [
            'contain' => [ 'Products', 'Orders']
        ]);
        pr($ordersProduct); die();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersProduct = $this->OrdersProducts->patchEntity($ordersProduct, $this->request->getData());
            if ($this->OrdersProducts->save($ordersProduct)) {
                $this->Flash->success(__('The orders product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders product could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersProducts->Orders->find('list', ['limit' => 200]);
        $products = $this->OrdersProducts->Products->find('list', ['limit' => 200]);


        $this->set(compact('ordersProduct', 'orders', 'products'));
    }

    public function edit($id=null){
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersProduct=$this->OrdersProducts->get($id);
            $sl=$this->request->data['quantityy'];
            $ordersProduct->quantity=$sl;
            $this->OrdersProducts->save($ordersProduct);
            $this->Flash->success(__('The order has been updated.'));
            $this->response->body(true);
            return $this->response;
        }
    }


    /**
     * Delete method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersProduct = $this->OrdersProducts->get($id);
        if ($this->OrdersProducts->delete($ordersProduct)) {
            $this->Flash->success(__('The orders product has been deleted.'));
        } else {
            $this->Flash->error(__('The orders product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
