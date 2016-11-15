<?php global $base_url; ?>
<div id="main-header">
    <div id="header-r1">
        <div class="container">
            <nav id="secondary-menu">
                <li><a href="<?php echo $base_url;?>">Trang Chủ</a></li>
                <li><a href="">Giới Thiệu</a></li>
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

    <div id="menu-region">
        <div class="container">
            <nav id="main-menu">
                <li><a href="">Tìm kiếm</a></li>
                <li><a href="">Địa điểm hot</a></li>
                <li><a href="">Item 3</a></li>
                <li><a href="">Item 4</a></li>
            </nav>
        </div>
    </div>
</div>