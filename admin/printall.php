<?php
 if(isset($_POST['data'])){
  include '../timezone.php';
$date = date('m/d/Y');
  $raw = $_POST['data'];
  $dataDecoded = base64_decode($raw);
  $data = json_decode($dataDecoded, true);
  // var_dump($data);

  require('../plugin/fpdf/fpdf.php');
  $pdf = new FPDF('P','mm',array(80,190));
  foreach ($data as $employee) {
    $name = $employee['name'];
    $role = $employee['role'];

    $daily = $employee['rate']['daily'];
    $monthly = $employee['rate']['monthly'];
    $hourly = $employee['rate']['hourly'];
    // id
    $PagIbig = $employee['IDs']['PagIbig'];
    $SSS = $employee['IDs']['SSS'];
    $PhilHealth = $employee['IDs']['PhilHealth'];

    // gross
    $presentDays = $employee['gross']['presentDays']['qty'];
    $presentDaysTotal = $employee['gross']['presentDays']['amount'];
    $othrs = $employee['gross']['overtime']['qty'];
    $othrsTotal = $employee['gross']['overtime']['amount'];
    $holidayQty = $employee['gross']['holidays']['qty'];
    $holidayTotal = $employee['gross']['holidays']['amount'];
    $paidLeaveQty = $employee['gross']['leave']['qty'];
    $paidLeaveAmount = $employee['gross']['leave']['amount'];

    // deductions
    $SSSdeduc = $employee['deduction']['SSS'];
    $PagIbigdeduc = $employee['deduction']['PagIbig'];
    $PhilHealthdeduc = $employee['deduction']['PhilHealth'];
    $CashAdvanceQty = $employee['deduction']['CashAdvance']['qty'];
    $CashAdvancededuc = $employee['deduction']['CashAdvance']['amount'];

    $gross = $employee['total']['gross'];
    //total
    $deduction = $employee['total']['deduction'];
    $net = $employee['total']['net'];

    $from = date('F d, Y', strtotime($employee['date']['from']));
    $to = date('F d, Y', strtotime($employee['date']['to']));

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
    $pdf->Cell(15,8,'PHP '.number_format($monthly, 2),0,1,'L'); #monthly rate
    
    $pdf->Cell(20,0,'Daily Rate: ',0,0,'L');
    $pdf->Cell(15,0,'PHP '.number_format($daily, 2),0,1,'L'); #Daily Rate here
    
    $pdf->Cell(20,8,'Hourly Rate: ',0,0,'L');
    $pdf->Cell(15,8,'PHP '.number_format($hourly, 2),0,1,'L'); #Hourly rate
    
    $pdf->Line(10,70,70,70);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(190,5,'Payslip Period:',0,1,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(190,5,$from.' - '.$to,0,1,'L');#Period here
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(190,5,'Income:',0,1,'L');
    
    #add starts here
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,7,'Add:',0,0,'L');
    $pdf->Cell(20,7,'Quantity:',0,0,'L');
    $pdf->Cell(20,7,'Amount:',0,1,'L');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(27,5,'Present Days: ',0,0,'L');
    $pdf->Cell(17,5,$presentDays,0,0,'L'); #Present Days Quantity
    $pdf->Cell(27,5,'PHP'.number_format($presentDaysTotal, 2),0,1,'L'); #Total Present Days
    
    $pdf->Cell(27,5,'Overtime Hours: ',0,0,'L');
    $pdf->Cell(17,5,$othrs,0,0,'L'); #Overtime Quantity
    $pdf->Cell(27,5,'PHP '.number_format($othrsTotal, 2),0,1,'L'); #Overtime Total
    
    $pdf->Cell(27,5,'Paid Leave: ',0,0,'L');
    $pdf->Cell(17,5,$paidLeaveQty,0,0,'L'); #Paid Leaves Quantity
    $pdf->Cell(27,5,'PHP '.number_format($paidLeaveAmount, 2),0,1,'L'); #Paid Leaves Total
    
    $pdf->Cell(27,5,'Holidays: ',0,0,'L');
    $pdf->Cell(17,5,$holidayQty,0,0,'L'); #Gross Quantity Here
    $pdf->Cell(27,5,'PHP '.number_format($holidayTotal, 2),0,1,'L'); #Gross Total here
    
    $pdf->Line(70,113,35,113);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(25,5,'TOTAL GROSS:',0,0,'L');
    $pdf->Cell(3,5,'',0,0,'L');
    $pdf->Cell(40,5,'PHP '.number_format($gross, 2),0,1,'C');#Gross Total here
    
    #ADD Ends Here
    #LESS Starts Here
    
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,7,'Less:',0,0,'L');
    $pdf->Cell(20,7,'Quantity:',0,0,'L');
    $pdf->Cell(20,7,'Amount:',0,1,'L');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(27,5,'SSS: ',0,0,'L');
    $pdf->Cell(17,5,'',0,0,'L');
    $pdf->Cell(27,5,'PHP '.number_format($SSSdeduc, 2),0,1,'L'); #SSS Total
    
    $pdf->Cell(27,5,'Pag-Ibig: ',0,0,'L');
    $pdf->Cell(17,5,'',0,0,'L');
    $pdf->Cell(27,5,'PHP '.number_format($PagIbigdeduc, 2),0,1,'L'); #PagIbig Tota27
    
    $pdf->Cell(27,5,'PhilHealth: ',0,0,'L');
    $pdf->Cell(17,5,'',0,0,'L'); 
    $pdf->Cell(27,5,'PHP '.number_format($PhilHealthdeduc, 2),0,1,'L'); #PhilHealth Tota27
    
    $pdf->Cell(27,5,'Cash Advance: ',0,0,'L');
    $pdf->Cell(17,5,$CashAdvanceQty,0,0,'L'); #CA Quantity
    $pdf->Cell(27,5,'PHP '.number_format($CashAdvancededuc, 2),0,1,'L'); #CA Tota27
    
    $pdf->Cell(27,5,'Others:',0,0,'L');
    $pdf->Cell(17,5,'0',0,0,'L'); #Other Deductions Quantity
    $pdf->Cell(27,5,'PHP '.'0',0,1,'L'); #Other Deductions
    
    $pdf->Line(70,150,35,150);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(25,5,'TOTAL DEDUCTION:',0,0,'L');
    $pdf->Cell(3,5,'',0,0,'L');
    $pdf->Cell(40,5,'PHP -'.number_format($deduction, 2),0,1,'C'); #Insert Total Deduction here
    
    #LESS Ends Here
    
    $pdf->SetFont('Arial','B',11);
    $pdf->SetFillColor(28,157,255);
    $pdf->Cell(60,10,'TOTAL NET:   PHP '.number_format($net, 2),1,1,'C',False); #Insert Total Net Here
    
      }
  
  $pdf->Output();
}
//     include 'session/check_session.php';

//   if(isset($_GET['data'])){
//     include '../timezone.php';
// $date = date('m/d/Y');
//     $raw = $_GET['data'];
//     $dataDecoded = base64_decode($raw);
//     $data = json_decode($dataDecoded, true);
//     // var_dump($data);

//     require('../plugin/fpdf/fpdf.php');
//     $pdf = new FPDF();
//     foreach ($data as $employee) {
//       $name = $employee['name'];
//       $role = $employee['role'];

//       $daily = $employee['rate']['daily'];
//       $monthly = $employee['rate']['monthly'];
//       $hourly = $employee['rate']['hourly'];
//       // id
//       $PagIbig = $employee['IDs']['PagIbig'];
//       $SSS = $employee['IDs']['SSS'];
//       $PhilHealth = $employee['IDs']['PhilHealth'];

//       // gross
//       $presentDays = $employee['gross']['presentDays']['qty'];
//       $presentDaysTotal = $employee['gross']['presentDays']['amount'];
//       $othrs = $employee['gross']['overtime']['qty'];
//       $othrsTotal = $employee['gross']['overtime']['amount'];
//       $holidayQty = $employee['gross']['holidays']['qty'];
//       $holidayTotal = $employee['gross']['holidays']['amount'];

//       // deductions
//       $SSSdeduc = $employee['deduction']['SSS'];
//       $PagIbigdeduc = $employee['deduction']['PagIbig'];
//       $PhilHealthdeduc = $employee['deduction']['PhilHealth'];
//       $CashAdvanceQty = $employee['deduction']['CashAdvance']['qty'];
//       $CashAdvancededuc = $employee['deduction']['CashAdvance']['amount'];

//       $gross = $employee['total']['gross'];
//       //total
//       $deduction = $employee['total']['deduction'];
//       $net = $employee['total']['net'];

//       $from = date('F d, Y', strtotime($employee['date']['from']));
//       $to = date('F d, Y', strtotime($employee['date']['to']));

//       $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(190,20,'Payslip',1,1,'C');

// #Details
// $pdf->SetFont('Arial','',10);

// $pdf->Cell(15,10,'Name: ',0,0,'L');
// $pdf->Cell(15,10,$name,0,0,'L'); #employee Name here

// $pdf->Cell(135,10,'Date: ',0,0,'R');
// $pdf->Cell(21,10,$date,0,1,'R'); #Current date here

// $pdf->Cell(15,0,'Role: ',0,0,'L');
// $pdf->Cell(15,0,$role,0,0,'L'); #Role here

// $pdf->Cell(135,0,'SSS: ',0,0,'R');
// $pdf->Cell(20,0,$SSS,0,1,'R'); #SSS here

// $pdf->Cell(25,10,'Monthly Rate: ',0,0,'L');
// $pdf->Cell(15,10,$monthly,0,0,'L'); #monthly rate

// $pdf->Cell(125,10,'Pag-Ibig: ',0,0,'R');
// $pdf->Cell(26,10,$PagIbig,0,1,'R'); #PagIbig number here

// $pdf->Cell(25,0,'Daily Rate: ',0,0,'L');
// $pdf->Cell(15,0,$daily,0,0,'L'); #Daily Rate here

// $pdf->Cell(125,0,'Philhealth: ',0,0,'R');
// $pdf->Cell(26,0,$PhilHealth,0,1,'R'); #PhilHealth Number here

// $pdf->Cell(25,10,'Hourly Rate: ',0,0,'L');
// $pdf->Cell(15,10,$hourly,0,0,'L'); #Hourly rate

// $pdf->Line(10,60,200,60);
// $pdf->Ln(10);
// $pdf->SetFont('Arial','B',13);
// $pdf->Cell(190,10,'Payroll Period:',0,1,'L');
// $pdf->Cell(190,10,$from.' - '.$to,0,1,'L');#Period here
// $pdf->Cell(190,10,'Income:',0,1,'L');

// $pdf->SetFont('Arial','B',10);
// $pdf->Cell(45,10,'Add:',0,0,'L');
// $pdf->Cell(45,10,'Quantity:',0,0,'L');
// $pdf->Cell(45,10,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',10);
// $pdf->Cell(45,5,'Present Days: ',0,0,'L');
// $pdf->Cell(45,5,$presentDays,0,0,'L'); #Present Days Quantity
// $pdf->Cell(45,5,$presentDaysTotal,0,1,'L'); #Total Present Days

// $pdf->Cell(45,5,'Overtime Hours: ',0,0,'L');
// $pdf->Cell(45,5,$othrs,0,0,'L'); #Overtime Quantity
// $pdf->Cell(45,5,$othrsTotal,0,1,'L'); #Overtime Total
// $pdf->Cell(45,5,'Holidays: ',0,0,'L');
// $pdf->Cell(45,5,$holidayQty,0,0,'L'); #Gross Quantity Here
// $pdf->Cell(45,5,$holidayTotal,0,1,'L'); #Gross Total here

// $pdf->Line(90,115,120,115);
// $pdf->SetFont('Arial','B',11);
// $pdf->Cell(45,5,'GROSS Total',0,0,'L');
// $pdf->Cell(32,5,'',0,0,'L');
// $pdf->Cell(40,5,$gross,0,1,'C');#Gross Total here

// #ADD Ends Here
// #LESS Starts Here

// $pdf->SetFont('Arial','B',10);
// $pdf->Cell(45,10,'Less:',0,0,'L');
// $pdf->Cell(45,10,'Quantity:',0,0,'L');
// $pdf->Cell(45,10,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',10);
// $pdf->Cell(45,5,'SSS: ',0,0,'L');
// $pdf->Cell(45,5,'',0,0,'L');
// $pdf->Cell(45,5,$SSSdeduc,0,1,'L'); #SSS Total

// $pdf->Cell(45,5,'Pag-Ibig: ',0,0,'L');
// $pdf->Cell(45,5,'',0,0,'L');
// $pdf->Cell(45,5,$PagIbigdeduc,0,1,'L'); #PagIbig Total

// $pdf->Cell(45,5,'PhilHealth: ',0,0,'L');
// $pdf->Cell(45,5,'',0,0,'L'); 
// $pdf->Cell(45,5,$PhilHealthdeduc,0,1,'L'); #PhilHealth Total

// $pdf->Cell(45,5,'Cash Advance: ',0,0,'L');
// $pdf->Cell(45,5,$CashAdvanceQty,0,0,'L'); #CA Quantity
// $pdf->Cell(45,5,$CashAdvancededuc,0,1,'L'); #CA Total

// $pdf->Cell(45,5,'Others:',0,0,'L');
// $pdf->Cell(45,5,'0',0,0,'L'); #Other Deductions Quantity
// $pdf->Cell(45,5,'0',0,1,'L'); #Other Deductions

// $pdf->Line(90,155,120,155);
// $pdf->SetFont('Arial','B',11);
// $pdf->Cell(45,5,'TOTAL DEDUCTION',0,0,'L');
// $pdf->Cell(32,5,'',0,0,'L');
// $pdf->Cell(40,5,$deduction,0,1,'C'); #Insert Total Deduction here

// #LESS Ends Here

// $pdf->SetFont('Arial','B',15);
// $pdf->SetFillColor(28,157,255);
// $pdf->Cell(45,20,'',0,0,'L');
// $pdf->Cell(25,12,'TOTAL NET',0,0,'L');
// $pdf->Cell(10,5,'',0,0,'L');
// $pdf->Cell(32,12,$net,0,1,'C',TRUE); #Insert Total Net Here

//     }
    
//     $pdf->Output();
//   }
?>