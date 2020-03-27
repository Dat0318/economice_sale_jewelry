<div class="block-login">
  <div class="wrap">
    <div class="logo"><img src="https://arttodaymagazine.objects.frb.io/assets/uploads/2018/09/24095120/Karo-Voyage-logo.png" height="80%" width="30%" ></div>
    <div class="form">
      <?= $this->Flash->render() ?>
      <?= $this->Form->create(); ?>
        <div class="form-group">
          <label>Email/SĐT <span class="text-danger">*</span></label>
          <?= $this->Form->text('username', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
          <label>Mật khẩu <span class="text-danger">*</span></label>
          <?= $this->Form->password('pass', ['class' => 'form-control']); ?>
        </div>
        <div class="text-center">
          <?= $this->Form->submit('Đăng nhập', ['class' => 'btn btn-danger m-auto']); ?>
        </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
</div>
 

 