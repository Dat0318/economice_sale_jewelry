<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;
/**
 * Carts helper
 */
class CartsHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->Products = TableRegistry::get('Products');  
    }
    public function getCart(){

        $cart = $this->readCart();
        if (null!=$cart) {
            return $cart;
        }
        return null;

    }

    public function addProduct($data) {
        $cart = $this->readCart();
        $productId=$data['product_id'];
        $quantity=$data['quantity'];
        if (null!=$cart && $cart['products']!=[]) {
            if (array_key_exists($productId, $cart['products'])) {
                if(null!=$quantity) {
                    $cart['products'][$productId]['quantity']+=$quantity; 	
                }
                else  {
                    $cart['products'][$productId]['quantity']++; 	
                }
            } 
            else {
                $cart['products'][$productId]=$data;
                if($quantity!=null) {

                    $cart['products'][$productId]['quantity']=$quantity; 
                    // dd($cart['products'][$productId]['quantity']); 	
                }
                else {
                    $cart['products'][$productId]['quantity'] = 1;	
                }
            }
        } 
        else {
        	$cart=CART;
            $cart['products'][$productId]=$data;
            if($quantity!=null) {
                $cart['products'][$productId]['quantity']=$quantity; 
            }
            else {
                $cart['products'][$productId]['quantity'] = 1;  	
            }      
        }
        $price=($cart['products'][$productId]['price_sale']!=null)?$cart['products'][$productId]['price_sale']:$cart['products'][$productId]['price'];
        $cart['products'][$productId]['sub_total']=$price*$cart['products'][$productId]['quantity'];
        
        $total = 0;
        $count=0;
        foreach ($cart['products'] as $product) {
            $total+=$product['sub_total'];
            $count+=$product['quantity'];
        }
        $cart['total_cost']=$total;
        $cart['count']=$count;
        $this->saveCart($cart);

    }

    public function update($data){
        $cart=$this->getCart();
        foreach ($data as $index => $value) {
            if ($value>0) {
                $price= ($cart['products'][$index]['price_sale']!=null)? $cart['products'][$index]['price_sale']: $cart['products'][$index]['price'];
                $cart['products'][$index]['quantity'] = $value;
                $cart['products'][$index]['sub_total']=$price *$cart['products'][$index]['quantity'];
            }
        }
        $total = 0;
        $count=0;
        foreach ($cart['products'] as $product) {
            $total+=$product['sub_total'];
            $count+=$product['quantity'];
        }
        $cart['total_cost']=$total;
        $cart['count']=$count;
        $this->saveCart($cart);

    }

    public function saveCart($data) {
       return $this->request->session()->write('cart', $data);
        
    }

/*
 * read cart data from session
 */
public function readCart() {
    return $this->request->session()->read('cart');
}


public function delete($id=null){
    $cart=$this->readCart();
    if($id!=null){
        unset($cart['products'][$id]);
        $total = 0;
        $count=0;
        foreach ($cart['products'] as $product) {
            $total+=$product['sub_total'];
            $count+=$product['quantity'];
        }
        $cart['total_cost']=$total;
        $cart['count']=$count;
        $this->saveCart($cart); 
        return 1;
    }
    return 0;
}

public function deleteCart(){
    $session = new Session();  
    return $session->delete('cart');
}

}
