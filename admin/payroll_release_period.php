<?php
  include 'session/check_session.php';
  include '../timezone.php';
  $output = array(
    'error'=>true
  );
  if(isset($_POST['data']) && isset($_POST['id']) && isset($_POST['filtered']) && isset($_POST['period'])){
    $dateNow = date('Y-m-d');
    include '../connect.php';
    $period = $_POST['period'];
    $period = ($period == 1) ? "1st" : "2nd";

    $id = $_POST['id'];
    $data = $_POST['data'];
    $filtered = $_POST['filtered'];
    $decodedData = base64_decode($filtered);
    $row = json_decode($decodedData, true);
    try {
      $sql = "UPDATE `payroll_info` SET `data`='$data',`status`='1' WHERE id = '$id'";
      $con->query($sql);

      foreach($row as $emp){
      $ca_amount =  $emp['deduction']['CashAdvance']['amount'] ;
      $empId = $emp['id'];
      
      $sql = "SELECT * FROM cashadvance_total JOIN employeelist ON cashadvance_total.employee_id = employeelist.id WHERE employee_id = '$empId'";
      $res = $con->query($sql);
      $row2 = $res->fetch_assoc();
      $total = $row2['total'];
      $name = $row2['fName']." ".$row2['mName'].". ".$row2['lName'];

      $new = $total - $ca_amount;
      
      // deducting cash advance for employees
      $sql = "UPDATE `cashadvance_total` SET `total`=$new WHERE employee_id = '$empId'";
      $con->query($sql);

      // activity logs for ca logs for employees
      // $activity = $name. "(".$empId.")"." cash advance balance was deduct by ".$ca_amount.". Current cash advance total: ".$new;
      $sql = "INSERT INTO `cashadvance`(`employee_id`, `amount`, `date_advanced`, `type`) VALUES ('$empId','$ca_amount','$dateNow','1')";
      $con->query($sql);
      
      // echo $activity;
    }
    // $_SESSION['success'] = var_dump($row);
    
    // activity logs for payroll released
    $sql = "SELECT * FROM payroll_info WHERE id = '$id'";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
    $fromDate = $row['from'];

    $year = date('Y', strtotime($fromDate));
    $month = date('m', strtotime($fromDate));
    $dateObj = DateTime::createFromFormat('!m', $month);
    $monthText = $dateObj->format('F');

    include 'session/check_user.php';
    $activity = "Payroll for the ".$period." period of ".$monthText." of ".$year." was released by Admin ".$adminName;
    $actType = 'payroll';
    include 'session/activity_upload.php';
    // $sql = "INSERT INTO `activity_logs`(`activity`, `date`, `time`) VALUES ('$act','$dateNow','$timeNow')";
    // $con->query($sql);
    $output['error'] = false;
    $output['message'] = "Payroll has been released";
    $_SESSION['success'] = 'Payroll has been released';
    } catch (Exception $th) {
      $output['message'] = $th;
    }
  }else{
    header('location: payroll_management.php');
  }
  // var_dump( $row );
  // echo 'asd';
  echo json_encode($output);
?>