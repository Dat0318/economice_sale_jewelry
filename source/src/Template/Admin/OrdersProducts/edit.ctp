
<div class="products form large-9 medium-8 columns content"  style="width: 100%; float: left">
    <?= $this->Form->create($ordersProduct) ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">ID</label> 
        <div class="col-sm-4">
        <?= $this->Form->text('id', ['class' => 'form-control']); ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Order</label> 
        <div class="col-sm-4">
            <?= $this->Form->text('orders_id',  ['class' => 'form-control' ]);?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product</label> 
        <div class="col-sm-4">
            <?= $this->Form->select('products_id', $products, ['class' => 'form-control' ]);?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Giá</label> 
        <div class="col-sm-4">
            <?= $this->Form->text('price', ['class' => 'form-control' ]);?>
        </div>
    </div> 

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">So luong</label> 
        <div class="col-sm-4">
            <?= $this->Form->text('quantity',  ['class' => 'form-control' ]);?>
        </div>
    </div>

    <div class = "row">
        <div class="form-group row" style ="text-align: center;">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>


