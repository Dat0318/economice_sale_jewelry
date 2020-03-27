<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;
use App\Model\Entity\Upload;


/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
            'limit' => 10,
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $product = $this->Products->get($id, [
        //     'contain' => ['Categories', 'Orders']
        // ]);
        $product = $this->Products->get($id, [
            'contain' => ['Categories']
        ]);
        
        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {

            $upload = new Upload();
            $data = $upload->update();

            $checkErrorUpload = false;
            if (isset($_FILES['file'])) {
                if (isset($data['status'])) {
                    if ($data['status'] != 0 || !isset($data['data']['path'])) {
                        $this->Flash->error($data['message']);
                        $checkErrorUpload = true;
                    }
                }
            }
            if (!$checkErrorUpload) {
                $product->url = $data['data']['path'];
                $product = $this->Products->patchEntity($product, $this->request->getData());
                //pr($product->categories_id);die();
                //pr($product);die();
                if($product->categories != null){
                        if ($this->Products->save($product)) {
                            $this->Flash->success(__('The product has been saved.'));

                            return $this->redirect(['action' => 'index']);
                        }
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $orders = $this->Products->Orders->find('list', ['limit' => 200]);
        
        $this->set(compact('product', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories']
        ]);
        //pr($product); die();
        if ($this->request->is(['patch', 'post', 'put'])) {
                
            $checkErrorUpload = false;
            if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
                $upload = new Upload();
                $data = $upload->update();
                if (isset($data['status'])) {
                    if ($data['status'] != 0 || !isset($data['data']['path'])) {
                        $this->Flash->error($data['message']);
                        $checkErrorUpload = true;
                    }
                }
            }

            if (!$checkErrorUpload) {
                $product = $this->Products->patchEntity($product, $this->request->getData());
                if (isset($data['data']['path'])) {
                    $product->url = $data['data']['path'];
                }
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            //}
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $orders = $this->Products->Orders->find('list', ['limit' => 200]);
        // $this->set(compact('product', 'categories', 'orders'));
        $this->set(compact('product', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     
}       