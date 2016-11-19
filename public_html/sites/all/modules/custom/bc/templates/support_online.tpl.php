<?php
//if(is_order_page()){
//    return;
//} 
?>

<div id="support-online" class="block">
    <h3>Hỗ trợ trực tuyến</h3>
    <div class="block-content">
        <div class="item person"> <b><?php echo variable_get('site_support_name', ''); ?></b> - <?php echo variable_get('site_support_position', 'Tư vấn viên'); ?></div>        
        <div class="item support-skype">
			<span class="fa fa-skype"></span><a href="skype:<?php echo variable_get('site_support_skype', ''); ?>?chat"><?php echo variable_get('site_support_skype', ''); ?></a>
			- <?php echo variable_get('site_support_phone', ''); ?>
		</div>
		<?php 
			$out = variable_get('site_support_phone_after', '');
			if($out!=''){
				echo '<div class="item after-office">Ngoài giờ: '.$out.'</div>';
			}
		
		?>
		
        
		<?php 
		 if(!empty(variable_get('site_support_name2', ''))){
			 echo '<br />';
		
		?>
        <div class="item person"> <b><?php echo variable_get('site_support_name2', ''); ?></b> - <?php echo variable_get('site_support_position2', 'Tư vấn viên'); ?></div>                
		<div class="item support-skype"><span class="fa fa-skype"></span><a href="skype:<?php echo variable_get('site_support_skype2', ''); ?>?chat"><?php echo variable_get('site_support_skype2', ''); ?></a> - <?php echo variable_get('site_support_phone2', ''); ?></div>
		<?php 
			$out = variable_get('site_support_phone_after2', '');
			if($out!=''){
				echo '<div class="item after-office">Ngoài giờ: '.$out.'</div>';
			}
		
		?>
		 <?php } ?>
		 
		 <?php 
		 if(!empty(variable_get('site_support_name3', ''))){
			 echo '<br />';
		
		?>
        <div class="item person"> <b><?php echo variable_get('site_support_name3', ''); ?></b> - <?php echo variable_get('site_support_position3', 'Tư vấn viên'); ?></div>                
		<div class="item support-skype"><span class="fa fa-skype"></span><a href="skype:<?php echo variable_get('site_support_skype3', ''); ?>?chat"><?php echo variable_get('site_support_skype3', ''); ?></a> - <?php echo variable_get('site_support_phone3', ''); ?></div>
		<?php 
			$out = variable_get('site_support_phone_after3', '');
			if($out!=''){
				echo '<div class="item after-office">Ngoài giờ: '.$out.'</div>';
			}
		
		?>
		 <?php } ?>
		 
		 <?php 
		 if(!empty(variable_get('site_support_name4', ''))){
			 echo '<br />';
		
		?>
        <div class="item person"> <b><?php echo variable_get('site_support_name4', ''); ?></b> - <?php echo variable_get('site_support_position4', 'Tư vấn viên'); ?></div>                		
        <div class="item support-skype"><span class="fa fa-skype"></span><a href="skype:<?php echo variable_get('site_support_skype4', ''); ?>?chat"><?php echo variable_get('site_support_skype4', ''); ?></a> - <?php echo variable_get('site_support_phone4', ''); ?></div>
		<?php 
			$out = variable_get('site_support_phone_after4', '');
			if($out!=''){
				echo '<div class="item after-office">Ngoài giờ: '.$out.'</div>';
			}
		
		?>
		 <?php } ?>
    </div>
</div>