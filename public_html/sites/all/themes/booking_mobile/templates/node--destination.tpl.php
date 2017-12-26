<?php //echo snh_social_share(); ?>
<article class="<?php print $classes; ?> destination-main-body" data-nid="<?php print $node->nid; ?>" >      
    
     <?php
        //display_photos_as_gallery($node);    
        echo '<h3><span class="cicon info"></span>Thông tin</h3>';
        $gen_info = !empty($node->field_general_info[LANGUAGE_NONE])?$node->field_general_info[LANGUAGE_NONE][0]['value']:'';
        echo '<div id="des-gen-info">'.$gen_info.'</div>';
        
        echo '<div id="list-tour-by-des">';
        echo '<h3><span class="cicon tours"></span>Các lịch trình dành cho bạn</h3>';
        $nids = db_query('SELECT entity_id FROM field_data_field_destination WHERE field_destination_nid=:nid AND bundle=:tour'
                , array(':nid'=>$node->nid, ':tour'=>'tour'))->fetchCol();
        $tours = node_load_multiple($nids);
        echo '<div class="clearfix"></div>';
        echo '<div class="row" style="margin-top:16px;">';
        foreach($tours as $tour){
            //var_dump($tour->field_background);
            echo '<div class="col-sm-3 col-xs-6">';
                echo '<a href="'.url('node/'.$tour->nid).'"><div class="img-wrapper"><img src="'.image_style_url('square', $tour->field_background[LANGUAGE_NONE][0]['uri']).'" /></div></a>';
                echo '<a href="'.url('node/'.$tour->nid).'">'.$tour->title.'</a>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        
        echo '<div id="des-video">';
            display_video($node);
        echo '</div>';
      ?>
   

</article> <!-- /article #node -->