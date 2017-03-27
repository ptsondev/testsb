<?php 
$account =user_load(arg(1));
module_load_include('pages.inc', 'user', 'user');
$form = drupal_get_form('user_profile_form', $account);
//var_dump($form);
//unset($form['roles']);
echo drupal_render($form);
?>