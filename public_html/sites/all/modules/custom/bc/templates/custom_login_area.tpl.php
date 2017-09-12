<div id="custom-login-area">
	<h4>Đăng nhập bằng tài khoản tại Smart Booking</h4>
	<?php 
		$form = drupal_get_form('user_login_block');
		echo drupal_render($form);
	?>
        <div id="loginor"><h3>Hoặc</h3></div>
	<h4>Đăng nhập với các mạng xã hội</h4>
	<?php //print fboauth_action_display('connect'); ?>
	
</div>