<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content" >
    <?= $this->Form->create($user) ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 ">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Họ</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('firstname', ['class' => 'form-control', 'placeholder' => 'Nhập họ']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tên</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('lastname', ['class' => 'form-control', 'placeholder' => 'Nhập tên']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('email', ['class' => 'form-control', 'type'=>'email', 'placeholder' => 'Nhập email']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('username', ['class' => 'form-control', 'placeholder' => 'Nhập username']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('pass', ['class' => 'form-control', 'type'=>'password','placeholder' => 'Nhập password']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                    <?= $this->Form->radio('gender', ['Nam', 'Nữ', 'Giới tính khác']); ?>
                    
                </div>
            </div>

            

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Birthday</label>
                <div class="col-sm-9">
                    <?= $this->Form->date('birthday', [
                        'minYear' => date('Y') - 70,
                        'maxYear' => date('Y'),
                        'monthNames' => false, // Months are displayed as numbers
                        'empty' => [
                            'year' => 'Chọn năm',
                            'month' => 'Chọn tháng',
                            'day' => 'Chọn ngày',
                        ],
                        'month' => [
                            'class' => 'form-control',
                            'title' => false,
                            'style' => 'width: 33.333%; display: inline-block;'
                        ],
                        'day' => [
                            'class' => 'form-control',
                            'title' => false,
                            'style' => 'width: 33.333%; display: inline-block;'
                        ],
                        'year' => [
                            'class' => 'form-control',
                            'title' => false,
                            'style' => 'width: 33.333%; display: inline-block;'
                        ]
                    ]);
                ?>
                </div>
            </div>

            

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Avatar</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('avatar', ['class' => 'form-control','placeholder' => 'Nhập Giới Thiệu Avatar']); ?>
                </div>
            </div>

            

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <?= $this->Form->radio('status', ['Đang hoạt đông', 'Không hoạt động']); ?>
                    
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <?= $this->Form->control('groups_id',  ['options' => $groups],['class' => 'form-control'],['empty' => '(choose one)']); ?>
                </div>
            </div>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>

        </div>
