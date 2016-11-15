<?php 
	$uid = arg(1);
	$account = user_load($uid);
	
?>


			<div id="user-profile">
				<div id="profile-top" style="background:url('<?php echo file_create_url($account->field_cover[LANGUAGE_NONE][0]['uri']); ?>');">
					<div id="avatar"><img src="<?php echo image_style_url('large', $account->field_avatar[LANGUAGE_NONE][0]['uri']);?>" /></div>
					<h2 id="fullname">Thanh Sơn</h2>
				</div>
			</div>
			
			<div id="sidebar" class="col-sm-4 col-xs-12">
				Sidebar => Chưa biết để gì vô
			</div>
			
			<div id="main-content" class="col-sm-8 col-xs-12">
				<div id="private-info">
					<div id="slogan"><i class="fa fa-quote-left" aria-hidden="true"></i> <?php echo $account->field_slogan[LANGUAGE_NONE][0]['value']; ?> <i class="fa fa-quote-right" aria-hidden="true"></i></div>
					<div class="user-field"><label>Số điện thoại</label> <?php echo $account->field_phone[LANGUAGE_NONE][0]['value']; ?></div>
					<div class="user-field"><label>Ngày sinh</label> <?php echo $account->field_dob[LANGUAGE_NONE][0]['value']; ?></div>
					<!--<div class="user-field"><label>Giới tính</label> <?php echo $account->field_sex[LANGUAGE_NONE][0]['value']; ?></div>-->
					<div class="user-field"><label>Quốc gia</label> <?php echo $account->field_country[LANGUAGE_NONE][0]['value']; ?></div>
					<div class="user-field"><label>Địa chỉ</label> <?php echo $account->field_address[LANGUAGE_NONE][0]['value']; ?></div>
				</div>
			</div>