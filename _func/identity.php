<?php 
include 'database.php';

//ambil data profil
$id = $db->query("SELECT * FROM profile")->fetch_assoc();

//identitas
$title       = $id['nm_apl'];
$site        = 'https://' . $id['web'];
$instansi    = $id['nm_instansi'];
$nm_upt      = $id['nm_upt'];
$alamat      = $id['alamat'];
$no_hp       = $id['no_hp'];
$no_hp_add   = 'tel:' . $id['no_hp'];
$no_telp     = $id['no_telp'];
$no_telp_add = 'tel:' . $id['no_telp'];
$no_wa       = $id['no_wa'];
$no_wa_add   = 'https://api.whatsapp.com/send?phone=' . $id['no_wa']; //Whatsapp
$no_fax      = $id['no_fax'];
$no_fax_add  = 'fax:' . $id['no_fax'];
$emails      = $id['email'];
$emails_add  = 'mailto:' . $id['email'];
$deskripsi   = $id['deskripsi'];

//medsos
$fb  = 'https://facebook.com/' . $id['fb']; //Facebook
$tw  = 'https://twitter.com/' . $id['tw']; //Twitter
$yt  = 'https://youtube.com/channel/' . $id['yt']; //Youtube
$ig  = 'https://instagram.com/' . $id['ig']; //Instagram
$pin = 'https://pinterest.com/' . $id['pin']; //Pintrest
$vim = 'https://vimeo.com/' . $id['vim']; //Vimeo
$yah = 'mailto:' . $id['yah']; //Yahoo Mail
$lin = 'https://www.linkedin.com/in/' . $id['lin']; //Linkedin
$git = 'https://github.com/' . $id['git']; //Github

//LogoIcon
$logo = $id['logo'];
$icon = $id['icon'];

//maps
$maps = $id['maps'];

//php mail config
$host   = 'smtp.gmail.com';
// $host   = gethostbyname('smtp.gmail.com');
$port   = 587;
$secure = 'tls';
$email_ = 'rra.code@gmail.com';
$pmail  = 'njapzbafumunxpfq';
$logo   = 'assets/adm/images/logo/logo.png';

// footer;
$footer = "Copyright " . date('Y') . " ©  <a href='" . $ig . "' target='_blank'>Dikembangakan Oleh Team IT " . $nm_upt . "</a>"; 

