<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:39:40
* @modify date 2021-06-11 14:39:40
* @desc [description]
*/

include '_func/database.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    $hide = 'hidden';
} else {
    $hide = '';
}
$data= $db->query("SELECT * FROM users WHERE username='$_SESSION[username]'")->fetch_assoc();
if (empty($_SESSION['foto'])) {
    $foto = 'default.png';
} else {
    $foto = $_SESSION['foto'];
}
$l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Karu' ,'4' => 'Pengawas', '5' => 'Admin', '6' => 'Pimpinan', '7' => 'Penerima Hak Akses');
if (empty($_SESSION['regu'])) {
    $r = $l[$_SESSION['level']];
} else {
    $regu = $db->query("SELECT * FROM regu WHERE id_regu='$_SESSION[regu]'")->fetch_assoc();
    $r = $l[$_SESSION['level']].' Regu '.$regu['nm_regu'];
}
?>
<li class="profile-nav onhover-dropdown p-0 me-0" <?= $hide; ?>>
    <div class="media profile-media"><img class="img-40 rounded-circle"
            src="<?= base_url() ?>/_uploads/f_usr/<?= $foto; ?>" alt="" width="40">
        <div class="media-body"><span><?= $_SESSION['nama']; ?></span>
            <p class="mb-0 font-roboto"><?= $r ?> <i class="middle fa fa-angle-down"></i></p>
        </div>
    </div>
    <ul class="profile-dropdown onhover-show-div">
        <li><a href="<?= base_url(); ?>profile/<?= $_SESSION['username']; ?>"><i data-feather="user"></i><span>My
                    Profile </span></a></li>
        <!-- <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li> -->
        <li><a href="<?= base_url(); ?>"><i data-feather="file-text"></i><span>Ubah Email</span></a></li>
        <li><a href="<?= base_url(); ?>setting"><i data-feather="settings"></i><span>Settings</span></a></li>
        <li><a href="<?= base_url(); ?>out" onclick="return logout()"><i data-feather="power"> </i><span>Log
                    out</span></a></li>
    </ul>
</li>