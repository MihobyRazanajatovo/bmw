<?php
require('fpdf16/fpdf.php');
include('function.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 16);

$f = getDernierFacture();
$vue = getView($f);
$total = getTotalFacture($f);

$pdf->Cell(0, 10, 'Votre facture', 0, 1, 'C');
$pdf->Ln(10);

$pdf->Cell(20, 10, 'Client:', 0);
$pdf->Cell(0, 10, $vue[0]['client_nom'], 0, 1);

$pdf->Cell(20, 10, 'Date:', 0);
$pdf->Cell(0, 10, $vue[0]['dateCommande'], 0, 1);

$pdf->Cell(20, 10, 'Heure:', 0);
$pdf->Cell(0, 10, $vue[0]['timeCommande'], 0, 1);
$pdf->Ln(10);

$pdf->Cell(40, 10, 'Designation', 1, 0, 'C');
$pdf->Cell(30, 10, 'P.U', 1, 0, 'C');
$pdf->Cell(30, 10, 'Quantite', 1, 0, 'C');
$pdf->Cell(40, 10, 'Sous Total', 1, 1, 'C');
$pdf->Ln();

foreach ($vue as $item) {
    $pdf->Cell(40, 10, $item['nomVetement'], 1, 0);
    $pdf->Cell(30, 10, $item['PrixUnitaire'], 1, 0);
    $pdf->Cell(30, 10, $item['quantite'], 1, 0);
    $pdf->Cell(40, 10, $item['sous_total'], 1, 0);
    $pdf->Ln();
}

$pdf->Cell(0, 10, 'Total: ' . $total[0]['total'], 0, 1);

$pdf->Output('facture.pdf', 'D');
?>
