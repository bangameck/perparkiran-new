<?php

/**
 * @author [bangameck.rra]
 * @email [rahmad.looker@gmail.com]
 * @create date 2021-06-11 14:32:29
 * @modify date 2021-06-11 14:34:09
 * @desc [description]
 */

//Acak Angka
function uid($jml_kar)
{
    $karakter = '1234567890';
    $string = '';
    for ($i = 0; $i < $jml_kar; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

//Acak Huruf Kecil Besar dan Angka
function hurufangka($huruf_angka)
{
    $karakter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $string = '';
    for ($i = 0; $i < $huruf_angka; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

//huruf besar kecil
function acakhbhk($huruf_angka)
{
    $karakter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($i = 0; $i < $huruf_angka; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

//hufur besar angka
function acakhba($huruf_angka)
{
    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $string = '';
    for ($i = 0; $i < $huruf_angka; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

//Acak Huruf Besar
function acakhb($huruf_angka)
{
    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($i = 0; $i < $huruf_angka; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

//huruf kecil angka
function acakhka($huruf_angka)
{
    $karakter = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $string = '';
    for ($i = 0; $i < $huruf_angka; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

//Acak Huruf Kecil
function acakhk($huruf_angka)
{
    $karakter = 'abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for ($i = 0; $i < $huruf_angka; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

function verify()
{
    return sprintf(
        '%04x%04x%04x%04x%04x%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}

function singkat_kata($text, $length, $mode = 2)
{
    if ($mode != 1) {
        $char = $text[$length - 1];
        switch ($mode) {
            case 2:
                while ($char != ' ') {
                    $char = $text[--$length];
                }
            case 3:
                while ($char != ' ') {
                    $char = $text[++$length];
                }
        }
    }
    return substr($text, 0, $length) . '...';
}

function judul($text, $length)
{
    $char = $text[$length - 1];
    while ($char != ' ') {
        $char = $text[--$length];
    }
    echo substr($text, 0, $length) . '...';
}

function createToken()
{
    $token = base64_encode(openssl_random_pseudo_bytes(32));
    $_SESSION['csrfvalue'] = $token;
    return $token;
}
