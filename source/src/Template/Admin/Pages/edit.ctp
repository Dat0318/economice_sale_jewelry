
<div class="pages form large-9 medium-8 columns content">
    <?= $this->Form->create($page) ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 ">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('title', ['class' => 'form-control', 'placeholder' => 'Title']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Slug</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('slug', ['class' => 'form-control', 'placeholder' => 'Slug']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-9">
                    <?= $this->Form->textarea('content', ['class' => 'form-control']); ?>
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

          
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
 