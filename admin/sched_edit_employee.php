<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';
  $output = [
    'error'=>true
  ];
  if(isset($_POST['id']) && isset($_POST['schedID']) && isset($_POST['name'])){
    include '../connect.php';
    $id = $_POST['id'];
    $schedID = $_POST['schedID'];
    $name = $_POST['name'];
    $sql = "UPDATE employeelist SET sched = '$schedID' WHERE id = '$id'";

    if($con->query($sql)){
      $output['error'] = false;
      $_SESSION['success'] = 'Edited Successfully';
      
      $activity = $name."(".$id.") schedule is change to schedule no.".$schedID." by admin ".$adminName;
      $actType = 'schedule';
      include 'session/activity_upload.php';
    }
  }else{
    header('location: schedule.php');
  }
  echo json_encode($output);
?>