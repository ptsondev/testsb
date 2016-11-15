<footer id="main-footer">
	<div class="main-wrapper inner container">    
		<h5 class="title">Công ty Luật NTV (Niềm Tin Việt)</h5>
		
		
			<div class="col-md-6 col-sm-12 col-xs-12 col-xxs-12">		
				<div class="row">				
						<div class="title">Thông tin liên hệ</div>
						<div class="address pad"><i class="fa fa-map-marker"></i> <?php echo variable_get('ntv_address', '158 Điện Biên Phủ Phường 6 Quận 3, TP.HCM'); ?></div>
						<div class="phone pad">
							<i class="fa fa-phone"></i> <?php echo variable_get('ntv_phone', '0908 111 222'); ?>
							 - <i class="fa fa-inbox"></i> <?php echo variable_get('ntv_mail', 'Email: lienhe@luatntv.vn'); ?>
						</div>		
						<div class="support pad">
							<i class="fa fa-support"></i> Hỗ trợ nhanh: 0906 721886 (Ms. Tâm) - 0902 841886 (Ms. Ngọc)							
						</div>
						<div class="support pad">
							<i class="fa fa-comment"></i> Góp ý dịch vụ: 0939 790886 (Mr. Thắng)
						</div>
				<div class="work-time">Làm việc sáng 7h30 - 11h30; Chiều 13h - 17h (Từ thứ 2 đến hết sáng thứ 7)</div>	
				</div>
				
				
			</div>
			
			<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12" id="sitemap">
				<div class="title">SƠ ĐỒ WEBSITE</div>
				<li><a href="<?php echo url('node/38');?>">Giới thiệu về Luật NTV</a></li>
				<li><a href="<?php echo url('dich-vu');?>">Các dịch vụ chính</a></li>
				<li><a href="<?php echo url(''); ?>?scroll=1">Lý do chọn Luật NTV</a></li>
				<li><a href="<?php echo url('hop-tac');?>">Hợp tác với Luật NTV</a></li>
				<li><a href="<?php echo url('lien-he');?>">Liên hệ với Luật NTV</a></li>
				<li><a href="<?php echo url('gop-y');?>">Góp ý cho Luật NTV</a></li> 
			</div>
			
			<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
				<div class="title">Đăng ký nhận văn bản luật mới</div>
				<div class="des">Nhận các văn bản luật từ Luật NTV qua email</div>
				<div class="form-item">
                                    <?php 
                                        $form = drupal_get_form('ntvcore_form_email');
                                        echo drupal_render($form);
                                    ?>
                                </div>
				<div class="copy-right">© Bản quyền thuộc về Luật NTV</div>
			</div>
		
	</div>
</footer>

<?php scroll_to_div(); ?>