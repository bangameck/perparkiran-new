<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

$tr = $db->query('SELECT username FROM sess');
$traf = mysqli_num_rows($tr);