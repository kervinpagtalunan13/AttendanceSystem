<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  $output = [
    'error'=>true
  ];
  if(isset($_POST['id']) && isset($_POST['date'])){
    include '../connect.php';
    $attId = $_POST['id'];
    $sql = "DELETE FROM attendance_csv WHERE id = '$attId'";
    $date = $_POST['date'];
    $empName = $_POST['name'];
    $empId = $_POST['empId'];
    try {
    //  if(true){
     if($con->query($sql)){
      $output['error'] = false;
      $output['message'] = 'Deleted Succesfuly';
      $_SESSION['success'] = '<b>Deleted Successfuly</b>, Attendance of '.$empName. " for ".date('F d, Y', strtotime($date));
      $activity = "Attendance of ".$empName." of ".$date." is deleted by Admin ".$adminName;
      $actType = "attendance";
      include 'session/activity_upload.php';
     }
    } catch (Exception $th) {
      $output['message'] = $con->error;
    }
  }else{
    header('location: employee_attendance.php');
  }
  echo json_encode($output);
?>