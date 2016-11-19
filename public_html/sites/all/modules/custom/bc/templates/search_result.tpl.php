
<?php
$key = $_REQUEST['key'];
echo '<h1>'.t('Search result for: ') . $key.'</h1>';

echo '<h3>Địa điểm</h3>';
echo '<div class="row" id="search-results">';
$nids = db_query('SELECT nid FROM node WHERE type=:type AND title LIKE :key', 
    array(':type'=>'destination', ':key'=>'%' . db_like($key) . '%'))->fetchCol();

   $nodes = node_load_multiple($nids);
   foreach($nodes as $node){
        echo '<div class="des item col-sm-6 col-xs-12">';
            echo '<a href="'.url('node/'.$node->nid).'">';
                echo '<img src="'.image_style_url('width_2_height', $node->field_photos[LANGUAGE_NONE][0]['uri']).'" />';
                echo '<div class="title">'.$node->title.'</div>';
            echo '</a>';    
        echo '</div>';
   }
echo '</div>';
echo '<div class="clearfix"></div>';
echo '<h3>Kế hoạch du lịch</h3>';   

