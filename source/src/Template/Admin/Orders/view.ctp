

<div class="orders view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row" width="300px"><?= __('Mã đơn hàng') ?></th>
            <td><?= h($order->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Khách hàng') ?></th>
            <td> <?= $order->user->full_name ?> </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loại ship') ?></th>
            <td> <?= TYPE_SHIP[$order->type_ship] ?> </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ngày giao hàng') ?></th>
            <td><?= h($order->delivery_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trạng thái') ?></th>
            <td><?= STATUS_ORDER[$order->status] ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Địa chỉ nhận') ?></th>
            <td><?= h($order->address) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Số điện thoại người nhận') ?></th>
            <td><?= $this->Number->format($order->phone_recipient) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Tên người nhận') ?></th>
            <td><?= h($order->name_recipient) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian đặt hàng') ?></th>
            <td><?= h($order->created_at) ?></td>
        </tr>
        
    </table>

<h3>Danh sách sản phẩm</h3>
    <table class = "table" style= "width: 80%;">
        <thead>
            <th width="10%">Mã SP</th>
            <th width="20%">Tên sản phẩm</th>
            <th width="10%">Số lượng</th>
            <th width="15%">Giá (VND)</th>
            <th width="15%">Giảm giá (%)</th>
            <th width="30%">Thành tiền(VND)</th>
            
        </thead>

        
        <?php foreach ($order->orders_products as $item): ?>
      
            <tr>
                <td width="10%"><?= h($item->products_id) ?></td>
                <td width="20%"><?=  $this->Html->link($item->products_name, ['controller' => 'Products', 'action' => 'view', $item->products_id])  ?></td>
                <td width="15%"><?= h($item->quantity) ?></td>
                <td width="15%"><?= number_format($item->price)."<br>";?></td>
                <td width="15%"><?= number_format($item->price_entered)."<br>";?></td>
                <td width="30%"><?= number_format($item->total_product) ?> </td>
                
            </tr> 

        <?php endforeach; ?>
            <tr>
                <th colspan="5" style ="text-align: right" >Phí vận chuyển = </th>
                <td> <?= number_format($order->free_ship) ?> VNĐ</td>
            </tr> 

            <tr>
                <th colspan="5" style ="text-align: right" >Tổng thanh toán = </th>
                <td> <?= number_format($order->total_order) ?> VNĐ</td>
            </tr>


          
   
</table>

    <!-- show total order -->
    <!-- <?= $total?> -->

</div>
