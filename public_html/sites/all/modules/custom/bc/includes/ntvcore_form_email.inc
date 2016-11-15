<?php 

function ntvcore_form_email($form, &$form_state){
    $form['email'] = array(
        '#type' => 'textfield',
        '#title' => '',  
        '#id' => 'txtReceiveEmail',
        '#attributes' => array('placeholder'=>'Nhập e-mail của bạn')
    );
   
    $form['submit']=array(
        '#type' => 'submit',
        '#value' => '',
        '#id' => 'btnSendReceiveEmail',
    );
    return $form;
}

function ntvcore_form_email_validate($form, &$form_state){
    if(!valid_email_address($form_state['input']['email'])){
        form_set_error('email', 'Email không hợp lệ, vui lòng kiểm tra lại');
    }
}

function ntvcore_form_email_submit($form, &$form_state){
    $node = node_load(NID_REGISTER_RECEIVE_MAIL);
    $k = count($node->field_email_register[LANGUAGE_NONE]);
    $node->field_email_register[LANGUAGE_NONE][$k]['value']= $form_state['input']['email'];
    node_save($node);
    drupal_set_message('Cám ơn quý khách đã đăng ký nhận văn bản luật cập nhật từ Luật NTV. Chúng tôi biết chúng tôi không phải là công ty luật lớn nhất nhưng chúng tôi đang cố gắng từng ngày để thực hiện sứ mạng phụng sự cộng đồng doanh nghiệp, góp sức cải thiện môi trường kinh doanh Việt Nam ngày càng ĐÚNG LUẬT, AN TOÀN và CHUYÊN NGHIỆP hơn.');
}
