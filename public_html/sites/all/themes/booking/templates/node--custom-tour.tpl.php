<?php //echo snh_social_share();
//$x = strtotime('Nov-16-2016');
//var_dump($x);die;
?>
<article class="<?php print $classes; ?> destination-main-body" data-nid="<?php print $node->nid; ?>" >
  

  <div class="content">
      
      <div class="row" style="margin-top:40px;">
          <div class="col-sm-6 col-xs-12">
              <div class="info-group" id="general-info">
                  <h3 class="group-title"><?php echo t('General Information'); ?></h3>
                  <!--<div id="edit-general-info" class="btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>-->
                  
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Destination').'</label> '; 
                            $node_des = node_load($node->field_destination[LANGUAGE_NONE][0]['nid']);
                            echo $node_des->title;
                        ?>               
                  </div>          
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Start Date').'</label> '; 
                            echo '<span class="view-mode">'.date('M-d-Y', $node->field_start_date[LANGUAGE_NONE][0]['value']).'</span>';                   
                            echo '<span class="edit-mode"><input type="text" id="u-start-date" value="'.date('M-d-Y', $node->field_start_date[LANGUAGE_NONE][0]['value']).'" /></span>';
                        ?>               
                  </div>          
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('End Date').'</label> '; 
                            echo '<span class="view-mode">'.date('M-d-Y', $node->field_end_date[LANGUAGE_NONE][0]['value']).'</span>';                   
                            echo '<span class="edit-mode"><input type="text" id="u-end-date" value="'.date('M-d-Y', $node->field_end_date[LANGUAGE_NONE][0]['value']).'" /></span>';
                        ?>               
                  </div>
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Total day').'</label> '; 
                            echo '<span class="view-mode">'.$node->field_total_day[LANGUAGE_NONE][0]['value'].'</span>';
                            echo '<span class="edit-mode"><input type="text" id="u-total-day" value="'.$node->field_total_day[LANGUAGE_NONE][0]['value'].'" /></span>';
                      
                        ?>               
                  </div>
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Tour target').'</label> '; 
                            echo '<span class="view-mode">'.$node->field_tour_target[LANGUAGE_NONE][0]['value'].'</span>';
                            //echo $node->field_tour_target[LANGUAGE_NONE][0]['value'];
                            echo '<span class="edit-mode">
                                <input type="radio" class="rdTarget" name="target" value="travel" checked="checked" > '.t('Travel').' 
                                <input type="radio" class="rdTarget" name="target" value="business"> '.t('Business').' </span>';    
                        ?>               
                  </div>
              </div>
          </div>

          <div class="col-sm-6 col-xs-12">
              <div class="info-group" id="travellers-info">
                  <h3 class="group-title"><?php echo t('Travellers Information'); ?></h3>
                   <div id="edit-travellers-info" class="btn-edit"></div>
                   <div id="list-customers">
                       <?php echo theme('add_customer'); ?>
                       <ol>
                           <?php
                           foreach($node->field_traveller[LANGUAGE_NONE] as $item){
                               $customer = field_collection_item_load($item['value']);
                                echo '<li>';
                                    $old = $customer->field_human[LANGUAGE_NONE][0]['value']==0? 'Children':'Adult';
                                    echo '<span class="cu-name">'.$customer->field_human[LANGUAGE_NONE][0]['value'].'</span> -';
                                    echo '<span class="cu-phone">'.$customer->field_phone[LANGUAGE_NONE][0]['value'].'</span> -';
                                    echo '<span class="cu-email">'.$customer->field_email[LANGUAGE_NONE][0]['value'].'</span> -';
                                    echo '<span class="cu-old">'.t($old).'</span>';
                                    echo '<i class="fa fa-times" aria-hidden="true" title="Remove this member"></i>';
                                echo '</li>';
                                
                              
                           }
                           ?>
                       </ol>
                       
                   </div>
              </div>      
          </div>       
      </div>      
      
      <div class="info-group col-sm-12 col-xs-12" id="tour-detail">
          <h3 class="group-title"><?php echo t('Tour detail'); ?></h3>
          <div class="timeline">
          <?php
          $day = 1;          
          $k=1;      
          echo '<h2>Ngày thứ 1</h2>';
          echo '<ul class="timeline-items">';
          
          foreach($node->field_tour_detail[LANGUAGE_NONE] as $row){              
              $detail = field_collection_item_load($row['value']);
              if($detail->field_schedule_by_day[LANGUAGE_NONE][0]['value'] != $day){
                  $day = $detail->field_schedule_by_day[LANGUAGE_NONE][0]['value'];
                  echo '</ul>';
                  echo '<h2>Ngày thứ '.$day.'</h2>';                  
                  echo '<ul class="timeline-items">';
              }
              
              $class= ($k%2==1)?'':'inverted';
               echo '<li class="is-hidden timeline-item" data-tdid="'.$detail->field_tour_detail_ref[LANGUAGE_NONE][0]['nid'].'">';              
                     $tour_detail = node_load($detail->field_tour_detail_ref[LANGUAGE_NONE][0]['nid']);
                    
                    echo '<a class="link-detail-tour" href="#detail-'.$detail->item_id.'">';
                        echo '<h3>'.$tour_detail->title.'</h3>';
                    echo '</a>';
              
              
      
                    //echo render(field_view_field('field_collection_item', $detail, 'field_photos',array( 'label'=>'hidden', 'type' => 'juicebox_formatter'))); 
                    echo '<div class="detail-tour-content" id="detail-'.$detail->item_id.'">';
                         // tour detail
                          display_video($detail);
                          if(isset($detail->field_special_information) && !empty($detail->field_special_information[LANGUAGE_NONE])){
                              echo $detail->field_special_information[LANGUAGE_NONE][0]['value'];
                          }                        
                        display_photos_as_images($detail); 
                    echo '</div>';
                    echo '<hr>';
                    echo '<time>';
                        echo '<span class="view-mode">'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'</span>';
                        echo '<span class="edit-mode"><input type="text" class="txtDayPart" id="txtPD_'.$k.'" value="'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'" /></span>';
                        echo '<span class="tour-detail-controls edit-mode">';
                            echo ' <i class="fa fa-search" aria-hidden="true" alt="Search hotel near from here"></i> ';
                            echo ' <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit this trip"></i> ';
                            echo ' <i class="fa fa-times" aria-hidden="true" title="Remove this trip"></i> ';
                        echo '</span>';
                    echo '</time>';
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
      </div><!-- End tour detail -->
      
      <div class="info-group col-sm-12 col-xs-12 edit-mode" id="to-do-list">
        <h3 class="group-title"><?php echo t('To do list'); ?></h3>  
        <div id="list-todo">
            <div class="col-sm-2 col-xs-6"><?php echo t('Task'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Priority'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Assign to'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Time to do'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Status'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Note'); ?></div>
            <?php echo theme('add_todo'); ?>
            <div id="todo-result"></div>
        </div>
      </div>
      
      <div id="tour-buttons">
        <input type="button" value="<?php echo t('Invite your friends to join this tour');?>" id="btnInviteTour" /> 
        <!--<input type="button" value="<?php echo t('Update this tour');?>" id="btnCustomTour" /> -->
        <!--<input type="button" value="Save this tour to your list" id="btnSaveCustomTour" />-->
      </div>
  </div> <!-- /content -->
  
</article> <!-- /article #node -->