<h4>Đổi thông tin cá nhân</h4>
<form method="POST" id="frmUUpdateInfo" action="<?php echo url('ajax-process');?>" enctype="multipart/form-data">
<?php 
if(arg(0)=='user' && is_numeric(arg(1))){
    $account = user_load(arg(1));
}else{
    global $user;
    $account = user_load($user->uid);
}
echo '<input type="hidden" name="action" value="update_user_info" />';
echo '<input type="hidden" name="hdUID" value="'.$account->uid.'" />';
echo '<div id="avatar">';
    $ava = '/'.PATH_TO_IMAGES . 'avatar.png';
    if (!empty($account->field_avatar[LANGUAGE_NONE])) {
        $ava = image_style_url('square', $account->field_avatar[LANGUAGE_NONE][0]['uri']);
    }
    echo '<img src="' . $ava . '" />';    
    
    echo '<input type="file" name="fAvatar" accept="image/*"/>';
echo '</div>';
echo '<div class="u-name">';
    echo '<span class="first-name name col-sm-8"><input name="txtUFname" placeholder="Tên" type="text" value="'. $account->field_first_name[LANGUAGE_NONE][0]['value'].'" /></span>';
    echo '<span class="last-name name col-sm-4"><input name="txtULname" placeholder="Họ" type="text" value="'. $account->field_last_name[LANGUAGE_NONE][0]['value'].'" /></span>';
echo '</div>';
echo '<div class="u-dob"><input name="txtUdob" placeholder="Ngày-tháng-năm sinh" type="date" value="'. $account->field_dob[LANGUAGE_NONE][0]['value'].'" /></div>';
echo '<div class="u-nationality">';
$arrCountry = array('--- Quốc tịch ---','USA', 'Canada', 'Australia', 'Vietnamese', 'France');
    echo '<select id="slNationality">';
    foreach ($arrCountry as $c){
        if($c==$account->field_nationality[LANGUAGE_NONE][0]['value']){
            echo '<option selected>'.$c.'</option>';
        }else{
            echo '<option>'.$c.'</option>';
        }
    }
    echo '</select>';
echo '</div>';
echo '<div class="u-name">';
    echo '<span class="email name col-sm-6"><input name="txtEmail" placeholder="Email" type="text" disabled value="'. $account->mail.'" /></span>';
    echo '<span class="phone name col-sm-6"><input name="txtPhone" placeholder="Điện thoại" type="text" value="'. $account->field_phone[LANGUAGE_NONE][0]['value'].'" /></span>';
echo '</div>';
echo '<div class="u-live"><input name="txtUlive" placeholder="Bạn sống ở đâu?" type="text" value="'. $account->field_live[LANGUAGE_NONE][0]['value'].'" /></div>';
echo '<div class="u-work"><input name="txtUwork" placeholder="Bạn đang làm việc tại đâu?" type="text" value="'. $account->field_work[LANGUAGE_NONE][0]['value'].'" /></div>';

echo '<div class="u-slogan"><input name="txtUslogan" placeholder="Phương châm sống của bạn" type="text" value="'. $account->field_slogan[LANGUAGE_NONE][0]['value'].'" /></div>';
echo '<input type="button" class="form-submit" id="btnSaveUInfo" value="Cập nhật" />';

?>

</form>