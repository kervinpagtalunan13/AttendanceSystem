<?php
  include 'session/check_session.php';
  include 'session/check_user.php';

  $output = array(
    'error'=>true
  );
  if(isset($_POST['id'])){
    include '../connect.php';
    $id = $_POST['id'];
    try {

      $sql = "SELECT fName, mName, lName, `description`, `type` FROM compensation_deductions INNER JOIN employeelist ON compensation_deductions.employee_id = employeelist.id WHERE compensation_deductions.id = '$id'";
      $res = $con->query($sql);
      $row = $res->fetch_assoc();
      $employeeName = $row['fName']." ".$row['mName']." ".$row['lName'];
      $desc = $row['description'];
      $type = ($row['type'] == 1) ? "Compensation" : "Deduction";

      $sql = "UPDATE `compensation_deductions` SET `status` = '1' WHERE `id` = '$id'";
      $con->query($sql);
      
      $_SESSION['success'] = '<b>Archive Succesfully</b>';
      $output['error'] = false;

      $activity = "$desc($type) is to ".$employeeName." by Admin ".$adminName;
      $actType = "comp_deduc";
      include 'session/activity_upload.php';
    } catch (\Throwable $th) {

    }
  }else{
    header('location: compensation_deduc.php');
  }
  echo json_encode($output);