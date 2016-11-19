<?php global $base_url; ?>
<div id="main-header">
    <div id="header-r1">
        <div class="container">
            <nav id="secondary-menu">
                <li><a href="<?php echo $base_url;?>">Trang Chủ</a></li>
                <li><a href="">Travel Book</a></li>
                <li><a href="">Travel Plan</a></li>
                <li><a href="">Travel Blog</a></li>
                <li><a href="">Liên Hệ</a></li>				
            </nav>

            <div id="user-navigation">
				<?php if(user_is_logged_in()) { ?>
					<li><a href="<?php echo url('user');?>">Trang cá nhân</a></li>
					<li><a href="<?php echo url('user/logout');?>">Thoát</a></li>
				<?php }else{ // user is anonymous ?>				
					<li><a id="btn-login" href="<?php echo url('user/login');?>">Đăng nhập</a></li>
					<li><a href="<?php echo url('user/register');?>">Đăng ký</a></li>                
					<?php echo theme('custom_login_area'); 	
				}
				?>
            </div>
        </div>
    </div>

    <div id="header-r2">
        <div class="container">
            <div id="site-logo"><a href="<?php echo $base_url;?>">Smart Booking</a></div>
            <div id="site-slogan">Slogan gì gì đó abc xyz</div>
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
    </div>
    <?php } ?>
</div>