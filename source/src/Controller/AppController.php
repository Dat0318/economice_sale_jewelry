<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\View\Helper\CartsHelper;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash'); 


        $prefix = $this->request->param('prefix');
        if ($prefix == 'admin') {
            $configAuth = [
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'username',
                            'password' => 'pass'
                        ]
                    ]
                ],
                'loginRedirect' => [
                    'controller' => 'Dashboard',
                    'action' => 'index',
                    'prefix' => 'admin'
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login',
                    'prefix' => 'admin'
                ],
                'loginAction' => [
                    'controller' => 'Users',
                    'action' => 'login',
                    'prefix' => 'admin'
                ],
                'authorize' => ['Controller'],
                'unauthorizedRedirect' => $this->referer()
            ];
        } else {
            $configAuth = [
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'username',
                            'password' => 'pass'
                        ]
                    ]
                ],
                'loginRedirect' => [
                    'controller' => 'Home',
                    'action' => 'index',
                    
                ],
                'logoutRedirect' => [
                    'controller' => 'Home',
                    'action' => 'index',
                   
                ],
                'loginAction' => [
                    'controller' => 'Users',
                    'action' => 'login',
                    
                ],
                'authorize' => ['Controller'],
                'unauthorizedRedirect' => $this->referer()
            ];
        }
        $this->loadComponent('Auth', $configAuth);
        $this->Auth->allow();
                               
    }
    public function responAjax() {
        echo json_encode([
            'message' => $this->_message,
            'data' => $this->_data,
            'status' => $this->_status,
        ]);
        die;
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        return $user;
    }
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
          
    }
    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        $this->Carts = new CartsHelper(new \Cake\View\View());
        $cart= $this->Carts->getCart();
        $user= $this->Auth->user();
        // $user=['username'=>'sam'];
        $this->set(compact('cart','categories_header','user'));
    }

    
}
