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
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AdminController extends AppController
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

    public $_message = '';
    public $_data = [];
    public $_status = 0;

    public $_prefix  = '';
    public $_user    = false;
    public $bUserSupper = false;
    public $bDebug = false;
    public $condition         = [];
    public $managementLang    = '';
    public $bContentHeader    = true;
    public $aMessages         = [];
    public $module            = '';
    public $type              = '';
    public $linkActiveSidebar = false;

    public $pluginScriptFiles     = false;
    public $pluginScriptTags      = false;
    public $pluginScriptTinyMce   = false;
    public $pluginScriptAttribute = false;
    public $pluginScriptNestable  = false;

    public $permissionAdd    = false;
    public $permissionEdit   = false;
    public $permissionView   = false;
    public $permissionDelete = false;
    
    public $namePermissionAdd    = '';
    public $namePermissionEdit   = '';
    public $namePermissionView   = '';
    public $namePermissionDelete = '';
public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->viewBuilder()->setLayout('Admin/default');
        $this->_prefix = $this->request->param('prefix');
        
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        
        $this->_checkUser();
         // $this->Auth->allow(['display']);
          // $this->Auth->allow(['display', 'view', 'index']);
    }
    private function _checkUser(){
        $user = $this->Auth->user();
        $bReturn = false;

        if ($user) {
            if ($user['status'] == '1') {

            }
            if ($user['id'] == '24'){
                $this->bUserSupper = true;
            }
            $this->_user = $user;
            $bReturn = true;
        }

        $this->set('bUserSupper', $this->bUserSupper);
        $this->set('aUserAuth', $user);

        return $bReturn;
    }
    public function responAjax() {
        echo json_encode([
            'message' => $this->_message,
            'data' => $this->_data,
            'status' => $this->_status,
        ]);
        die;
    }

    
    // public function beforeFilter(Event $event)
    // {
    //      $this->Auth->allow(['index', 'view', 'display']);
    // }
   public function permission($key, $redirect = false){
          if ($this->bUserSupper) return true;

          $showKey = ($this->bDebug ? ': ' . $key : '');

          if (!isset($this->_user['groups_id']) || empty($this->_user['groups_id'])) {
              if ($redirect) {
                  if ($this->_prefix == admin) {
                      $this->responseError('404', 'You do not have permission to access this page' . $showKey);
                  } else {
                      return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                  }
              } else {
                  return false;
              }
          }

          $tablePermissions = TableRegistry::get('Permissions');
          list($permission, $access) = $tablePermissions->checkPermission($this->_user['groups_id'], $key);
          if ($permission) $this->set('Permissions', $permission);
          if ($redirect && !$access) {
              $this->responseError('404', 'You do not have permission to access this page' . $showKey);
          }

          return $access;
      }
   }
