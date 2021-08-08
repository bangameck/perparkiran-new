<?php

/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

// function compressImage($source, $destination, $ukuran){
// $upload_image = $source;
// $folder = $destination;
// // tentukan ukuran width yang diharapkan
// $width_size = $ukuran;

// // tentukan di mana image akan ditempatkan setelah diupload
// $filesave = $folder . $upload_image;
// move_uploaded_file($destination, $filesave);

// // menentukan nama image setelah dibuat
// $resize_image = $folder . "resize_" . uniqid(rand()) . ".jpg";

// // mendapatkan ukuran width dan height dari image
// list( $width, $height ) = getimagesize($filesave);

// // mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
// $k = $width / $width_size;

// // menentukan width yang baru
// $newwidth = $width / $k;

// // menentukan height yang baru
// $newheight = $height / $k;

// // fungsi untuk membuat image yang baru
// $thumb = imagecreatetruecolor($newwidth, $newheight);
// $source = imagecreatefromjpeg($filesave);

// // men-resize image yang baru
// imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// // menyimpan image yang baru
// imagejpeg($thumb, $resize_image);

// imagedestroy($thumb);
// imagedestroy($source);
// }

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