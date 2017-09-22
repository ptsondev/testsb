<?php 
$node = node_load($nid);
$place = node_load($node->field_destination[LANGUAGE_NONE][0]['nid']);
?>

<div class="clearfix"></div>

<div class="info-group full-data" id="place-info">
    <h3 class="group-title"><?php echo t('Destination information'); ?></h3>
    <h4><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo t('General Information');?></h4>
    <?php echo $place->field_general_info[LANGUAGE_NONE][0]['value'];?>
    
    <h4><i class="fa fa-bus" aria-hidden="true"></i> <?php echo t('Transportation');?></h4>
    <?php echo $place->field_transport_info[LANGUAGE_NONE][0]['value'];?>
    
    <h4><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo t('Recommended Time');?></h4>
    <?php echo $place->field_advise_info[LANGUAGE_NONE][0]['value'];?>
    
    <h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> <?php echo t('To do task');?></h4>
    <?php echo $place->field_todo_info[LANGUAGE_NONE][0]['value'];?>    
</div>


 <div class="info-group">
    <h3 class="group-title"><?php echo t('Tour detail'); ?></h3>
    <?php 
    foreach($node->field_tour_detail[LANGUAGE_NONE] as $row){              
        $detail = field_collection_item_load($row['value']);                                
        $day = $detail->field_schedule_by_day[LANGUAGE_NONE][0]['value'];
        echo '<h5>'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].' Ngày thứ '.$day.': </h5>';                  
        echo '<h4 class="trip-name">'.$detail->field_des_name[LANGUAGE_NONE][0]['value'].'</h4>';                       
        $tmp = image_style_url('width_2_height', $detail->field_avatar[LANGUAGE_NONE][0]['uri']);
        echo '<img src="'.$tmp.'" />';
        echo '<div class="content">';
                            if(isset($detail->field_des_des) && !empty($detail->field_des_des[LANGUAGE_NONE])){
                                echo $detail->field_des_des[LANGUAGE_NONE][0]['value'];
                            }    
                            /*if(isset($detail->field_video_youtube) && !empty($detail->field_video_youtube[LANGUAGE_NONE])){
                                display_video($detail, 400, 300);
                            }*/
      
        echo '</div>';
        echo '<hr />';
    }
    ?>
 </div>

