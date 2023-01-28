<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';
  $output = ['error'=>true];

  if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['period'])){
    include '../connect.php';
    $from = $_POST['from'];
    $to = $_POST['to'];
    $period = $_POST['period'];
    
    try {
      $sql = "SELECT * FROM payroll_info WHERE `from` = '$from' AND `to` = '$to'";
      $res = $con->query($sql);

      // pag may period na na same
      if($res->num_rows > 0){
        $monthText = date('F', strtotime($_POST['from']));
        $year = date('Y', strtotime($_POST['from']));
        $periodText = ($period ==1) ? "(1st period)" : "(2nd Period)";
        $output['message'] = "<b>Cannot be added</b><br>Payroll period of ".$monthText." ".$year." $periodText is already added.";
      }
      // if wala pang period
      else{
        // $monthAdd = date('m', strtotime($from));
        // $yearAdd = date('Y', strtotime($from));
        $sql = "INSERT INTO `payroll_info`(`from`, `to`, `status`, `period`) VALUES ('$from','$to','0','$period')";
        
        $con->query($sql);
        $output['error'] = false;
        $output['message'] = "Period Added Succesfully";
        $_SESSION['success'] = "Period Added Succesfully";
        $_SESSION['period'] = $con->insert_id;
        $periodTxt = ($period == 1) ? "1st period" : "2nd period";
        $year = date('Y', strtotime($from));
        $month = date('m', strtotime($from));
        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthText = $dateObj->format('F');
        $actType = 'payroll';
        $activity = "Payroll period for the ".$periodTxt." of ".$monthText." of ".$year." is added by Admin ".$adminName;
        include 'session/activity_upload.php';
      }
    } catch (Exception $th) {
      $output['message'] = $con->error;
    }
  }else{
    header('location: payroll_management.php');
  }

  echo json_encode($output);

?>