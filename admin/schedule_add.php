<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = [
    'error'=>true
  ];

  if(isset($_POST['from']) && isset($_POST['to'])){
    $output['error'] = false;
    include '../connect.php';

    $from = $_POST['from'];
    $to = $_POST['to'];

    $sql = "INSERT INTO `schedules`(`time_in`, `time_out`, `status`) VALUES ('$from','$to', '1')";
    // $output['time_in'] = $from;
    // $output['time_out'] = $to;

    try {
      $con->query($sql);
      $_SESSION['success'] = 'Added Succesfully';

      $id = $con->insert_id;
      $activity = "Schedule no.".$id." (".$from."-".$to.") is added to Schedules by admin ".$adminName;
      $actType = 'schedule';
      include 'session/activity_upload.php';
      $output['error'] = false;
    } catch (Exception $th) {
      $_SESSION['error'] = $con->error;
    }
  }else{
    header('location: schedule.php');
  }

  // header('location: schedule.php')

  echo json_encode($output)
?>