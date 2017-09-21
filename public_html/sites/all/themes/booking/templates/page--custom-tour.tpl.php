<?php   
include_once(PATH_TO_INCLUDES . 'header.php');
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
                                        <h3 class="group-title"><?php echo t('Travellers Information'); ?></h3>
                                         <div id="edit-travellers-info" class="btn-edit"></div>
                                         <div id="list-customers" class="edit-modexxx"><?php echo theme('add_customer'); ?><ol></ol></div>
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
                                  <div id="ticket-result"></div>
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
                                  <div id="todo-result"></div>
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
                                  <div id="cost-result"></div>            
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
                                  <div id="urgent-contact-result"></div>
                              </div>
                            </div>

                          
                            <div id="tour-buttons">
                              <!--<input type="button" value="Lưu" id="btnCustomTour" />
                              <input type="button" value="Lưu" id="btnSaveCustomTour" />
                              <input type="button" value="Xuất file ảnh infographic" id="btnSaveImage" data-nid="<?php echo $node->nid;?>" class="update" />        
                              -->
                              <div id="btnSaveCustomTour" class="update" data-nid="<?php echo $node->nid;?>"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</div>
                              <div id="btnSaveImage" data-nid="<?php echo $node->nid;?>"><i class="fa fa-file-image-o" aria-hidden="true"></i> Xuất file ảnh infographic</div>
                              
                                <div id="export-img"></div>
                                <div id="export-img2"></div>
                            </div>
                          
                          
                          </div>      
                
                  <div id="fb-chat-region">
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
