<?php 
/**
 * @author [bangameck.dev]
 * @email [rahmad.looker@mail.com]
 * @create date 2021-07-08 23:44:47
 * @modify date 2021-07-08 23:44:47
 * @desc [description]
 */

function r_nohp($nohp) {
    $phone=$nohp;
    $jumlah_sensor=6;
    $setelah_angka_ke=2;
    
    //ambil 4 angka di tengah yan akan disensor
    $censored = mb_substr($phone, $setelah_angka_ke, $jumlah_sensor);
    
    //pecah kelompok angka pertama dan terakhir
    $phone2=explode($censored,$phone);
    
    //gabung angka perama dan terakhir dengan angka tengah yang telah di sensor
    $phone_new=$phone2[0]."******".$phone2[1];

    return $phone_new;
}

function r_email($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        list($first, $last) = explode('@', $email);
        $first = str_replace(substr($first, '3'), str_repeat('*', strlen($first)-3), $first);
        $last = explode('.', $last);
        $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0'])-1), $last['0']);
        $hideEmailAddress = $first.'@'.$last_domain.'.'.$last['1'];
        return $hideEmailAddress;
    }
}
?>