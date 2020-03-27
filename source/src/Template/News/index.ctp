<!-- News -->
<?= $this->Html->css('new.css') ?>
<div class="new">
	<div class="holder">
	<div class="nar-bar">
		<div class="search">
			<form action="" method="POST">
				<input type="text" placeholder="Tim kiếm ...">
				<button class="btn-search btn btn-primary"><i class="fas fa-search"></i></button>
			</form>
		</div>
		<div class="clear"></div>
		<h3>BÀI VIẾT MỚI</h3>
		<div class="cato-new">
			<ul class="clearfix">
				<li>
					<?= $this-> HTML ->image('new/nes3-150x150.jpg'); ?>
					<p>Vòng tay hình rắn đẹp ngỡ ngàng</p>
				</li>
				<li>
					<?= $this-> HTML ->image('new/news22-150x150.jpg'); ?>
					<p>Lý Nhã Kỳ xuất hiện gợi cảm với váy cúp ngực và ...</p>		
				</li>
				<li>
					<?= $this-> HTML ->image('new/news11-150x150.jpg'); ?>
					<p>Ngọc trai – Phụ kiện đang được sao Việt mê mẩn những ngày đầu năm 20 ...</p>
				</li>
			</ul>
		</div>
		
	</div>
	<div class="content">
		<div class="header">
			<h3>TIN TỨC</h3>
		</div>
		<div class="main-content">
			<div class="item">
				<div class="date">08 <br>Th5</div>
				<?= $this-> HTML ->image('new/nes3-300x200.jpg'); ?>
				<div class="link"><a href="http://localhost/ecommerce.websize/source/new1">Vòng tay hình rắn đẹp ngỡ ngàng</a></div>
				<p>Bạn có nghĩ rằng, rắn cũng có thể mang đến vẻ đẹp quyến rũ cho ...</p>
			</div>
			<div class="item">
				<div class="date">08 <br>Th5</div>
				<?= $this-> HTML ->image('new/news22-300x160.jpg'); ?>
				<div class="link"><a href="">Lý Nhã Kỳ xuất hiện gợi cảm với váy cúp ngực và trang sức kim ...</a></div>
				<p>Người đẹp Lý Nhã Kỳ xuất hiện với phong cách quý phái, gợi cảm trong ...</p>
			</div>
			<div class="item">
				<div class="date">08 <br>Th5</div>
				<?= $this-> HTML ->image('new/news11-300x246.jpg'); ?>
				<div class="link"><a href="">Ngọc trai – Phụ kiện đang được sao Việt mê mẩn những ngày ...</a></div>
				<p>Bộ sưu tập “Bí mật đại dương” của thương hiệu Long Beach Pearl vừa ra ...</p>
			</div>
		</div>
	</div>
</div>
</div>

<!-- END: News -->