<?php global $base_url; 
    $ch = drupal_is_front_page()? '':'active';
?>
<div id="main-header">    
    <div id="header-r2" class="<?php echo $ch;?>">
        <div id="site-logo"><a href="<?php echo $base_url;?>">Smart Booking</a></div>            
        <div id="main-menu-region">    
            <i id="btnShowMenu" class="fa fa-bars" aria-hidden="true"></i>
            <ul class="nav navbar-nav" id="main-menu">              
              <!--<li><a href="<?php echo $base_url;?>">Trang Chủ</a></li>                -->
                <li class="dropdown-submenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Travel Plan
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li class="dropdown-submenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Điểm đến du lịch
                        <span class="caret"></span></a>
                          <ul class="dropdown-menu dep-2"> 
                            <li><a href="">Điểm đến theo vị trí địa lý</a></li>                
                            <li><a href="">Điểm đến theo chủ đề</a></li>                
                          </ul>
                       </li>
                       <li class="dropdown-submenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kế hoạch du lịch của tôi
                        <span class="caret"></span></a>
                          <ul class="dropdown-menu dep-2"> 
                            <li><a href="">Đã thực hiện</a></li>                
                            <li><a href="">Đang thực hiện</a></li>                
                          </ul>
                        </li>                      
                    </ul>
               </li>

                <li><a href="">Travel Book</a></li>                
                <li><a href="">Travel Blog</a></li>
                <li><a href="">Liên Hệ</a></li>    
                <?php if(user_is_logged_in()) { ?>
					<li><a href="<?php echo url('user');?>">Trang cá nhân</a></li>
					<li><a href="<?php echo url('user/logout');?>">Thoát</a></li>
				<?php }else{ // user is anonymous ?>				
					<li><a id="btn-login" href="<?php echo url('user/login');?>">Đăng nhập</a></li>
					<li><a href="<?php echo url('user/register');?>">Đăng ký</a></li>                
					<?php echo theme('custom_login_area'); 	
				}
				?>
            </ul>
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
                <li><img src="<?php echo PATH_TO_IMAGES; ?>s1.jpg" /><div class="slide-content"><h4>Bình Thuận</h4><div class="des">Nắng vàng biển xanh.</div></div></li>
                <li><img src="<?php echo PATH_TO_IMAGES; ?>s2.jpg" /><div class="slide-content"><h4>Đà Lạt</h4><div class="des">Vùng đất nghỉ dưỡng.</div></div></li>
                <li><img src="<?php echo PATH_TO_IMAGES; ?>s3.jpg" /><div class="slide-content"><h4>Nha Trang</h4><div class="des">Chém gió... chém cho có.</div></div></li>
            </ul>
        </div>

    </div>
    <?php } ?>
</div>