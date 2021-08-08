<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

//php csrf token
// include 'php-csrf.php';

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// error_reporting(0);
session_start();
//inisialisasi csrf
// $csrf = new CSRF();
ini_set('max_execution_time', 3600);
date_default_timezone_set('Asia/Jakarta');
//compress image
include 'compress_image.php';
//compress video
include 'compress_video.php';
//jumlah pengunjung
include 'counter_visitor.php';
//create Token CSRF
include 'csrf.php';
//database
include 'database.php';
//identitas web
include 'identity.php';
//javascript
include 'javascript.php';
//karakteracak
include 'karakteracak.php';
//nilai
include 'nilai.php';
//Sensor kata
include 'sensor.php';
//create session in DB
include 'session.php';
//slug_url
include 'slug.php';
//template web
include 'template.php';
//Tanggal Indonesia
include 'tgl_id.php';
//trafic pengunjung
include 'traffic.php';
//url
include 'url.php';
//umur
include 'usia.php';
//csrf OWASP
include '/vendor/owasp/csrf-protector-php/libs/csrf/csrfprotector.php';


//aut
function aut($level = array())
{
    //aut(array(1,4));penggunaan
    global $base_url;
    if (!in_array($_SESSION['level'], $level)) {
        echo "<script>alert('Anda tidak dapat mengakses halaman ini.');
				window.location='" . $base_url . "';</script>";
        exit;
    }
}

function aut_lp($level = array())
{
    //aut(array(1,4));penggunaan
    global $base_url;
    if (!in_array($_SESSION['level'], $level)) {
        echo "<script>
				window.location='" . $base_url . "dashboard';</script>";
    } 
}

//modul
function modul($m)
{
    global $db;
    global $base_url;
    if (empty($m)) {
        include "modul/home/home.php";
    } else {
        return include "modul/$m/$m.php";
    }
}

// function modula($ma)
// {
//     global $db;
//     global $base_url;
//     if (empty($ma)) {
//         include "modula/hm/hm.php";
//     } else {
//         return include "modula/$ma/$ma.php";
//     }
// }
?>
