<?php 
$node = node_load($nid);
$place = node_load($node->field_destination[LANGUAGE_NONE][0]['nid']);
?>
<div class="info-group" id="place-info">
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
                                //echo  'vawevwae';
                                echo $detail->field_des_des[LANGUAGE_NONE][0]['value'];
                            }    
                            if(isset($detail->field_video_youtube) && !empty($detail->field_video_youtube[LANGUAGE_NONE])){
                                display_video($detail, 400, 300);
                            }
      
        echo '</div>';
        echo '<hr />';
    }
    ?>
 </div>



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
                   <div id="list-customers" class="edit-modexxx">
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
      
      
       
      <div class="info-group col-sm-12 col-xs-12 view-mode" id="ticket-list">
        <h3 class="group-title"><?php echo t('Transportation'); ?></h3>  
        <div id="list-ticket">
            <div class="col-sm-2 col-xs-6">Ngày giờ xuất phát</div>
            <div class="col-sm-2 col-xs-6">Điểm xuất phát</div>
            <div class="col-sm-2 col-xs-6">Điểm đến</div>
            <div class="col-sm-2 col-xs-6">Loại phương tiện</div>
            <div class="col-sm-2 col-xs-6">Mã vé</div>
            <div class="col-sm-2 col-xs-6">Ghi chú</div>                      
            <div id="ticket-result">
                <?php                 
                if(!empty($node->field_tickets[LANGUAGE_NONE])){
                    foreach($node->field_tickets[LANGUAGE_NONE] as $item){
                        $ticket = field_collection_item_load($item['value']);
                        echo '<div class="item">';
                            echo '<div class="col-sm-2 col-xs-6">'.$ticket->field_datetime[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$ticket->field_start[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$ticket->field_goal[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$ticket->field_transport_type[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$ticket->field_ticket_num[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<div class="col-sm-2 col-xs-6">'.$ticket->field_note[LANGUAGE_NONE][0]['value'].'</div>';
                            echo '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i>';
                        echo '</div>';
                    }
                }
                ?>
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
            <div id="budget-after">Ngân sách còn lại: <span id="nscl"><?php echo snh_display_number($nscl);?></span></div>
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