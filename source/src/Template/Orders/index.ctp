<div class="page-checkout">
	<div class="holder">
		<div class="checkout-top">
			<div class="login">
				<?php if($user==null) echo'<p>Bạn đã có tài khoản? <a href="#" class="click-login"> Ấn vào để đăng nhập</a></p>' ?>
				
				<div class="login-hidden">
					<p class="note-login">Nếu trước đây bạn đã mua hàng của chúng tôi, vui lòng điền đầy đủ thông tin đăng nhập dưới đây. Nếu bạn là khách hàng mới, vui lòng tiếp tục các bước tiếp theo.</p>
					<div class="error-message mt-3 mb-3"></div>
					<?= $this->Form->create(null,array('class'=>['form-login'],'url'=>['controller'=>'Users','action'=>'login']))?>
						<div class="row">
							<div class="col-6">
								<label class="">Tên đăng nhập hoặc email *</label>
								<input type="text" name="username">
							</div>
							<div class="col-6">
								<label class="">Mật khẩu *</label>
								<input type="password" name="pass">
							</div>
						</div>
						<button class="btn-login" type="submit">Đăng nhập</button>
						<input type="checkbox" name="remember"> <span class="font-weight-bold">Ghi nhớ mật khẩu</span>
					<?= $this->Form->end();?>
				</div>
			</div>
		</div>
		
		<?= $this->Form->create(null, [])?>
			<div class="clearfix checkout-content row">
				<div class="col-7">
					<div class="infor-checkout">
						<h3 class="title">Thông tin thanh toán</h3>
						<div class="row">
							<div class="col-6">
								<div class="form-input">
									<label>Tên *</label>
									<input type="text" name="first_name" required value="<?=($user_order!=null)?$user_order['firstname']:''?>">
								</div>
							</div>
							<div class="col-6">
								<div class="form-input">
									<label>Họ *</label>
									<input type="text" name="last_name" required value="<?=($user_order!=null)?$user_order['lastname']:''?>">
								</div>
							</div>
						</div>
						<div class="form-input">
							<label>Địa chỉ *</label>
							<input type="text" name="address" required value="<?=($user_order!=null)?$user_order['address']:''?>">
						</div>
						<div class="form-input">
							<label>Số điện thoại *</label>
							<input type="text" name="phone" required value="<?=($user_order!=null)?$user_order['phone']:''?>">
						</div>
						<div class="form-input">
							<label>Địa chỉ email *</label>
							<input type="text" name="email" required value="<?=($user_order!=null)?$user_order['email']:''?>">
						</div>
						<!-- <input type="checkbox" name="add_new_account" class="add-new-account" value="1"> Tạo tài khoản mới?
						<div class="create-account">
							<p class="font-weight-bold">Tạo mật khẩu của tài khoản *</p>
							<input type="password" name="new_pass" class="new_password" placeholder="Mật khẩu">
						</div>
						<div class="mb-2"></div> -->
						<!-- <input type="checkbox" name="other_address" class="other-address" value="1"> Giao hàng tới địa chỉ khác?
						<div class="form-address">
							<div class="row">
								<div class="col-6">
									<div class="form-input">
										<label>Tên *</label>
										<input type="text" name="other_first_name">
									</div>
								</div>
								<div class="col-6">
									<div class="form-input">
										<label>Họ *</label>
										<input type="text" name="other_last_name">
									</div>
								</div>
							</div>
							<div class="form-input">
								<label>Địa chỉ *</label>
								<input type="text" name="other_address">
							</div>
							<div class="form-input">
								<label>Số điện thoại *</label>
								<input type="text" name="other_phone">
							</div>

						</div> -->
						<div class="form-input">
							<label>Ghi chú đơn hàng (tùy chọn)</label>
							<textarea  type="text" name="note" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm chi tiết hơn."></textarea>
						</div>	
					</div>
				</div>
				<div class="col-5">
					<div class="infor-order">
						<h3 class="title">Đơn đặt hàng của bạn</h3>
						<table class="table-top">
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<th>Tổng</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($cart['products'] as $item):?>
								<tr>
									<td><?=$item['product_title']?> <span>× <?=$item['quantity']?> </span></td>
									<td class="price"><?=$item['sub_total']?> <u>đ</u></td>
								</tr>
							<?php endforeach;?>
							</tbody>
						</table>
						<table class="table-bottom">
							<tr>
								<td class="font-weight-bold">Tổng phụ</td>
								<td class="price"><?= $cart['total_cost']?> <u>đ</u></td>
							</tr>
							<tr>
								<td>Giao hàng</td>
								<td><select>
									<?php foreach (TYPE_SHIP as $key => $value):?> 
										<option value="<?=$key?>"><?=$value?></option>
									<?php endforeach;?>
								</select></td>
							</tr>
							<tr>
								<td class="font-weight-bold">Tổng</td>
								<td class="price"><?= $cart['total_cost']?> <u>đ</u></td>
							</tr>
						</table>
						<button class="btn-checkout" type="submit">Đặt hàng</button>
					</div>
				</div>
				
			</div>
		
		<?= $this->Form->end();?>
	</div>

	<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?= $this->Flash->render()?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
