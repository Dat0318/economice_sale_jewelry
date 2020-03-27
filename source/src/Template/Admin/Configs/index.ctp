
<?= $this->HTML->css('admin/config.css')?>
<div class="config-form"> 
    <div class="config-form-left">
        <?= $this->Form->create($configs); ?>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <label >Key: </label>
                  <?= $this->Form->text('key', ['class' => 'form-control item', 'placeholder' => 'Nhập giá trị key ...']); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <label >Description: </label>
                  <?= $this->Form->textarea('description', ['class' => 'form-control item','row'=>'5', 'placeholder' => 'Nhập mô tả ...']); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <label style="width: 100%;">Type: </label>
                  <?= $this->Form->select('type',[
                        '1' => 'Boolen',
                        '2' => 'Text',
                        '3' => 'textarea',
                        '4' => 'Mã'
                    ] , ['class' => 'form-control item']); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label >Value: </label>
                <?= $this->Form->textarea('value', ['class' => 'form-control item','row'=>'10', 'placeholder' => 'Nhập mô tả ...']); ?>
                </div>
            </div>
            <div class="form-row">
                <?= $this->Form->button('<i class="fas fa-save"></i>Thêm mới',['class' => 'form-control btn-save'],['escape' => false]) ?>
            </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="config-form-right">
        <?php foreach ($configs as $config): ?>
        <?= $this->Form->create($config); ?>
            <div class="config-form-right-header">
                <div class="item edit">
                    <?= $this->Html->link('<i class="fas fa-pen"></i>', ['action' => 'edit', $config->id],['escape' => false]) ?>
                </div>
                <div class="item delete">
                    <?= $this->Html->link('<i class="fas fa-trash-alt"></i>', ['action' => 'delete_id',$config->id],['escape' => false]) ?>
                    <!-- <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $config->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $config->id), 'escape' => false]) ?>  -->
                </div>
                <div class="item description">
                    <?= h($config->description) ?>
                </div>
                <div class="item name_key">
                    <?= h($config->name_key) ?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <?= $this->Form->text('value',['value'=>$config->value,'rows'=>'1','class' => 'form-control', 'placeholder' => 'Nhập giá trị ...']); ?> 
                    <!-- <?= h($config->value) ?> -->
                </div>
                <!-- <label class="switch form-group col-md-12">
                    <?= $this->Form->input('value',['class' => 'form-control item','type'=>'checkbox']); ?>
                    <span class="slider"></span>
                </label> -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 box-btn-item">
                    <?= $this->Form->button(__('Lưu'),['class'=>'btn-item save','action'=> 'edit.ctp']) ?>
                    <?= $this->Form->button(__('Hủy'),['class'=>'btn-item cancel','action'=> 'index.ctp']) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>  
        <?php endforeach; ?>     
    </div>
</div>
<div class="clear"></div>
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
<!-- <div class="box category admin1">
     <?php foreach ($configs as $config): ?>
    <tr>
        
        <td><?= $this->Number->format($config->id) ?></td>
        <td><?= h($config->name_key) ?></td>
        <td><?= $this->Number->format($config->type) ?></td>
        <td><?= h($config->value) ?></td>
        <td><?= h($config->special) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $config->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $config->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $config->id], ['confirm' => __('Are you sure you want to delete # {0}?', $config->id)]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</div>
 --><!-- <?= $this->Configs->getValue('234');?> -->
<!-- <?= $this->Configs->getValueByKey('234');?> -->


<script type="text/javascript">
    var data= $('.element-form').serialize();
    console.log(data);
</script>