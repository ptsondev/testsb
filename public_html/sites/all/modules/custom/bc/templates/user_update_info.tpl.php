<h4>Đổi thông tin cá nhân</h4>
<form method="POST" id="frmUUpdateInfo" action="<?php echo url('ajax-process');?>" enctype="multipart/form-data">
<?php 
$account = user_load(arg(1));
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
echo '<div class="u-name"><input name="txtUname" placeholder="Họ tên" type="text" value="'. getUserName($account).'" /></div>';
echo '<div class="u-dob"><input name="txtUdob" placeholder="Ngày-tháng-năm sinh" type="date" value="'. $account->field_dob[LANGUAGE_NONE][0]['value'].'" /></div>';
echo '<div class="u-slogan"><input name="txtUslogan" placeholder="Phương châm sống của bạn" type="text" value="'. $account->field_slogan[LANGUAGE_NONE][0]['value'].'" /></div>';
echo '<input type="button" class="form-submit" id="btnSaveUInfo" value="Cập nhật" />';

?>

</form>