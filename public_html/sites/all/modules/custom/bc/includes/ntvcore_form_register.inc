<?php 


function ntvcore_form_register($form, &$form_state){
   
    //display_updated_fields(72);
    
    $form['#attributes']['class'][] = 'ntv-form';
    
    $form['email'] = array(
        '#type' => 'textfield',
        '#title' => t('Email'),
        /*'#attributes' => array(
            'placeholder' => t('Email'),
        ),*/
    );    
    $form['password'] = array(
        '#type' => 'password',
        '#maxlength' => 64,         
    );  
    $form['password'] = array(
        '#type' => 'password_confirm', 
        '#maxlength' => 64,     
    );
    
    $form['phone'] = array(
        '#type' => 'textfield',      
        '#title' => 'Số Điện Thoại',
    );
    /*     
    $form['dob'] = array(
        '#title' => 'Ngày Sinh',
        '#type' => 'date_popup',
        '#date_format' => 'd/m/Y',
        '#date_year_range' => '-100:+0',
        '#default_value' => 'YYYY-MM-DD 00:00:00',
    );
   
    $form['sex']=array(
        '#type' => 'radios',
        '#options' => array(SEX_FEMALE=>'Nữ', SEX_MALE=>'Nam', SEX_OTHER=>'Khác'),
        '#title' => 'Giới Tính',
        '#default_value' => SEX_OTHER
    );*/
	
	/*$form['my_captcha_element'] = array(
		'#type' => 'captcha',
	);*/

    $form['submit']=array(
        '#type' => 'submit',
        '#value' => 'Đăng Ký',
        '#attributes' => array(
            'class' => array('button'),            
        ),
    );
    return $form;
}

function ntvcore_form_register_validate($form, &$form_state){    
    $email = check_plain($form_state['values']['email']);
    $password = check_plain($form_state['values']['password']);
    $phone = check_plain($form_state['values']['phone']);
    //$dob = check_plain($form_state['values']['dob']);
    
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
    if(empty($password)){
        //form_set_error('password', 'Password không được để trống');
        $form_state['values']['password']='123456';
    }
    
    if(!empty($error)){
        drupal_set_message($error, 'error');
        $form_state['rebuild'] = TRUE;    
        return false;
    }
    return true;
}


function ntvcore_form_register_submit($form, &$form_state) {
    $email = check_plain($form_state['values']['email']);
    $password = check_plain($form_state['values']['password']);
    $phone = check_plain($form_state['values']['phone']);
    //$dob = check_plain($form_state['values']['dob']);
    //$sex = check_plain($form_state['values']['sex']);
    
    $account = new stdClass;
    $account->is_new = TRUE;
    $account->name = $email;
    module_load_include('inc', 'content', 'includes/password');
    $account->pass = user_hash_password($password);    
    $account->mail = $email;
    $account->field_phone[LANGUAGE_NONE][0]['value']=$phone;
    //$account->field_sex[LANGUAGE_NONE][0]['value']=$sex;
    //$account->field_dob[LANGUAGE_NONE][0]['value']=$dob;
    $account->status = TRUE;
    $account->roles = array(RID_CUSTOMER=>'Khách Hàng');
    $account->timezone = variable_get('date_default_timezone', '');
    user_save($account);
		
	// send mail
	$module = 'ntvcore';
	$key = 'ntv_register_manage';
	$language = language_default();

	// 1. To managers
	$to = 'son.tester@gmail.com';
	$from = variable_get('site_mail', 'son.tester@gmail.com');
	$params = array();
	$params['name'] = $email;
	$params['phone'] = $phone;
	$params['ip'] = $_SERVER['REMOTE_ADDR'];
	$result = drupal_mail($module, $key, $to, $language, $params, $from, TRUE);
	
	// 2. To customer
	$to = $email;
	$key = 'ntv_register_customer';
	$result = drupal_mail($module, $key, $to, $language, $params, $from, TRUE);
	

    drupal_set_message('Cám ơn quý khách đã đăng ký tài khoản trên Luatntv.vn. Quý khách vui lòng kiểm tra email và làm theo hướng dẫn để kích hoạt tài khoản.');
}
