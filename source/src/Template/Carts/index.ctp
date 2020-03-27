<!-- Cart -->

<div class="page-cart holder">
	<?php 
	$cart=$this->Carts->getCart();
	if(count($cart['products'])<1) echo '<h2>Chưa có sản phẩm nào trong giỏ hàng</h2>'; else{
	 ?>

	 <?= $this->Form->create(null, [
	 	'class' => 'js-updateCart', 'url'=>['controller'=>'Carts','action'=>'update']
	 ]);?>
	 	<!-- Product -->
	<div class="product">
		<table border="0">
			<thead>
				<tr>
					<th><a href="/delete-cart" class="delete-cart">XÓA TẤT CẢ</a></th>
					<th>SẢN PHẨM</th>
					<th>TÊN SẢN PHẨM</th>
					<th>GIÁ</th>
					<th>SỐ LƯỢNG</th>
					<th>TỔNG</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cart['products'] as $product):?>
				
				<tr>
					<td ><a href="/delete-product/<?=$product['product_id']?>"><div class="remove">x</div></a></td>
					<td ><img src="<?= $product['path_image']?>"></td>
					<td><?=$this->Html->link($product['product_title'],array('controller'=>'Products','action'=>'display',$product['product_id']))?></td>
					<td class="price"><span class="priceUnit"><?= ($product['price_sale']!=null)?$product['price_sale']:$product['price']?></span> <u>đ</u></td>
					<td>
						<button class="sub">-</button>
						<input type="text" name="quantity[<?= h($product['product_id'])?>]" class="quantity" value=<?=h($product['quantity'])?>>
						<button class="plus">+</button>
					</td>
					<td class="price"><span class="subTotal"><?= h($product['sub_total'])?></span> <u>đ</u></td>
				</tr>
				
			<?php endforeach;?>
			
			</tbody>
		</table>
		<a class="watch-product" href="/"><i class="fas fa-arrow-left"></i>Tiếp tục xem sản phẩm</a>
		<button class="update-cart" type="submit">CẬP NHẬP GIỎ HÀNG</button>
	</div>

	<?= $this->Form->end();?>
	<!-- Total price -->
	<div class="total-price">
		<table>
			<thead>
				<tr>
					<th colspan="2">TỔNG SỐ LƯỢNG</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tổng phụ</td>
					<td class="price right"><span class="total"><?= $cart['total_cost']?> </span><u>đ</u></td>
				</tr>
				<tr>
					<td>Giao hàng</td>
					<td class="right">Giao hàng miễn phí <br> Ước tính cho <b>Việt Nam</b> <br>
						<p class="address">Đổi địa chỉ</p>
						<form action="" method="POST" class="address-form">
							<select>
								<option value="city">Việt Nam</option>
								<option value="city">japan</option>
								<option value="city">Vantican</option>
								<option value="city">USA</option>
								<option value="city">Thái Lan</option>
							</select>
							<input type="text" placeholder="Thanh phố ...">
							<input type="text" placeholder="Mã bưu điện ...">
							<button>Cập nhập</button>
						</form>
					</td>
				</tr>
				<tr>
					<td>Tổng</td>
					<td class="price right"><span class="total"><?= $cart['total_cost']?> </span><u>đ</u></td>
				</tr>
			</tbody>
		</table>
		<div  class=" payment">
			<a href="/checkout"><button class=" btn btn-primary">TIẾN HÀNH THANH TOÁN
			</button></a>
			<div><i class="fas fa-backspace"></i>Phiếu ưu đãi</div>
		</div>
		
		<div class="form">
			<form action="" method="POST">
				<input type="text" placeholder="Mã ưu đãi">
				<button>ÁP DỤNG</button>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script> 
$(document).ready(function(){
	$(".address").click(function(){
	    $(".address-form").slideToggle("fast");
	});

  	$('.plus').click(function(event) {
	  	event.preventDefault();
	  	var quantity= $(this).parent().find('.quantity').val();
		  	quantity++;
		  	$(this).parent().find('.quantity').val(quantity);
		  	price_unit=$(this).parents().eq(1).find('.priceUnit').text();
		  	subTotal=quantity*price_unit;
		  	$(this).parents().eq(1).find('.subTotal').text(subTotal);
		  	var total= total_count();
		  	$('.total').text(total);

	});
	$('.sub').click(function(event) {
	  	event.preventDefault();
	  	var quantity= $(this).parent().find('.quantity').val();
	  	if(quantity>1){
		  	quantity--;
		  	$(this).parent().find('.quantity').val(quantity);
		  	price_unit=$(this).parents().eq(1).find('.priceUnit').text();
	  		subTotal=quantity*price_unit;
	  		$(this).parents().eq(1).find('.subTotal').text(subTotal);
	  		var total= total_count();
	  		$('.total').text(total)
	  	}
	  	else alert('Số lượng sản phẩm phải lớn hơn 1');

	});

	$('.quantity').keyup(function(event) {
		var quantity=$(this).val();
		var price_unit=$(this).parents().eq(1).find('.priceUnit').text();
			subTotal=quantity*price_unit;
	  		$(this).parents().eq(1).find('.subTotal').text(subTotal);
	  		var total= total_count();
	  		$('.total').text(total)
			if (quantity<1){
			$(this).val(1);
			var quantity=$(this).val();
			subTotal=quantity*price_unit;
			$(this).parents().eq(1).find('.subTotal').text(subTotal);
	  		var total= total_count();
	  		$('.total').text(total)
		 alert('Số lượng sản phẩm phải lớn hơn 1');
		}
	});

	function total_count(){
		var total=0
		$('.subTotal').each(function(index, el) {
			total+=parseInt($(this).text());
		});
		return total;
	}


	
});
</script>

<?php }?>
<!-- END: Cart -->