<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Core\Configure;
use Cake\Mailer\MailerAwareTrait;



/**
 * Contact Controller
 *
 *
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactController extends AppController
{
    use MailerAwareTrait;
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if($this->request->is('post')){
            $data = $this->request->data;
            $this->getMailer('Contact')->send('contact',[$data]);
            $this->getMailer('Contact')->send('feedback',[$data]);
        }
        // $contact = $this->paginate($this->Contact);

        // $this->set(compact('contact'));
    }

}
