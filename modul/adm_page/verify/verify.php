
<?php 
    $vr = $_GET['id'];
    $verify = $db->query("SELECT * FROM users WHERE token='$_GET[id]'");
    $v = $verify->fetch_assoc();
    // $test = date('Y-m-d H:i:s', strtotime($v['batas_waktu']));
    // $now =  date('Y-m-d H:i:s');
    // var_dump($test, $now);
    // die();
    if($v==true){
        if (date('Y-m-d H:i:s', strtotime($v['batas_waktu'])) > date('Y-m-d H:i:s')) {
            sweetAlert('login-for-users','sukses','Verifikasi Sukses !','Verifikasi Berhasil silahkan login dengan username dan password yang benar.');
            $db->query("UPDATE users SET status='Y', updated_at=NOW() WHERE token='$_GET[id]'");
        } else {
            $db->query("DELETE FROM users WHERE token='$_GET[id]'");
            sweetAlert('dashboard','verify-error','Waktu Berakhir !','Verifikasi Gagal, Waktu Verifikasi Kadaluawarsa, Batas Verfikasi ' .date('Y-m-d H:i:s', strtotime($v['batas_waktu'])). '. Waktu Saat ini '.date('Y-m-d H:i:s'));
        }
        
    } else {
        sweetAlert('dashboard','verify-error','Kode Tidak Ditemukan !','Verifikasi Gagal, kode tidak ditemukan, Kemungkinan anda sudah pernah memverifikasi data sebelumnya atau Silahkan Menghubungi admin untuk info lebih lanjut.');
    }
    ?>