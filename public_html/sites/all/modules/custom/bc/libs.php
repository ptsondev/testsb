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

function display_video($node){
    if(isset($node->field_video_youtube) && !empty($node->field_video_youtube[LANGUAGE_NONE])){
        $video = $node->field_video_youtube[LANGUAGE_NONE][0]['value'];    
        if(!$video){
            return;
        }
    
        $link = $video;
        if (strpos($link,'iframe') !== false) {
            $link =  str_replace('width="760"', 'width="480"', $link);
        }else{ // contain "watch"
            $link =  str_replace('watch?v=', 'embed/', $link);
                $link = '<iframe width="760" height="480" src="'.$link.'" frameborder="0" allowfullscreen></iframe>';
        }
        echo $link;
        echo '<div class="clearfix"></div><br />';
    }
    
}

function display_photos_as_gallery($node){
    echo render(field_view_field('field_collection_item', $node, 'field_photos',array( 'label'=>'hidden', 'type' => 'juicebox_formatter'))); 
}
function display_photos_as_images($node){
    if(isset($node->field_photos) && !empty($node->field_photos[LANGUAGE_NONE])){
        foreach($node->field_photos[LANGUAGE_NONE] as $row){
            echo '<img src="'.image_style_url('width_1200', $row['uri']).'" >';
        }
    }
}
