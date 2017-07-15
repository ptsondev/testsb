<?php //echo snh_social_share();
//$x = strtotime('Nov-16-2016');
//var_dump($x);die;
?>
<article class="<?php print $classes; ?> destination-main-body" data-nid="<?php print $node->nid; ?>" >
  

  <div class="content">    
    <?php 
        if(s_is_mobile()){
                    echo theme('full_custom_tour_data', array('nid'=>$node->nid));
                }else{ ?>
        <div class="info-group" id="place-info">
                <h3 class="group-title"><?php echo t('Destination information'); ?></h3>
                
                <?php  echo theme('place_detail', array('place_id'=>$node->field_destination[LANGUAGE_NONE][0]['nid'])); ?>
        </div>
                    
      
      <div class="info-group col-sm-12 col-xs-12" id="tour-detail" data-bgid="<?php echo $node->field_background[LANGUAGE_NONE][0]['fid']; ?>">
          <h3 class="group-title"><?php echo t('Tour detail'); ?></h3>
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
                    
                echo '<li  fid="'.$detail->item_id.'" style="background:url('.$tmp.'); background-size:100%;" class="is-hidden timeline-item">';              
                                  
                    echo '<div class="li-inner">';
                       // echo '<a class="link-detail-tour" href="#detail-'.$detail->item_id.'">';
                            echo '<h3 class="trip-name">'.$detail->field_des_name[LANGUAGE_NONE][0]['value'].'</h3>';
                       // echo '</a>';

                        echo '<time>';
                            echo '<span class="view-mode">'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'</span>';
                            echo '<span class="edit-mode"><input type="text" class="txtDayPart" id="txtPD_'.$k.'" value="'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'" /></span>';
                            echo '<span class="tour-detail-controls edit-mode">';
                                //echo ' <i class="fa fa-search" aria-hidden="true" alt="Search hotel near from here"></i> ';
                                //echo ' <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit this trip"></i> ';
                                echo ' <i class="fa fa-times" aria-hidden="true" title="Remove this trip"></i> ';
                            echo '</span>';
                        echo '</time>';                                                                                                             
                    echo '</div>';
                    
           
                    ?>
                    <div class="tour-detail-2">
                        <div class="content">
                            <?php 
                            if(isset($detail->field_des_des) && !empty($detail->field_des_des[LANGUAGE_NONE])){
                                //echo  'vawevwae';
                                echo $detail->field_des_des[LANGUAGE_NONE][0]['value'];
                            }    
                            if(isset($detail->field_video_youtube) && !empty($detail->field_video_youtube[LANGUAGE_NONE])){
                                display_video($detail, 400, 300);
                            }
                            ?>
                        </div>
                    </div>
                    <?php 
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
                <?php } ?>
      <div class="row edit-mode"> 
         <div class="col-sm-6 col-xs-12">
              <div class="info-group" id="tour-info">
                  <h3 class="group-title"><?php echo t('Tour Information'); ?></h3>
                  <?php echo theme('tour_information', array('tour_node'=>$node)); ?>
              </div>
          </div>

          <div class="col-sm-6 col-xs-12">
              <div class="info-group" id="travellers-info">
                  <h3 class="group-title"><?php echo t('Travellers Information'); ?></h3>
                   <div id="edit-travellers-info" class="btn-edit"></div>
                   <div id="list-customers" class="edit-modexxx"><?php echo theme('add_customer'); ?><ol></ol></div>
              </div>      
          </div>
        </div>
      
      <div class="info-group col-sm-12 col-xs-12 edit-mode" id="ticket-list">
        <h3 class="group-title"><?php echo t('Transportation'); ?></h3>  
        <div id="list-ticket">
            <div class="col-sm-2 col-xs-6">Ngày giờ xuất phát</div>
            <div class="col-sm-2 col-xs-6">Điểm xuất phát</div>
            <div class="col-sm-2 col-xs-6">Điểm đến</div>
            <div class="col-sm-2 col-xs-6">Loại phương tiện</div>
            <div class="col-sm-2 col-xs-6">Mã vé</div>
            <div class="col-sm-2 col-xs-6">Ghi chú</div>
            <?php echo theme('add_ticket'); ?>
            <div id="ticket-result"></div>
        </div>
      </div>
      
      
      <div class="info-group col-sm-12 col-xs-12 edit-mode" id="to-do-list">
        <h3 class="group-title"><?php echo t('To do list'); ?></h3>  
        <div id="list-todo">
            <div class="col-sm-2 col-xs-6"><?php echo t('Task'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Priority'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Assign to'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Deadline'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Status'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Note'); ?></div>
            <?php echo theme('add_todo'); ?>
            <div id="todo-result"></div>
        </div>
      </div>
      
      <div class="info-group col-sm-12 col-xs-12 edit-mode" id="budget-managed">
        <h3 class="group-title"><?php echo t('Budget Management'); ?></h3>  
        <div id="list-cost">
            <div class="col-sm-2 col-xs-6"><?php echo t('Expense name'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Type'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Quantity'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Unit price'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Total'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Note'); ?></div>
            <?php echo theme('add_budget_cost'); ?>
            <div id="cost-result"></div>            
            <div id="budget-after">Ngân sách còn lại: <span id="nscl"><?php echo snh_display_number($nscl);?></span></div>
        </div>
      </div>
      
      <div class="info-group col-sm-12 col-xs-12 edit-mode" id="urgent-contact">
        <h3 class="group-title"><?php echo t('Urgent Contact'); ?></h3>  
        <div id="list-urgent-contact">
            <div class="col-sm-2 col-xs-6"><?php echo t('Full name'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Landline'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Cellphone'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Address'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Relationship'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Note'); ?></div>
            <?php echo theme('add_urgent_contact'); ?>
            <div id="urgent-contact-result"></div>
        </div>
      </div>
      
      <div id="tour-buttons">
        <input type="button" value="<?php echo t('Customize this tour');?>" id="btnCustomTour" /> 
        <input type="button" value="<?php echo t('Save this tour to your list'); ?>" id="btnSaveCustomTour" />
      </div>
      
      <hr />
      <div id="comment-area">          
          <?php           
          echo '<h2> <i class="fa fa-comments" aria-hidden="true"></i> '.t('Tell me how was you feel about this tour?').'</h2>';
          //$comments = comment_get_thread($node, COMMENT_MODE_THREADED, 20);
          //var_dump($comments);
          $k = views_embed_view($name='comment_by_tour', $display_id = 'default');
          echo $k;
          $form = drupal_get_form("comment_node_tour_form", (object) array('nid' => $node->nid));
          print drupal_render($form);
          ?>
      </div>
  </div> <!-- /content -->
  
</article> <!-- /article #node -->


<?php 
 /* Nhung tour khac cung dia diem */
    echo '<div id="list-tour-by-des">';
        echo '<h3>'.t('Other Tours').'</h3>';
        $nids = db_query('SELECT entity_id FROM field_data_field_destination WHERE field_destination_nid=:t_nid AND bundle=:tour AND entity_id<>:nid'
                , array(':t_nid'=>$node->field_destination[LANGUAGE_NONE][0]['nid'], ':tour'=>'tour', ':nid'=>$node->nid))->fetchCol();
        $tours = node_load_multiple($nids);
        foreach($tours as $tour){
            echo '<a href="'.url('node/'.$tour->nid).'">'.$tour->title.'</a>';
        }
    echo '</div>';
?>

<?php
$bg = '';
if(isset($node->field_background) && !empty($node->field_background[LANGUAGE_NONE])){
    $bg = image_style_url('width_2_height', $node->field_background[LANGUAGE_NONE][0]['uri']);
}
?>
<!-- override css -->
<style>
    #main-region::before{
        content:" ";
        position:fixed;
        top:0;
        left:0;
        z-index:-1;
        background:url('<?php echo $bg; ?>') no-repeat;
        background-size:100%;
        width:100%;
        height:100%;
    }
</style>