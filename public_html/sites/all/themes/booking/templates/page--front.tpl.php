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
</div>

<div id="main-footer">
</div>
