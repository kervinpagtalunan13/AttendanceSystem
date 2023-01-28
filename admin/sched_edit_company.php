<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';
  $output = [
    'error'=>true
  ];

  if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['id'])){
    include '../connect.php';
    
    $from = $_POST['from'];
    $to = $_POST['to'];
    $id = $_POST['id'];
    $sql = "UPDATE `schedules` SET `time_in`='$from',`time_out`='$to' WHERE id = '$id'";
    
    try {
      $con->query($sql);
      $_SESSION['success'] = 'Update Succesfully';

      $activity = "Schedule no.".$id." (".$from."-".$to.") is edited by admin ".$adminName;
      $actType = 'schedule';
      include 'session/activity_upload.php';
    } catch (Exception $th) {
      $_SESSION['error'] = $con->error;
    }

  }else{
    header('location: schedule.php');
  }
?>