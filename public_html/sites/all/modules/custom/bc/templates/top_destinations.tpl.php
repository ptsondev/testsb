<?php 
    $top_des = db_query_range('SELECT nid FROM node WHERE type=:type AND status=1', 0, 6, array(':type'=>'destination'))->fetchCol();
    $nodes = node_load_multiple($top_des);
    $destinations = array_values($nodes);
?>
<h2 class="col-sm-12" id="title-top-6-des">
    <i class="fa fa-heart-o" aria-hidden="true"></i> 
    Top 6 những điểm đến được yêu thích 
</h2>

<div id="top-des">    
    
    <div id="top-1" class="col-sm-6 col-xs-12">
        <a href="<?php echo url('node/'.$destinations[0]->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('width_2_height', $destinations[0]->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $destinations[0]->title; ?></div>
            </div>
        </a>
    </div>
    <div id="top-2" class="col-sm-6 col-xs-12">
        <a href="<?php echo url('node/'.$destinations[1]->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('width_2_height', $destinations[1]->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $destinations[1]->title; ?></div>
            </div>
        </a>
    </div>

    <div id="top-3" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$destinations[2]->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $destinations[2]->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $destinations[2]->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-4" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$destinations[3]->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $destinations[3]->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $destinations[3]->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-5" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$destinations[4]->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $destinations[4]->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $destinations[4]->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-6" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$destinations[5]->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $destinations[5]->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $destinations[5]->title; ?></div>
            </div>
        </a>        
    </div>
</div>