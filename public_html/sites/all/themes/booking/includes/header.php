<?php global $base_url; 
    $ch = drupal_is_front_page()? '':'active';
?>
<div id="main-header">    
    <div id="header-r2" class="container <?php echo $ch;?>">
        <div id="site-logo"><a href="<?php echo $base_url;?>"><img src="<?php echo $logo; ?>" /></a></div>
        <div id="main-menu-region">    
            <i id="btnShowMenu" class="fa fa-bars" aria-hidden="true"></i>
            <!--<i id="btnShowUserNavigation" class="fa fa-user-circle" aria-hidden="true"></i>-->
            <ul class="nav navbar-nav" id="main-menu">              
                <?php //if(user_is_logged_in()) { ?>
                <li class="dropdown-submenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kế hoạch du lịch
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu dep-2"> 
                        <li><a href="">Danh sách yêu thích</a></li>                                             
                        <li><a href="">Đang thực hiện</a></li>                
                        <li><a href="">Đã hoàn thành</a></li>   
                    </ul>
                </li>
                <?php //} ?>
                
                <li><a href="<?php echo url('blog')?>">Blog Du Lịch</a></li>
            </ul>                       
        </div>   
        
        <div id="user-navigation">
            <?php if (user_is_logged_in()) { ?>
                <li><a href="<?php echo url('user'); ?>">Trang cá nhân</a></li>
                <li><a href="<?php echo url('user/logout'); ?>">Thoát</a></li>
            <?php
            } else { // user is anonymous 
                $form = drupal_get_form('user_login');
                echo drupal_render($form);
                echo '<div class="popup" id="popup-register">';
                    echo '<div id="p-register-left"></div>';
                    echo '<div id="p-register-right">';
                        $form = drupal_get_form('user_register_form');
                        echo drupal_render($form);
                        echo '<h4 class="line">Hoặc</h4>';
                        echo fboauth_action_display('connect');
                    echo '</div>';
                echo '</div>';
            }
            ?>				                 
        </div>        
    </div>

    <?php if(drupal_is_front_page()){ ?>
    <div id="search-region">
        <div class="container">

            <!--<input type="text" id="txtSearchPlace" placeholder="Bạn muốn du lịch ở đâu?" />-->
           <?php $form =drupal_get_form('bcform_search_destination'); echo drupal_render($form);
           
           //$results = db_query('SELECT title FROM node WHERE title COLLATE Latin1_general_CI_AI LIKE :key', array(':key'=>'%' . db_like($key) . '%'))->fetchCol();
           //var_dump($results);die;
            ?>
        </div>

        <div id="home-slide">
            <ul class="rslides">
                <li><img src="<?php echo PATH_TO_IMAGES; ?>banner1.png" /></li>
                <li><img src="<?php echo PATH_TO_IMAGES; ?>banner1.png" /></li>
                <li><img src="<?php echo PATH_TO_IMAGES; ?>banner1.png" /></li>
                <!--<li><img src="<?php echo PATH_TO_IMAGES; ?>banner1.png" /><div class="slide-content"><h4>Nha Trang</h4><div class="des">Chém gió... chém cho có.</div></div></li>-->
            </ul>
        </div>

    </div>
    <?php } ?>
</div>