<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

function slug($text = '')
{
    $text = trim($text);
    if (empty($text)) return '';
    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
    $text = strtolower(trim($text));
    $text = str_replace(' ', '-', $text);
    $text = preg_replace('/\-{2,}/', '-', $text);
    return $text;
}

function nospace($text = '') {
    $text = str_replace(' ', '', $text);
    return $text;
}