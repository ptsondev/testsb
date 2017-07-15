<div id="own-hotel">
    <?php $own_hotels = get_own_hotels();
    echo '<div class="col-sm-6 col-xs-12">';
    echo '<label>Hotel</label> ';
    echo '<select id="osl-hotel">';
    foreach($own_hotels as $hotel){        
        echo '<option value="'.$hotel->nid.'">'.$hotel->title.'</option>';        
    }
    
    echo '</select>';
    echo '</div>';
    
    echo '<div class="col-sm-6 col-xs-12">';
    echo '<label>Room</label> ';
    $first_hotel=node_load($own_hotels[0]->nid);
    echo '<select id="osl-room">';
    foreach($first_hotel->field_room[LANGUAGE_NONE] as $k){
        $room = field_collection_item_load($k);
        echo '<option data-price="'.snh_display_price($room->field_price[LANGUAGE_NONE][0]['value']).'" value="'.$room->item_id.'">'.$room->field_title[LANGUAGE_NONE][0]['value'].'</option>';                
    }
    echo '</select>';
    echo '</div>';
    
    $first_room =  field_collection_item_load($first_hotel->field_room[LANGUAGE_NONE][0]);
    echo '<div class="col-sm-6 col-xs-12">';
    echo '<label>Price Per Night</label> <span id="or-ppn">'.snh_display_price($first_room->field_price[LANGUAGE_NONE][0]['value']).'</span>';
    echo '</div>';
    
    echo '<div class="col-sm-6 col-xs-12">';
    echo '<label class="focus">Price (Total)</label> ';
    echo '<input type="text" id="otxt-price" />';
    echo '</div>';
    
    echo '<input type="button" value="Confirm" id="btnConfirmDeal" />';
    ?>
</div>