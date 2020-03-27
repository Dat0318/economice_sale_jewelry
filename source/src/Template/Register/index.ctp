

<div class="holder">
<form action="#" method="POST" class="form-register">
	
<!-- Information member -->
	<div class="register-top holder">
		<div class="ttl">
			<h3>ĐĂNG KÝ TÀI KHOẢN</h3>
		</div>
  		<div class="form-infor-top">
  			<div class="avata">
  				<?= $this->HTML->image('avatar.png'); ?>
  			</div>
  			<div class="member-infor">
  				<div class="form-row">
				    <div class="item form-group col-md-6" class="first_name">
				    	<label>First name:</label>
				      	<input type="text" class="form-control" placeholder="First name ..." name="first_name">
				    </div>
				    <div class="item form-group col-md-6" class="last_name">
				     	<label>Last name:</label>
				      	<input type="text" class="form-control" placeholder="Last name ..." name="last_name">
				    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6" class="address">
				     	<label>Address:</label>
				      	<input type="text" class="form-control" placeholder="Address ..." name="address">
				    </div>
				    <div class="item form-group col-md-2" class="gender">
					     <label >Gender</label>
					     <select class="form-control" name="gender">
					        <option selected>Nam</option>
					        <option>Nữ</option>
					        <option>Khác</option>
					    </select>
				    </div>
				    <div class="item form-group col-md-4" class="birthday">
					    <label>Birthday</label>
					    <input type="date" class="form-control" name="birthday">
				    </div>
				</div>
				<div class="form-row">
				    <div class="item form-group col-md-6" class="email">
				     	<label>Email:</label>
				      	<input type="email" class="form-control" placeholder="Email..." name="email">
				    </div>
				    <div class="item form-group col-md-6" class="phone">
				     	<label>Phone:</label>
				      	<input type="number" class="form-control" placeholder="Phone ..." name="phone">
				    </div>
				</div>
  			</div>
  			<div class="clear"></div>
  		</div>
	</div>

<!-- Information User -->
	<div class="register-bottom holder">
		<div class="form-user">
			<div class="form-row">
			    <div class="form-group col-md-12" class="user_name">
			      <label for="inputCity">User name</label>
			      <input type="text" class="form-control" placeholder="User name ..." name="user_name">
			    </div>
			 </div>
			 <div class="form-row">
				<div class="form-group col-md-12" class="password">
				      <label for="inputState">Password</label>
				      <input type="password" class="form-control" name="password">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12" class="re_password">
				      <label for="inputZip">Retypr password</label>
				      <input type="text" class="form-control" name="re_password">
				</div>
			</div>
			<div class="form-group">
			    <div class="form-check" class="remember">
				    <input class="form-check-input" type="checkbox" >
				    <label class="form-check-label" name="remember">remember me</label>
			    </div>
			</div>
			<button type="submit" class="btn btn-primary">Resgister for Mona</button>
		</div>
<!-- Connect US -->
		<div class="form-connect">
			<div class="form-row">
				<p>You can connect us about: </p>
				<ul class="clearfix">
					<li><a href="#" class="item"><i class="fab fa-youtube"></i>Youtube</a></li>
					<li><a href="#" class="item"><i class="fab fa-facebook"></i>facebook</a></li>
					<li><a href="mailto:mon@mona.media" class="item"><i class="fas fa-envelope-square"></i>Mail: mon@mona.media</a></li>
					<li><a href="tel:076 922 0162" class="item"><i class="fas fa-phone"></i>Phone:076 922 0162</a> </li>
				</ul>
			</div>
			<div class="form-row">
				<div class="connect form-group col-md-12" >
					<a href="#" class="item btn btn-primary"><i class="fab fa-facebook-f"></i>Sign up with Facebook</a>
				</div>
				<div class="connect form-group col-md-12" >
					<a href="#" class="item btn btn-primary"><i class="fas fa-envelope-open"></i>Sign up with Email</a>
				</div>
			</div>			
		</div>
		<div class="clear"></div>
	</div>
</form>
</div>
	