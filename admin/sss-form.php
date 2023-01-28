<?php 
require_once('../plugin/fpdf/fpdf.php');
require_once('../plugin/FPDI/src/autoload.php');
use \setasign\Fpdi\Fpdi;
$pdf = new FPDI();
$pdf->AddPage(); 
$pdf->setSourceFile('../forms/sss.pdf'); 
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 0, 0, 208);
$pdf->SetFont('Arial','B',10);
$pdf->Text(20.5, 62, "X");
$pdf->SetFont('Arial','',8.5);
$pdf->Text(10, 74, "XXXXX-XXXXX-XXXXX");#employer number
$pdf->Text(10, 83, "CHATEAU VALENZUELA HOME OWNERS ASSOCIATION INC.");#employer name
$pdf->Text(14, 95, "RM/FLR/UNIT NO. & BLDG. NAME - brgy");#address hanggang barangay only
$pdf->Text(20, 103, "VALENZUELA CITY");#city
$pdf->Text(65, 103, "KALAKHANG MAYNILA");#province
$pdf->Text(112, 103, "zip code");#zip code
$pdf->Text(140, 103, "TIN");#TIN
$pdf->Text(13, 112, "044-xxx-xxx");#telephone number
$pdf->Text(63, 112, "09xx-xxx-xxxx");#Mobile number
$pdf->Text(120.5, 112, "juandelacruz@domain.com");#email
$pdf->Text(161, 112, "domain.com");#website

$pdf->Text(41.5, 129, "2022");#January Year
$pdf->Text(41.5, 133.5, "2022");#Feb Year
$pdf->Text(41.5, 138, "2022");#mar Year
$pdf->Text(41.5, 142.5, "2022");#apr Year
$pdf->Text(41.5, 147, "2022");#may Year
$pdf->Text(41.5, 151.5, "2022");#jun Year
$pdf->Text(41.5, 156, "2022");#jul Year
$pdf->Text(41.5, 160.5, "2022");#aug Year
$pdf->Text(41.5, 165, "2022");#sep Year
$pdf->Text(41.5, 169.5, "2022");#oct Year
$pdf->Text(41.5, 174, "2022");#nov Year
$pdf->Text(41.5, 178.5, "2022");#dec Year

$pdf->Text(59.5, 129, "1,000,000.00");#SS Contribution jan
$pdf->Text(59.5, 133.5, "1,000,000.00");#SS Contribution feb
$pdf->Text(59.5, 138, "1,000,000.00");#SS Contribution mar
$pdf->Text(59.5, 142.5, "1,000,000.00");#SS Contribution apr
$pdf->Text(59.5, 147, "1,000,000.00");#SS Contribution may
$pdf->Text(59.5, 151.5, "1,000,000.00");#SS Contribution june
$pdf->Text(59.5, 156, "1,000,000.00");#SS Contribution july
$pdf->Text(59.5, 160.5, "1,000,000.00");#SS Contribution aug
$pdf->Text(59.5, 165, "1,000,000.00");#SS Contribution sep
$pdf->Text(59.5, 169.5, "1,000,000.00");#SS Contribution oct
$pdf->Text(59.5, 174, "1,000,000.00");#SS Contribution nov
$pdf->Text(59.5, 178.5, "1,000,000.00");#SS Contribution dec
$pdf->Text(59.5, 184, "1,000,000.00");#SS Contribution penalty
$pdf->Text(59.5, 188.3, "1,000,000.00");#SS Contribution underpayment
$pdf->Text(59.5, 193.2, "1,000,000.00");#SS Contribution subtotal

$pdf->Text(109, 129, "1,000,000.00");#EC Contribution jan
$pdf->Text(109, 133.5, "1,000,000.00");#EC Contribution feb
$pdf->Text(109, 138, "1,000,000.00");#EC Contribution mar
$pdf->Text(109, 142.5, "1,000,000.00");#EC Contribution apr
$pdf->Text(109, 147, "1,000,000.00");#EC Contribution may
$pdf->Text(109, 151.5, "1,000,000.00");#EC Contribution june
$pdf->Text(109, 156, "1,000,000.00");#EC Contribution july
$pdf->Text(109, 160.5, "1,000,000.00");#EC Contribution aug
$pdf->Text(109, 165, "1,000,000.00");#EC Contribution sep
$pdf->Text(109, 169.5, "1,000,000.00");#EC Contribution oct
$pdf->Text(109, 174, "1,000,000.00");#EC Contribution nov
$pdf->Text(109, 178.5, "1,000,000.00");#EC Contribution dec
$pdf->Text(109, 184, "1,000,000.00");#EC Contribution penalty
$pdf->Text(109, 188.3, "1,000,000.00");#EC Contribution underpayment
$pdf->Text(109, 193.2, "1,000,000.00");#EC Contribution subtotal

$pdf->Text(152, 129, "1,000,000.00");#TOTAL Contribution jan
$pdf->Text(152, 133.5, "1,000,000.00");#TOTAL Contribution feb
$pdf->Text(152, 138, "1,000,000.00");#TOTAL Contribution mar
$pdf->Text(152, 142.5, "1,000,000.00");#TOTAL Contribution apr
$pdf->Text(152, 147, "1,000,000.00");#TOTAL Contribution may
$pdf->Text(152, 151.5, "1,000,000.00");#TOTAL Contribution june
$pdf->Text(152, 156, "1,000,000.00");#TOTAL Contribution july
$pdf->Text(152, 160.5, "1,000,000.00");#TOTAL Contribution aug
$pdf->Text(152, 165, "1,000,000.00");#TOTAL Contribution sep
$pdf->Text(152, 169.5, "1,000,000.00");#TOTAL Contribution oct
$pdf->Text(152, 174, "1,000,000.00");#TOTAL Contribution nov
$pdf->Text(152, 178.5, "1,000,000.00");#TOTAL Contribution dec
$pdf->Text(152, 184, "1,000,000.00");#TOTAL Contribution penalty
$pdf->Text(152, 188.3, "1,000,000.00");#TOTAL Contribution underpayment
$pdf->Text(152, 193.2, "1,000,000.00");#TOTAL Contribution subtotal
$pdf->Text(152, 199, "1,000,000.00");#TOTAL amount of payment subtotal

$pdf->SetFont('Arial','B',12);
$pdf->Text(110, 208, "ONE MILLION PESOS");#TOTAL amount in WORDS

$pdf->Output(); 
?>