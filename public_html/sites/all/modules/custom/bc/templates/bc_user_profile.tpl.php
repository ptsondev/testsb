<?php
$uid = arg(1);
$account = user_load($uid);
?>


<div id="user-profile">
    <?php
        echo '<div id="profile-top">';
            if(!empty($account->field_cover[LANGUAGE_NONE])){
                echo file_create_url($account->field_cover[LANGUAGE_NONE][0]['uri']);
            }
           
            
            echo '<div id="avatar">';
            if(!empty($account->field_avatar[LANGUAGE_NONE])){
                echo '<img src="'.image_style_url('large', $account->field_avatar[LANGUAGE_NONE][0]['uri']).'" />';
            }
            echo '</div>';
                    
        
            $name = $account->name;
            if(!empty($account->field_full_name[LANGUAGE_NONE])){
                $name = $account->field_full_name[LANGUAGE_NONE][0]['value'];
            }

            echo '<h2 id="fullname">'.$name.'</h2>';
        echo '</div>';
    ?>
        
</div>

<div id="sidebar" class="col-sm-4 col-xs-12">
    Sidebar => Chưa biết để gì vô
</div>

<div id="main-content" class="col-sm-8 col-xs-12">
    
    <div id="user-slogan">
    <?php 
        if(!empty($account->field_slogan[LANGUAGE_NONE])){
            echo '<i class="fa fa-quote-left" aria-hidden="true"></i>'.$account->field_slogan[LANGUAGE_NONE][0]['value'].'<i class="fa fa-quote-right" aria-hidden="true"></i>';        
        }else{
            echo '<i class="fa fa-quote-left" aria-hidden="true"></i>Slogan here <i class="fa fa-quote-right" aria-hidden="true"></i>';        
        }
    ?>
    </div>
    
    <div id="private-info" class="user-info-group">
        <h3 class="group-title"><?php echo t('Private Info');?></h3> 
        
        <div class="user-field"><label>Số điện thoại</label> 
            <?php 
                if(!empty($account->field_phone[LANGUAGE_NONE])){
                    echo $account->field_phone[LANGUAGE_NONE][0]['value']; 
                }
            ?>
        </div>
        <div class="user-field"><label>Ngày sinh</label> 
            <?php 
                if(!empty($account->field_dob[LANGUAGE_NONE])){
                    echo $account->field_dob[LANGUAGE_NONE][0]['value']; 
                }
            ?>
        </div>
        <div class="user-field"><label>Giới tính</label> 
            <?php 
                if(!empty($account->field_sex[LANGUAGE_NONE])){
                    echo $account->field_sex[LANGUAGE_NONE][0]['value']; 
                }
            ?>            
        </div>
        <div class="user-field"><label>Quốc gia</label>
            <?php 
                if(!empty($account->field_country[LANGUAGE_NONE])){
                    echo $account->field_country[LANGUAGE_NONE][0]['value']; 
                }
            ?>
        </div>
        <div class="user-field"><label>Địa chỉ</label> 
            <?php 
                if(!empty($account->field_address[LANGUAGE_NONE])){
                    echo $account->field_address[LANGUAGE_NONE][0]['value']; 
                }
            ?>            
        </div>
    </div>
    
    <?php 
        if(can_view_personal_company_info($account)){
            echo '<div id="company-info" class="user-info-group">';
                echo '<h3 class="group-title">'.t('Company Info').'</h3>'; 

                echo '<div class="user-field"><label>'.t('Company Name').'</label>';
                    if(!empty($account->field_company_name[LANGUAGE_NONE])){
                        echo $account->field_company_name[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';

                echo '<div class="user-field"><label>'.t('Country').'</label>';
                    if(!empty($account->field_company_country[LANGUAGE_NONE])){
                        echo $account->field_company_country[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';

                echo '<div class="user-field"><label>'.t('Address').'</label>';
                    if(!empty($account->field_company_address[LANGUAGE_NONE])){
                        echo $account->field_company_address[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';

                echo '<div class="user-field"><label>'.t('Contact Number').'</label>';
                    if(!empty($account->field_company_contact_number[LANGUAGE_NONE])){
                        echo $account->field_company_contact_number[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';

                echo '<div class="user-field"><label>'.t('VAT').'</label>';
                    if(!empty($account->field_company_vat[LANGUAGE_NONE])){
                        echo $account->field_company_vat[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';
            echo '</div>';    
        }
    ?>
    
    <?php 
        if(can_view_personal_payment_info($account)){
            echo '<div id="payment-info" class="user-info-group">';
                echo '<h3 class="group-title">'.t('Payment Info').'</h3>'; 

                echo '<div class="user-field"><label>'.t('Card Type').'</label>';
                    if(!empty($account->field_payment_type[LANGUAGE_NONE])){
                        echo $account->field_payment_type[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';

                echo '<div class="user-field"><label>'.t('Holder Name').'</label>';
                    if(!empty($account->field_card_holder_name[LANGUAGE_NONE])){
                        echo $account->field_card_holder_name[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';

                echo '<div class="user-field"><label>'.t('Card Number').'</label>';
                    if(!empty($account->field_card_number[LANGUAGE_NONE])){
                        echo $account->field_card_number[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';

                echo '<div class="user-field"><label>'.t('Expired Day').'</label>';
                    if(!empty($account->field_expired_day[LANGUAGE_NONE])){
                        echo $account->field_expired_day[LANGUAGE_NONE][0]['value']; 
                    }
                echo '</div>';
            echo '</div>';
        }
    ?>
</div>