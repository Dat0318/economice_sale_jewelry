<!-- Contact -->

<div class="contact">
	<div class="contact-top">
		<div class="img">
			<?= $this->HTML->image('contact/banner-2-aunzcaus.png')?>
		</div>
		<div class="ttl">
			<h1>LIÊN HỆ</h1>
			<h2>TRANG CHỦ / LIÊN HỆ</h2>
		</div>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4478791335055!2d106.65261921428703!3d10.776968262131852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed189fa855d%3A0xf63e15bfce46baef!2sC%C3%B4ng+ty+TNHH+-+MONA+MEDIA!5e0!3m2!1sen!2s!4v1563260207154!5m2!1sen!2s" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="contact-buttom holder">
		<div class="list-contact">
			<div class="item contact1">
			<i class="fas fa-map-marker"></i>
			<h3>Địa chỉ</h3>
			<p>319 C16 Lý Thường Kiệt, P15, Q11, TP.HCM</p>
		</div>
		<div class="item contact2">
			<i class="fas fa-phone"></i>
			<h3>Số điện thoại</h3>
			<p>076 922 0162</p>
		</div>
		<div class="item contact3">
			<i class="fas fa-envelope-open-text"></i>
			<h3>Email</h3>
			<p>demonhunterg@gmail.com</p>
		</div>
		</div>
		<div class="clear"></div>
		<?= $this->Form->create(null,[])?>
		<div class="complain-form">
			<h3>Mọi thắc mắc hay khiêu lại xin vui lòng điền theo mẫu: </h3>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="name" placeholder="Họ và tên" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="email" name="mail" placeholder="Email" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="phone" placeholder="Số điện thoại" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="address" placeholder="Địa chỉ" class="form-control" required>
					</div>
				</div>
				<dvi class="col-md-12">
					<div class="form-group">
						<textarea name="message" placeholder="Lời nhắn ..." class="form-control" required></textarea>
					</div>
				</dvi>
			</div>
			<button type="submit" class="btn btn-outline-danger">GỬI</button>
		</div>
		<?= $this->Form->end();?>
	</div>
</div>

 <!-- END Contact -->