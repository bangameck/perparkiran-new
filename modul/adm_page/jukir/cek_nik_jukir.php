<?php
include_once '../../../_func/func.php';
$nik_jukir = $db->real_escape_string($_POST['nik_jukir']);
$query = $db->query("SELECT * FROM jukir WHERE nik_jukir='$nik_jukir'");

$find = $query->num_rows;

echo $find;
