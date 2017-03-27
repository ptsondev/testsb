<?php
$nids = db_query_range('SELECT nid FROM node WHERE type=:type AND status=1', 0, 10, array(':type' => 'post'))->fetchCol();
$posts = node_load_multiple($nids);

foreach ($posts as $post) {
    echo '<div class="u-post" id="u-post-'.$post->nid.'">';
        echo '<div class="u-post-info">';
            echo '<div class="row">';
                $account = user_load($post->uid);
                echo '<div class="col-sm-1 col-xs-2"><a href="'.url('user/'.$post->uid).'"><img src="'.image_style_url('square', $account->field_avatar[LANGUAGE_NONE][0]['uri']).'" /></a></div>';
                echo '<div class="col-sm-11 col-xs-10">';                    
                    echo '<a href="'.url('user/'.$post->uid).'">'.getUserName($account).'</a>';
                    echo '<div class="u-post-date">'. date('d-M-Y h:i:s', $post->created).'</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        
        echo '<div class="u-post-main">';        
            echo '<h3 class="u-post-title"><a href="'.url('node/'.$post->nid).'">' . $post->title . '</a></h3>';
            display_node_summary($post);
        echo '</div>';

        echo '<div class="u-post-tool">';
            echo '<i class="fa fa-comments" aria-hidden="true" data-nid="'.$post->nid.'"> Comment</i>';
                        
            //echo flag_create_link('like', $post->nid);            
            echo '<div class="fb-like" data-href="'.url('node/'.$post->nid).'" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>';
        echo '</div>';
        
        $form = drupal_get_form("comment_node_post_form", (object) array('nid' => $post->nid));
        print drupal_render($form);
        
        $cids = comment_get_thread($post, COMMENT_MODE_THREADED, 15);
        $comments = comment_load_multiple($cids);
        foreach($comments as $comment){
            //var_dump($comment);
            echo '<div class="u-post-comment">';
                $account_comment = user_load($comment->uid);
                echo '<div class="user-info row">';                    
                    echo '<div class="col-sm-1 col-xs-2"><a href="'.url('user/'.$comment->uid).'"><img src="'.image_style_url('square', $account_comment->field_avatar[LANGUAGE_NONE][0]['uri']).'" /></a></div>';
                    echo '<div class="col-sm-11 col-xs-10">';
                        echo '<a href="'.url('user/'.$comment->uid).'">'.getUserName($account_comment).'</a> <span class="comment-body">'.$comment->comment_body[LANGUAGE_NONE][0]['value'].'</span>';
                        echo '<div class="u-post-date">'. date('d-M-Y h:i:s', $comment->created).'</div>';
                    echo '</div>';
                echo '</div>';
                
            echo '</div>';
        }
        
    echo '</div>';
}
?>