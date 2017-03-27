<?php

//drupal_goto('user/'.$node->uid);
//return;
$uid = $node->uid;
$account = user_load($uid);
echo theme('bc_user_header', array('uid' => $uid));

echo '<h1>' . $node->title . '</h1>';
echo '<div class="post-created created">' . date('d-M-Y h:i:s', $node->created) . '</div>';
echo '<div class="post-content">' . $node->field_content[LANGUAGE_NONE][0]['value'] . '</div>';

$form = drupal_get_form("comment_node_post_form", (object) array('nid' => $node->nid));
print drupal_render($form);
        
$cids = comment_get_thread($node, COMMENT_MODE_THREADED, 15);
$comments = comment_load_multiple($cids);
foreach ($comments as $comment) {
    //var_dump($comment);
    echo '<div class="u-post-comment">';
        $account_comment = user_load($comment->uid);
        echo '<div class="user-info row">';
            echo '<div class="col-sm-1 col-xs-2"><a href="' . url('user/' . $comment->uid) . '"><img src="' . image_style_url('square', $account_comment->field_avatar[LANGUAGE_NONE][0]['uri']) . '" /></a></div>';
            echo '<div class="col-sm-11 col-xs-10">';
            echo '<a href="' . url('user/' . $comment->uid) . '">' . getUserName($account_comment) . '</a> <span class="comment-body">' . $comment->comment_body[LANGUAGE_NONE][0]['value'] . '</span>';
            echo '<div class="u-post-date">' . date('d-M-Y h:i:s', $comment->created) . '</div>';
            echo '</div>';
        echo '</div>';

    echo '</div>';
}
?>