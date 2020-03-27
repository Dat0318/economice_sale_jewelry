<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config $config
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Config'), ['action' => 'edit', $config->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Config'), ['action' => 'delete', $config->id], ['confirm' => __('Are you sure you want to delete # {0}?', $config->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Configs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Config'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<!-- <div class="configs view large-9 medium-8 columns content">
    <h3><?= h($config->id) ?></h3> -->
<div class="categories box">
    <h3 class="display-3" style="text-align: center; text-transform: uppercase;">CHI TIẾT CỦA: <?= h($config->name_key) ?></h3>
    <table class="table table-bordered table-hover dataTable">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($config->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Key') ?></th>
            <td><?= h($config->name_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($config->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($config->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Special') ?></th>
            <td><?= h($config->special) ?></td>
        </tr>
    </table>
    
</div>
