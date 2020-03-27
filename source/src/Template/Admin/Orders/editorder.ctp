
<div class="orders form large-9 medium-8 columns content" >
    <?= $this->Form->create($order) ?>

    <div class = "row">

        <div class="col-md-5">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Khách hàng</label> 
                <div class="col-sm-7">
                     <?= $this->Form->select('users_id', $users, [
                        'class' => 'form-control',
                    ]); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-8"> 
                    <?= $this->Form->control('delivery_at'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Mã đơn</label>
                <div class="col-sm-9">
                    <?=  $this->Form->text('code', ['class' => 'form-control' ]); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Trạng thái</label>
                <div class="col-sm-9">
                    
                    <?= $this->Form->select('status',  STATUS_ORDER ,['class' => 'form-control status' ]);?>
                </div>
            </div>
        </div>
    
    <div class="col-md-6">

       <div class="form-group row">
            <label class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-9">
                <?= $this->Form->text('address', ['class' => 'form-control' ]); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Số liên lạc</label>
            <div class="col-sm-9">
                <?= $this->Form->text('phone_recipient', ['class' => 'form-control' ]); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tên người nhận</label>
            <div class="col-sm-9">
                <?= $this->Form->text('name_recipient', ['class' => 'form-control' ]); ?>
            </div>
        </div>
        
        <div class="form-group row">

            <div class="col-sm-9">
                <?= $this->Form->control('created_at'); ?>
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-9">
                <?= $this->Form->control('updated_at');?>
            </div>
        </div>
    </div>
    
</div> <!--end row-->

<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>


</div>
