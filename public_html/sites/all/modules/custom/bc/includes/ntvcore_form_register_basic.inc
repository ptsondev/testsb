<?php 


function ntvcore_form_register_basic($form, &$form_state){
   
    //display_updated_fields(72);
    
    $form['#attributes']['class'][] = 'ntv-form';
    
    $form['email'] = array(
        '#type' => 'textfield',
        '#title' => t('Email'),
    );    
      
    $form['phone'] = array(
        '#type' => 'textfield',      
        '#title' => 'Số Điện Thoại',
    );  

    $form['submit']=array(
        '#type' => 'submit',
        '#value' => 'Đăng Ký',
        '#attributes' => array(
            'class' => array('button'),            
        ),
    );
    return $form;
}

function ntvcore_form_register_basic_validate($form, &$form_state){    
    $email = check_plain($form_state['values']['email']);
    $phone = check_plain($form_state['values']['phone']);
    
    $error='';
    if(empty($email) || !valid_email_address($email)){
        //$error.='<li>Vui lòng điền họ tên</li>';
        form_set_error('email', 'Vui lòng kiểm tra lại Email');
    }else{
        $tmp = user_load_by_mail($email);
        if($tmp){
            form_set_error('email', 'Email đã được đăng ký, vui lòng sử dụng email khác');
        }
    }   
    
    if(!empty($error)){
        drupal_set_message($error, 'error');
        $form_state['rebuild'] = TRUE;    
        return false;
    }
    return true;
}


function ntvcore_form_register_basic_submit($form, &$form_state) {
    $email = check_plain($form_state['values']['email']);
    $password = DEFAULT_PASSWORD;
    $phone = check_plain($form_state['values']['phone']);
    
    $account = new stdClass;
    $account->is_new = TRUE;
    $account->name = $email;
    module_load_include('inc', 'content', 'includes/password');
    $account->pass = user_hash_password($password);    
    $account->mail = $email;
    $account->field_phone[LANGUAGE_NONE][0]['value']=$phone;
    $account->status = TRUE;
    $account->roles = array(RID_CUSTOMER=>'Khách Hàng');
    $account->timezone = variable_get('date_default_timezone', '');
    user_save($account);
		
    global $user;
    $user=$account;
    confirm_tlm_addition_service();
    //drupal_set_message('Đã cập nhật Vui lòng xác nhận lại đơn hàng');
}
