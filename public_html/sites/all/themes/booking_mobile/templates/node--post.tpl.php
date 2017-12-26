<?php

//drupal_goto('user/'.$node->uid);
//return;
$uid = $node->uid;
$account = user_load($uid);

echo '<h1>' . $node->title . '</h1>';
 echo '<div class="post-created created">' . date('d-M-Y h:i:s', $node->created) . '</div>';
 echo '<div class="post-content">' . $node->field_content[LANGUAGE_NONE][0]['value'] . '</div>';

        
?>