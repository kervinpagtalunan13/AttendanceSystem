<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM holiday_event WHERE id = '$id'";
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    if($con->query($sql)){
      $activity = $desc." is deleted to holidays for the date ".$date." by admin ".$adminName;
      $actType = 'holiday';
      include 'session/activity_upload.php';
    }
  }

  // $output = [
  //   'error'=>true
  // ];

  // if(isset($_GET['id']) && isset($_GET['month']) && isset($_GET['desc'])){
  //   include '../connect.php';
  //   $id = $_GET['id'];
  //   $sql = "DELETE FROM holiday WHERE id = '$id'";
  //   $desc = $_GET['desc'];
  //   if($con->query($sql)){
  //     // $output['error'] = false;
  //     // $output['message'] = 'Deleted Succesfully';
  //     $_SESSION['success'] = 'Deleted Successfully';
  //     $_SESSION['month'] = $_GET['month']; 

  //     $activity = $desc." is deleted to holidays for the date ".$date." by admin ".$adminName."(".$adminKey.")";
  //     $actType = 'leave';
  //     include 'session/activity_upload.php';
  //   }
  //     // echo $_GET['id'];
  // }else{
  //   header('location: holiday.php');
  // }

  // header('location: holiday.php');
  // echo json_encode($output);
?>