<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Home';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- bootstrap-slider-css-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">
    <!-- jquery-3.3.1 -->
    <?= $this->Html->script('jquery-3.3.1.min.js') ?>
    <!-- bootstrap-slider-js-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('category.css')?>
    <?= $this->Html->css('product.css')?>
    <?= $this->Html->css('new.css') ?>
    <?= $this->Html->css('new1.css') ?>
    <?= $this->Html->css('order.css')?>
    <?= $this->Html->css('cart.css') ?>
    <?= $this->Html->css('about.css')?>
    <?= $this->Html->css('contact.css') ?>
    <?= $this->HTML->css('register.css'); ?>
    <?= $this->Html->css('footer.css') ?>
    <?= $this->HTML->css('swiper.min.css'); ?>

    <!-- animation aos -->
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <?= $this->Html->script('default.js') ?>
    <!-- end: animation aos -->
    
    <?= $this->Html->script('common.js') ?>
    <?= $this->Html->script('category.js') ?>
    <?= $this->Html->script('checkout.js') ?>
    <?= $this->HTML->script('swiper.min.js'); ?>
    <?= $this->HTML->script('home.js'); ?>
    <?= $this->HTML->script('register.js'); ?>
    <?= $this->HTML->script('login.js'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->element('header'); ?>
    <div class="block-message"><?= $this->Flash->render() ?></div>
        
    <div class="main-content">
        <?= $this->fetch('content') ?>
    </div>
    <?= $this->configs->getValueByKey('.system.show.footer')=='hien thi footer' ? $this->element('footer') : ''; ?>
</body>
</html>

