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
        include "_template/front_adm/head.php";
    } else if ($folder == 'page-header') {
        include "_template/front_adm/page-header.php";
    } else if ($folder == 'search') {
        include "_template/front_adm/search.php";
    } else if ($folder == 'mobile-logo') {
        include "_template/front_adm/mobile-logo.php";
    } else if ($folder == 'header-menu') {
        include "_template/front_adm/header-menu.php";
    } else if ($folder == 'lang-menu') {
        include "_template/front_adm/lang-menu.php";
    } else if ($folder == 'user-profile-menu') {
        include "_template/front_adm/user-profile-menu.php";
    } else if ($folder == 'side-logo') {
        include "_template/front_adm/side-logo.php";
    } else if ($folder == 'menu') {
        include "_template/front_adm/menu.php";
    } else if ($folder == 'footer') {
        include "_template/front_adm/footer.php";
    } else if ($folder == 'js') {
        include "_template/front_adm/js.php";
    }
}

function template_apl($file)
{
    if ($file == 'head')  {
        include "_template/front_web/head.php";
    } else if ($file == 'top-bar')  {
        include "_template/front_web/top-bar.php";
    } else if ($file == 'js')  {
        include "_template/front_web/js.php";
    } else if ($file == 'head-logo')  {
        include "_template/front_web/head-logo.php";
    } else if ($file == 'top-search')  {
        include "_template/front_web/top-search.php";
    } else if ($file == 'primary-menu')  {
        include "_template/front_web/primary-menu.php";
    } else if ($file == 'form-search')  {
        include "_template/front_web/form-search.php";
    } else if ($file == 'footer-widget')  {
        include "_template/front_web/footer-widget.php";
    } else if ($file == 'footer-cr')  {
        include "_template/front_web/footer-cr.php";
    } else if ($file == 'head-ads')  {
        include "_template/front_web/head-ads.php";
    }
}