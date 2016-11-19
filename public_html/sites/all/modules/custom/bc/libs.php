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