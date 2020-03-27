<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>

<div class="pages form large-9 medium-8 columns content" >
     <legend><?= __('Add Page') ?></legend>
    <?= $this->Form->create($page) ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 ">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('title', ['class' => 'form-control','id'=>'title', 'placeholder' => 'Title','onkeyup'=>"ChangeToSlug();"]); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Slug</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('slug', ['class' => 'form-control', 'id'=>'slug' , 'readonly' => 'readonly']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-12">
                    <?= $this->Form->textarea('content', ['class' => 'form-control']); ?>
                     <!-- <?= $this->Form->textarea('editor', ['id' => 'editor'],['class' => 'form-control']); ?> -->
                </div>
            </div>
          
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <!-- <?= $this->Form->number('status', ['class' => 'form-control']); ?> -->
                    <?= $this->Form->select('status',
                     ['public', 'private', 'online'],['style'=>'width:400px;padding:7px;']); ?> 
                </div>
            </div>

            <div class="form-group row" style="display: none;">
                <label class="col-sm-3 col-form-label">Count_views</label>
                <div class="col-sm-9">
                    <?= $this->Form->number('count_views', ['class' => 'form-control']); ?>
                </div>
            </div>


             <div class="form-group row" style="display: none;">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <?= $this->Form->number('users_id',['class' => 'form-control','value' => $this->request->session()->read('Auth.User.id')]); ?>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ảnh</label>
                <div class="col-sm-9">
                    <?=  $this->Form->input('image', [
            'templates' => [
                'inputContainer' => '<span class="input file required btn btn-default input {{type}}{{required}}"><span>Choose file</span>{{content}}</span>',
            ],
            'onchange'=>'onFileImage(this);',
            'class' => 'form-control',
            'type' => 'file',
            'label' => false
    ]); ?>
                </div>
            </div>
    

          
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
           
          

        </div>

    
