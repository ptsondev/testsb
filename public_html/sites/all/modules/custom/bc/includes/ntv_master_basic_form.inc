<?php 

function ntv_master_basic_form($form, &$form_state){
    $form['basic'] = array(
        '#type' => 'fieldset',
        '#title' => t('Thông tin cơ bản'), 
        '#collapsible' => TRUE, 
        '#collapsed' => TRUE,
    );
    $form['basic']['site_title']=array(
        '#collapsible' => FALSE,
        '#type' => 'textfield',
        '#title' => 'Tên website',
        '#default_value' => variable_get('site_name', 'Niềm Tin Việt')        
    );
    $form['basic']['ntv_facebook']=array(
        '#type' => 'textfield',
        '#title' => 'Link Facebook',
        '#default_value' => variable_get('ntv_facebook', 'https://facebook.com/')       
    );
    $form['basic']['ntv_google']=array(
        '#type' => 'textfield',
        '#title' => 'Link Google+',
        '#default_value' => variable_get('ntv_google', 'https://plus.google.com/')       
    );
    $form['basic']['ntv_youtube']=array(
        '#type' => 'textfield',
        '#title' => 'Link Youtube',
        '#default_value' => variable_get('ntv_youtube', 'https://youtube.com/')       
    );
     
    $form['contact'] = array(
        '#type' => 'fieldset',
        '#title' => t('Thông tin liên hệ'), 
        '#collapsible' => TRUE, 
        '#collapsed' => TRUE,
    );    
    $form['contact']['ntv_address']=array(
        '#type' => 'textfield',
        '#title' => 'Trụ sở 1 - Địa chỉ',
        '#default_value' => variable_get('ntv_address', '158 Điện Biên Phủ Phường 6 Quận 3, TP.HCM')
    );
    $form['contact']['ntv_phone']=array(
        '#type' => 'textfield',
        '#title' => 'Trụ sở 1 - Điện thoại',
        '#default_value' => variable_get('ntv_phone', '0908 111 222')
    );
    $form['contact']['ntv_address2']=array(
        '#type' => 'textfield',
        '#title' => 'Trụ sở 2 - Địa chỉ',
        '#default_value' => variable_get('ntv_address2', '158 Điện Biên Phủ Phường 6 Quận 3, TP.HCM')
    );
    $form['contact']['ntv_phone2']=array(
        '#type' => 'textfield',
        '#title' => 'Trụ sở 2 - Điện thoại',
        '#default_value' => variable_get('ntv_phone2', '0908 111 222')
    );
    $form['contact']['ntv_email']=array(
        '#type' => 'textfield',
        '#title' => 'Email',
        '#default_value' => variable_get('ntv_email', 'info.english@gmail.com')
    );
    
    
    $form['support'] = array(
        '#type' => 'fieldset',
        '#title' => t('Hỗ trợ trực tuyến'), 
        '#collapsible' => TRUE, 
        '#collapsed' => TRUE,
    );
    $form['support']['site_support_name']=array(
        '#type' => 'textfield',
        '#title' => 'Tên người hỗ trợ',
        '#default_value' => variable_get('site_support_name', 'Ms Tâm')
    );
	$form['support']['site_support_position']=array(
        '#type' => 'textfield',
        '#title' => 'Vai trò hỗ trợ',
        '#default_value' => variable_get('site_support_position', 'Tư vấn viên')
    );
    $form['support']['site_support_phone']=array(
        '#type' => 'textfield',
        '#title' => 'Số điện thoại hỗ trợ',
        '#default_value' => variable_get('site_support_phone', '0908 123 456')
    );
	$form['support']['site_support_phone_after']=array(
        '#type' => 'textfield',
        '#title' => 'Ngoài giờ',
        '#default_value' => variable_get('site_support_phone_after', '0902 841886')
    );
    $form['support']['site_support_skype']=array(
        '#type' => 'textfield',
        '#title' => 'Nick skype của người hỗ trợ',
        '#default_value' => variable_get('site_support_skype', 'tam.law')
    );
    
    $form['support']['site_support_name2']=array(
        '#type' => 'textfield',
        '#title' => 'Tên người hỗ trợ 2',
        '#default_value' => variable_get('site_support_name2', 'Ms Tâm')
    );
	$form['support']['site_support_position2']=array(
        '#type' => 'textfield',
        '#title' => 'Vai trò hỗ trợ 2',
        '#default_value' => variable_get('site_support_position2', 'Tư vấn viên')
    );
    $form['support']['site_support_phone2']=array(
        '#type' => 'textfield',
        '#title' => 'Số điện thoại hỗ trợ 2',
        '#default_value' => variable_get('site_support_phone2', '0908 123 456')
    );
	$form['support']['site_support_phone_after2']=array(
        '#type' => 'textfield',
        '#title' => 'Ngoài giờ 2',
        '#default_value' => variable_get('site_support_phone_after2', '0906 721886')
    );
    $form['support']['site_support_skype2']=array(
        '#type' => 'textfield',
        '#title' => 'Nick skype của người hỗ trợ 2',
        '#default_value' => variable_get('site_support_skype2', 'tam.law')
    );
	
	$form['support']['site_support_name3']=array(
        '#type' => 'textfield',
        '#title' => 'Tên người hỗ trợ 3',
        '#default_value' => variable_get('site_support_name3', 'Ms Tâm')
    );
	$form['support']['site_support_position3']=array(
        '#type' => 'textfield',
        '#title' => 'Vai trò hỗ trợ 3',
        '#default_value' => variable_get('site_support_position3', 'Tư vấn viên')
    );
    $form['support']['site_support_phone3']=array(
        '#type' => 'textfield',
        '#title' => 'Số điện thoại hỗ trợ 3',
        '#default_value' => variable_get('site_support_phone3', '0908 133 456')
    );
	$form['support']['site_support_phone_after3']=array(
        '#type' => 'textfield',
        '#title' => 'Ngoài giờ 3',
        '#default_value' => variable_get('site_support_phone_after3', '0906 721886')
    );
    $form['support']['site_support_skype3']=array(
        '#type' => 'textfield',
        '#title' => 'Nick skype của người hỗ trợ 3',
        '#default_value' => variable_get('site_support_skype3', 'tam.law')
    );
    
	
	$form['support']['site_support_name4']=array(
        '#type' => 'textfield',
        '#title' => 'Tên người hỗ trợ 4',
        '#default_value' => variable_get('site_support_name4', 'Ms Tâm')
    );
	$form['support']['site_support_position4']=array(
        '#type' => 'textfield',
        '#title' => 'Vai trò hỗ trợ 4',
        '#default_value' => variable_get('site_support_position4', 'Tư vấn viên')
    );
    $form['support']['site_support_phone4']=array(
        '#type' => 'textfield',
        '#title' => 'Số điện thoại hỗ trợ 4',
        '#default_value' => variable_get('site_support_phone4', '0908 143 456')
    );
	$form['support']['site_support_phone_after4']=array(
        '#type' => 'textfield',
        '#title' => 'Ngoài giờ 4',
        '#default_value' => variable_get('site_support_phone_after4', '0906 721886')
    );
    $form['support']['site_support_skype4']=array(
        '#type' => 'textfield',
        '#title' => 'Nick skype của người hỗ trợ 4',
        '#default_value' => variable_get('site_support_skype4', 'tam.law')
    );
	
    
    $form['submit']=array(
        '#type' => 'submit',
        '#value' => 'Save'        
    );
    return $form;
}
function ntv_master_basic_form_submit($form, &$form_state){
    $arr = array(
        'site_title', 
        'ntv_facebook',
        'ntv_google',
        'ntv_youtube',
        'ntv_address',
        'ntv_phone',
        'ntv_address2',
        'ntv_phone2',
        'ntv_email',
        'site_support_name',
        'site_support_phone',
        'site_support_skype',
		'site_support_position',
		'site_support_phone_after',
        'site_support_name2',
        'site_support_phone2',
        'site_support_skype2',
		'site_support_position2',
		'site_support_phone_after2',
		'site_support_name3',
        'site_support_phone3',
        'site_support_skype3',
		'site_support_position3',
		'site_support_phone_after3',
		'site_support_name4',
        'site_support_phone4',
        'site_support_skype4',
		'site_support_position4',
		'site_support_phone_after4',
		
		
    );
    foreach($form_state['values'] as $key=>$value){
        if(in_array($key, $arr)){
            variable_set($key, $value);
        }
    }
    // for text_format
    //variable_set('site_contact_register', $form_state['values']['site_contact_register']['value']);
}
