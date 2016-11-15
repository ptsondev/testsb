<?php 

function ntv_master_tlm_price($form, &$form_state){
    $form['basic'] = array(
        '#type' => 'fieldset',
        '#title' => t('3 gói thành lập mới'), 
        '#collapsible' => TRUE, 
        '#collapsed' => TRUE,
    );
    $form['basic']['price_startup']=array(
        '#collapsible' => FALSE,
        '#type' => 'textfield',
        '#title' => 'Gói Khởi Nghiệp',
        '#default_value' => variable_get('price_startup', '100000')        
    );
    $form['basic']['price_pro']=array(
        '#collapsible' => FALSE,
        '#type' => 'textfield',
        '#title' => 'Gói Chuyên Gia',
        '#default_value' => variable_get('price_pro', '200000')        
    );
    $form['basic']['price_vip']=array(
        '#collapsible' => FALSE,
        '#type' => 'textfield',
        '#title' => 'Gói Khởi Nghiệp',
        '#default_value' => variable_get('price_vip', '300000')        
    );
   
     /*
    $form['advance'] = array(
        '#type' => 'fieldset',
        '#title' => t('Các dịch vụ hỗ trợ khác'), 
        '#collapsible' => TRUE, 
        '#collapsed' => TRUE,
    );    
    $form['advance']['price_dau_1_dong']=array(
        '#type' => 'textfield',
        '#title' => 'Dấu 1 dòng',
        '#default_value' => variable_get('price_dau_1_dong', '80000')
    );
    $form['advance']['price_dau_2_dong']=array(
        '#type' => 'textfield',
        '#title' => 'Dấu 2 dòng',
        '#default_value' => variable_get('price_dau_2_dong', '100000')
    );
    $form['advance']['price_bang_hieu_1']=array(
        '#type' => 'textfield',
        '#title' => 'Bảng hiệu (size 22x39)',
        '#default_value' => variable_get('price_bang_hieu_1', '150000')
    );
    $form['advance']['price_bang_hieu_2']=array(
        '#type' => 'textfield',
        '#title' => 'Bảng hiệu (size 30x40)',
        '#default_value' => variable_get('price_bang_hieu_2', '250000')
    );
    
    $form['advance']['price_hoa_don_1']=array(
        '#type' => 'textfield',
        '#title' => 'Hóa đơn (1 cuốn)',
        '#default_value' => variable_get('price_hoa_don_1', '385000')
    );
    $form['advance']['price_hoa_don_2']=array(
        '#type' => 'textfield',
        '#title' => 'Hóa đơn (2 cuốn)',
        '#default_value' => variable_get('price_hoa_don_2', '704000')
    );
    $form['advance']['price_hoa_don_5']=array(
        '#type' => 'textfield',
        '#title' => 'Hóa đơn (5 cuốn)',
        '#default_value' => variable_get('price_hoa_don_5', '1100000')
    );
    $form['advance']['price_hoa_don_10']=array(
        '#type' => 'textfield',
        '#title' => 'Hóa đơn (10 cuốn)',
        '#default_value' => variable_get('price_hoa_don_10', '1980000')
    );
    $form['advance']['price_hoa_don_20']=array(
        '#type' => 'textfield',
        '#title' => 'Hóa đơn (20 cuốn)',
        '#default_value' => variable_get('price_hoa_don_20', '3520000')
    );
    
    $form['advance']['price_pm_khai_thue_1']=array(
        '#type' => 'textfield',
        '#title' => 'Phần mềm khai thuế (1 năm)',
        '#default_value' => variable_get('price_pm_khai_thue_1', '1485000')
    );
    $form['advance']['price_pm_khai_thue_3']=array(
        '#type' => 'textfield',
        '#title' => 'Phần mềm khai thuế (3 năm)',
        '#default_value' => variable_get('price_pm_khai_thue_3', '2376000')
    );
   */
    
    $form['submit']=array(
        '#type' => 'submit',
        '#value' => 'Save'        
    );
    return $form;
}

function ntv_master_tlm_price_submit($form, &$form_state){
     $arr = array(
        'price_startup', 
        'price_pro',
        'price_vip',
        'price_dau_1_dong',
        'price_dau_2_dong',
        'price_bang_hieu_1',
        'price_bang_hieu_2',
        'price_hoa_don_1',
        'price_hoa_don_2',
        'price_hoa_don_5',
        'price_hoa_don_10',
        'price_hoa_don_20',
        'price_pm_khai_thue_1',
        'price_pm_khai_thue_3'        
    );
    foreach($form_state['values'] as $key=>$value){
        if(in_array($key, $arr)){
            variable_set($key, $value);
        }
    }
    // for text_format
    //variable_set('site_contact_register', $form_state['values']['site_contact_register']['value']);
}
