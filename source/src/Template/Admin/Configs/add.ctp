
<div class="configs form large-9 medium-8 columns content">
        <h3 class="display-3" style="text-transform: uppercase; text-align: center;">THÊM CẤU HÌNH</h3>
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
                    <?= $this->Form->textarea('description',['class' => 'form-control ', 'placeholder' => 'Nhập mô tả ...']); ?>
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
            <?= $this->Form->end() ?>
        </div>
    </div>    
</div>



    <!-- <div class="configs form large-9 medium-8 columns content">
        <?= $this->Form->create($config) ?>
        <fieldset>
            <legend><?= __('Add Config') ?></legend>
            <?php
                echo $this->Form->control('name_key');
                echo $this->Form->control('type');
                echo $this->Form->control('description');
                echo $this->Form->control('value');
                echo $this->Form->control('special');
                echo $this->Form->control('created_id');
                echo $this->Form->control('updated_id');
                echo $this->Form->control('created_at');
                echo $this->Form->control('updated_at');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
 -->

