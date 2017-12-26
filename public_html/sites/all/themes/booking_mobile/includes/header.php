<?php global $base_url; 
    $ch = drupal_is_front_page()? '':'active';
?>
<div id="main-header">    
    <div id="header-r2" class="container <?php echo $ch;?>">
        <div id="site-logo"><a href="<?php echo $base_url;?>"><img src="<?php echo $logo; ?>" /></a></div>        
       
        <div id="suppermenu" class="pull-right">
            <div id="search-bar">
                <div id="btnShowSearch"></div>
                <input type="text" id="txtSearchKey" />
            </div>
            <i id="btnShowMenu" class="fa fa-bars" aria-hidden="true"></i>
             <?php if(user_is_logged_in()) {
                 global $user;
             ?>
            <a href="<?php echo url('user/'.$user->uid); ?>"><i id="btnShowUserNavi" class="logged-in" aria-hidden="true"></i></a>
            <a href="<?php echo url('user/logout'); ?>"><i id="btnSignOut" class="fa fa-sign-out" aria-hidden="true"></i></a>
             <?php }else{
                 echo '<i id="btnShowUserNavi" class="anonymous" aria-hidden="true"></i>';
             }?>
        </div>
        
        
        <ul class="nav navbar-nav" id="main-menu">              
                <?php if(user_is_logged_in()) { ?>
                    <li><a href="<?php echo url('travel-plan')?>">Kế Hoạch Du Lịch</a></li>                
                <?php } ?>
                
                <li><a href="<?php echo url('blog')?>">Blog Du Lịch</a></li>
        </ul>        
        
        
            <?php if (user_is_logged_in()) { 
                echo '<div id="user-navigation" class="logged-in">';
                global $user;
                echo '<a href="'.url('user/'.$user->uid).'" id="btnUser">'.$user->name.'</a>';
                echo '<a href="'.url('user/logout').'" id="btnUserExit"></a>';
                echo '<div style="display:none;"><a id="btn-changepass" href="#popup-changepass">Quên Mật Khẩu</a></div>';
                echo '<div class="popup" id="popup-changepass">';
                    echo '<div id="p-register-right">';
                        echo theme('sb_custom_change_password');
                    echo '</div>';
                    echo '<div id="p-register-left"></div>';
                    
                echo '</div>';
            } else { // user is anonymous 
              echo '<div id="user-navigation">';
                $form = drupal_get_form('user_login');
                echo drupal_render($form);
                echo '<div class="popup" id="popup-register">';                    
                    echo '<div id="p-register-right">';
                        //$form = drupal_get_form('user_register_form');
                        //echo drupal_render($form);
                        echo theme('sb_custom_register');
                        echo '<h4 class="line">Hoặc</h4>';
                        //echo fboauth_action_display('connect');
                        echo '<a id="btnFbConnect" href="'.url('user/simple-fb-connect').'"></a>';
                    echo '</div>';
                    echo '<div id="p-register-left"></div>';
                echo '</div>';
                
                echo '<div class="popup" id="popup-forgetpass">';                    
                    echo '<div id="p-register-right">';
                        echo theme('sb_custom_forgot_password');
                    echo '</div>';
                    echo '<div id="p-register-left"></div>';
                echo '</div>';
                                
            }
            ?>				                 
        </div>        
    </div> 
</div>

<?php if(drupal_is_front_page()){ ?>
<div id="home-slide">
            <ul class="rslides">
                <li><img src="<?php echo PATH_TO_IMAGES; ?>banner1.png" /></li>
                <li><img src="<?php echo PATH_TO_IMAGES; ?>banner2.png" /></li>
                <li><img src="<?php echo PATH_TO_IMAGES; ?>banner3.png" /></li>
                <!--<li><img src="<?php echo PATH_TO_IMAGES; ?>banner1.png" /><div class="slide-content"><h4>Nha Trang</h4><div class="des">Chém gió... chém cho có.</div></div></li>-->
            </ul>
        </div>
<?php } ?>