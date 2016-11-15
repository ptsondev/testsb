<?php


function snh_social_share() {
    $share = '<div id="custom_share">';
    $share .= "<script type='text/javascript'>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a class='share_facebook' title='Share to Facebook' href='http://www.facebook.com/share.php?u=<url>' onclick='return fbs_click()' target='_blank' ><div class='share facebook'></div></a>";
    $share .= '<a class="share_twitter" href="http://twitter.com/home?status=Currentlyreading" title="Share to Twitter"><div class="share twitter"></div></a>';
    $share .= '<a class="share_linkhay" title="Share to Linkhay" href="http://linkhay.com/submit"><div class="share linkhay"></div></a>';
    //$share .= '<a title="Share to Zing" class="share_zing" name="zm_share" type="text"><div class="share zing"></div></a><script src="http://wb.me.zing.vn/index.php?wb=LINK&t=js&c=share_button" type="text/javascript"></script>';
    $share .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: \'vi\'}</script><g:plusone size="medium"></g:plusone>';
    $share .= '<div class="fb-like" data-send="false" data-layout="button_count" data-show-faces="false" href="https://www.facebook.com/sharplife.vn"></div>';
    $share.='</div>';
    return $share;
}


function snh_read_num_forvietnamese( $num = false ) {
    $str = '';
    $num  = trim($num);
    
    $arr = str_split($num);
    $count = count( $arr );
    
    $f = number_format($num);
       //KHÔNG ĐỌC BẤT KÌ SỐ NÀO NHỎ DƯỚI 999 ngàn
    if ( $count < 4 ) {
        $str = $num;
    } else {
        // từ 3 số trở lên là nghìn, ta sẽ đọc nó !
        // "32,000,000,000"
        $r = explode(',', $f);
        switch ( count ( $r ) ) {
            case 4:
                $str = $r[0] . ' tỉ';
                if ( (int) $r[1] ) { $str .= ' '. $r[1] . ' Triệu'; }
            break;
            case 3:
                $str = $r[0] . ' Triệu';
                if ( (int) $r[1] ) { $str .= ' '. $r[1].$r[2]; }
            break;
            case 2:
                $str = $r[0] . ' Nghìn';
                if ( (int) $r[1] ) { $str .= ' '. $r[1]; }
            break;
        }
    }
    return ( $str . ' ₫' );
}


function convert_number_to_words($number) {

    $hyphen = ' ';
    $conjunction = '  ';
    $separator = ' ';
    $negative = 'âm ';
    $decimal = ' phẩy ';
    $dictionary = array(
        0 => 'Không',
        1 => 'Một',
        2 => 'Hai',
        3 => 'Ba',
        4 => 'Bốn',
        5 => 'Năm',
        6 => 'Sáu',
        7 => 'Bảy',
        8 => 'Tám',
        9 => 'Chín',
        10 => 'Mười',
        11 => 'Mười một',
        12 => 'Mười hai',
        13 => 'Mười ba',
        14 => 'Mười bốn',
        15 => 'Mười năm',
        16 => 'Mười sáu',
        17 => 'Mười bảy',
        18 => 'Mười tám',
        19 => 'Mười chín',
        20 => 'Hai mươi',
        30 => 'Ba mươi',
        40 => 'Bốn mươi',
        50 => 'Năm mươi',
        60 => 'Sáu mươi',
        70 => 'Bảy mươi',
        80 => 'Tám mươi',
        90 => 'Chín mươi',
        100 => 'trăm',
        1000 => 'ngàn',
        1000000 => 'triệu',
        1000000000 => 'tỷ',
        1000000000000 => 'nghìn tỷ',
        1000000000000000 => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
// overflow
        trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int) ($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}


function snh_display_price($price){
    return number_format(check_plain($price), 0, '.', '.').' ₫';
}

function is_order_page(){
    if(arg(0)==URL_PRICE_NEW_COM || arg(0)=='dich-vu-them' || (arg(0)==URL_UPDATE_COM)){
        return TRUE;
    }
    return FALSE;
}

function shareholders_to_string($node){
    $str = '';
    $i=1;
    foreach ($node->field_shareholders[LANGUAGE_NONE] as $item){        
        $collect = field_collection_item_load($item['value'], $reset = FALSE);
        $str.= $i.'. '.$collect->field_shareholders_name[LANGUAGE_NONE][0]['value'];
        $str.=' - Giá trị góp: '.$collect->field_shareholders_value[LANGUAGE_NONE][0]['value'];
        //$str.=' - Ngày '.$collect->field_shareholders_dob[LANGUAGE_NONE][0]['value'];
        $str.= '<br />';
        $i++;
    }
    return $str;
}

function display_updated_fields($nid){
    $node = node_load($nid);
    $updates = $node->field_updates[LANGUAGE_NONE];
    $html ='';
    foreach($updates as $item){
        $collect = field_collection_item_load($item['value'], $reset = FALSE);
        $html.='<div class="change row" style="border-bottom:1px dotted #ccc;">';
            $html.= '<div style="width:20%;display:inline-block;">'.$collect->field_update_name[LANGUAGE_NONE][0]['value'].'</div>';
            $html.= '<div style="width:40%;display:inline-block;">'.$collect->field_old_value[LANGUAGE_NONE][0]['value'].'</div>';
            $html.= '<div style="width:40%;display:inline-block;">'.$collect->field_new_value[LANGUAGE_NONE][0]['value'].'</div>';
            //echo $collect->field_update_name[LANGUAGE_NONE][0]['value'].': '.$collect->field_old_value[LANGUAGE_NONE][0]['value'].' => '.$collect->field_new_value[LANGUAGE_NONE][0]['value'].'</br>';
        $html.='</div>';
    }
    return $html;
    //die;
}

function find_company_by_user($uid = NULL){
    if(!$uid){
        global $user;
        $uid = $user->uid;
    }
    $nid = db_query('SELECT nid FROM node WHERE type=:type AND status=1 AND uid=:uid ORDER BY created DESC', array(
        ':type'=>'new_company', ':uid'=>$uid
    ))->fetchField();
    return $nid;
}


function ntv_display_service_by_term($tid){
	$terms = taxonomy_get_tree(VID_SERVICE_CATEGORY, $parent = $tid, $max_depth = 1);
		if(!empty($terms)){
			foreach($terms as $term){
				echo '<div class="service-group">';
					echo '<h3 class="group-name" id="tid-'.$term->tid.'">'.$term->name.'</h3>';
					$services = views_get_view_result('service', 'block', $term->tid);        
					$i=0;
					foreach($services as $service){
						//var_dump($service->field_field_time[0]['raw']['value']);
						$class = $i%2==0? 'odd':'even';
						echo '<div class="service '.$class.'">';
							echo '<div class="col-sm-8 col-xs-6"><a href="'.url('node/'.$service->nid).'">'.$service->node_title.'</a></div>';                
							if($term->tid == TID_NEW_COM || $term->tid== TID_NEW_COM_ENG){
								echo '<div class="col-sm-2 col-xs-3">';
								if(!empty($service->field_field_time)){
									echo '<a href="'.url(URL_NEW_COM).'">'.$service->field_field_time[0]['raw']['value'].'</a>';
								}
								echo '</div>';
								echo '<div class="col-sm-2 col-xs-3"><a href="'.url(URL_NEW_COM).'">Đăng Ký</a></div>';
							}else{
								echo '<div class="col-sm-2 col-xs-3">';
								if(!empty($service->field_field_time)){
									echo '<a href="'.url(URL_OTHER_REQUIREMENTS).'">'.$service->field_field_time[0]['raw']['value'].'</a>';
								}
								echo '</div>';
								echo '<div class="col-sm-2 col-xs-3"><a href="'.url(URL_OTHER_REQUIREMENTS).'">Đăng Ký</a></div>';
							}
						echo '</div>';
						$i++;
					}
				echo '</div>';
			}
		}else{
			// empty term, show node child
			$services = views_get_view_result('service', 'block', $tid);        
					$i=0;
					foreach($services as $service){
						//var_dump($service->field_field_time[0]['raw']['value']);
						$class = $i%2==0? 'odd':'even';
						echo '<div class="service '.$class.'">';
							echo '<div class="col-sm-8 col-xs-6"><a href="'.url('node/'.$service->nid).'">'.$service->node_title.'</a></div>';                
							if($tid == TID_NEW_COM || $tid== TID_NEW_COM_ENG){
								echo '<div class="col-sm-2 col-xs-3">';
								if(!empty($service->field_field_time)){
									echo '<a href="'.url(URL_NEW_COM).'">'.$service->field_field_time[0]['raw']['value'].'</a>';
								}
								echo '</div>';
								echo '<div class="col-sm-2 col-xs-3"><a href="'.url(URL_NEW_COM).'">Đăng Ký</a></div>';
							}else{
								echo '<div class="col-sm-2 col-xs-3">';
								if(!empty($service->field_field_time)){
									echo '<a href="'.url(URL_OTHER_REQUIREMENTS).'">'.$service->field_field_time[0]['raw']['value'].'</a>';
								}
								echo '</div>';
								echo '<div class="col-sm-2 col-xs-3"><a href="'.url(URL_OTHER_REQUIREMENTS).'">Đăng Ký</a></div>';
							}
						echo '</div>';
						$i++;
					}
	}
}


