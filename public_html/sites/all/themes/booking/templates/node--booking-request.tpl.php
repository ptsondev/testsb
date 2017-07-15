<?php //echo snh_social_share();  ?>
<article class="<?php print $classes; ?> destination-main-body" data-nid="<?php print $node->nid; ?>" >  
    <div class="col-sm-12">

        <div id="booking-request" class="col-sm-12">
            <form id="booking-request-form">
                <div class="row search-filter" id="filter-des">
                    <?php $des = node_load($node->field_destination[LANGUAGE_NONE][0]['nid']);?>
                    <div class="col-sm-6 col-xs-12">
                        <h4 class="inl"><?php echo t('Destination'); ?></h4>                        
                        <?php echo $des->title; ?>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <h4 class="inl"><?php echo t('Check In'); ?></h4>
                        <?php echo $node->field_check_in[LANGUAGE_NONE][0]['value']; ?> 
                        <h4 class="inl"><?php echo t('Check Out'); ?></h4>
                        <?php echo $node->field_check_out[LANGUAGE_NONE][0]['value']; ?>
                    </div>                        
                    
                </div>

                <div class="row search-filter" id="filter-room">
                    <div class="col-sm-6 col-xs-12">                               
                            <h4 class="inl"><?php echo t('Room'); ?></h4> 
                            <?php echo $node->field_n_room[LANGUAGE_NONE][0]['value']; ?> 
                            <h4 class="inl"><?php echo t('Adults'); ?></h4>
                            <?php echo $node->field_n_adult[LANGUAGE_NONE][0]['value']; ?> 
                            <h4 class="inl"><?php echo t('Children'); ?></h4>
                            <?php echo $node->field_n_children[LANGUAGE_NONE][0]['value']; ?>                   
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <h4 class="inl"><?php echo t('Budget'); ?></h4>                         
                        <?php echo ' <b>'.snh_display_number($node->field_price_per_night[LANGUAGE_NONE][0]['value']).'</b> ('.t('Price Per Night').')' ; ?>
                    </div>  
                </div>



                <div class="row search-filter" id="filer-ratingx">
                    <div class="col-sm-6 col-xs-12">
                        <h4 class="inl"><?php echo t('Star Rating'); ?></h4>
                        <?php echo $node->field_star_rating[LANGUAGE_NONE][0]['value']; ?>    

                        <h4 class="inl"><?php echo t('Guess rating on TripAdvisor'); ?></h4>
                        <?php echo $node->field_guest_rating[LANGUAGE_NONE][0]['value']; ?>    
                    </div>            
                    <div class="col-sm-6 col-xs-12">
                        <h4 class="inl"><?php echo t('Accomodation Type'); ?></h4>
                        <?php 
                        foreach($node->field_accomodation_type[LANGUAGE_NONE] as $k){
                            echo '+'.$k['value'].' ';
                        }
                        ?>
                    </div>
                </div>    

                
                <div class="row">
                    <label>Sort results by price: </label> 
                    <select id="slSortByPrice">
                        <?php                         
                        if(isset($_REQUEST['sort_price'])){    
                            $sort = $_REQUEST['sort_price'];                            
                        }
                        ?>
                        <option>----------</option>
                        <option value="asc" <?php if($sort=='asc') echo'selected';?>>Low to High</option>
                        <option value="desc" <?php if($sort=='desc') echo'selected';?>>High to Low</option>
                    </select>    
                </div>
            </form>
            
            <?php
            // list deals here
            /* 
            $deals = db_query('SELECT nid FROM node WHERE type=:type AND status=1 AND nid IN '
                    . '(SELECT entity_id FROM field_data_field_booking_request_nid WHERE field_booking_request_nid_nid=:bkrid) ORDER BY created DESC', array(
                        ':type'=>'booking_deal', ':bkrid'=>$node->nid
                    ))->fetchCol();
            
            
            if(isset($_REQUEST['sort_price'])){
                $sort='DESC';
                if($_REQUEST['sort_price']=='asc'){
                    $sort = 'ASC';
                }
                $deals = db_query('SELECT entity_id FROM field_data_field_total_price WHERE bundle=:deal '
                        . 'AND entity_id IN (SELECT entity_id FROM field_data_field_booking_request_nid WHERE field_booking_request_nid_nid=:bkrid) '
                        . 'ORDER BY field_total_price_value '.$sort, array(
                    ':deal'=>'booking_deal', ':bkrid' =>$node->nid
                ))->fetchCol();
            }
             */
            
            $deals = db_query('SELECT * FROM deals WHERE bkrid=:bkrid ORDER BY created DESC', array(':bkrid'=>$node->nid))->fetchAll();            
            if(isset($_REQUEST['sort_price'])){
                $sort='DESC';
                if($_REQUEST['sort_price']=='asc'){
                    $sort = 'ASC';
                }
                $deals = db_query('SELECT * FROM deals WHERE bkrid=:bkrid ORDER BY price '.$sort, array(':bkrid'=>$node->nid))->fetchAll();            
            }
            echo '<div id="list-deals">';
            foreach($deals as $deal){
                echo '<div class="deal row">';
                    $hotel = node_load($deal->hid);                    
                    echo '<div class="col-sm-3 col-xs-12"><a href="'.url('node/'.$hotel->nid).'"><img src="'.image_style_url('square', $hotel->field_photos[LANGUAGE_NONE][0]['uri']).'" /></a></div>';
                    echo '<div class="col-sm-5 col-xs-12">';
                        echo '<h4 class="hotel-name"><a href="'.url('node/'.$hotel->nid).'">'.$hotel->title.'</a></h4>';
                        echo '<div class="hotel-address"><i class="fa fa-home" aria-hidden="true"></i> '.$hotel->field_address[LANGUAGE_NONE][0]['value'].'</div>';
                        echo '<div class="hotel-promotion">'.$hotel->field_promotion[LANGUAGE_NONE][0]['value'].'</div>';
                    echo '</div>';                    
                    echo '<div class="col-sm-4 col-xs-12">';
                        echo '<div class="star">Xếp hạng trên TripAdvisor: <div class="rateYo" data-rating="'.($hotel->field_tripadvisor_rating[LANGUAGE_NONE][0]['rating']/20).'"></div></div>';
                        echo '<div class="total-price"> <span class="ttp">'.snh_display_price($deal->price).'</span></div>';
                        echo '<div class="deal-decide"><input class="form-submit" type="button" value="Book Now" /> <input  class="form-submit" type="button" value="Add to Wishlist" /> <input  class="form-submit" type="button" value="Deny" /></div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            ?>
        </div>
    </div>

</article> <!-- /article #node -->