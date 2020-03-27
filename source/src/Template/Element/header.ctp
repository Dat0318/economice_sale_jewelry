
<!-- Header top -->
<header class="header1">
	<div class="holder">
		<ul class="clearfix andress">
			<li><i class="fas fa-home"></i> 319 - C16 Lý Thường Kiệt, P.15, Q.11, Tp.HCM</li>
			<li><i class="fas fa-phone"></i> <a href="tel:0769220167">0769 220 167</a></li>
		</ul>
		<ul class=" clearfix search">
			<li class="item-search">
				<a href="#"><i class="fas fa-search"></i></a>
				<form action="#" method="GET">
					<input type="text" placeholder="Tìm kiếm" name="keyword">
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
			</li>
			<?php if($user!=null) echo '<li><a href="#" class="username">'.$user['username'].'</a><li><a href="/logout"> <i class="fas fa-sign-out-alt"></i></a> </li>'; else echo '<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-user"></i></a></li>'?>
			
		</ul>
	</div>
</header>

<header class="header-main">
	<div class="holder">
		<div class="logo">
			<a href="/">
				<img src="http://mauweb.monamedia.net/karo/wp-content/uploads/2019/05/logo-mona.png" class="clearfix">
			</a>
		</div>

		<div class="main-menu">
			<ul class="clearfix">
				<li class="active"><a href="/">Trang chủ</a></li>
				<li><a href="/pages/about">Giới thiệu </i></a>
					
				</li>
				<li><a href="#">Cửa hàng <i class="fas fa-chevron-down"></i></a>
						
						<?= $this->Menus->get();?>
				</li>
				<li><a href="/news/">Tin tức </i></a>
					
				</li>
				<li><a href="/contact/">Liên hệ </i></a>
					
				</li>
			</ul>
		</div>

		<div class="cart">
			<a href="/view-cart/">
				<span>GIỎ HÀNG/ <?= isset($cart['total_cost']) ? $cart['total_cost'] : 0; ?> </span><u>đ</u>
				<span class="quantity"><?= isset($cart['count']) ? $cart['count'] : 0; ?></span>
			</a>
			<div class="cart-list">
				<?php if($cart['count']==0) echo 
				'<p>Chưa có sản phẩm nào trong giỏ hàng</p>'; else{
					?>
					<div class="has-product">
						<table >
							<?php foreach ($cart['products'] as $item):?>
								<tr>
									<td width="30%"><img src="<?= $item['path_image'] ?>"></td>
									<td width="50%">
										<a href="#" class="title"><?= $item['product_title']?></a>
										<p><span class="quantity"><?= $item['quantity']?> x</span><span class="font-weight-bold"> <?= $item['price']?> ₫</span></p>
									</td>
									<td ><a href="/delete-product/<?=$item['product_id']?>" class="delete-product">x</a></td>
								</tr>
							<?php endforeach;?>
						</table>
					</div>
					
					<p class="total">Tổng phụ: <strong><?= ($cart==null)? 0:$cart['total_cost'];?> <u>đ</u></strong></p>
					<a href="/view-cart" class="btn-view-cart">Xem giỏ hàng</a>
					<a href="#" class="btn-checkout">Thanh toán</a>
				<?php }?>
			</div>
		</div>

	</div>
</header>

<!-- END:header top -->

<!-- modal login -->
<div class="modal  mt-5 login " id="myModal">
	<div class="modal-content">
		<div class="panel">
			<div class="h-50 text-center logo">
				<?= $this->Html->image('logo-mona.png',['alt' => 'Logo Mona']);?>
			</div>
				<div class="error-message mt-3 mb-3"></div>
				<?= $this->Form->create( null,array('class'=>['form-login'],'url'=>array('controller'=>'Users', 'action'=>'login'))) ?>
				<div class="form-group">
					<label>Email/SĐT <span class="text-danger">*</span></label>
					<input type="text" name="username" class="form-control" autofocus>
				</div>
				<div class="form-group">
					<label>Mật khẩu <span class="text-danger">*</span></label>
					<input type="password" name="pass" class="form-control">
				</div>
				<div class="form-group">
					<input type="checkbox" name="remember"> <span class="small">Ghi nhớ mật khẩu?</span>
				</div>
				<input type="submit" name="login" class=" m-auto btn-login" value="Đăng nhập">
				
				<a href="/register" class="ml-3 register">Đăng ký tài khoản mới</a>
				
				<?= $this->Form->end() ?>
		</div>
	</div>
</div>
<!-- END: modal login -->

