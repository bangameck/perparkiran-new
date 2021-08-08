<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

function template($folder)
{
    //web
    if ($folder == 'head') {
        include "_template/head.php";
    } else if ($folder == 'page-header') {
        include "_template/page-header.php";
    } else if ($folder == 'search') {
        include "_template/search.php";
    } else if ($folder == 'mobile-logo') {
        include "_template/mobile-logo.php";
    } else if ($folder == 'header-menu') {
        include "_template/header-menu.php";
    } else if ($folder == 'lang-menu') {
        include "_template/lang-menu.php";
    } else if ($folder == 'user-profile-menu') {
        include "_template/user-profile-menu.php";
    } else if ($folder == 'side-logo') {
        include "_template/side-logo.php";
    } else if ($folder == 'menu') {
        include "_template/menu.php";
    } else if ($folder == 'footer') {
        include "_template/footer.php";
    } else if ($folder == 'js') {
        include "_template/js.php";
    }
}