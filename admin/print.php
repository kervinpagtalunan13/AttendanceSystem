<?php
$data = $_GET['data'];
$decodedData = base64_decode($data);
// var_dump();
$row = json_decode($decodedData, true);
include '../timezone.php';
$date = date('m/d/Y');
// echo $row['rate']['monthly'];
// mga na extract na
$name = $row['name'];
$role = $row['role'];
// rate
$monthly = $row['rate']['monthly'];
$daily = $row['rate']['daily'];
$hourly = $row['rate']['hourly'];
// id
$SSS = $row['IDs']['SSS'];
$PagIbig = $row['IDs']['PagIbig'];
$PhilHealth = $row['IDs']['PhilHealth'];

// gross
$presentDays = $row['gross']['presentDays']['qty'];
$presentDaysTotal = $row['gross']['presentDays']['amount'];
$othrs = $row['gross']['overtime']['qty'];
$othrsTotal = $row['gross']['overtime']['amount'];
$holidayQty = $row['gross']['holidays']['qty'];
$holidayTotal = $row['gross']['holidays']['amount'];
$paidLeaveQty = $row['gross']['leave']['qty'];
$paidLeaveAmount = $row['gross']['leave']['amount'];
// deductions
$SSSdeduc = $row['deduction']['SSS'];
$PagIbigdeduc = $row['deduction']['PagIbig'];
$PhilHealthdeduc = $row['deduction']['PhilHealth'];
$CashAdvanceQty = $row['deduction']['CashAdvance']['qty'];
$CashAdvancededuc = $row['deduction']['CashAdvance']['amount'];

//total
$gross = $row['total']['gross'];
$deduction = $row['total']['deduction'];
$net = $row['total']['net'];

$from = date('F d, Y', strtotime($row['date']['from']));
$to = date('F d, Y', strtotime($row['date']['to']));



require('../plugin/fpdf/fpdf.php');
$pdf = new FPDF('P','mm',array(80,190));
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

$pdf->Output();



// $data = $_GET['data'];
// $decodedData = base64_decode($data);
// // var_dump();
// $row = json_decode($decodedData, true);
// include '../timezone.php';
// $date = date('m/d/Y');
// // echo $row['rate']['monthly'];
// // mga na extract na
// $name = $row['name'];
// $role = $row['role'];
// // rate
// $monthly = $row['rate']['monthly'];
// $daily = $row['rate']['daily'];
// $hourly = $row['rate']['hourly'];
// // id
// $SSS = $row['IDs']['SSS'];
// $PagIbig = $row['IDs']['PagIbig'];
// $PhilHealth = $row['IDs']['PhilHealth'];

// // gross
// $presentDays = $row['gross']['presentDays']['qty'];
// $presentDaysTotal = $row['gross']['presentDays']['amount'];
// $othrs = $row['gross']['overtime']['qty'];
// $othrsTotal = $row['gross']['overtime']['amount'];
// $holidayQty = $row['gross']['holidays']['qty'];
// $holidayTotal = $row['gross']['holidays']['amount'];
// $paidLeaveQty = $row['gross']['leave']['qty'];
// $paidLeaveAmount = $row['gross']['leave']['amount'];
// // deductions
// $SSSdeduc = $row['deduction']['SSS'];
// $PagIbigdeduc = $row['deduction']['PagIbig'];
// $PhilHealthdeduc = $row['deduction']['PhilHealth'];
// $CashAdvanceQty = $row['deduction']['CashAdvance']['qty'];
// $CashAdvancededuc = $row['deduction']['CashAdvance']['amount'];

// //total
// $gross = $row['total']['gross'];
// $deduction = $row['total']['deduction'];
// $net = $row['total']['net'];

// $from = date('F d, Y', strtotime($row['date']['from']));
// $to = date('F d, Y', strtotime($row['date']['to']));



// require('../plugin/fpdf/fpdf.php');
// $pdf = new FPDF('P','mm',array(80,190));
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',10);
// $pdf->Cell(60,20,'',1,1,'R');
// $pdf->Text(29, 19, "Chateau Condominium");
// $pdf->SetFont('Arial','',5);
// $pdf->Text(29, 22, "16 P. Gregorio Street, Lungsod ng Valenzuela,");
// $pdf->Text(29, 24, "1446 Kalakhang Maynila");
// $pdf->Image('../img/favicon.png', 11, 13, 15);

// #Details
// $pdf->SetFont('Arial','',8);

// $pdf->Cell(10,8,'Name: ',0,0,'L');
// $pdf->Cell(15,8,$name,0,1,'L'); #employee Name here

// $pdf->Cell(10,0,'Role: ',0,0,'L');
// $pdf->Cell(15,0,$role,0,1,'L'); #Role here

// $pdf->Cell(10,8,'Date: ',0,0,'L');
// $pdf->Cell(15,8,$date,0,1,'L'); #Current date here

// $pdf->Cell(14,0,'SSS: ',0,0,'L');
// $pdf->Cell(15,0,$SSS,0,1,'L'); #SSS here

// $pdf->Cell(14,8,'Pag-Ibig: ',0,0,'L');
// $pdf->Cell(15,8,$PagIbig,0,1,'L'); #PagIbig number here

// $pdf->Cell(14,0,'Philhealth: ',0,0,'L');
// $pdf->Cell(15,0,$PhilHealth,0,1,'L'); #PhilHealth Number here

// $pdf->Line(10,57,70,57);
// $pdf->Cell(20,1.5,'',0,1,'L');
// $pdf->Cell(20,8,'Monthly Rate: ',0,0,'L');
// $pdf->Cell(15,8,'PHP '.$monthly,0,1,'L'); #monthly rate

// $pdf->Cell(20,0,'Daily Rate: ',0,0,'L');
// $pdf->Cell(15,0,'PHP '.$daily,0,1,'L'); #Daily Rate here

// $pdf->Cell(20,8,'Hourly Rate: ',0,0,'L');
// $pdf->Cell(15,8,'PHP '.$hourly,0,1,'L'); #Hourly rate

// $pdf->Line(10,70,70,70);
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(190,5,'Payslip Period:',0,1,'L');
// $pdf->SetFont('Arial','',9);
// $pdf->Cell(190,5,$from.' - '.$to,0,1,'L');#Period here
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(190,5,'Income:',0,1,'L');

// #add starts here
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(20,7,'Add:',0,0,'L');
// $pdf->Cell(20,7,'Quantity:',0,0,'L');
// $pdf->Cell(20,7,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',8);
// $pdf->Cell(27,5,'Present Days: ',0,0,'L');
// $pdf->Cell(17,5,$presentDays,0,0,'L'); #Present Days Quantity
// $pdf->Cell(27,5,'PHP'.$presentDaysTotal,0,1,'L'); #Total Present Days

// $pdf->Cell(27,5,'Overtime Hours: ',0,0,'L');
// $pdf->Cell(17,5,$othrs,0,0,'L'); #Overtime Quantity
// $pdf->Cell(27,5,'PHP '.$othrsTotal,0,1,'L'); #Overtime Total

// $pdf->Cell(27,5,'Paid Leave: ',0,0,'L');
// $pdf->Cell(17,5,$paidLeaveQty,0,0,'L'); #Paid Leaves Quantity
// $pdf->Cell(27,5,'PHP '.$paidLeaveAmount,0,1,'L'); #Paid Leaves Total

// $pdf->Cell(27,5,'Holidays: ',0,0,'L');
// $pdf->Cell(17,5,$holidayQty,0,0,'L'); #Gross Quantity Here
// $pdf->Cell(27,5,'PHP '.$holidayTotal,0,1,'L'); #Gross Total here

// $pdf->Line(70,113,35,113);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(25,5,'TOTAL GROSS:',0,0,'L');
// $pdf->Cell(3,5,'',0,0,'L');
// $pdf->Cell(40,5,'PHP '.$gross,0,1,'C');#Gross Total here

// #ADD Ends Here
// #LESS Starts Here

// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(20,7,'Less:',0,0,'L');
// $pdf->Cell(20,7,'Quantity:',0,0,'L');
// $pdf->Cell(20,7,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',8);
// $pdf->Cell(27,5,'SSS: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L');
// $pdf->Cell(27,5,'PHP '.$SSSdeduc,0,1,'L'); #SSS Total

// $pdf->Cell(27,5,'Pag-Ibig: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L');
// $pdf->Cell(27,5,'PHP '.$PagIbigdeduc,0,1,'L'); #PagIbig Tota27

// $pdf->Cell(27,5,'PhilHealth: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L'); 
// $pdf->Cell(27,5,'PHP '.$PhilHealthdeduc,0,1,'L'); #PhilHealth Tota27

// $pdf->Cell(27,5,'Cash Advance: ',0,0,'L');
// $pdf->Cell(17,5,$CashAdvanceQty,0,0,'L'); #CA Quantity
// $pdf->Cell(27,5,'PHP '.$CashAdvancededuc,0,1,'L'); #CA Tota27

// $pdf->Cell(27,5,'Others:',0,0,'L');
// $pdf->Cell(17,5,'0',0,0,'L'); #Other Deductions Quantity
// $pdf->Cell(27,5,'PHP '.'0',0,1,'L'); #Other Deductions

// $pdf->Line(70,150,35,150);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(25,5,'TOTAL DEDUCTION:',0,0,'L');
// $pdf->Cell(3,5,'',0,0,'L');
// $pdf->Cell(40,5,'PHP -'.$deduction,0,1,'C'); #Insert Total Deduction here

// #LESS Ends Here

// $pdf->SetFont('Arial','B',11);
// $pdf->SetFillColor(28,157,255);
// $pdf->Cell(60,10,'TOTAL NET:   PHP '.$net,1,1,'C',False); #Insert Total Net Here

// $pdf->Output();


// $data = $_GET['data'];
// $decodedData = base64_decode($data);
// // var_dump();
// $row = json_decode($decodedData, true);
// include '../timezone.php';
// $date = date('m/d/Y');
// // echo $row['rate']['monthly'];
// // mga na extract na
// $name = $row['name'];
// $role = $row['role'];
// // rate
// $monthly = $row['rate']['monthly'];
// $daily = $row['rate']['daily'];
// $hourly = $row['rate']['hourly'];
// // id
// $SSS = $row['IDs']['SSS'];
// $PagIbig = $row['IDs']['PagIbig'];
// $PhilHealth = $row['IDs']['PhilHealth'];

// // gross
// $presentDays = $row['gross']['presentDays']['qty'];
// $presentDaysTotal = $row['gross']['presentDays']['amount'];
// $othrs = $row['gross']['overtime']['qty'];
// $othrsTotal = $row['gross']['overtime']['amount'];
// $holidayQty = $row['gross']['holidays']['qty'];
// $holidayTotal = $row['gross']['holidays']['amount'];
// $paidLeaveQty = $row['gross']['leave']['qty'];
// $paidLeaveAmount = $row['gross']['leave']['amount'];
// // deductions
// $SSSdeduc = $row['deduction']['SSS'];
// $PagIbigdeduc = $row['deduction']['PagIbig'];
// $PhilHealthdeduc = $row['deduction']['PhilHealth'];
// $CashAdvanceQty = $row['deduction']['CashAdvance']['qty'];
// $CashAdvancededuc = $row['deduction']['CashAdvance']['amount'];

// //total
// $gross = $row['total']['gross'];
// $deduction = $row['total']['deduction'];
// $net = $row['total']['net'];

// $from = date('F d, Y', strtotime($row['date']['from']));
// $to = date('F d, Y', strtotime($row['date']['to']));



// require('../plugin/fpdf/fpdf.php');
// $pdf = new FPDF('P','mm',array(80,180));
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',13);
// $pdf->Cell(60,10,'Payslip',1,1,'C');

// #Details
// $pdf->SetFont('Arial','',8);

// $pdf->Cell(10,8,'Name: ',0,0,'L');
// $pdf->Cell(15,8,$name,0,1,'L'); #employee Name here

// $pdf->Cell(10,0,'Role: ',0,0,'L');
// $pdf->Cell(15,0,$role,0,1,'L'); #Role here

// $pdf->Cell(10,8,'Date: ',0,0,'L');
// $pdf->Cell(15,8,$date,0,1,'L'); #Current date here

// $pdf->Cell(14,0,'SSS: ',0,0,'L');
// $pdf->Cell(15,0,$SSS,0,1,'L'); #SSS here

// $pdf->Cell(14,8,'Pag-Ibig: ',0,0,'L');
// $pdf->Cell(15,8,$PagIbig,0,1,'L'); #PagIbig number here

// $pdf->Cell(14,0,'Philhealth: ',0,0,'L');
// $pdf->Cell(15,0,$PhilHealth,0,1,'L'); #PhilHealth Number here

// $pdf->Line(10,47,70,47);
// $pdf->Cell(20,1.5,'',0,1,'L');
// $pdf->Cell(20,8,'Monthly Rate: ',0,0,'L');
// $pdf->Cell(15,8,'PHP '.number_format($monthly, 2),0,1,'L'); #monthly rate

// $pdf->Cell(20,0,'Daily Rate: ',0,0,'L');
// $pdf->Cell(15,0,'PHP '.number_format($daily, 2),0,1,'L'); #Daily Rate here

// $pdf->Cell(20,8,'Hourly Rate: ',0,0,'L');
// $pdf->Cell(15,8,'PHP '.number_format($hourly, 2),0,1,'L'); #Hourly rate

// $pdf->Line(10,60,70,60);
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(190,5,'Payroll Period:',0,1,'L');
// $pdf->SetFont('Arial','',9);
// $pdf->Cell(190,5,$from.' - '.$to,0,1,'L');#Period here
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(190,5,'Income:',0,1,'L');

// #add starts here
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(20,7,'Add:',0,0,'L');
// $pdf->Cell(20,7,'Quantity:',0,0,'L');
// $pdf->Cell(20,7,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',8);
// $pdf->Cell(27,5,'Present Days: ',0,0,'L');
// $pdf->Cell(17,5,$presentDays,0,0,'L'); #Present Days Quantity
// $pdf->Cell(27,5,'PHP'.number_format($presentDaysTotal, 2),0,1,'L'); #Total Present Days

// $pdf->Cell(27,5,'Overtime Hours: ',0,0,'L');
// $pdf->Cell(17,5,$othrs,0,0,'L'); #Overtime Quantity
// $pdf->Cell(27,5,'PHP '.number_format($othrsTotal, 2),0,1,'L'); #Overtime Total

// $pdf->Cell(27,5,'Paid Leave: ',0,0,'L');
// $pdf->Cell(17,5,$paidLeaveQty,0,0,'L'); #Paid Leaves Quantity
// $pdf->Cell(27,5,'PHP '.number_format($paidLeaveAmount, 2),0,1,'L'); #Paid Leaves Total

// $pdf->Cell(27,5,'Holidays: ',0,0,'L');
// $pdf->Cell(17,5,$holidayQty,0,0,'L'); #Gross Quantity Here
// $pdf->Cell(27,5,'PHP '.number_format($holidayTotal, 2),0,1,'L'); #Gross Total here

// $pdf->Line(70,103,35,103);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(25,5,'TOTAL GROSS:',0,0,'L');
// $pdf->Cell(3,5,'',0,0,'L');
// $pdf->Cell(40,5,'PHP '.number_format($gross, 2),0,1,'C');#Gross Total here

// #ADD Ends Here
// #LESS Starts Here

// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(20,7,'Less:',0,0,'L');
// $pdf->Cell(20,7,'Quantity:',0,0,'L');
// $pdf->Cell(20,7,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',8);
// $pdf->Cell(27,5,'SSS: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L');
// $pdf->Cell(27,5,'PHP '.number_format($SSSdeduc, 2),0,1,'L'); #SSS Total

// $pdf->Cell(27,5,'Pag-Ibig: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L');
// $pdf->Cell(27,5,'PHP '.number_format($PagIbigdeduc, 2),0,1,'L'); #PagIbig Tota27

// $pdf->Cell(27,5,'PhilHealth: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L'); 
// $pdf->Cell(27,5,'PHP '.number_format($PhilHealthdeduc, 2),0,1,'L'); #PhilHealth Tota27

// $pdf->Cell(27,5,'Cash Advance: ',0,0,'L');
// $pdf->Cell(17,5,$CashAdvanceQty,0,0,'L'); #CA Quantity
// $pdf->Cell(27,5,'PHP '.number_format($CashAdvancededuc, 2),0,1,'L'); #CA Tota27

// $pdf->Cell(27,5,'Others:',0,0,'L');
// $pdf->Cell(17,5,'0',0,0,'L'); #Other Deductions Quantity
// $pdf->Cell(27,5,'PHP '.'0',0,1,'L'); #Other Deductions

// $pdf->Line(70,140,35,140);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(25,5,'TOTAL DEDUCTION:',0,0,'L');
// $pdf->Cell(3,5,'',0,0,'L');
// $pdf->Cell(40,5,'PHP -'.number_format($deduction, 2),0,1,'C'); #Insert Total Deduction here

// #LESS Ends Here

// $pdf->SetFont('Arial','B',11);
// $pdf->SetFillColor(28,157,255);
// $pdf->Cell(60,10,'TOTAL NET:   PHP '.number_format($net, 2),1,1,'C',False); #Insert Total Net Here

// $pdf->Output();







// $data = $_GET['data'];
// $decodedData = base64_decode($data);
// // var_dump();
// $row = json_decode($decodedData, true);
// include '../timezone.php';
// $date = date('m/d/Y');
// // echo $row['rate']['monthly'];
// // mga na extract na
// $name = $row['name'];
// $role = $row['role'];
// // rate
// $monthly = $row['rate']['monthly'];
// $daily = $row['rate']['daily'];
// $hourly = $row['rate']['hourly'];
// // id
// $SSS = $row['IDs']['SSS'];
// $PagIbig = $row['IDs']['PagIbig'];
// $PhilHealth = $row['IDs']['PhilHealth'];

// // gross
// $presentDays = $row['gross']['presentDays']['qty'];
// $presentDaysTotal = $row['gross']['presentDays']['amount'];
// $othrs = $row['gross']['overtime']['qty'];
// $othrsTotal = $row['gross']['overtime']['amount'];
// $holidayQty = $row['gross']['holidays']['qty'];
// $holidayTotal = $row['gross']['holidays']['amount'];

// // deductions
// $SSSdeduc = $row['deduction']['SSS'];
// $PagIbigdeduc = $row['deduction']['PagIbig'];
// $PhilHealthdeduc = $row['deduction']['PhilHealth'];
// $CashAdvanceQty = $row['deduction']['CashAdvance']['qty'];
// $CashAdvancededuc = $row['deduction']['CashAdvance']['amount'];

// //total
// $gross = $row['total']['gross'];
// $deduction = $row['total']['deduction'];
// $net = $row['total']['net'];
// number_format(
// $from = date('F d, Y', strtotime($row['date']['from']));
// $to = date('F d, Y', strtotime($row['date']['to']));



// require('../plugin/fpdf/fpdf.php');
// $pdf = new FPDF('P','mm',array(80,180));
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',13);
// $pdf->Cell(60,10,'Payslip',1,1,'C');

// #Details
// $pdf->SetFont('Arial','',8);

// $pdf->Cell(10,8,'Name: ',0,0,'L');
// $pdf->Cell(15,8,$name,0,1,'L'); #employee Name here

// $pdf->Cell(10,0,'Role: ',0,0,'L');
// $pdf->Cell(15,0,$role,0,1,'L'); #Role here

// $pdf->Cell(10,8,'Date: ',0,0,'L');
// $pdf->Cell(15,8,$date,0,1,'L'); #Current date here

// $pdf->Cell(14,0,'SSS: ',0,0,'L');
// $pdf->Cell(15,0,$SSS,0,1,'L'); #SSS here

// $pdf->Cell(14,8,'Pag-Ibig: ',0,0,'L');
// $pdf->Cell(15,8,$PagIbig,0,1,'L'); #PagIbig number here

// $pdf->Cell(14,0,'Philhealth: ',0,0,'L');
// $pdf->Cell(15,0,$PhilHealth,0,1,'L'); #PhilHealth Number here

// $pdf->Line(10,47,70,47);
// $pdf->Cell(20,1.5,'',0,1,'L');
// $pdf->Cell(20,8,'Monthly Rate: ',0,0,'L');
// $pdf->Cell(15,8,'PHP '.$monthly,0,1,'L'); #monthly rate

// $pdf->Cell(20,0,'Daily Rate: ',0,0,'L');
// $pdf->Cell(15,0,'PHP '.$daily,0,1,'L'); #Daily Rate here

// $pdf->Cell(20,8,'Hourly Rate: ',0,0,'L');
// $pdf->Cell(15,8,'PHP '.$hourly,0,1,'L'); #Hourly rate

// $pdf->Line(10,60,70,60);
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(190,5,'Payroll Period:',0,1,'L');
// $pdf->SetFont('Arial','',9);
// $pdf->Cell(190,5,$from.' - '.$to,0,1,'L');#Period here
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(190,5,'Income:',0,1,'L');

// #add starts here
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(20,7,'Add:',0,0,'L');
// $pdf->Cell(20,7,'Quantity:',0,0,'L');
// $pdf->Cell(20,7,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',8);
// $pdf->Cell(27,5,'Present Days: ',0,0,'L');
// $pdf->Cell(17,5,$presentDays,0,0,'L'); #Present Days Quantity
// $pdf->Cell(27,5,'PHP '.$presentDaysTotal,0,1,'L'); #Total Present Days

// $pdf->Cell(27,5,'Overtime Hours: ',0,0,'L');
// $pdf->Cell(17,5,$othrs,0,0,'L'); #Overtime Quantity
// $pdf->Cell(27,5,'PHP '.$othrsTotal,0,1,'L'); #Overtime Total

// $pdf->Cell(27,5,'Paid Leave: ',0,0,'L');
// $pdf->Cell(17,5,$holidayQty,0,0,'L'); #Gross Quantity Here
// $pdf->Cell(27,5,'PHP '.$holidayTotal,0,1,'L'); #Gross Total here

// $pdf->Cell(27,5,'Holidays: ',0,0,'L');
// $pdf->Cell(17,5,$holidayQty,0,0,'L'); #Gross Quantity Here
// $pdf->Cell(27,5,'PHP '.$holidayTotal,0,1,'L'); #Gross Total here

// $pdf->Line(70,98.5,35,98.5);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(25,5,'TOTAL GROSS',0,0,'L');
// $pdf->Cell(3,5,'',0,0,'L');
// $pdf->Cell(40,5,'PHP '.$gross,0,1,'C');#Gross Total here

// #ADD Ends Here
// #LESS Starts Here

// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(20,7,'Less:',0,0,'L');
// $pdf->Cell(20,7,'Quantity:',0,0,'L');
// $pdf->Cell(20,7,'Amount:',0,1,'L');

// $pdf->SetFont('Arial','',8);
// $pdf->Cell(27,5,'SSS: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L');
// $pdf->Cell(27,5,'PHP '.$SSSdeduc,0,1,'L'); #SSS Total

// $pdf->Cell(27,5,'Pag-Ibig: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L');
// $pdf->Cell(27,5,'PHP '.$PagIbigdeduc,0,1,'L'); #PagIbig Tota27

// $pdf->Cell(27,5,'PhilHealth: ',0,0,'L');
// $pdf->Cell(17,5,'',0,0,'L'); 
// $pdf->Cell(27,5,'PHP '.$PhilHealthdeduc,0,1,'L'); #PhilHealth Tota27

// $pdf->Cell(27,5,'Cash Advance: ',0,0,'L');
// $pdf->Cell(17,5,$CashAdvanceQty,0,0,'L'); #CA Quantity
// $pdf->Cell(27,5,'PHP '.$CashAdvancededuc,0,1,'L'); #CA Tota27

// $pdf->Cell(27,5,'Others:',0,0,'L');
// $pdf->Cell(17,5,'0',0,0,'L'); #Other Deductions Quantity
// $pdf->Cell(27,5,'PHP '.'0',0,1,'L'); #Other Deductions

// $pdf->Line(70,134.8,35,134.8);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(25,5,'TOTAL DEDUCTION',0,0,'L');
// $pdf->Cell(3,5,'',0,0,'L');
// $pdf->Cell(40,5,'PHP -'.$deduction,0,1,'C'); #Insert Total Deduction here

// #LESS Ends Here

// $pdf->SetFont('Arial','B',12);
// $pdf->SetFillColor(28,157,255);
// $pdf->Cell(60,15,'TOTAL NET:   PHP '.$net,1,1,'C',False); #Insert Total Net Here

// $pdf->Output();
//     include 'session/check_session.php';

// $data = $_GET['data'];
// $decodedData = base64_decode($data);
// // var_dump();
// $row = json_decode($decodedData, true);
// include '../timezone.php';
// $date = date('m/d/Y');
// // echo $row['rate']['monthly'];
// // mga na extract na

// $name = $row['name'];
// $role = $row['role'];
// // rate
// $monthly = $row['rate']['monthly'];
// $daily = $row['rate']['daily'];
// $hourly = $row['rate']['hourly'];
// // id
// $SSS = $row['IDs']['SSS'];
// $PagIbig = $row['IDs']['PagIbig'];
// $PhilHealth = $row['IDs']['PhilHealth'];

// // gross
// $presentDays = $row['gross']['presentDays']['qty'];
// $presentDaysTotal = $row['gross']['presentDays']['amount'];
// $othrs = $row['gross']['overtime']['qty'];
// $othrsTotal = $row['gross']['overtime']['amount'];
// $holidayQty = $row['gross']['holidays']['qty'];
// $holidayTotal = $row['gross']['holidays']['amount'];

// // deductions
// $SSSdeduc = $row['deduction']['SSS'];
// $PagIbigdeduc = $row['deduction']['PagIbig'];
// $PhilHealthdeduc = $row['deduction']['PhilHealth'];
// $CashAdvanceQty = $row['deduction']['CashAdvance']['qty'];
// $CashAdvancededuc = $row['deduction']['CashAdvance']['amount'];

// //total
// $gross = $row['total']['gross'];
// $deduction = $row['total']['deduction'];
// $net = $row['total']['net'];

// $from = date('F d, Y', strtotime($row['date']['from']));
// $to = date('F d, Y', strtotime($row['date']['to']));



// require('../plugin/fpdf/fpdf.php');

// $pdf = new FPDF();
// $pdf->AddPage();
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

// $pdf->Output();
?>