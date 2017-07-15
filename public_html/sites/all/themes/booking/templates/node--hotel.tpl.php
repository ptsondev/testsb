<?php //echo snh_social_share(); ?>
<article class="<?php print $classes; ?> hotel-body" data-nid="<?php print $node->nid; ?>" >
 
  <div class="col-sm-12">
 
    <div id="hotel-address">
        <i class="fa fa-home" aria-hidden="true"></i> <?php echo $node->field_address[LANGUAGE_NONE][0]['value']; ?>
        <a href="#data" id="showMap">View on map</a>
        <div style="display:none">
            <div id="data">            
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAPKEY;?>"></script>
                <div id="map-canvas" style="width:100%; height:500px;"></div><div id="marker-tooltip"></div>
                <?php
                    $item = db_query('SELECT * FROM items WHERE nid=:nid', array(':nid'=>$node->nid))->fetchObject();
                    //var_dump($item);
                    if($item){
                        echo '<script>initialize(' . $item->lat . ', ' . $item->lng . ');</script>';
                        echo '<script>addMarker(' . $item->nid . ',' . $item->lat . ', ' . $item->lng . ', "",  "");</script>';        
                    }
                ?>                
            </div>
        </div>
        
        <div id="tripadvisor-rating" class="pull-right">            
            <div class="rateYo" data-rating="<?php echo ($node->field_tripadvisor_rating[LANGUAGE_NONE][0]['average']/20); ?>"></div>           
        </div>
    </div>  
    
      <div id="gallery" class="row">
          <?php display_photos_as_gallery($node); ?>
      </div>
      
      <div id="rooms-info">
          <?php 
          global $user;          
          foreach($node->field_room[LANGUAGE_NONE] as $room){
              $room = field_collection_item_load($room);
              echo '<div class="row room">';
                echo '<div class="col-sm-4 col-xs-12">';
                    echo '<img src="'.image_style_url('large', $room->field_image[LANGUAGE_NONE][0]['uri']).'">';
                echo '</div>';
                echo '<div class="col-sm-8 col-xs-12">';
                
                    echo '<h4>Phòng: '.$room->field_title[LANGUAGE_NONE][0]['value'].'</h4>';
                    echo '<div class="room-feature">'.$room->field_feature[LANGUAGE_NONE][0]['value'].'</div>';
                    echo '<div class="room-ppn"><label>Giá niêm yết theo ngày: </label> '. snh_display_price($room->field_price[LANGUAGE_NONE][0]['value']).'</div>';
                    $deal = db_query('SELECT * FROM deals WHERE uid=:uid AND hid=:hid AND rid=:rid AND status!=:deny', 
                        array(':uid'=>$user->uid, ':hid'=>$node->nid, ':rid'=>$room->item_id, ':deny'=>DEAL_DENY))->fetchObject();
                    if($deal){  // có provider deal cho user phong nay
                        $bkr = node_load($deal->bkrid);
                        echo '<div class="rdeal-hot"><label>Giá ưu đãi trọn gói cho chuyến đi của bạn: </label> <span class="price-total-deal">'. snh_display_price($deal->price).'</span></div>';
                        echo '<div class="deal-decide"><input class="form-submit" type="button" value="Book Now"> <input class="form-submit" type="button" value="Add to Wishlist"> <input class="form-submit" type="button" value="Deny"></div>';
                    }
                echo '</div>';
              echo '</div>';
              
          }
          ?>
      </div>
    

  </div> <!-- /content -->
  
</article> <!-- /article #node -->