
<div class="orders form large-9 medium-8 columns content" >
    <?= $this->Form->create($order) ?>

    <div class = "row">

        <div class="col-md-5">

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Mã đơn</label>
                <div class="col-sm-9">
                    <?=  $this->Form->text('code', ['class' => 'form-control' ]); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Khách hàng</label> 
                <div class="col-sm-9">
                     <?= $this->Form->select('users_id', $users, [
                        'class' => 'form-control', 
                        'empty' => '(choose one)',
                        ['options' => $users]
                        ]); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Loại vận chuyển</label>
                <div class="col-sm-9">
                 <?= $this->Form->select('type_ship',  TYPE_SHIP ,['class' => 'form-control','empty' => '(choose one)' ]);?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Trạng thái</label>
                <div class="col-sm-9">
                    <?= $this->Form->select('status',  STATUS_ORDER ,['class' => 'form-control','empty' => '(choose one)' ]);?>
                </div>
            </div>

        </div>
    

    <div class="col-md-6">

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tên người nhận</label>
            <div class="col-sm-9">
                <?= $this->Form->text('name_recipient', ['class' => 'form-control' ]); ?>
            </div>
        </div>

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
                <label class="col-sm-3 col-form-label">Thời gian giao</label> 
                <div class="col-sm-9"> 
                    <?= $this->form->dateTime('delivery_at', [ 'class' => 'form-control' ] ) ?>    
                </div>
        </div>
    </div>
    

</div> <!--end row-->
 
<div style ="text-align: center; margin-top: 50px;">
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>



</div>
