<?php //echo snh_social_share(); ?>
<article class="<?php print $classes; ?> destination-main-body" data-nid="<?php print $node->nid; ?>" >  
    <div class="col-sm-12">
     <?php
        display_photos_as_gallery($node);        
        echo '<div id="des-gen-info">'.$node->field_general_info[LANGUAGE_NONE][0]['value'].'</div>';
        echo '<div id="des-video">';
            display_video($node);
        echo '</div>';
      ?>
    </div>

</article> <!-- /article #node -->