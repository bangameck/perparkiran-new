<?php 
/**
 * @author [bangameck.dev]
 * @email [rahmad.looker@mail.com]
 * @create date 2021-07-05 10:10:17
 * @modify date 2021-07-05 10:10:17
 * @desc [description]
 */


function usia($tanggal_lahir){ // Y
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun");
	}
	$y = $today->diff($birthDate)->y;
	return $y." tahun ";
}

function usia_lengkap($tanggal_lahir){ // Y-m-d
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y." tahun ".$m." bulan ".$d." hari";
}
?>