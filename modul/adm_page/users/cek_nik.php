<?php

/**
 * @author [bangameck.rra]
 * @email [rahmad.looker@gmail.com]
 * @create date 2021-06-11 14:31:00
 * @modify date 2021-06-11 14:31:00
 * @desc [description]
 */
include_once '../../../_func/func.php';
$nik = $db->real_escape_string($_POST['nik']);
$query = $db->query("SELECT * FROM users WHERE nik='$nik'");

$find = $query->num_rows;

echo $find;
