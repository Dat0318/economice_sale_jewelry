<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>                                         
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->css('admin/bootstrap.min.css'); ?>
    <?= $this->Html->css('admin/font-awesome.min.css'); ?>
    <?= $this->Html->css('login.css'); ?>
</head>
<body class="hold-transition skin-blue">
  <div class="wrapper">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>
  <?= $this->Html->script('jquery-3.3.1.min.js') ?>
  <?= $this->Html->script('admin/jquery-ui.min.js') ?>
</body>
</html>

