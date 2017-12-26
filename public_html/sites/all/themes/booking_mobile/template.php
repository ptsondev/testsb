<?php
function booking_mobile_preprocess_page(&$variables) {
    if (isset($variables['node']->type)) {
        $nodetype = $variables['node']->type;
        $variables['theme_hook_suggestions'][] = 'page__' . $nodetype;
    }
    /*echo '<pre>';
    var_dump($variables);
    echo '</pre>';*/
}
