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
                    <?php $rate = $node->field_newtravelex_rating[LANGUAGE_NONE][0]['average']; ?>
                    <div class="pull-right"><label id="lblrate">Đánh giá <span class="num"><?php echo ($rate/20); ?></span>/</label><div id="des-rStar" class="my-rate"></div></div>
                </div>
                <?php $map = $node->field_link_google_map[LANGUAGE_NONE][0]['value']; ?>
                <div id="location-wrapper" style="width:0;height:0;overflow:hidden;">
                    <div id="popup-location" style="">
                        <?php 
                        $item = getCoordinatesByAddress(   $node->title.' , Việt Nam');                        
                        $html ='';
                        $html.='<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='.MAPKEY.'"></script>';
                        $html.='<div id="map-canvas" style="width:800px; height:500px;"></div><div id="marker-tooltip"></div>';
                        $html.='<script>initialize(' . $item->lat . ', ' . $item->lng . ', 10);</script>';
                        //$html.='<script>addMarker(' . $item->nid . ',' . $item->lat . ', ' . $item->lng . ', "",  "");</script>';          
                        echo $html;
                        ?>
                    </div>
                </div>
                
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
                            <?php 
                                $count = db_query('SELECT count(*) FROM field_data_field_destination WHERE field_destination_nid=:nid AND bundle=:bundle', array(':nid'=>$node->nid, ':bundle'=>'tour'))->fetchField();
                            ?>
                            <div class="key">Tour hiện có</div>
                            <div class="value"><?php echo $count; ?> Tours</div>
                        </div>
                    </div>
                    <!--
                    <div class="item hotel">
                        <div class="icon"></div>
                        <div class="info">
                            <div class="key">Giá khách sạn trung bình</div>
                            <div class="value">635.488₫ -  2.483.315₫</div>
                        </div>
                    </div>
                    -->
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
