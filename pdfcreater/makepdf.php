<?php

require('tfpdf/tfpdf.php');
$pdf = new tFPDF;

$pdf->AddFont('ShipporiMincho','','ShipporiMincho-TTF-Regular.ttf',true);

$names = explode(',', $_GET['names']);

foreach ($names as $name) {
  
  $pdf->SetFont('ShipporiMincho','',14);
  $pdf->AddPage();
  $pdf->Cell(0, 10, '英単語学習プリント');
  $pdf->Ln(1);
  $pdf->Cell(100);
  $pdf->Cell(90, 10, '名前 : '.$name, 'B');
  
  $pdf->Ln(15);
  make_contents();
}

$pdf->Output();

function make_contents() {
  global $pdf;

  $contents = explode(',', $_GET['contents']);
  $count = 0;

  foreach ($contents as $content) {
    $count++;

    $pdf->SetFont('ShipporiMincho','',12);
    $pdf->Cell(20,10,'('.$count.')');
    $pdf->Cell(50,10,$content);
    $pdf->Cell(30,10,'(                          )');
    $pdf->Ln(10);
  }
}
