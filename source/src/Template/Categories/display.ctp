<div class="category-main">
	<div class="page-title">
		<div class="holder">
			<ul class="clearfix breadcrumbs">
				<li><a href="#">Trang chủ</a></li>
				<li>/</li>
				<li class="active">Nhẫn</li>
			</ul>
			<ul class="clearfix category-sort">
				<li>Hiển thị một kết quả duy nhất</li>
				<li>
					<form>
						<select class="sort-product">
							<?php foreach(SORT_PRODUCT_CATE as $key=>$value):?>
								<option value="<?=h($key)?>"><?=h($value)?></option>
							<?php endforeach;?>
						</select>
					</form>
				</li>
			</ul>
		</div>
	</div>
	<div class="page-main">
		<div class="holder">
			<div class="banner">
				<div class="clearfix banner-category">
					<h4>Danh mục sản phẩm</h4>
					<ul class="list-categories">
						

					<?= $this->Menus->get()?>
						<!-- menu -->
					</ul>

				</div>
				<div class="clearfix banner-search">
					<h4>Lọc theo giá</h4>
					<?= $this->Form->create(null,['class'=>'range-field js-formSearch'])?>
						<div class="range">

						    <input id="ex2" type="text" class="span2" value="" data-slider-min="100000" data-slider-max="999999" data-slider-step="1000" data-slider-value="[100000,999999]"/>
						    <input type="text" name="from" id="from" class="mt-4" style="display: none;">
						    <input type="text" name="to" id="to" class="mt-5" style="display: none;">
						    <!--  -->
						</div>
						<div class="price-lable">
							<button type="submit" class="btn-search">Lọc</button>
							<div class="price-range">Giá 
								<span class="from ml-1" id="from-text">398,000</span><strong> <u>đ</u></strong>
								 — 
								<span class="to" id="to-text">498,000</span><strong> <u>đ</u></strong>
							</div>
						</div>	
					</form>
					<?= $this->Form->end();?>
				</div>
				<div class="cleafix banner-products">
					<h4>Sản phẩm</h4>
					<div class="list-products">
						<?php foreach($product_news as $item):?>
						<div class="product-item">
							<a href="#" class="image-product"><img src="<?= h($item->url)?>" alt="image"></a>
							<div class="product-infor">
								<a href="#" class="product-name"><?= h($item->name)?></a>
								<strong class="product-price"><?= ($item->price_commercial!=null)?$item->price_commercial:$item->price_sale ?>  <u>đ</u></strong>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
				<div class="clearfix banner-news">
					<h4>Bài viết mới nhất</h4>
					<div class="list-news">
						<div class="new-item">
							<a href="#"><img src="http://mauweb.monamedia.net/karo/wp-content/uploads/2019/05/nes3.jpg" alt="" class="new-image"></a>
							<a href="#" class="new-title">Vòng tay hình rắn đẹp ngỡ ngàng</a>	
						</div>
						<div class="new-item">
							<a href="#"><img src="http://mauweb.monamedia.net/karo/wp-content/uploads/2019/05/nes3.jpg" alt="" class="new-image"></a>
							<a href="#" class="new-title">Vòng tay hình rắn đẹp ngỡ ngàng</a>	
						</div>
						<div class="new-item">
							<a href="#"><img src="http://mauweb.monamedia.net/karo/wp-content/uploads/2019/05/nes3.jpg" alt="" class="new-image"></a>
							<a href="#" class="new-title">Vòng tay hình rắn đẹp ngỡ ngàng</a>	
						</div>
					</div>
				</div>
			</div>

			<div class="products">
				<?php if(count($products)==0):?>
				<div>Không có sản phẩm nào được tìm thấy.</div>
				<?php endif;?>
				<?php 	$numOfCols=4;
						$rowCount=0;
				?>

				<div class="row">
					<?php foreach($products as $product_item):?>
					<div class="col-3 ">
						<div class="product-item">
							<div class="image">
								<img src="<?=$product_item->url?>" alt="image">
							</div>
							<div class="product-infor">
								<a href="/products/<?= $product_item->slug?>" class="product-name"><?= $product_item->name?></a>
								<strong class="product-price"><?= ($product_item->price_commercial!=null)?$product_item->price_commercial:$product_item->price_sale ?> <u>đ</u></strong>
								<?= $this->Form->create(null,array('url'=>array('controller'=>'Carts','action'=>'add')));?>
								<input type="hidden" name="product_id" value="<?=h($product_item->id)?>">
								<button type="submit" class=" btn-add-to-cart">Thêm vào giỏ</button>
								<?= $this->Form->end();?>
							</div>
						</div>
					</div>
					<?php $rowCount++;
							if($rowCount% $numOfCols==0) echo '</div><div class="row">';?>
					<?php endforeach;?>
				</div>	
			</div>	
		</div>
	</div>		
</div>

<!-- <script type="text/javascript">
	var main = {};
	main.convertSerialize = function(datasArrays) {
	    var data = {};
	    datasArrays.map(function(x) {
	        data[x.name] = x.value;
	    });
	    return data;
	}

	main.getSerializeForm = function(form) {
	    return main.convertSerialize($(form).serializeArray());
	}
	$(document).ready(function(){
		$('.js-formSearch').submit(function(event) {
			var data = main.getSerializeForm(this);
			console.log(data);
			$.ajax({
				url:$('.js-formSearch').attr('action') ,
				type: 'GET',
				dataType: 'html',
				data: {data: data},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			return false;
		});

		// $('.btn-search').click(function(event) {
		// 	event.preventDefault();
		// 	main.getSerializeForm()
		// 	var data=$('.range-field').serialize();
		// 	var sort=$('.sort-product').val();
		// 	console.log(data);	
		// 	$.ajax({
		// 		url:$('.range-field').attr('action') ,
		// 		type: 'post',
		// 		dataType: 'html',
		// 		data: {data: data},
		// 	})
		// 	.done(function() {
		// 		console.log("success");
		// 	})
		// 	.fail(function() {
		// 		console.log("error");
		// 	})
		// 	.always(function() {
		// 		console.log("complete");
		// 	});
			
		// });
		
	});
</script> -->
