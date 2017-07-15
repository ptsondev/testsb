<?php

function snh_display_price($price){
    return number_format(check_plain($price), 0, '.', '.').' ₫';
}

function snh_display_number($num){
    return number_format(check_plain($num), 0, ',', ',');
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
    <div id="hinhs-wrapper">
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

function display_node_summary($node){
    if(isset($node->field_summary) && !empty($node->field_summary[LANGUAGE_NONE])){
        echo $node->field_summary[LANGUAGE_NONE][0]['value'];
        return;
    }
    if(isset($node->field_content) && !empty($node->field_content[LANGUAGE_NONE])){
        echo text_summary($node->field_content[LANGUAGE_NONE][0]['value'], $format = NULL, $size = 100);
        return;
    }
    echo text_summary($node->body[LANGUAGE_NONE][0]['value'], $format = NULL, $size = 100);
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


function getUserName($account){
    return $account->name;
}

function s_is_mobile(){
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
        return true;
    }
    return false;        
}

/**
 * Get list hotel own by current users
 */
function get_own_hotels(){
    global $user;
    $hotels = db_query('SELECT nid, title FROM node WHERE TYPE=:type AND status=1 AND uid=:uid', array(
        ':type'=>'hotel', ':uid'=>$user->uid
    ))->fetchAll();
    return $hotels;    
}