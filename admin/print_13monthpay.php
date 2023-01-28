<?php
$data = $_POST['data'];
$decodedData = base64_decode($data);
$rows = json_decode($decodedData, true);

include '../timezone.php';
$date = date('m/d/Y');

require('../plugin/fpdf/fpdf.php');
$pdf = new FPDF('P','mm',array(80,180));

foreach ($rows as $row) {
  // var_dump($row);
  $name = $row['name'];
  $role = $row['role'];
  // rate
  $monthly = number_format($row['rate']['monthly'], 2);
  $daily = number_format($row['rate']['daily'], 2);
  $hourly = number_format($row['rate']['hourly'], 2);

  $total = number_format($row['total'], 2);
  // id
  $SSS = 2;
  $PagIbig = 2;
  $PhilHealth = 2;

  $pdf->AddPage();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(60,20,'',1,1,'R');
  $pdf->Text(29, 19, "Chateau Condominium");
  $pdf->SetFont('Arial','',5);
  $pdf->Text(29, 22, "16 P. Gregorio Street, Lungsod ng Valenzuela,");
  $pdf->Text(29, 24, "1446 Kalakhang Maynila");
  $pdf->Image('../img/favicon.png', 11, 13, 15);
  
  #Details
  $pdf->SetFont('Arial','',8);
  
  $pdf->Cell(10,8,'Name: ',0,0,'L');
  $pdf->Cell(15,8,$name,0,1,'L'); #employee Name here
  
  $pdf->Cell(10,0,'Role: ',0,0,'L');
  $pdf->Cell(15,0,$role,0,1,'L'); #Role here
  
  $pdf->Cell(10,8,'Date: ',0,0,'L');
  $pdf->Cell(15,8,$date,0,1,'L'); #Current date here
  
  $pdf->Cell(14,0,'SSS: ',0,0,'L');
  $pdf->Cell(15,0,$SSS,0,1,'L'); #SSS here
  
  $pdf->Cell(14,8,'Pag-Ibig: ',0,0,'L');
  $pdf->Cell(15,8,$PagIbig,0,1,'L'); #PagIbig number here
  
  $pdf->Cell(14,0,'Philhealth: ',0,0,'L');
  $pdf->Cell(15,0,$PhilHealth,0,1,'L'); #PhilHealth Number here
  
  $pdf->Line(10,57,70,57);
  $pdf->Cell(20,1.5,'',0,1,'L');
  $pdf->Cell(20,8,'Monthly Rate: ',0,0,'L');
  $pdf->Cell(15,8,'PHP '. $monthly,0,1,'L'); #monthly rate
  
  $pdf->Cell(20,0,'Daily Rate: ',0,0,'L');
  $pdf->Cell(15,0,'PHP '. $daily,0,1,'L'); #Daily Rate here
  
  $pdf->Cell(20,8,'Hourly Rate: ',0,0,'L');
  $pdf->Cell(15,8,'PHP '. $hourly,0,1,'L'); #Hourly rate
  
  $pdf->Line(10,70,70,70);
  $pdf->SetFont('Arial','',9);
  $pdf->SetFont('Arial','B',9);
  $pdf->Cell(190,5,'13th Month Computation:',0,1,'L');
  
  #add starts here
  $pdf->SetFont('Arial','B',9);
  $pdf->Cell(20,7,'Month:',0,0,'L');
  $pdf->Cell(20,7,'Hours:',0,0,'L');
  $pdf->Cell(20,7,'Basic Pay:',0,1,'L');
  
  foreach ($row['months'] as $key => $value) {
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(27,5, $key.': ',0,0,'L');
    $pdf->Cell(17,5,$row['hours'][$key],0,0,'L'); #Hours
    $pdf->Cell(27,5,'PHP '.number_format($value, 2),0,1,'L'); #Total Basic Pay
  }

  // 
  
  $pdf->Line(70,143.5,35,143.5);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(25,5,'Total Hours:',0,0,'L');
  $pdf->Cell(3,5,$row['totalHrs'],0,0,'L'); #Total Hours
  $pdf->Cell(40,5,'Total: PHP '.number_format($row['totalBasicPay'], 2),0,1,'C');#Gross Total here
  
  #ADD Ends Here
  
  #LESS Ends Here
  
  $pdf->SetFont('Arial','B',10);
  $pdf->SetFillColor(28,157,255);
  $pdf->Cell(60,10,'13th Month Pay Total: '.$total,1,1,'C',False); #Insert Total Net Here
  
}
$pdf->Output();
// mga na extract na
