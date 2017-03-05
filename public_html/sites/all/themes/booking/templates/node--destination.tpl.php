<?php //echo snh_social_share(); ?>
<article class="<?php print $classes; ?> destination-main-body" data-nid="<?php print $node->nid; ?>" >  
    <div class="col-sm-12">
     <?php
        display_photos_as_gallery($node);    
        $gen_info = !empty($node->field_general_info[LANGUAGE_NONE])?$node->field_general_info[LANGUAGE_NONE][0]['value']:'';
        echo '<div id="des-gen-info">'.$gen_info.'</div>';
        
        echo '<div id="list-tour-by-des">';
        echo '<h3>'.t('Tours at').' '.$node->title.'</h3>';
        $nids = db_query('SELECT entity_id FROM field_data_field_destination WHERE field_destination_nid=:nid AND bundle=:tour'
                , array(':nid'=>$node->nid, ':tour'=>'tour'))->fetchCol();
        $tours = node_load_multiple($nids);
        foreach($tours as $tour){
            echo '<a href="'.url('node/'.$tour->nid).'">'.$tour->title.'</a>';
        }
        echo '</div>';
        
        echo '<div id="des-video">';
            display_video($node);
        echo '</div>';
      ?>
    </div>

</article> <!-- /article #node -->