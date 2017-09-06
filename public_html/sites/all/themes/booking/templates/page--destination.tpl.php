<?php 
include_once(PATH_TO_INCLUDES . 'header.php');
$des_bg = image_style_url('width_2_height', $node->field_background[LANGUAGE_NONE][0]['uri']);
?>

<div id="des-bg" style="background: url('<?php echo $des_bg; ?>') no-repeat center center;">
    <div id="des-bg2"></div>
</div>

<main id="main-region" class="des-main-region">
    <div class="main-wrapper inner container">        
        <div id="main-des-wrapper">            
            <div class="row">
            
            <?php $class = 'col-md-9 col-sm-12';
            if(empty($page['sidebar_first'])){
                $class='col-md-12 col-sm-12';
            }
            ?>
            <div id="main-content" class="<?php echo $class; ?> col-xs-12">
                <div id="r21">
                    <h1 id="des-title"><?php echo $title;?></h1> 
                    <a href="#popup-location" id="btnShowLocation"></a>
                    <?php 
                    $url = $base_url.url('node/'.$node->nid); ?>
                    <a href="http://www.facebook.com/share.php?u=<?php echo $url ?>&title=[<?php echo $node->title;?>]" id="btnShare"></a>    
                    
                    <div class="pull-right"><label id="lblrate">Đánh giá <span class="num">4/</span></label><div id="des-rStar"></div></div>
                </div>
                <div id="popup-location" style="display: none;">Map here</div>
                
                <div id="des-r32">
                    <div class="item tempo">
                        <div class="icon"></div>
                        <div class="info">
                            <div class="key">Thời Tiết</div>
                            <div class="value">25-30*C</div>
                        </div>
                    </div>
                    
                    <div class="item tour">
                        <div class="icon"></div>
                        <div class="info">
                            <div class="key">Tour hiện có</div>
                            <div class="value">3 Tours</div>
                        </div>
                    </div>
                    
                    <div class="item hotel">
                        <div class="icon"></div>
                        <div class="info">
                            <div class="key">Giá khách sạn trung bình</div>
                            <div class="value">635.488₫ -  2.483.315₫</div>
                        </div>
                    </div>
                </div>
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
            <?php
            if(!empty($page['sidebar_first'])){
                echo '<div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">';
                //echo render($page['sidebar_first']);
                
                    echo '<div id="galery-wrapper2"><div id="galery-wrapper"><a id="btnShowPhotos" href="#popup-photos"><div id="des-photos-galery">';
                        echo '<h3>Hình ảnh <label>( '.count($node->field_photos[LANGUAGE_NONE]).' hình)</label></h3>';
                        if(isset($node->field_photos[LANGUAGE_NONE][0])){
                            echo '<img src="'.image_style_url('square', $node->field_photos[LANGUAGE_NONE][0]['uri']).'">';                            
                        }
                        if(isset($node->field_photos[LANGUAGE_NONE][1])){
                            echo '<img class="p50 left" src="'.image_style_url('square', $node->field_photos[LANGUAGE_NONE][1]['uri']).'">';                            
                        }
                        if(isset($node->field_photos[LANGUAGE_NONE][2])){
                            echo '<img class="p50 right" src="'.image_style_url('square', $node->field_photos[LANGUAGE_NONE][2]['uri']).'">';                            
                        }
                    echo '</div><a></div></div>';
                echo '</div>';
                
                echo '<div id="popup-photos" style="display:none;">';
                    display_photos_as_gallery($node);    
                echo '</div>';
            }
            ?>
            </div>
        </div>
    </div>
</main>


<?php include_once(PATH_TO_INCLUDES . 'footer.php');  ?>