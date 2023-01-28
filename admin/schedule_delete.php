<?php
    include 'session/check_session.php';
    include 'session/check_user.php';
    include '../timezone.php';

  if(isset($_POST['id'])){
    include '../connect.php';
    $schedId = $_POST['id'];

    $sql = "SELECT * FROM employeelist WHERE sched = '$schedId'";
    try {
      $query = $con->query($sql);
      if($query->num_rows > 0){
        $_SESSION['error'] = "Cannot Delete, there are/is employee/s currently under this schedule.";
      }else{
        $sql = "UPDATE schedules SET `status` = '0' WHERE id = '$schedId'";
        $con->query($sql);
        $_SESSION['success'] = "Archive Succesfully";

        $activity = "Schedule no.".$schedId." is deleted to Schedules by admin ".$adminName;
        $actType = 'schedule';
        include 'session/activity_upload.php';
      }
    } catch (Exception $th) {
      $_SESSION['error'] = $con->error;
    }
  }else{
    header('location: schedule.php');
  }

  // header('location: schedule.php')
?>