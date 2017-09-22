<?php
if(!$uid){
    $uid = arg(1);    
}
$account = user_load($uid);
?>


<div id="user-profile">
    <?php
        echo '<div id="profile-top" style="background:url('.file_create_url($account->field_cover[LANGUAGE_NONE][0]['uri']).');">';
          
            
            echo '<div id="avatar">';
            if(!empty($account->field_avatar[LANGUAGE_NONE])){
                echo '<img src="'.image_style_url('square', $account->field_avatar[LANGUAGE_NONE][0]['uri']).'" />';
            }
            echo '</div>';
                    
        
            $name = $account->name;
            if(!empty($account->field_full_name[LANGUAGE_NONE])){
                $name = $account->field_full_name[LANGUAGE_NONE][0]['value'];
            }

            echo '<h2 id="fullname">'.$name.'</h2>';
            
            echo '<div id="user-tools">';                
                echo '<a href="'.url('user/'.$uid).'" class="form-submit">'.t('Home').'</a>';
                global $user;
                if($user->uid == $uid){
                    echo '<a href="'.url('user/'.$uid.'/update').'" class="form-submit">'.t('Update Profile').'</a>';
                    echo '<a href="'.url('add-new-post').'" class="form-submit">'.t('Add new post').'</a>';                    
                }else{
                    //echo '<a href="" class="form-submit">'.t('Friend Request').'</a>';
                    echo flag_create_link('follow', $uid);   
                    echo '<a href="'.url('user/'.$uid.'/info').'" class="form-submit">'.t('View Profile').'</a>';
                }                
            echo '</div>';
        echo '</div>';
    ?>
        
</div>