<?php

/**
 * @author [bangameck.rra]
 * @email [rahmad.looker@gmail.com]
 * @create date 2021-06-11 14:31:00
 * @modify date 2021-06-11 14:31:00
 * @desc [description]
 */
include_once '../../../_func/func.php';
$nik_korlap = $db->real_escape_string($_POST['nik_korlap']);
$query = $db->query("SELECT * FROM korlap WHERE nik_korlap='$nik_korlap'");

$find = $query->num_rows;

echo $find;
