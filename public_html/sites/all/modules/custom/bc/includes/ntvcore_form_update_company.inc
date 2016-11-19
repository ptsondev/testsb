<?php 


function ntvcore_form_update_company($form, &$form_state){
  
    $nid = find_company_by_user();
    //$nid = 60; //test
    if(!$nid){
        // user chua tung tao don hang thanh lap cong ty nao
    }
    $node = node_load($nid);
        
    $str = '';
    $str .='<div>Công ty: '.$node->field_company_name[LANGUAGE_NONE][0]['value'].'</div>';
    $str .='<div>Người liên hệ: '.$node->title.'</div>';
    $str .='<div>Điện thoại: '.$node->field_phone[LANGUAGE_NONE][0]['value'].'</div>';
    $str .='<div>Email: '.$node->field_email[LANGUAGE_NONE][0]['value'].'</div>';
    $form['company_contact_info'] = array(
        '#markup' => $str,
    );
    
    $form_state['storage']['company_info'] = $node;
    /* TABS */
//    $form['vertical_tabs'] = array(
//        '#type' => 'vertical_tabs',
//        '#default_tab' => 'tab_company',
//    );
//    $form['tab_company'] = array(
//        '#type' => 'fieldset',
//        '#title' => t('Công Ty'),
//        '#collapsible' => TRUE,
//        '#group' => 'vertical_tabs',
//    );
//    $form['tab_stream'] = array(
//        '#type' => 'fieldset',
//        '#title' => t('Chi Nhánh'),
//        '#collapsible' => TRUE,
//        '#group' => 'vertical_tabs',
//    );
//    /* END TABS */
//
//    /* TAB COMPANY */
//    // name
//    $form['tab_company']['company_name_c'] = array(
//        '#type' => 'checkbox',
//        '#title' => 'Tên công ty',
//    );   
//    $form['tab_company']['company_name'] = array(
//        '#type' => 'textfield',
//        '#disabled' => true,
//        '#default_value' => $node->field_company_name[LANGUAGE_NONE][0]['value'],
//        '#attributes' => array(
//            'placeholder' => t('Tên công ty mới'),
//        ),
//    ); 
//    // address
//    $form['tab_company']['address_c'] = array(
//        '#type' => 'checkbox',
//        '#title' => 'Địa Chỉ',
//    );   
//    $form['tab_company']['address'] = array(
//        '#type' => 'textfield',
//        '#disabled' => true,
//        '#default_value' => $node->field_address[LANGUAGE_NONE][0]['value'],
//        '#attributes' => array(
//            'placeholder' => t('Địa chỉ mới'),
//        ),
//    ); 
//    // funds
//    $form['tab_company']['funds_c'] = array(
//        '#type' => 'checkbox',
//        '#title' => 'Vốn điều lệ',
//    );   
//    $form['tab_company']['funds'] = array(
//        '#type' => 'textfield',
//        '#disabled' => true,
//        '#default_value' => $node->field_funds[LANGUAGE_NONE][0]['value'],
//        '#attributes' => array(
//            'placeholder' => t('Vốn điều lệ mới'),
//        ),
//    ); 
//    
//    
//    /* END TAB COMPANY */
//    $form['tab_stream']['sex']=array(
//        '#type' => 'radios',
//        '#options' => array(SEX_FEMALE=>'Nữ', SEX_MALE=>'Nam', SEX_OTHER=>'Khác'),
//        '#title' => 'Giới Tính',
//        '#default_value' => SEX_OTHER
//    );

    
    $form['company_name_c'] = array(
        '#type' => 'checkbox',
        '#title' => 'Tên công ty',
    );   
    $form['company_name'] = array(
        '#type' => 'textfield',
        '#disabled' => true,
        '#default_value' => $node->field_company_name[LANGUAGE_NONE][0]['value'],
        '#attributes' => array(
            'placeholder' => t('Tên công ty mới'),
        ),
    ); 
    
    // address
    $form['address_c'] = array(
        '#type' => 'checkbox',
        '#title' => 'Địa Chỉ',
    );   
    $form['address'] = array(
        '#type' => 'textfield',
        '#disabled' => true,
        '#default_value' => $node->field_address[LANGUAGE_NONE][0]['value'],
        '#attributes' => array(
            'placeholder' => t('Địa chỉ mới'),
        ),
    ); 
    
    // fields 
    $form['fields_c'] = array(
        '#type' => 'checkbox',
        '#title' => 'Ngành nghề kinh doanh',
    );   
    $form['fields'] = array(
        '#type' => 'textarea',
        '#disabled' => true,
        '#default_value' => $node->field_fields[LANGUAGE_NONE][0]['value'],
        '#attributes' => array(
            'placeholder' => t('Ngành nghề kinh doanh mới'),
        ),
    ); 
    
    // funds
    $form['funds_c'] = array(
        '#type' => 'checkbox',
        '#title' => 'Vốn điều lệ',
    );   
    $form['funds'] = array(
        '#type' => 'textfield',
        '#disabled' => true,
        '#default_value' => $node->field_funds[LANGUAGE_NONE][0]['value'],
        '#attributes' => array(
            'placeholder' => t('Vốn điều lệ mới'),
        ),
    ); 
        
    // shareholders
    $form['shareholders_c'] = array(
        '#type' => 'checkbox',
        '#title' => 'Thành Viên - Cổ Đông',
    );  
    $form['shareholders'] = array(
        '#type' => 'textarea',
        '#disabled' => true,
        '#attributes' => array(
            'placeholder' => t('Vui lòng liệt kê chi tiết nội dung cần điều chỉnh về người chuyển nhượng (người bán) và người nhận chuyển nhượng (người mua)'),
        ),
    ); 
    
    // represent
    $form['represent_c'] = array(
        '#type' => 'checkbox',
        '#title' => 'Đại diện pháp luật',
    );  
    $form['represent'] = array(
        '#type' => 'textarea',
        '#disabled' => true,
        '#attributes' => array(
            'placeholder' => t('Vui lòng liệt kê chi tiết nội dung cần điều chỉnh về người đại diện pháp luật mới, thay thế cho người nào'),
        ),
    ); 
    
    // owner
    $form['owner_c'] = array(
        '#type' => 'checkbox',
        '#title' => 'Chủ sở hữu',
    );  
    $form['owner'] = array(
        '#type' => 'textarea',
        '#disabled' => true,
        '#attributes' => array(
            'placeholder' => t('Thông tin chủ sở hữu mới (Họ tên, Ngày sinh, Giới Tính, CMND)'),
        ),
    ); 
    
    $form['submit']=array(
        '#type' => 'submit',
        '#value' => 'Đăng Ký Thay Đổi',
        '#attributes' => array(
            'class' => array('button'),            
        ),
    );
    return $form;
}


function ntvcore_form_update_company_submit($form, &$form_state){
    //var_dump($form_state['input']);die;
    $company_info = $form_state['storage']['company_info'];
        
    global $user;
    $node = new stdClass();
    $node->type = 'update_company';
    $node->uid = $user->uid;
    $node->title = 'Thay đổi công ty '.$company_info->field_company_name[LANGUAGE_NONE][0]['value'];
    $node->field_company_nid[LANGUAGE_NONE][0]['nid'] = $company_info->nid;
    
    // updates        
    if($form_state['values']['company_name_c']){
        $fc_item = entity_create('field_collection_item', array('field_name' => 'field_updates'));
        $fc_item->setHostEntity('node', $node);
        $fc_wrapper = entity_metadata_wrapper('field_collection_item', $fc_item);    
        $fc_wrapper->field_update_name->set('Tên Công Ty');
        $fc_wrapper->field_old_value->set($company_info->field_company_name[LANGUAGE_NONE][0]['value']);
        $fc_wrapper->field_new_value->set($form_state['input']['company_name']);
        $fc_wrapper->save(TRUE);    
    }    
    if($form_state['values']['address_c']){
        $fc_item = entity_create('field_collection_item', array('field_name' => 'field_updates'));
        $fc_item->setHostEntity('node', $node);
        $fc_wrapper = entity_metadata_wrapper('field_collection_item', $fc_item);    
        $fc_wrapper->field_update_name->set('Địa chỉ công ty');
        $fc_wrapper->field_old_value->set($company_info->field_address[LANGUAGE_NONE][0]['value']);
        $fc_wrapper->field_new_value->set($form_state['input']['address']);
        $fc_wrapper->save(TRUE);    
    }   
    if($form_state['values']['fields_c']){
        $fc_item = entity_create('field_collection_item', array('field_name' => 'field_updates'));
        $fc_item->setHostEntity('node', $node);
        $fc_wrapper = entity_metadata_wrapper('field_collection_item', $fc_item);    
        $fc_wrapper->field_update_name->set('Ngành nghề hoạt động');
        $fc_wrapper->field_old_value->set($company_info->field_fields[LANGUAGE_NONE][0]['value']);
        $fc_wrapper->field_new_value->set($form_state['input']['fields']);
        $fc_wrapper->save(TRUE);    
    }   
    if($form_state['values']['funds_c']){
        $fc_item = entity_create('field_collection_item', array('field_name' => 'field_updates'));
        $fc_item->setHostEntity('node', $node);
        $fc_wrapper = entity_metadata_wrapper('field_collection_item', $fc_item);    
        $fc_wrapper->field_update_name->set('Vốn điều lệ');
        $fc_wrapper->field_old_value->set($company_info->field_funds[LANGUAGE_NONE][0]['value']);
        $fc_wrapper->field_new_value->set($form_state['input']['funds']);
        $fc_wrapper->save(TRUE);    
    }   
    if($form_state['values']['shareholders_c']){
        $fc_item = entity_create('field_collection_item', array('field_name' => 'field_updates'));
        $fc_item->setHostEntity('node', $node);
        $fc_wrapper = entity_metadata_wrapper('field_collection_item', $fc_item);    
        $fc_wrapper->field_update_name->set('Cổ đông / thành viên');
        $fc_wrapper->field_old_value->set(shareholders_to_string($company_info));
        $fc_wrapper->field_new_value->set($form_state['input']['shareholders']);
        $fc_wrapper->save(TRUE);    
    }   
    if($form_state['values']['represent_c']){
        $fc_item = entity_create('field_collection_item', array('field_name' => 'field_updates'));
        $fc_item->setHostEntity('node', $node);
        $fc_wrapper = entity_metadata_wrapper('field_collection_item', $fc_item);    
        $fc_wrapper->field_update_name->set('Đại diện pháp luật');
        //$fc_wrapper->field_old_value->set($company_info->field_fund[LANGUAGE_NONE][0]['value']);
        $fc_wrapper->field_new_value->set($form_state['input']['represent']);
        $fc_wrapper->save(TRUE);    
    }   
    if($form_state['values']['owner_c']){
        $fc_item = entity_create('field_collection_item', array('field_name' => 'field_updates'));
        $fc_item->setHostEntity('node', $node);
        $fc_wrapper = entity_metadata_wrapper('field_collection_item', $fc_item);    
        $fc_wrapper->field_update_name->set('Chủ sở hữu');
        $fc_wrapper->field_old_value->set($company_info->field_owner_name[LANGUAGE_NONE][0]['value']);
        $fc_wrapper->field_new_value->set($form_state['input']['owner']);
        $fc_wrapper->save(TRUE);    
    }   
    
    node_submit($node);
    node_save($node);
}