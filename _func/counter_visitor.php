<?php 

/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/
include_once '_func/url.php';
//Fungsi untuk konversi text nomor menjadi image
function num_toimage($tot,$jumlah){
$pattern='';
for($j=0;$j
<$jumlah;$j++){ $pattern .='0' ; } $len=strlen($tot); $length=strlen($pattern)-$len;
    $start=substr($pattern,0,$length).substr($tot,0,$len-1); $last=substr($tot,$len-1,1); $last_rpc='<img src="'
    .base_url().'_upload/counter/animasi/'.$last.'.gif" align="absmiddle" />';
$inc = str_replace($last,$last_rpc,$last);
for($i=0;$i
<=9;$i++){ $rpc='<img src="' .base_url().'_upload/counter/'.$i.'.gif" align="absmiddle" />';
$start=str_replace($i,$rpc,$start);
}
$num = $start.$inc;

return $num;
}