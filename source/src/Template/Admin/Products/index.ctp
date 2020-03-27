
<div class="box">
    <div class="box-header">
        <h3 class="box-title">THÔNG TIN SẢN PHẨM</h3>
    </div> 
    <div class="box-body">
        <table class="table table-bordered table-responsive table-hover dataTable ">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Tên sản phẩm') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Giá nhập') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Giá bán') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Khuyễn mãi %') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Trạng thái') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Hiện có') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('image_url') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('categories_id') ?></th>
                    
                    <th scope="col"><?= $this->Paginator->sort('Views') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>

                

                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody >
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $this->Number->format($product->id) ?></td>
                        <td><?= h($product->name) ?></td>
                        <td><?= h($product->price_entered) ?></td>
                        <td><?= h($product->price_sale) ?></td>
                        <td><?= h($product->price_commercial) ?></td>
                        <td><?= STATUS_PRODUCT[$product->status] ?></td>
                        <td><?= h($product->quantity) ?></td>
                        <td>
                            <?= $this->Html->image($product->url, array('alt' => 'img', 'style' => 'max-width: 50px; max-height: 50px')); ?>
                        </td>

                       <!--  <td><?= ($product->categories_name) ?></td> -->
                        <td><?= $product->has('category') ? h($product->category->name) : '' ?></td>  
                        <td><?= h($product->count_views) ?></td>
    
                        <td><?= h($product->updated_at) ?></td>  
                       
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



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