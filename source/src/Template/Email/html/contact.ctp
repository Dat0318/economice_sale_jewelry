<?php
use Cake\Core\Configure;
?>
<h3 style="text-align: center;"><strong><?= __('Liên hệ từ khách hàng: {name}', ['name' => $user->name]); ?>!</strong></h3>
<h4>Thông tin khách hàng</h4>
<p><?= __('Họ và tên: {name}', ['name' => $user->name]); ?></p>
<p><?= __('Địa chỉ email: {mail}', ['mail' => $user->mail]); ?></p>
<p><?= __('Số điện thoại: {phone}', ['phone' => $user->phone]); ?></p>
<p><?= __('Địa chỉ: {address}', ['address' => $user->address]); ?></p>

<h4>Nội dung liên hệ:</h4>
<p><?=$user->message?></p> 

<p style="text-align: center;"><?= __('Vui lòng gọi vào số hotline {hotline} để được hỗ trợ.', ['hotline' => Configure::read('HOTLINE')]); ?></p>

<p style="text-align: center;"><a href="<?=Configure::read('App.fullBaseUrl')?>"  ><em><?= __('Quay về trang chủ ') ?></em></a></p>