<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content" >
    <?= $this->Form->create($group) ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 ">

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tên Nhóm</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Nhập Tên Nhóm']); ?>
                </div>
            </div>

             <div class="form-group row">
                <label class="col-sm-3 col-form-label">Miêu tả</label>
                <div class="col-sm-9">
                    <?= $this->Form->textarea('description', ['class' => 'form-control']); ?>
                </div>
            </div>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>

        </div>
