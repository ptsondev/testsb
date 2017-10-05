<?php

?>

<?php
$nids = db_query_range('SELECT nid FROM node WHERE type=:type AND status=1 ORDER BY created DESC', 0, 30, array(':type' => 'post'))->fetchCol();
$posts = node_load_multiple($nids);

foreach ($posts as $post) {
    $account = user_load($post->uid);
    echo '<div class="u-post" id="u-post-'.$post->nid.'">';
        echo '<div class="u-post-info">';
            echo '<div class="row">';
                echo '<div class="col-sm-1 col-xs-2"><a href="'.url('user/'.$post->uid).'"><img src="'.image_style_url('square', $account->field_avatar[LANGUAGE_NONE][0]['uri']).'" /></a></div>';
                echo '<div class="col-sm-11 col-xs-10">';
                    echo '<a href="'.url('user/'.$post->uid).'">'.getUserName($account).'</a>';
                    echo '<div class="u-post-date">'. date('d-M-Y h:i:s', $post->created).'</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        
        echo '<div class="u-post-main">';  
            echo '<div class="sum">';
                echo $post->field_summary[LANGUAGE_NONE][0]['value'];
            echo '</div>';    
            
            echo '<div class="post-main-content row">';         
                echo '<div class="col-sm-4"><img src="'.image_style_url('width_2_height',$post->field_image[LANGUAGE_NONE][0]['uri']).'" /></div>';
                echo '<div class="col-sm-8">';
                    echo '<h3 class="u-post-title">' . $post->title . '</h3>';
                    echo text_summary($post->field_content[LANGUAGE_NONE][0]['value'], $format = NULL, $size = 150).'...';
                echo '</div>';
            echo '</div>';
        echo '</div>';

        echo '<div class="u-post-tool">';
            echo '<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script>';
            echo '<div class="fb-like" data-href="'.url('node/'.$post->nid).'" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>';
            
            
        echo '</div>';
        
       $cur_url = url('node/'.$post->nid, array('absolute' => TRUE)); 
                    echo '<div class="fb-comments" data-href="'.$cur_url.'" data-numposts="5"></div> ';             
        
        
    echo '</div>';
}
?>