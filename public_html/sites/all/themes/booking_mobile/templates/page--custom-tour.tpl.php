<?php   
include_once(PATH_TO_INCLUDES_MOBILE . 'header.php');
$avatar = image_style_url('square', $node->field_background[LANGUAGE_NONE][0]['uri']);
?>

<main id="main-region" class="tour-main-region">
    <div class="main-wrapper inner container">    
        <div id="main-tour-content" class="col-md-9 col-sm-12">
            <div id="tour-r1">
                <div class="col-sm-3"><img src="<?php echo $avatar; ?>" /></div>
                <div class="col-sm-5">            
                    <h1><?php echo $node->title; ?></h1>                    
                </div>
                <div class="col-sm-4">
                    <div class="r1"><?php echo '<div class="fb-like" data-href="'.url('node/'.$node->nid).'" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>';?></div>                    
                </div>            
            </div>
            
            <div id="tour-r2">
                <div id="first-row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-5">            
                        <?php $rate = $node->field_newtravelex_rating[LANGUAGE_NONE][0]['average']; ?>
                        <label id="lblrate">Đánh giá <span class="num"><?php echo ($rate/20); ?></span>/</label><div id="tour-rStar" class="my-rate"></div>
                    </div>
                    <div class="col-sm-4">
                        <span id="btnAddToFavorite" data-nid="<?php echo $node->nid;?>"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        <input type="button" value="Điều chỉnh lại tour này" id="btnCustomTour" class="form-submit">
                    </div>    
                </div>
                <div class="clearfix"></div>
                <div id="next-tour-detail">
                     <?php
                    if($messages){
                            echo '<div id="site-message">'.$messages.'</div>';
                        }
                        if($tabs){
                         //    echo '<div id="site-tabs">'.render($tabs).'</div>';
                        }
                        echo render($page['content']);                                                
                    ?>
                </div>
                
                
                      <div id="tour-more-tools">
                            <div class="row edit-mode"> 
                               <div class="col-sm-6 col-xs-12">
                                    <div class="info-groupx" id="tour-info">
                                        <h3 class="group-title">Thông tin lịch trình</h3>
                                        <?php echo theme('tour_information', array('tour_node'=>$node)); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="info-groupx" id="travellers-info">
                                        <h3 class="group-title">Danh sách hành khách</h3>
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

                            <div class="info-groupx edit-mode" id="ticket-list">
                              <h3 class="group-title"><?php echo t('Transportation'); ?></h3>  
                              <div id="list-ticket">
                                  <div class="col-sm-2 col-xs-6">Ngày giờ xuất phát</div>
                                  <div class="col-sm-2 col-xs-6">Điểm xuất phát</div>
                                  <div class="col-sm-2 col-xs-6">Điểm đến</div>
                                  <div class="col-sm-2 col-xs-6">Loại phương tiện</div>
                                  <div class="col-sm-2 col-xs-6">Mã vé</div>
                                  <div class="col-sm-2 col-xs-6">Ghi chú</div>
                                  <?php echo theme('add_ticket'); ?>
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


                            <div class="info-groupx edit-mode" id="to-do-list">
                              <h3 class="group-title"><?php echo t('To do list'); ?></h3>  
                              <div id="list-todo">
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Task'); ?></div>
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Priority'); ?></div>
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Assign to'); ?></div>
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Deadline'); ?></div>
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

                            <div class="info-groupx  edit-mode" id="budget-managed">
                              <h3 class="group-title"><?php echo t('Budget Management'); ?></h3>  
                              <div id="list-cost">
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Expense name'); ?></div>
                                  <div class="col-sm-2 col-xs-6">Nhóm</div>
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
                                  <div id="budget-after">Ngân sách còn lại: <span id="nscl"><?php echo snh_display_number($nscl);?></span></div>
                              </div>
                            </div>

                            <div class="info-groupx edit-mode" id="urgent-contact">
                              <h3 class="group-title"><?php echo t('Urgent Contact'); ?></h3>  
                              <div id="list-urgent-contact">
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Full name'); ?></div>
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Landline'); ?></div>
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Cellphone'); ?></div>
                                  <div class="col-sm-2 col-xs-6"><?php echo t('Address'); ?></div>
                                  <div class="col-sm-2 col-xs-6">Quan hệ</div>
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

                          
                            <div id="tour-buttons">
                              <!--<input type="button" value="Lưu" id="btnCustomTour" />
                              <input type="button" value="Lưu" id="btnSaveCustomTour" />
                              <input type="button" value="Xuất file ảnh infographic" id="btnSaveImage" data-nid="<?php echo $node->nid;?>" class="update" />        
                              -->
                              <div id="btnSaveCustomTour" class="update" data-nid="<?php echo $node->nid;?>" data-clonefrom="<?php echo $node->field_clone_from[LANGUAGE_NONE][0]['nid'];?>"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</div>
                              <div id="btnSaveImage" data-nid="<?php echo $node->nid;?>"><i class="fa fa-file-image-o" aria-hidden="true"></i> Xuất file ảnh infographic</div>
                              
                                <div id="export-img"></div>
                                <div id="export-img2"></div>
                            </div>
                          
                          
                          </div>      
                
                  <div id="fb-chat-region">
                       <?php 
                         echo '<div class="u-post-tool">';
            echo '<a class="twitter-share-button"href="https://twitter.com/intent/tweet">Tweet</a>';
            echo '<div class="ggplus-like"><script src="https://apis.google.com/js/platform.js" async defer></script><g:plusone></g:plusone></div>';
            echo '<div class="fb-like" data-href="'.url('node/'.$node->nid).'" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>';
            
            
        echo '</div>';
        
                     ?>
                      
                    <?php $cur_url = url('node/'.$node->nid, array('absolute' => TRUE)); ?>
                    <div class="fb-comments" data-href="<?php echo $cur_url;?>" data-numposts="5"></div>              
                 </div>
            </div>
        </div>
        
        <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">
            <?php 
                $des = node_load($node->field_destination[LANGUAGE_NONE][0]['nid']);
                
               
                    echo '<div id="galery-wrapper2"><div id="galery-wrapper"><a id="btnShowPhotos" href="#popup-photos"><div id="des-photos-galery">';
                        echo '<h3>Hình ảnh <label>( '.count($des->field_photos[LANGUAGE_NONE]).' hình)</label></h3>';
                        if(isset($des->field_photos[LANGUAGE_NONE][0])){
                            echo '<img src="'.image_style_url('square', $des->field_photos[LANGUAGE_NONE][0]['uri']).'">';                            
                        }
                        if(isset($des->field_photos[LANGUAGE_NONE][1])){
                            echo '<img class="p50 left" src="'.image_style_url('square', $des->field_photos[LANGUAGE_NONE][1]['uri']).'">';                            
                        }
                        if(isset($des->field_photos[LANGUAGE_NONE][2])){
                            echo '<img class="p50 right" src="'.image_style_url('square', $des->field_photos[LANGUAGE_NONE][2]['uri']).'">';                            
                        }
                    echo '</div><a></div></div>';
                
                echo '<div id="popup-photos" style="display:none;">';
                    display_photos_as_gallery($des);    
                echo '</div>';
            ?>
        </div>
        
    </div>
</main>


<?php include_once(PATH_TO_INCLUDES . 'footer.php');  ?>
