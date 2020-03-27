<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config $config
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $config->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $config->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Configs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="configs form large-9 medium-8 columns content">
        <h3 class="display-3" style="text-transform: uppercase; text-align: center;">SỬA CẤU HÌNH CỦA: <?= h($config->name_key) ?></h3>
    <?= $this->Form->create($config) ?>
    <div class="row">
        <div class="col-md-offset-2 col-md-10 ">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Khóa:</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('name_key', ['class' => 'form-control', 'placeholder' => 'Nhập khóa ...']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Type</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('type', ['class' => 'form-control', 'placeholder' => 'Nhập loại ...']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <?= $this->Form->textarea('description',['class' => 'form-control', 'placeholder' => 'Nhập mô tả ...']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Value</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('value', ['class' => 'form-control', 'placeholder' => 'Nhập giá trị ...']); ?>
                </div>
            </div>

           <div class="form-group row">
                <label class="col-sm-3 col-form-label">Special</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('special',['class' => 'form-control' ,'placeholder' => 'Nhập spencial ...']); ?>
                </div>
            </div>
            <?= $this->Form->button(__('Submit')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>    
</div>
<!-- <div class="configs form large-9 medium-8 columns content">
    <?= $this->Form->create($config) ?>
    <fieldset>
        <legend><?= __('Edit Config') ?></legend>
        <?php
            echo $this->Form->control('key');
            echo $this->Form->control('type');
            echo $this->Form->control('description');
            echo $this->Form->control('value');
            echo $this->Form->control('special');
            echo $this->Form->control('created_id');
            echo $this->Form->control('updated_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
