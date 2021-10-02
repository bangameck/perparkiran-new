<?php


function compressImage($source, $destination, $quality)
{
// Mendapatkan info gambar
$imgInfo = getimagesize($source);
$mime = $imgInfo['mime'];

// Membuat gambar baru dari file yang diupload
switch ($mime) {
case 'image/jpeg':
$image = imagecreatefromjpeg($source);
break;
case 'image/png':
$image = imagecreatefrompng($source);
break;
case 'image/gif':
$image = imagecreatefromgif($source);
break;
default:
$image = imagecreatefromjpeg($source);
}

// simpan gambar
imagejpeg($image, $destination, $quality);

// Return gambar yang dikompres
return $destination;
}

function imageCompressResize($img_name, $source, $upload, $upload_m, $upload_s, $width){
//tempat direktory gambar
$vdir_upload = $upload;
$vdir_upload_medium = $upload_m;
$vdir_upload_small = $upload_s;
// $vfile_upload = $vdir_upload . $img_name;

//Simpan gambar dalam ukuran asli
// move_uploaded_file($source, $vfile_upload);

// Mendapatkan info gambar
$imgInfo = getimagesize($source);
$mime = $imgInfo['mime'];

// Membuat gambar baru dari file yang diupload
switch ($mime) {
case 'image/jpeg':
$image = imagecreatefromjpeg($source);
break;
case 'image/png':
$image = imagecreatefrompng($source);
break;
case 'image/gif':
$image = imagecreatefromgif($source);
break;
default:
$image = imagecreatefromjpeg($source);
}
//identitas file asli
// $im_src = imagecreatefromjpeg($vfile_upload);
$im_src = $image;
$src_width = imageSX($im_src);
$src_height
= imageSY($im_src);

//Simpan dalam versi small 110px
$dst_width = 110;
$dst_height = ($dst_width/$src_width)*$src_height;

//proses perubahan ukuran
$im = imagecreatetruecolor($dst_width,$dst_height);
imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//Simpan gambar
imagejpeg($im,$vdir_upload_small . "small_" . $img_name);

//Simpan dalam ukuran medium 320px
$dst_width = 320;
$dst_height = ($dst_width/$src_width)*$src_height;

//proses untuk perubahan ukuran
$im = imagecreatetruecolor($dst_width,$dst_height);
imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//menyimpan gambar
imagejpeg($im,$vdir_upload_medium . "medium_" . $img_name);

//Simpan dalam ukuran medium 320px
$dst_width = $width;
$dst_height = ($dst_width/$src_width)*$src_height;

//proses untuk perubahan ukuran
$im = imagecreatetruecolor($dst_width,$dst_height);
imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//menyimpan gambar
imagejpeg($im,$vdir_upload . "" . $img_name);
// imagedestroy($im_src);
// imagedestroy($im);
}

function fotoCompressResize($img_name, $source, $upload){
//tempat direktory gambar
$vdir_upload = $upload;
// $vdir_upload_medium = $upload_m;
// $vdir_upload_small = $upload_s;
// $vfile_upload = $vdir_upload . $img_name;

//Simpan gambar dalam ukuran asli
// move_uploaded_file($source, $vfile_upload);

// Mendapatkan info gambar
$imgInfo = getimagesize($source);
$mime = $imgInfo['mime'];

// Membuat gambar baru dari file yang diupload
switch ($mime) {
case 'image/jpeg':
$image = imagecreatefromjpeg($source);
break;
case 'image/png':
$image = imagecreatefrompng($source);
break;
case 'image/gif':
$image = imagecreatefromgif($source);
break;
default:
$image = imagecreatefromjpeg($source);
}
//identitas file asli
// $im_src = imagecreatefromjpeg($vfile_upload);
$im_src = $image;
$src_width = imageSX($im_src);
$src_height
= imageSY($im_src);

//Simpan dalam ukuran medium 320px
$dst_width = 500;
$dst_height = ($dst_width/$src_width)*$src_height;

//proses untuk perubahan ukuran
$im = imagecreatetruecolor($dst_width,$dst_height);
imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//menyimpan gambar
imagejpeg($im,$vdir_upload . $img_name);
}