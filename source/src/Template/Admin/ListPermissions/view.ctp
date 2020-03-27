<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListPermission $listPermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit List Permission'), ['action' => 'edit', $listPermission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete List Permission'), ['action' => 'delete', $listPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listPermission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List List Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New List Permission'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="listPermissions view large-9 medium-8 columns content">
    <h3><?= h($listPermission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($listPermission->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($listPermission->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($listPermission->id) ?></td>
        </tr>
    </table>
</div>
