<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmai.com]
* @create date 2021-06-11 14:31:00
* @modify date 2021-06-11 14:31:00
* @desc [description]
*/
include '../../_func/func.php';
$tgl =  date('Y-m-d', strtotime($_POST['tgl']));
$query = mysqli_query($db, "SELECT * from layanan where tgl='$tgl' ");

$find = mysqli_num_rows($query);

echo $find;