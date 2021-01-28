<?php

require('tfpdf/tfpdf.php');
$pdf = new tFPDF;

$pdf->AddFont('ShipporiMincho','','ShipporiMincho-TTF-Regular.ttf',true);

$pdf->AddPage();

function make_contents() {
  global $pdf;

  $answers = explode(',', $_GET['answers']);
  $count = 0;

  foreach ($answers as $answer) {
    $count++;

    $pdf->SetFont('ShipporiMincho','',12);
    $pdf->Cell(20,10,'('.$count.')');
    $pdf->Cell(50,10,$answer);
    $pdf->Ln(10);
  }
}
make_contents();

$pdf->Output();