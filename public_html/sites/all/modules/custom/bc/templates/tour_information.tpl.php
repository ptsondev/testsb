<div class="tour-field">
                        <?php
                            $node=$tour_node;
                            echo '<label>'.t('Destination').'</label> '; 
                            $node_des = node_load($node->field_destination[LANGUAGE_NONE][0]['nid']);
                            echo $node_des->title;
                            echo '<span class="edit-mode" id="des-ref" data-nid="'.$node_des->nid.'"></span>';
                        ?>               
                  </div>          
                  
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Start Date').'</label> '; 
                            $start_date = isset($node->field_start_date) ? $node->field_start_date[LANGUAGE_NONE][0]['value']:time();                            
                            //echo '<span class="view-mode">'.date('M-d-Y', $node->field_start_date[LANGUAGE_NONE][0]['value']).'</span>';                                 
                            echo '<span class="edit-modex"><input type="text" id="u-start-date" value="'.date('M-d-Y', $start_date).'" /></span>';
                            //echo '<span class="edit-mode"><input type="text" id="u-start-date" value="'.date('M-d-Y').'" /></span>';
                        ?>               
                  </div>          
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('End Date').'</label> '; 
                            $end_date = isset($node->field_end_date) ? $node->field_end_date[LANGUAGE_NONE][0]['value']:time();          
                            //echo '<span class="view-mode">'.date('M-d-Y', $node->field_end_date[LANGUAGE_NONE][0]['value']).'</span>';                   
                            echo '<span class="edit-modex"><input type="text" id="u-end-date" value="'.date('M-d-Y', $end_date).'" /></span>';
                            //echo '<span class="edit-mode"><input type="text" id="u-end-date" value="'.date('M-d-Y').'" /></span>';
                        ?>               
                  </div>
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Total day').'</label> '; 
                            $total_day = isset($node->field_total_day) ? $node->field_total_day[LANGUAGE_NONE][0]['value']:'';
                            //echo '<span class="view-mode">'.$node->field_total_day[LANGUAGE_NONE][0]['value'].'</span>';
                            echo '<span class="edit-modex"><input type="text" id="u-total-day" value="'.$total_day.'" /></span>';
                        ?>               
                  </div>
                  <!--<div class="tour-field">
                        <?php
                            echo '<label>'.t('Tour target').'</label> '; 
                            $target = isset($node->field_tour_target) ? $node->field_tour_target[LANGUAGE_NONE][0]['value']:'travel';
                            //echo '<span class="view-mode">'.$node->field_tour_target[LANGUAGE_NONE][0]['value'].'</span>';
                            echo '<span class="edit-modex">';
                                $check = ($target=='travel')?'checked="checked"':'';
                                echo '<input type="radio" class="rdTarget" name="target" value="travel" '.$check.'> '.t('Travel') ;
                                
                                $check = ($target=='business')?'checked="checked"':'';
                                echo ' <input type="radio" class="rdTarget" name="target" value="business" '.$check.'> '.t('Business');
                            echo '</span>';    
                        ?>               
                  </div>
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Transport').'</label> ';     
                            $transport = isset($node->field_transportation_type) ? $node->field_transportation_type[LANGUAGE_NONE][0]['value']:'train';                            
                            echo '<span class="edit-modex">';
                                $check = ($transport=='train')?'checked="checked"':'';
                                echo '<input type="radio" class="rdTransport" name="transport" value="train" '.$check.' > '.t('Train');
                                
                                $check = ($transport=='airline')?'checked="checked"':'';
                                echo ' <input type="radio" class="rdTransport" name="transport" value="airline" '.$check.'> '.t('Airline') ; 
                                
                                $check = ($transport=='waterway')?'checked="checked"':'';
                                //echo ' <input type="radio" class="rdTransport" name="transport" value="waterway" '.$check.'> '.t('Waterway');
                                
                                $check = ($transport=='coach')?'checked="checked"':'';
                                //echo ' <input type="radio" class="rdTransport" name="transport" value="coach" '.$check.'> '.t('Coach');
                            echo '</span>';
                        ?>               
                  </div>-->
                  <div class="tour-field">
                        <?php
                            echo '<label>'.t('Expected budget').'</label> ';                                
                            $budget = (isset($node->field_expect_budget) && !empty($node->field_expect_budget[LANGUAGE_NONE])) ? snh_display_number($node->field_expect_budget[LANGUAGE_NONE][0]['value']):'';
                            echo '<span class="edit-modex"><input type="text" id="u-expected-budget"  value="'.$budget.'" /></span>';                            
                        ?>               
                  </div>