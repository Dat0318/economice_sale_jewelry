
<div class="main">
	<div class="holder">
		<div class=" clearfix product-main ">
			<div class="clearfix product-gallery ">
				<img src="<?= h($product->url)?>">
			</div>
			<div class="clearfix product-content ">
				<ul class=" clearfix product-breadcrumb ">
					<li>
						<a href="/">Trang chủ </a>
					</li>
					<li>/</li>
					<li class="active"> <a href="#">Dây chuyền</a></li>
				</ul>

				<h1 class="product-title"><?= h($product->name)?></h1>
				<div class="border-bottom-small"></div>
				<div class="price"><?= h($product->price_sale)?> ₫</div>
				<div class="product-summary">
					<p><?= html_entity_decode($product->description)?></p>
				</div>
				<div class="add-to-cart">
					<?= $this->Form->create('Cart',array('id'=>'add-form','url'=>array('controller'=>'Carts','action'=>'add')));?>
					<button class="sub">-</button>
					<input type="text" name="quantity" value="1" min="1" class="quantity">
					<input type="hidden" name="product_id" value="<?= h($product->id)?>">
					<button class="plus">+</button>
					<button class="btn-submit" type="submit">Thêm vào giỏ</button>
					<?php echo $this->Form->end();?>
				</div>
				<div class="partner">
					<div class="shipper">
						<strong>Tính phí ship tự động</strong>
						<div class="gallery-shipper">
							<div class="row-inner">
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-ghn.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-ghtk.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-ninja-van.jpg')?>
									</a>
								</div>
							</div>
							<div class="row-inner">
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-shipchung.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-viettle-post.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-vn-post.jpg')?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="bank">
						<strong>Thanh toán</strong>
						<div class="gallery-bank">
							<div class="row-inner">
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-acb.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-techcombank.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo/logo-vib.jpg')?>
									</a>
								</div>
							</div>
							<div class="row-inner">
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-vcb.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-paypal.jpg')?>
									</a>
								</div>
								<div class="col-inner">
									<a href="#" class="image-lightbox">
										<?= $this->Html->image('logo/logo-mastercard.jpg')?>
									</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!-- <strong class="subcribe">"Hãy trở thành Affilicate của chúng tôi để tìm thêm thu nhập thụ động, kiếm tiền online"</strong>
					<a href="#" class="btn btn-subcribe">Đăng ký Affilicate</a> -->
					<div class="product-meta">
						<span>Danh mục: </span> <a href="#">Dây chuyền</a>
					</div>
				</div>
			</div>
			<div class="product-footer" >
				<div class="product-tabbed">
					<div class="clearfix tab-items">
						<button class="btn-tab active" onclick="return openTab('Desciption',this)">Mô tả</button>
						
						<button class="btn-tab" onclick="return openTab('More',this)">Bổ sung</button>
					</div>

					<div id="Desciption" class="clearfix content-tab tab">
						<?= html_entity_decode($product->description)?>
					</div>

					<div id="More" class="clearfix content-tab tab " style="display:none">
						<table>
							<tr>
								<td class="attitude">Màu sắc</td>
								<td>Đen, Xanh dương, Nâu, Vàng, Cam, Hồng, Bạc</td>
							</tr>
							<tr>
								<td class="attitude">Size</td>
								<td>L,M,S</td>
							</tr>
						</table>
					</div>

					
				</div>
				<div class="product-same">
					<h4 class="m-4 pl-3 font-weight-bold">Sản phẩm tương tự</h4>
					<div class="list-product">
						<?php foreach($relate_products as $item):?>
						<a href="#" class="image-product-same">
							<div class="product-same-item">
								<img src="<?=$item->url?>">
								<a href="" class="title"><?=$item->name?></a>
								<strong class="price font-weight-bold price"><?= ($item->price_commercial!=null)?$item->price_commercial:$item->price_sale ?> ₫</strong>
								<?= $this->Form->create(null,array('url'=>array('controller'=>'Carts','action'=>'add')));?>
								<input type="hidden" name="product_id" value="<?=h($item->id)?>">
								<button type="submit" class=" btn-add-to-cart">Thêm vào giỏ</button>
								<?= $this->Form->end();?>
							</div>
						</a>
						<?php endforeach;?>

						
						
					</div>	
				</div>
			</div>
		</div>
	</div>
	<script>
		
		function openTab(tabName,current) {
			var i;
			var x = document.getElementsByClassName("tab");
			var y= document.getElementsByClassName("btn-tab");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none"; 
				y[i].classList.remove('active');
			}
			document.getElementById(tabName).style.display = "block"; 
			current.classList.add('active');

		}
		$(document).ready(function(){
			$('.plus').click(function(event) { // tang sl + san pham
				event.preventDefault();
				var quantity= $(this).parent().find('.quantity').val();
				quantity++;
				$(this).parent().find('.quantity').val(quantity);

			});
			$('.sub').click(function(event) { // giam sl - san pham
				event.preventDefault();
				var quantity= $(this).parent().find('.quantity').val();
				if(quantity>1){
					quantity--;
					$(this).parent().find('.quantity').val(quantity);
				}
				else alert('Số lượng sản phẩm phải lớn hơn 1');
			});
		});


	</script>