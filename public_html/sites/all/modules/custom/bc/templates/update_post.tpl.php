<?php 
module_load_include('inc', 'node', 'node.pages');
$node = node_load(arg(3));
$form = drupal_get_form('post_node_form', $node);
echo drupal_render($form);
?>