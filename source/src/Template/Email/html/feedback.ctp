<?php
use Cake\Core\Configure;
?>
<p style="text-align: center;"><strong><?= __('Chào {name}', ['name' => $user->name]); ?>!</strong></p>
<h2 style="text-align: center;"><?= __('Chào mừng bạn đã đến với {link}!', ['link' => Configure::read('App.fullBaseUrl')]); ?></h2>
<p style="text-align: center;"><?=__('Chúng tôi đã nhận được ý kiến của quý khách từ website, chúng tôi sẽ phản hồi quý khách trong thời gian sớm nhất.')?></p> 

<p style="text-align: center;"><?= __('Để được hỗ trợ nhanh nhất  bạn vui lòng gọi vào số hotline {hotline}', ['hotline' => Configure::read('HOTLINE')]); ?></p>

<p style="text-align: center;"><em><?= __('Xin cảm ơn quý khách đã sử dụng dịch vụ của {link}.', ['link' => Configure::read('App.fullBaseUrl')]); ?></em></p>