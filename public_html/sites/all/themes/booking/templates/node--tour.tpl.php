<article class="<?php print $classes; ?> tour-main-body" data-nid="<?php print $node->nid; ?>" >
    <h3><span class="cicon info"></span>Thông tin hành trình</h3>
    <?php  echo theme('place_detail', array('place_id'=>$node->field_destination[LANGUAGE_NONE][0]['nid'])); ?>
    
    
    
     
                    
      <h3 class="group-title"><span class="cicon detail"></span><?php echo t('Tour detail'); ?></h3>
          
      <div id="tour-detail" data-bgid="<?php echo $node->field_background[LANGUAGE_NONE][0]['fid']; ?>">
          <div class="timeline">
          <?php
          $day = 1;          
          $k=1;      
          echo '<h2>Ngày thứ 1</h2>';
          echo '<ul class="timeline-items" data-day="'.$day.'">';
        
          foreach($node->field_tour_detail[LANGUAGE_NONE] as $row){
              $detail = field_collection_item_load($row['value']);
              if($detail->field_schedule_by_day[LANGUAGE_NONE][0]['value'] != $day){
                  $day = $detail->field_schedule_by_day[LANGUAGE_NONE][0]['value'];
                  echo '</ul>';
                  echo '<h2>Ngày thứ '.$day.'</h2>';                  
                  echo '<ul class="timeline-items" data-day="'.$day.'">';
              }
              
              $class= ($k%2==1)?'':'inverted';
                //$tour_detail = node_load($detail->field_tour_detail_ref[LANGUAGE_NONE][0]['nid']);                    
                $tmp = image_style_url('width_2_height', $detail->field_avatar[LANGUAGE_NONE][0]['uri']);                    
                    
                echo '<li  fid="'.$detail->item_id.'" class="is-hidden timeline-item">';              
                    echo '<div class="li-wrapper" style="background:url('.$tmp.'); background-size:100%;">';                    
           
                    ?>
                    <div class="tour-detail-2">
                        <div class="content">
                            
                            <?php 
                            echo '<h3 class="trip-name">'.$detail->field_des_name[LANGUAGE_NONE][0]['value'].'</h3>';                       
                            echo '<time>';
                                echo '<span class="view-mode">'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'</span>';
                                echo '<span class="edit-mode"><input type="text" class="txtDayPart" id="txtPD_'.$k.'" value="'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'" /></span>';
                                echo '<span class="tour-detail-controls edit-mode">';
                                    echo ' <i class="fa fa-times" aria-hidden="true" title="Remove this trip"></i> ';
                                echo '</span>';
                            echo '</time>';    
                        
                            if(isset($detail->field_des_des) && !empty($detail->field_des_des[LANGUAGE_NONE])){
                                echo $detail->field_des_des[LANGUAGE_NONE][0]['value'];
                            }    
                            if(isset($detail->field_video_youtube) && !empty($detail->field_video_youtube[LANGUAGE_NONE])){
                                display_video($detail, 400, 300);
                            }
                            ?>
                        </div>
                    </div>
                    <?php 
                echo '</div>';
                echo '</li>';
              
              $k++;            
            }
            
          ?>
          </div>
          
          <script>              
            $('.timeline').timelify({
                animLeft: "fadeInLeft",
                animCenter: "fadeInUp",
                animRight: "fadeInRight",
                animSpeed: 600,
                offset: 150
            });
          </script>
      </div>
                          
</article>