<?php   
include_once(PATH_TO_INCLUDES . 'header.php');
$avatar = image_style_url('square', $node->field_background[LANGUAGE_NONE][0]['uri']);
?>

<main id="main-region" class="tour-main-region">
    <div class="main-wrapper inner container">    
        <div id="main-tour-content" class="col-md-9 col-sm-12">
            <div id="tour-r1">
                <div class="col-sm-3"><img src="<?php echo $avatar; ?>" /></div>
                <div class="col-sm-5">            
                    <h1><?php echo $node->title; ?></h1>                    
                </div>
                <div class="col-sm-4">
                    <div class="r1"><?php echo '<div class="fb-like" data-href="'.url('node/'.$node->nid).'" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>';?></div>                    
                </div>            
            </div>
            
            <div id="tour-r2">
                <div id="first-row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-5">            
                        <?php $rate = $node->field_newtravelex_rating[LANGUAGE_NONE][0]['average']; ?>
                        <label id="lblrate">Đánh giá <span class="num"><?php echo ($rate/20); ?></span>/</label><div id="tour-rStar" class="my-rate"></div>
                    </div>
                    <div class="col-sm-4">
                        <span id="btnAddToFavorite" data-nid="<?php echo $node->nid;?>"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        <input type="button" value="Điều chỉnh lại tour này" id="btnCustomTour" class="form-submit">
                    </div>    
                </div>
                <div class="clearfix"></div>
                <div id="next-tour-detail">
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
        </div>
        
        <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">
            <?php 
                $des = node_load($node->field_destination[LANGUAGE_NONE][0]['nid']);
                
               
                    echo '<div id="galery-wrapper2"><div id="galery-wrapper"><a id="btnShowPhotos" href="#popup-photos"><div id="des-photos-galery">';
                        echo '<h3>Hình ảnh <label>( '.count($des->field_photos[LANGUAGE_NONE]).' hình)</label></h3>';
                        if(isset($des->field_photos[LANGUAGE_NONE][0])){
                            echo '<img src="'.image_style_url('square', $des->field_photos[LANGUAGE_NONE][0]['uri']).'">';                            
                        }
                        if(isset($des->field_photos[LANGUAGE_NONE][1])){
                            echo '<img class="p50 left" src="'.image_style_url('square', $des->field_photos[LANGUAGE_NONE][1]['uri']).'">';                            
                        }
                        if(isset($des->field_photos[LANGUAGE_NONE][2])){
                            echo '<img class="p50 right" src="'.image_style_url('square', $des->field_photos[LANGUAGE_NONE][2]['uri']).'">';                            
                        }
                    echo '</div><a></div></div>';
                
                echo '<div id="popup-photos" style="display:none;">';
                    display_photos_as_gallery($des);    
                echo '</div>';
            ?>
        </div>
        
    </div>
</main>


<?php include_once(PATH_TO_INCLUDES . 'footer.php');  ?>
