<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';
  $output = [
    'error'=>true
  ];
  if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])){
    include '../connect.php';
    $oldPass = $_POST['oldPassword'];
    $newPass = $_POST['newPassword'];
    $confPass = $_POST['confirmPassword'];

    $sql = "SELECT * FROM accounts";
    try {
      $query = $con->query($sql);
      $row = $query->fetch_assoc();
    } catch (Exception $th) {
      $output['message'] = $con->error;
    }

    if($oldPass != $row['password']){
      $output['message'] = "Password does not match";
    }else{
      $sql = "UPDATE accounts SET password = '$newPass'";
      if($con->query($sql)){
        $output['error'] = false;  
        $output['message'] = "Password Change Succesfully";

        $activity = "Password is changed by admin ".$adminName;
        $actType = 'accountSettings';
        include 'session/activity_upload.php';
      }
    }

  }else{
    header('location: account_setting.php');
  }

  echo json_encode($output);
?>