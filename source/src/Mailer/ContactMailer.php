<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Core\Configure;

/**
 * Contact mailer.
 */
class ContactMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Contact';

    public function contact($user)
    {
    	if ($user) {
    		if (!is_object($user)) $user = (object)$user;
			$from      = $user->mail;
			$subject = __('Liên hệ từ khách hàng');
	        $this->from($from)
	        	->to(Configure::read('EMAIL_ADMIN'))
	            ->subject($subject)
	            ->viewVars(['user' => $user])
	            ->emailFormat('html')
	            ->template('contact');
	        return true;
        }
        return false;
    }

    public function feedback($user){
    	if ($user) {
    		if (!is_object($user)) $user = (object)$user;
			$to      = $user->mail;
			$subject = __('Cảm ơn quý khách đã liên hệ với') . ' ' . Configure::read('App.fullBaseUrl');
	        $this->to($to)
	            ->subject($subject)
	            ->viewVars(['user' => $user])
	            ->emailFormat('html')
	            ->template('feedback');
	        return true;
        }
        return false;
    }
}
