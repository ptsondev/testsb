<?php

function snh_display_price($price){
    return number_format(check_plain($price), 0, '.', '.').' ₫';
}

function can_view_personal_company_info($account){
    global $user;
    if($user->uid==1 || $user->uid == $account->uid){
        return TRUE;
    }
    if($account->field_business_travelers[LANGUAGE_NONE][0]['value']){
        return TRUE;
    }
    return FALSE;
}


function can_view_personal_payment_info($account){
    global $user;
    if($user->uid==1 || $user->uid == $account->uid){
        return TRUE;
    }
    if($account->field_show_payment_info[LANGUAGE_NONE][0]['value']){
        return TRUE;
    }
    return FALSE;
}

function bc_destination_autocomplete($key){
    $matches = array();


      $result = db_select('node', 'n')
        ->fields('n', array('title'))
        ->condition('title', '%' . db_like($key) . '%', 'LIKE')
        ->execute();

      // save the query to matches
      foreach ($result as $row) {
        $matches[$row->title] = check_plain($row->title);
      }

      // Return the result to the form in json
      drupal_json_output($matches);
}

function display_video($node, $width=760, $height=480){
    if(isset($node->field_video_youtube) && !empty($node->field_video_youtube[LANGUAGE_NONE])){
        $video = $node->field_video_youtube[LANGUAGE_NONE][0]['value'];    
        if(!$video){
            return;
        }
    
        $link = $video;
        if (strpos($link,'iframe') !== false) {
            $link =  str_replace('width="'.$width.'"', 'height="'.$height.'"', $link);
        }else{ // contain "watch"
            $link =  str_replace('watch?v=', 'embed/', $link);
                $link = '<div class="iframe-wrapper"><iframe width="'.$width.'" height="'.$height.'" src="'.$link.'" frameborder="0" allowfullscreen></iframe></div>';
        }
        echo $link;
        echo '<div class="clearfix"></div><br />';
    }
    
}

function display_photos_as_gallery($node){
    ?>
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1400px; height: 900px; overflow: hidden; visibility: hidden; background-color: #24262e;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
    <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1400px; height: 900px; overflow: hidden;">


    <?php 

    foreach($node->field_photos[LANGUAGE_NONE] as $m){
        echo '<div data-p="144.50" style="display:none;">';
        echo '<img data-u="image" src="'.file_create_url($m['uri']).'" />';
        echo '<img data-u="thumb" src="'.image_style_url('square', $m['uri']).'" />';
        echo '</div>';

    }    
        ?>

    </div>
    <!-- Thumbnail Navigator -->
    <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
    <!-- Thumbnail Item Skin Begin -->
    <div data-u="slides" style="cursor: default;">
    <div data-u="prototype" class="p">
    <div class="w">
    <div data-u="thumbnailtemplate" class="t"></div>
    </div>
    <div class="c"></div>
    </div>
    </div>
    <!-- Thumbnail Item Skin End -->
    </div>
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
    <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>

    <?php 
     /*echo render(field_view_field('node', $node, 'field_photos', array(
            'label'=>'hidden', 
             'type' => 'juicebox_formatter')));*/
    //echo render(field_view_field('field_collection_item', $node, 'field_photos',array( 'label'=>'hidden', 'type' => 'juicebox_formatter'))); 
}
function display_photos_as_images($node){
    $node=77; 
    if(isset($node->field_photos) && !empty($node->field_photos[LANGUAGE_NONE])){
        foreach($node->field_photos[LANGUAGE_NONE] as $row){
            echo '<img src="'.image_style_url('width_1200', $row['uri']).'" >';
        }
    }
}



/*  Location API */
function getData($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function getCoordinatesByAddress($address) {
    $address = str_replace(" ", "+", $address);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=" . MAPKEY;
    $data = json_decode(getData($url));	
	//var_dump($data);die;
    if (!$data->results)
        return null;
    $location = $data->results[0]->geometry->location;
    return $location;
}

function findByCoordinatesFromNear($from_lat, $from_lng, $r = MAP_R) {
    $sql = 'SELECT *, ( 3959 * acos( cos( radians(' . $from_lat . ') ) * cos( radians( from_lat ) ) * cos( radians( from_lng ) - radians(' . $from_lng . ') ) + sin( radians(' . $from_lat . ') ) * sin( radians( from_lat ) ) ) ) AS distance_1,'
            . '( 3959 * acos( cos( radians(' . $to_lat . ') ) * cos( radians( to_lat ) ) * cos( radians( to_lng ) - radians(' . $to_lng . ') ) + sin( radians(' . $to_lat . ') ) * sin( radians( to_lat ) ) ) ) AS distance_2'
            . ' FROM items HAVING distance_1 < ' . $r . ' AND distance_2 < ' . $r . ' ORDER BY distance_1';
    return db_query($sql)->fetchAll();
}


/* Location API  */

