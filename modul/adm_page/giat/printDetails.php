<?php
include_once '../../_func/func.php';
require('../../vendor/fpdf/fpdf.php');

$giat=$db->query("SELECT * FROM giat WHERE id_giat='06.711/Keg-Par/DP-KP/PRK/VII/2021'")->fetch_assoc();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->Output();
$pdf->SetAuthor($title, false);
?>