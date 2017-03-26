<?php $node=node_load($nid);?>
 <div class="info-group">
    <h3 class="group-title"><?php echo t('Tour detail'); ?></h3>
    <?php 
    foreach($node->field_tour_detail[LANGUAGE_NONE] as $row){              
        $detail = field_collection_item_load($row['value']);                                
        $day = $detail->field_schedule_by_day[LANGUAGE_NONE][0]['value'];
        echo '<h5>'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].' Ngày thứ '.$day.'</h5>';                  
        echo '<h4 class="trip-name">'.$detail->field_des_name[LANGUAGE_NONE][0]['value'].'</h4>';                       
        $tmp = image_style_url('width_2_height', $detail->field_avatar[LANGUAGE_NONE][0]['uri']);
        echo '<img src="'.$tmp.'" />';
        echo '<div class="content">';
                            if(isset($detail->field_des_des) && !empty($detail->field_des_des[LANGUAGE_NONE])){
                                //echo  'vawevwae';
                                echo $detail->field_des_des[LANGUAGE_NONE][0]['value'];
                            }    
                            if(isset($detail->field_video_youtube) && !empty($detail->field_video_youtube[LANGUAGE_NONE])){
                                display_video($detail, 400, 300);
                            }
      
        echo '</div>';

    }
    ?>
 </div>