<?php
include_once '../../../_func/func.php';
$id_jukir = $db->real_escape_string($_POST['id_jukir']);
$query = $db->query("SELECT * FROM jukir WHERE id_jukir2='$id_jukir'");

$find = $query->num_rows;

echo $find;
