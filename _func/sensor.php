<?php 
function r_nohp($nohp) {
    $phone=$nohp;
    $jumlah_sensor=8;
    $setelah_angka_ke=2;
    
    //ambil 4 angka di tengah yan akan disensor
    $censored = mb_substr($phone, $setelah_angka_ke, $jumlah_sensor);
    
    //pecah kelompok angka pertama dan terakhir
    $phone2=explode($censored,$phone);
    
    //gabung angka perama dan terakhir dengan angka tengah yang telah di sensor
    $phone_new=$phone2[0]."******".$phone2[1];

    return $phone_new;
}

function r_nama($nama_inp) {
    $ninp=$nama_inp;
    $jumlah_sensor=100;
    $setelah_angka_ke=3;
    
    //ambil 4 angka di tengah yan akan disensor
    $censored = mb_substr($ninp, $setelah_angka_ke, $jumlah_sensor);
    
    //pecah kelompok angka pertama dan terakhir
    $ninp2=explode($censored,$ninp);
    
    //gabung angka perama dan terakhir dengan angka tengah yang telah di sensor
    $ninp_new=$ninp2[0]."**********".$ninp2[1];

    return $ninp_new;
}

function r_email($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        list($first, $last) = explode('@', $email);
        $first = str_replace(substr($first, '2'), str_repeat('*', strlen($first)-2), $first);
        $last = explode('.', $last);
        $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0'])-1), $last['0']);
        $hideEmailAddress = $first.'@'.$last_domain.'.'.$last['1'];
        return $hideEmailAddress;
    }
}
?>