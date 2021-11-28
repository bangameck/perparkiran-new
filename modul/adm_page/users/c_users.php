<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:31:00
* @modify date 2021-06-11 14:31:00
* @desc [description]
*/
include_once '../../../_func/func.php';
$username = $_POST['username'];
$query = $db->query("SELECT * FROM users WHERE username='$username'");

$find = $query->num_rows;

echo $find;