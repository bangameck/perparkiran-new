<?php

/**
 * @author [bangameck.rra]
 * @email [rahmad.looker@gmail.com]
 * @create date 2021-06-11 14:32:29
 * @modify date 2021-06-11 14:34:09
 * @desc [description]
 */

function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function tgl_indo_singkat($tanggal)
{
  $bulan = array(
    1 =>   'Jan',
    'Feb',
    'Mar',
    'Apr',
    'Mei',
    'Jun',
    'Jul',
    'Agu',
    'Sep',
    'Okt',
    'Nov',
    'Des'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

//hari aja
function hari($hari_input)
{
  // $hari = date ("D");
  $hari = $hari_input;

  switch ($hari) {
    case 'Sun':
      $hari_ini = "Minggu";
      break;

    case 'Mon':
      $hari_ini = "Senin";
      break;

    case 'Tue':
      $hari_ini = "Selasa";
      break;

    case 'Wed':
      $hari_ini = "Rabu";
      break;

    case 'Thu':
      $hari_ini = "Kamis";
      break;

    case 'Fri':
      $hari_ini = "Jumat";
      break;

    case 'Sat':
      $hari_ini = "Sabtu";
      break;

    default:
      $hari_ini = "Tidak di ketahui";
      break;
  }

  // return "<b>" . $hari_ini . "</b>";
  return $hari_ini;
}

//Fungsi ambil tanggal aja
function tgl_aja($tgl_a)
{
  $tanggal = substr($tgl_a, 8, 2);
  return $tanggal;
}

//Fungsi Ambil bulan aja
function bln_aja($bulan_a)
{
  $bulan = getBulan(substr($bulan_a, 5, 2));
  return $bulan;
}

//Fungsi Ambil tahun aja
function thn_aja($thn)
{
  $tahun = substr($thn, 0, 4);
  return $tahun;
}

//Fungsi konversi tanggal bulan dan tahun ke dalam bahasa indonesia
function tgl_indo2($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = getBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
//Fungsi konversi nama bulan ke dalam bahasa indonesia
function getBulan($bln)
{
  switch ($bln) {
    case 1:
      return "Januari";
      break;

    case 2:
      return "Februari";
      break;

    case 3:
      return "Maret";
      break;

    case 4:
      return "April";
      break;

    case 5:
      return "Mei";
      break;

    case 6:
      return "Juni";
      break;

    case 7:
      return "Juli";
      break;

    case 8:
      return "Agustus";
      break;

    case 9:
      return "September";
      break;

    case 10:
      return "Oktober";
      break;

    case 11:
      return "November";
      break;

    case 12:
      return "Desember";
      break;
  }
}


function time_ago($timestamp)
{
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $time_difference = $current_time - $time_ago;
  $seconds = $time_difference;
  $minutes      = round($seconds / 60);        // value 60 is seconds  
  $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
  $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
  $weeks        = round($seconds / 604800);     // 7*24*60*60;  
  $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
  $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
  if ($seconds <= 60) {
    return "Just Now";
  } else if ($minutes <= 60) {
    if ($minutes == 1) {
      return "one minute ago";
    } else {
      return "$minutes minutes ago";
    }
  } else if ($hours <= 24) {
    if ($hours == 1) {
      return "an hour ago";
    } else {
      return "$hours hrs ago";
    }
  } else if ($days <= 7) {
    if ($days == 1) {
      return "yesterday";
    } else {
      return "$days days ago";
    }
  } else if ($weeks <= 4.3) {  //4.3 == 52/12
    if ($weeks == 1) {
      return "a week ago";
    } else {
      return "$weeks weeks ago";
    }
  } else if ($months <= 12) {
    if ($months == 1) {
      return "a month ago";
    } else {
      return "$months months ago";
    }
  } else {
    if ($years == 1) {
      return "one year ago";
    } else {
      return "$years years ago";
    }
  }
}
