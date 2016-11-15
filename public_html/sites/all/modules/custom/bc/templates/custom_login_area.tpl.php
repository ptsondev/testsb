<div id="custom-login-area">
	<h3>Đăng nhập bằng tài khoản tại Smart Booking</h3>
	<?php 
		$form = drupal_get_form('user_login_block');
		echo drupal_render($form);
	?>
	<hr />
	<h3>Hoặc đăng nhập với các mạng xã hội</h3>
	<?php print fboauth_action_display('connect'); ?>
	
</div>