<?php 
module_load_include('inc', 'node', 'node.pages');
$content = node_add('post');
echo drupal_render($content);
?>