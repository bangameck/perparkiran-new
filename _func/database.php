<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

//koneksi
$srvName = "localhost";
$dbUser = "root";
$dbPass = "201220";
$dbName = "perparkiran";
$db = new mysqli($srvName, $dbUser, $dbPass, $dbName);
if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
$db->query("SET GLOBAL sql_mode = ''");
$db->query("SET SESSION sql_mode = ''");

$lama = 1;
$db->query("DELETE FROM users WHERE status='N' AND DATEDIFF(CURDATE(), batas_waktu) > $lama");
?>