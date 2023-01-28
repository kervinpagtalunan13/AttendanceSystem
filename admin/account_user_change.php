<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = [
    'error'=>true
  ];
  if(isset($_POST['id'])){
    include '../connect.php';
    $id = $_POST['id'];
    $sql = "UPDATE `accounts` SET `employee_no` = '$id'";
    try {
      $res = $con->query($sql);
      $output['error'] = false;
      $output['message'] = 'User Change Successfully';

      $sql = "SELECT * FROM employeelist WHERE id = '$id'";
      $query = $con->query($sql);
      $row = $query->fetch_assoc();
      $name = $row['fName']." ".$row['mName']." ".$row['lName'];

      $activity = "Account User is change to ".$name." by admin ".$adminName;
      $actType = 'accountSettings';
      include 'session/activity_upload.php';
    } catch (Throwable $th) {
      
    }
    
  }else{
    header('location: account_setting.php');
  }

  echo json_encode($output);
?>