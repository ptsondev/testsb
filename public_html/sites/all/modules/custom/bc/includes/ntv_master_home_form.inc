<?php 

function ntv_master_home_form($form, &$form_state){
    
    $form['ntv_mission']=array(
        '#type' => 'text_format',
        '#title' => 'Tầm nhìn & sứ mệnh',
        '#default_value' => variable_get('ntv_mission', '')        
    );
    $form['ntv_why']=array(
        '#type' => 'text_format',
        '#title' => 'Lý do khách hàng chọn NTV?',
        '#default_value' => variable_get('ntv_why', '')        
    );
   
    $form['submit']=array(
        '#type' => 'submit',
        '#value' => 'Save'        
    );
    return $form;
}
function ntv_master_home_form_submit($form, &$form_state){
    $arr = array(
        'site_title', 
     
    );
    foreach($form_state['values'] as $key=>$value){
        if(in_array($key, $arr)){
            variable_set($key, $value);
        }
    }
    // for text_format
    variable_set('ntv_mission', $form_state['values']['ntv_mission']['value']);
    variable_set('ntv_why', $form_state['values']['ntv_why']['value']);
}
