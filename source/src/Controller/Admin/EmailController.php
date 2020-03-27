<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailController extends AdminController
{

    // public function beforeFilter(Event $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Auth->allow(['add', 'logout']);
    // }

    // ini_set("SMTP","anh.hoangtam@vietis.com.vn");

    // // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
    // ini_set("smtp_port","25");

    // // Please specify the return address to use
    // ini_set('sendmail_from', 'anh.hoangtam@vietis.com.vn');

    
    public function index()
    {
        $email = new Email('default');
        $email->from(['anh.hoangtam@vietis.com.vn' => 'host'])
              ->to('tamptit2016@gmail.com')
              ->subject('Vv...Lalaland')
              ->send('My message');    
    }

    
}
