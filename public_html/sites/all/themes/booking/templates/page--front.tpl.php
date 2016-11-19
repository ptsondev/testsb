<?php include_once(PATH_TO_INCLUDES . 'header.php');  ?>

<div id="home-slide">
    <ul class="rslides">
        <li><img src="<?php echo PATH_TO_IMAGES; ?>s1.jpg" /><div class="slide-content"><h4>Bình Thuận</h4><div class="des">Nắng vàng biển xanh.</div></div></li>
        <li><img src="<?php echo PATH_TO_IMAGES; ?>s2.jpg" /><div class="slide-content"><h4>Đà Lạt</h4><div class="des">Vùng đất nghỉ dưỡng.</div></div></li>
        <li><img src="<?php echo PATH_TO_IMAGES; ?>s3.jpg" /><div class="slide-content"><h4>Nha Trang</h4><div class="des">Chém gió... chém cho có.</div></div></li>
    </ul>
</div>

<div id="main-region">
	<div class="container">
		<?php
            if($messages){
                 echo '<div id="site-message">'.$messages.'</div>';
            }
            echo theme('top_destinations');
        ?>
	</div>			
</div>

<div id="main-footer">
</div>
