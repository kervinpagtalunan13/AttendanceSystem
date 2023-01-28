<?php
  include 'session/check_session.php'; 
  include 'session/check_user.php';
  include '../timezone.php';

  $output = array(
    'error'=>true
  );

  if(isset($_POST['year']) && isset($_POST['type'])){
    include '../connect.php';
    $year = $_POST['year'];
    $period = $_POST['type'];
    
    $desc = ($period == 3) ? '13th month pay' : 'Mid Year pay';

    $sql = "SELECT * FROM payroll_info WHERE year(`from`) = '$year' AND `period` = '$period'";
    try {
      $res = $con->query($sql);
      if($res->num_rows > 0){
        $output['message'] = '<b>Cannot be added</b><br>There is '.$desc. ' already for the year of '.$year;
      }else{
        $from = $year.'-01-01';
        $to = ($period == 3) ? $year.'-12-31' : $year.'-06-30';

        $sql = "INSERT INTO `payroll_info`(`from`, `to`, `status`, `period`) VALUES ('$from','$to','0','$period')";
        if($con->query($sql)){
          $_SESSION['success'] = '<b>Succesfully added</b>, '.$desc.' for the year of '.$year;
          $_SESSION['payroll_year'] = $year;
          $output['error'] = false;
          
          $actType = 'payroll';
          $activity = "$desc for the the year of ".$year." is added by Admin ".$adminName;
          include 'session/activity_upload.php';
          
        }
      }
    } catch (\Throwable $th) {
      $output['message'] = $th;
    }
  }else{
    header('location: payroll_management.php');
  }

  echo json_encode($output);
?>