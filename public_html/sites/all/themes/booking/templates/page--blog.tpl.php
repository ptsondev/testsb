<?php include_once(PATH_TO_INCLUDES . 'header.php'); ?>
<?php  
global $user;
$account = user_load($user->uid); 

echo '<div id="profile-top" style="background:url('.file_create_url($account->field_cover[LANGUAGE_NONE][0]['uri']).');"></div>'; 
?>
        
<main id="main-region" class="p-user">
    <div class="main-wrapper inner container">
        <div class="row">            
            <div id="main-content" class="col-sm-9 col-xs-12">
                <div id="pu-controls">
               
                    <form style="display: none;" method="POST" id="frmUUpdateCover" action="<?php echo url('ajax-process');?>" enctype="multipart/form-data">
                        <input type="hidden" value="updateCoverPhoto" name="action" />
                        <input type="file"  id="fileUpdateCover" name="fileUpdateCover" accept="image/*"/>
                    </form>
                    <a href="" id="btnUpdateCover" >Cập nhật cover</a>
                    <a href="<?php echo url('user/'.$account->uid.'/add-new-post');?>">Tạo bài viết</a>                    
                </div>
                <div id="pu-content">
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
            </div>
            
            
            <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">
                <div id="pu-sidebar-wrapper-1">
                    <div id="pu-sidebar-wrapper-2">
                        <div id="user-profile-sidebar">
                            <?php
                             echo '<div id="avatar">';
                             //var_dump($account->field_avatar[LANGUAGE_NONE][0]['fid']);
                             //$x = file_load(4759);
                             //var_dump($x);
                                $ava = '/'.PATH_TO_IMAGES.'avatar.png';
                                if(!empty($account->field_avatar[LANGUAGE_NONE])){
                                    $ava = image_style_url('square', $account->field_avatar[LANGUAGE_NONE][0]['uri']);
                                }
                                echo '<img src="'.$ava.'" />';
                            echo '</div>';
                            echo '<div class="u-name">'.getUserName($account).'</div>';
                            echo '<div class="u-slogan">"'.$account->field_slogan[LANGUAGE_NONE][0]['value'].'"</div>';
                            
                            if(check_if_user_can_update_info($account->uid)){
                            ?>
                            <div class="u-update-info"><a href="#popup-update-info" id="btnPopupUpdateInfo">Thay đổi thông tin cá nhân</a></div>
                            <div class="u-update-password"><a href="#popup-update-password" id="btnPopupUpdatePassword">Thay đổi mật khẩu</a></div>
                            
                            <div style="display: none;" id="popup-update-info"><?php echo theme('user_update_info');?></div>
                            <div style="display: none;" id="popup-update-password"><?php echo theme('user_update_password');?></div>
                            <?php } // end if?>
                        </div>
                    </div>
                </div>
                
            </div>            
        </div>
    </div>
</main>


<?php include_once(PATH_TO_INCLUDES . 'footer.php');  ?>
