<?php include_once(PATH_TO_INCLUDES . 'header.php');  ?>

<div id="main-region">
	<div class="container">
		<?php
            if($messages){
                 echo '<div id="site-message">'.$messages.'</div>';
            }
            echo theme('top_destinations');            
        ?>
	</div>			
        <?php 
            echo theme('home_prefooter');
        ?>
</div>

<?php include_once(PATH_TO_INCLUDES . 'footer.php');  ?>
