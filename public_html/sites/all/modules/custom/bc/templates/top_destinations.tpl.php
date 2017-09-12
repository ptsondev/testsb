<?php 
$destinations = views_get_view_result('top_6_destinations');
    
    $des_1 = node_load($destinations[0]->nid); 
    $des_2 = node_load($destinations[1]->nid); 
    $des_3 = node_load($destinations[2]->nid); 
    $des_4 = node_load($destinations[3]->nid); 
    $des_5 = node_load($destinations[4]->nid); 
    $des_6 = node_load($destinations[5]->nid); 
    $des_7 = node_load($destinations[6]->nid); 
    $des_8 = node_load($destinations[7]->nid); 
    $des_9 = node_load($destinations[8]->nid); 
    $des_10 = node_load($destinations[9]->nid); 
    //$des_11 = node_load($destinations[10]->nid); 
    //$des_12 = node_load($destinations[11]->nid); 
?>
<h2 class="col-sm-12 title-top" id="title-top-6-des">
    <i class="fa fa-heart-o" aria-hidden="true"></i> 
    Top 10 những điểm đến được yêu thích 
</h2>

<div id="top-des" class="list-top">    
    
    <div id="top-1" class="col-sm-6 col-xs-12">
        <a href="<?php echo url('node/'.$des_1->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('width_2_height', $des_1->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_1->title; ?></div>
            </div>
        </a>
    </div>
    <div id="top-2" class="col-sm-6 col-xs-12">
        <a href="<?php echo url('node/'.$des_2->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('width_2_height', $des_2->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_2->title; ?></div>
            </div>
        </a>
    </div>

    <div id="top-3" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_3->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_3->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_3->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-4" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_4->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_4->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_4->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-5" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_5->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_5->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_5->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-6" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_6->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_6->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_6->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-7" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_7->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_7->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_7->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-8" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_8->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_8->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_8->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-9" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_9->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_9->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_9->title; ?></div>
            </div>
        </a>        
    </div>
    <div id="top-10" class="col-sm-3 col-xs-12">
        <a href="<?php echo url('node/'.$des_10->nid);?>">
            <div class="top-des-wrapper">
                <img src="<?php echo image_style_url('square', $des_10->field_photos[LANGUAGE_NONE][0]['uri']);?>" />
                <div class="title"><?php echo $des_10->title; ?></div>
            </div>
        </a>        
    </div>
</div>