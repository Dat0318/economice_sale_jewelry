
<?php
    use App\Model\Entity\Upload;
?>

<div class="products form large-9 medium-8 columns content"  style="width: 100%; float: left">

    <?= $this->Form->create($product, ['enctype' => 'multipart/form-data']) ?>

    <div class = "row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tên</label>
                <div class="col-sm-9">
                    <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'tên sản phẩm']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Danh mục</label>
                <div class="col-sm-9">
                    <?= $this->Form->select('categories_id', $categories, [
                        'class' => 'form-control',
                        // 'empty' => '(choose one)'
                    ]); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"> <span>Giá nhập ₫ </span> </label>
                <div class="col-sm-9"> 
                    <?= $this->Form->text('price_entered', ['class' => 'form-control', 'placeholder' => 'giá nhập']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><span>Giá bán ₫ </span> </label>
                <div class="col-sm-9">
                    <?= $this->Form->text('price_sale', ['class' => 'form-control', 'placeholder' => 'giá nhập']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><span>Giảm giá % </span></label>
                <div class="col-sm-9">
                    <?= $this->Form->text('price_commercial', ['class' => 'form-control', 'placeholder' => 'giảm giá']); ?>
                </div>
            </div>
            
                  
        </div>
<!-- , style ="text-align: right;" -->
        <div class="col-md-6" , style="padding-left: 100px;">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Lượt xem</label>
                <div class="col-sm-6">
                    <?= $this->Form->text('count_views', ['class' => 'form-control' , 'readonly' => 'readonly']); ?>
                </div>
            </div>
            

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Hiện có</label>
                <div class="col-sm-6">
                    <?= $this->Form->text('quantity', ['class' => 'form-control' , 'readonly' => 'readonly']); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><span>Trạng thái</span></label>
                <div class="col-sm-6">
                        <?= $this->Form->select('status', STATUS_PRODUCT, [
                        'class' => 'form-control',
                        'empty' => '(choose one)'
                    ]); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Chọn ảnh</label>
                <div class="col-sm-6">
                    <?=  $this->Form->input('file', [
                    'onchange'=>'onFileImage(this);',
                    'class' => 'form-control',
                    'type' => 'file',
                    'label' => false
                    ]); ?>
                </div>
               
            </div>

            <div class="from-group" >
                <label class="col-sm-3 col-form-label">Ảnh</label>
                <div class="col-sm-6">
                    <img src="<?= $product->url ?>" style = "max-width: 200px;" />  
                </div>
            </div> 

            <!-- <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <img  src = "/uploads/" alt ="img" style="max-width: 100px"; />
                </div>
            </div> -->

        </div>
    </div>


    <div class="row" , style ="padding-left: 15px; padding-right: 15px; ">
        <div class="form-group">
            <label class="col-sm-1 col-form-label">Mô tả</label>
            <div class="col-sm-5">
                <?= $this->Form->textarea('description', ['class' => 'form-control' , 'id'=>'myeditor']); ?>
            </div>
        </div>
        
        
        <div class = "row">
            <div class="form-group row" style ="text-align: center;">
                <?= $this->Form->button(__('Submit')) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    
    </div> 


</div>

