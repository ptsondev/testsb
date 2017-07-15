<?php 
module_load_include('inc', 'fivestar' , 'includes/fivestar.theme');
function booking_request_form($form, &$form_state){    
    $form['site_title']=array(
        //'#collapsible' => FALSE,
        '#type' => 'textfield',
        '#title' => t('Where would you like to go?'),
        //'#default_value' => variable_get('site_name', 'Niềm Tin Việt')        
    );
    $form['xxx']=array(
        '#markup' => '<div class="fivestar-form-itexm">s</div>'
    );
    return $form;
}
