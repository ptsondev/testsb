<?php //echo snh_social_share();
//$x = strtotime('Nov-16-2016');
//var_dump($x);die;
?>
<article class="<?php print $classes; ?> custom-tour-main-body" data-nid="<?php print $node->nid; ?>" >    
    <div class="content">      
    <div id="export-data">
        <div class="info-group" id="place-info">
                <h3 class="group-title"><?php echo t('Destination information'); ?></h3>
                <?php 
                  echo theme('place_detail', array('place_id'=>$node->field_destination[LANGUAGE_NONE][0]['nid']));
                ?>
        </div>
              
      
      <div class="info-group col-sm-12 col-xs-12" id="tour-detail">
          <h3 class="group-title"><?php echo t('Tour detail'); ?></h3>
          <div class="timeline">
          <?php
          $day = 1;          
          $k=1;      
          echo '<h2>Ngày thứ 1</h2>';
          echo '<ul class="timeline-items" data-day="1">';
        
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
                    
                    
              echo '<li fid="'.$detail->item_id.'" style="background:url('.$tmp.'); background-size:100%;" class="is-hidden timeline-item">';              
                                  
                    echo '<div class="li-inner">';
                        echo '<h3 class="trip-name">'.$detail->field_des_name[LANGUAGE_NONE][0]['value'].'</h3>';                       

                        echo '<time>';
                            //echo '<span class="view-mode">'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'</span>';
                            echo '<span class="edit-modex"><input type="text" class="txtDayPart" id="txtPD_'.$k.'" value="'.$detail->field_schedule_by_day_part[LANGUAGE_NONE][0]['value'].'" /></span>';
                            echo '<span class="tour-detail-controls edit-modex">';
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
      </div><!-- End tour detail -->
      
      <div class="row view-mode"> 
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
                   <div id="list-customers" class="edit-modexxx"><?php echo theme('add_customer'); ?>
                       <ol><?php 
                            if(!empty($node->field_traveller[LANGUAGE_NONE])){
                                foreach($node->field_traveller[LANGUAGE_NONE] as $item){
                                    $person = field_collection_item_load($item['value']);
                                    $tmp = array();                                                                        
                                    $tmp[]= '<span class="cu-name">'.$person->field_human[LANGUAGE_NONE][0]['value'].'</span>';
                                    $tmp[]=  '<span class="cu-phone">'.$person->field_phone[LANGUAGE_NONE][0]['value'].'</span>';
                                    $tmp[]=  '<span class="cu-email">'.$person->field_email[LANGUAGE_NONE][0]['value'].'</span>';
                                    $tmp[]=  '<span class="cu-old">'.$person->field_old[LANGUAGE_NONE][0]['value'].'</span>';
                
                                    echo '<li>'. implode(' - ', $tmp).' <i class="fa fa-times" aria-hidden="true" title="Remove this member"></i></li>';
                                }
                            }
                       ?></ol>
                   </div>
              </div>      
          </div>
        </div>
      <div class="info-group col-sm-12 col-xs-12 view-mode" id="to-do-list">
        <h3 class="group-title"><?php echo t('To do list'); ?></h3>  
        <div id="list-todo">
            <div class="col-sm-2 col-xs-6"><?php echo t('Task'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Priority'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Assign to'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Time to do'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Status'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Note'); ?></div>
            <?php echo theme('add_todo'); ?>
            <div id="todo-result">
                <?php 
                //var_dump($node->field_to_do);
                if(!empty($node->field_to_do[LANGUAGE_NONE])){
                    foreach($node->field_to_do[LANGUAGE_NONE] as $item){
                        $todo = field_collection_item_load($item['value']);
                        echo '<div class="item">';
                            echo '<div class="col-sm-2 col-xs-6">'.$todo->field_title[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$todo->field_index[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$todo->field_human[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$todo->field_deadline[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$todo->field_status[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$todo->field_note[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
      </div>
      
      <div class="info-group col-sm-12 col-xs-12 view-mode" id="budget-managed">
        <h3 class="group-title"><?php echo t('Budget Management'); ?></h3>  
        <div id="list-cost">
            <div class="col-sm-2 col-xs-6"><?php echo t('Expense name'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Type'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Quantity'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Unit price'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Total'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Note'); ?></div>
            <?php echo theme('add_budget_cost'); ?>
            <div id="cost-result">
                <?php 
                $nscl = (isset($node->field_expect_budget) && !empty($node->field_expect_budget[LANGUAGE_NONE])) ? $node->field_expect_budget[LANGUAGE_NONE][0]['value']:0;
                
                if(!empty($node->field_expense[LANGUAGE_NONE])){
                    foreach($node->field_expense[LANGUAGE_NONE] as $item){
                        $expense = field_collection_item_load($item['value']);
                        echo '<div class="item">';
                            echo '<div class="col-sm-2 col-xs-6">'.$expense->field_human[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$expense->field_expense_type[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$expense->field_number[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$expense->field_init[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$expense->field_total[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$expense->field_note[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i>';
                        echo '</div>';
                        $nscl -=$expense->field_total[LANGUAGE_NONE][0]['value'];
                    }
                }
                ?>
            </div>
            <div id="budget-after">Ngân sách còn lại: <span id="nscl"><?php echo $nscl;?></span></div>
        </div>
      </div>
      
      <div class="info-group col-sm-12 col-xs-12 view-mode" id="urgent-contact">
        <h3 class="group-title"><?php echo t('Urgent Contact'); ?></h3>  
        <div id="list-urgent-contact">
            <div class="col-sm-2 col-xs-6"><?php echo t('Full name'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Landline'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Cellphone'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Address'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Relationship'); ?></div>
            <div class="col-sm-2 col-xs-6"><?php echo t('Note'); ?></div>
            <?php echo theme('add_urgent_contact'); ?>
            <div id="urgent-contact-result">
                <?php 
                if(!empty($node->field_urgent_contact[LANGUAGE_NONE])){
                    foreach($node->field_urgent_contact[LANGUAGE_NONE] as $item){
                        $contact = field_collection_item_load($item['value']);
                        echo '<div class="item">';
                            echo '<div class="col-sm-2 col-xs-6">'.$contact->field_human[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$contact->field_home_phone[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$contact->field_phone[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$contact->field_address[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$contact->field_relation_ship[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$contact->field_note[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      </div> <!-- export data -->
      
      <div id="tour-buttons">
        <!--<input type="button" value="<?php echo t('Modify this tour');?>" id="btnCustomTour" />-->
        <input type="button" value="<?php echo t('Update');?>" id="btnSaveCustomTour" class="update" />         
        <input type="button" value="<?php echo t('Invite friends via Email');?>" id="btnInviteFriend" class="update" />        
        <input type="button" value="<?php echo t('Save to image');?>" id="btnSaveImage" class="update" />        
      </div>      
      <div id="img-out"></div>
    
  </div> <!-- /content -->
  
</article> <!-- /article #node -->

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