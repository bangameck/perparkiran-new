<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:31:00
* @modify date 2021-06-11 14:31:00
* @desc [description]
*/
include_once '../../_func/func.php';
$email = $_POST['email'];
$query = mysqli_query($db, "SELECT * from users where email='$email' ");

$find = mysqli_num_rows($query);

echo $find;