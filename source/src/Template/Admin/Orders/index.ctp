<div class="box">
    <div class="box-header">
        <h3 class="box-title">THÔNG TIN ĐƠN HÀNG</h3>
    </div> 
    <div class="box-body">
        <table class="table table-bordered table-responsive table-hover dataTable ">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('ID') ?></th>   
                    <th scope="col"><?= $this->Paginator->sort('Mã đơn hàng') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Khách hàng') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Ngày giao hàng') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Loại giao') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Trạng thái') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Người nhận') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($orders as $order): ?>
                <tr>
                    <td class='id'><?= h($order->id) ?></td>
                    <td><?= h($order->code) ?></td>
                    <td><?= $order->has('user') ? $this->Html->link($order->user->username, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                    <td><?= h($order->delivery_at) ?></td>
                    <td><?= h(TYPE_SHIP[$order->type_ship]) ?></td>
                    <td><select class="status">
                        <?php foreach(STATUS_ORDER as $item=>$value): ?> 
                            <option value = "<?=$item?>"<?php if($item==$order->status) echo 'selected="selected"';?> ><?=$value?> 
                            </option> 
                        <?php endforeach;?>
                    </select></td>
                    <td><?= h($order->name_recipient) ?></td>         
                    <td class="actions">
                        <?= $this->Html->link(__('Chi tiết'), ['action' => 'view', $order->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'editorder', $order->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
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

<script>
    $(document).ready(function(){
        $('.status').change(function(){  //  thẻ select class status change
            var status= $(this).val();
            var id= $(this).parent().parent().find('.id').text(); // lay thẻ cha . cha là <tr> find thẻ class id
            $.ajax({
                url:"/admin/orders/edit/"+id,
                type:"POST",
                data:{
                    idd:id,
                    statuss:status
                },
                dataType:"json",
            }).done(function (results) { 
                //console.log(data);
                alert("Đã thay đổi" + results);   
            });
        });
    });
</script>







