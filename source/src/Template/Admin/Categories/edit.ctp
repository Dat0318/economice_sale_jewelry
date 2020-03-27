
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<h3 class=" display-3" style="text-align: center;">SỬA DANH MỤC</h3>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <div class="row">
        <div class="col-md-offset-2 col-md-10 ">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Name:</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Nhập tên ...']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Parent_id:</label>
                <div class="col-sm-9">
                    <?= $this->Form->select('parent_id',$parentCategories, [
                        'class' => 'form-control',
                        'empty' => '(choose one)'
                    ]); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Type:</label>
                <div class="col-sm-9">
                    <?= $this->Form->select('type',[
                        '1' => 'Sản phẩm',
                        '0' => 'Tin tức'
                    ] , ['class' => 'form-control item']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status:</label>
                <div class="col-sm-9">
                    <?= $this->Form->select('type',[
                        '1' => 'Ẩn',
                        '0' => 'hiện'
                    ] , ['class' => 'form-control item']); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-9">
                    <?= $this->Form->button(__('Submit')) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

    <!-- <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('parent_id',['options' => $parentCategories, 'empty' => true]);
            echo $this->Form->control('type');
            echo $this->Form->control('status');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
 -->