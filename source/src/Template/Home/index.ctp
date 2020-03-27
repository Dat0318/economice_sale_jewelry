
<div class="block-slider">
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide"><?= $this->HTML ->image('slider/slide-1.jpg'); ?></div>
			<div class="swiper-slide"><?= $this->HTML ->image('slider/slide-2.jpg'); ?></div>
			<div class="swiper-slide"><?= $this->HTML ->image('slider/slide-3.jpg'); ?></div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<!-- Conllection -->
<div class="block-collection">
	<div class="holder">
		<div class="wrapper-item">
			<div class="item">
				<div class="img">
					<?= $this->HTML->image('home/feature-1.jpg'); ?>
				</div>
				<div class="text">
					<div class="ttl">THỜI TRANG 2019</div>
					<div class="hover">
						<div class="sale">GIẢM 50%</div>
						<a href="#" class="button btn btn-danger">Xem ngay</a>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img">
					<?= $this->HTML->image('home/feature-2.jpg'); ?>
				</div>
				<div class="text">
					<div class="ttl">THỜI TRANG 2019</div>
					<div class="hover">
						<div class="sale">GIẢM 50%</div>
						<a href="#" class="button btn btn-danger">Xem ngay</a>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img">
					<?= $this->HTML->image('home/feature-4.jpg'); ?>
				</div>
				<div class="text">
					<div class="ttl">THỜI TRANG 2019</div>
					<div class="hover">
						<div class="sale">GIẢM 50%</div>
						<a href="#" class="button btn btn-danger">Xem ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END Collection -->
<!-- Category New-product-->
<div class="block-category">
	<div class="holder">
		<h2>SẢN PHẨM MỚI</h2>
		<div class="img">
			<?= $this->HTML->image('home/icon-flower.png'); ?>
		</div>
		<p>Giá cả thấp nhất thị trường và có nhiều ưu đãi đặc biệt dành cho khách hàng quen thuộc.</p>
	</div>
</div>
<!-- END Category -->

<!-- New Product -->
<div class="new-product">
	<div class="holder">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach($new_products as $item):?>
					<div class="swiper-slide">
						<div class=" item">
							<img src="<?= h($item->url)?>">
							<h3><?= h($item->name)?></h3>
							<p><?= ($item->price_commercial!=null)?$item->price_commercial :$item->price_sale?> đ</p>
							<?= $this->Form->create(null,array('url'=>array('controller'=>'Carts','action'=>'add')));?>
							<input type="hidden" name="product_id" value="<?= h($item->id)?>">
							<button type="submit" class="button btn-danger">Thêm vào giỏ</button>
							<?php $this->Form->end();?>
						</div>
					</div>
				<?php endforeach;?>

			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
</div>
<!-- END: New product -->

<!-- Banner -->
<div class="block-banner">
	<div class="holder">
		<div class="banner">
			<?= $this-> HTMl ->image('home/summer-600x240.jpg'); ?>
			<div class="banner-content">
				<div class="banner-border">
					<p>Xu hướng mới 2019</p>
					<h3>SẢN PHẨM MÙA HÈ</h3>
					<a href="" class="button btn btn-danger">Xem sản phẩm</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: Banner -->

<!-- Category Hot-product -->
<div class="block-category">
	<div class="holder">
		<h2>SẢN PHẨM BÁN CHẠY</h2>
		<div class="img">
			<?= $this->HTML->image('home/icon-flower.png'); ?>
		</div>
		<p>Giá cả thấp nhất thị trường và có nhiều ưu đãi đặc biệt dành cho khách hàng quen thuộc.</p>
	</div>
</div>
<!-- END Category -->
<div class="hot-product">
	<div class="holder">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach($best_seller as $item):?>
				<div class="swiper-slide">
					<div class="item">
						<img src="<?=$item->url?>">
						<h3><?= $item->name?></h3>
						<p><?= ($item->price_commercial!=null)?$item->price_commercial :$item->price_sale?> đ</p>
						<?= $this->Form->create(null,array('url'=>array('controller'=>'Carts','action'=>'add')));?>
							<input type="hidden" name="product_id" value="<?= h($item->id)?>">
							<button type="submit" class="button ">Thêm vào giỏ</button>
						<?= $this->Form->end();?>
					</div>
				</div>
				<?php endforeach;?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
</div>
<!-- END: Hor Product -->


<!-- Category Other-product -->
<div class="block-category">
	<div class="holder">
		<h2>SẢN PHẨM KHÁC</h2>
		<div class="img">
			<?= $this->HTML->image('home/icon-flower.png'); ?>
		</div>
		<p>Giá cả thấp nhất thị trường và có nhiều ưu đãi đặc biệt dành cho khách hàng quen thuộc.</p>
	</div>
</div>
<!-- END Category -->
<div class="other-product">
	<div class="holder">
		<div class="wrapper-item">
			<div class="item">
				<div class="item-container">
					<div class="img">
						<?= $this->HTML->image('home/cate-1.jpg'); ?>
					</div>
					<div class="text">
						<div class="ttl">TÚI XÁCH</div>
						<div class="hover">
							<div class="sale">7 loại</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="item-container">
					<div class="img">
						<?= $this->HTML->image('home/cate-2.jpg'); ?>
					</div>
					<div class="text">
						<div class="ttl">VÁY - ĐẦM</div>
						<div class="hover">
							<div class="sale">7 loại</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="item-container">
					<div class="img">
						<?= $this->HTML->image('home/cate-3.jpg'); ?>
					</div>
					<div class="text">
						<div class="ttl">MẮT KÍNH</div>
						<div class="hover">
							<div class="sale">3 loại</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="item-container">
					<div class="img">
						<?= $this->HTML->image('home/cate-4.jpg'); ?>
					</div>
					<div class="text">
						<div class="ttl">VÒNG ĐEO TAY</div>
						<div class="hover">
							<div class="sale">7 loại</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Customer feedback -->
<div class="customer-feedback holder">
	<div class="background">
		<?= $this->HTML->image('home/banner-2-aunzcaus.png'); ?>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="content">
						<?= $this-> HTML ->image('home/customer-2-100x100.png'); ?>
						<h3>Nga My</h3>
						<p>Mona Jewerly chuyên bán các mặt hàng trang sức phụ kiện chất lượng nhập khẩu từ Thái Lan, Hàn Quốc, Trung Quốc…. Hàng có sẵn. Mẫu mới về liên tục mỗi tuần. Giá cả thấp nhất thị trường và có nhiều ưu đãi đặc biệt dành cho khách hàng quen thuộc...</p>
					</div>
				</div>
				<div class="swiper-slide">
					<div class="content">
						<?= $this-> HTML ->image('home/customer-4-100x100.png'); ?>
						<h3>Dương Quá</h3>
						<p>Mona Jewerly chuyên bán các mặt hàng trang sức phụ kiện chất lượng nhập khẩu từ Thái Lan, Hàn Quốc, Trung Quốc…. Hàng có sẵn. Mẫu mới về liên tục mỗi tuần. Giá cả thấp nhất thị trường và có nhiều ưu đãi đặc biệt dành cho khách hàng quen thuộc...</p>
					</div>
				</div>
				<div class="swiper-slide">
					<div class="content">
						<?= $this-> HTML ->image('home/customer-3-100x100.png'); ?>
						<h3>Thúy Yên</h3>
						<p>Mona Jewerly chuyên bán các mặt hàng trang sức phụ kiện chất lượng nhập khẩu từ Thái Lan, Hàn Quốc, Trung Quốc…. Hàng có sẵn. Mẫu mới về liên tục mỗi tuần. Giá cả thấp nhất thị trường và có nhiều ưu đãi đặc biệt dành cho khách hàng quen thuộc...</p>
					</div>
				</div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
</div>
<!-- END: Customer feedback -->

<!-- Category Other-product -->
<div class="block-category">
	<div class="holder">
		<h2>TIN TỨC</h2>
		<div class="img">
			<?= $this->HTML->image('home/icon-flower.png'); ?>
		</div>
		<p>Giá cả thấp nhất thị trường và có nhiều ưu đãi đặc biệt dành cho khách hàng quen thuộc.</p>
	</div>
</div>
<!-- END Category -->

<!-- News	 -->
<div class="block-new">
	<div class="holder">
		<div class="main-content">
			<div class="item">
				<?= $this-> HTML ->image('new/nes3-300x200.jpg'); ?>
				<h3><a href="">Vòng tay hình rắn đẹp ngỡ ngàng</a></h3>
				<p>Bạn có nghĩ rằng, rắn cũng có thể mang đến vẻ đẹp quyến rũ cho ...</p>
				<div class="link"><a href="" class="btn btn-secondary">ĐỌC THÊM</a></div>
			</div>
			<div class="item">
				<?= $this-> HTML ->image('new/news22-300x160.jpg'); ?>
				<h3><a href="">Lý Nhã Kỳ xuất hiện gợi cảm với váy cúp ngực và trang sức kim cương</a></h3>
				<p>Người đẹp Lý Nhã Kỳ xuất hiện với phong cách quý phái, gợi cảm trong ...</p>
				<div class="link"><a href="" class="btn btn-secondary">ĐỌC THÊM</a></div>
			</div>
			<div class="item">
				<?= $this-> HTML ->image('new/news11-300x246.jpg'); ?>
				<h3><a href="">Ngọc trai – Phụ kiện đang được sao Việt mê mẩn những ngày đầu năm</a></h3>
				<p>Bộ sưu tập “Bí mật đại dương” của thương hiệu Long Beach Pearl vừa ra ...</p>
				<div class="link"><a href="" class="btn btn-secondary">ĐỌC THÊM</a></div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<!-- END: News -->
