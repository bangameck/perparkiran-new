<?php
session_start();
$db->query("DELETE FROM session WHERE username='$_SESSION[username]'");
//$db->query("UPDATE users SET online='N' WHERE username='$_SESSION[username]'");
session_destroy();
sweetAlert('','sukses','Berhasil Logout !' ,'Anda telah keluar dari sistem, Silahkan login kembali untuk mengakses sistem.');
?>