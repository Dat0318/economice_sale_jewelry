<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListPermission $listPermission
 */
?>
<div class="listPermissions form large-9 medium-8 columns content">
    <?= $this->Form->create($listPermission) ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 ">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Action</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('action', ['class' => 'form-control', 'placeholder' => 'Nhập Action']); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">description</label>
                <div class="col-sm-9">
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'placeholder' => 'Nhập Miêu tả']); ?>
                </div>
            </div>

            
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>

        </div>

