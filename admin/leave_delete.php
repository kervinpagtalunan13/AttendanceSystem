<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  if(isset($_POST['id'])){
    include '../connect.php';
    $id = $_POST['id'];

    $sql = "SELECT CONCAT(fName, ' ', mName, ' ', lName) AS fullName, employeelist.id, date FROM `leave_info` INNER JOIN employeelist ON employeelist.id = leave_info.employee_id WHERE leave_info.id = '$id'";
    $query = $con->query($sql);
    $res = $query->fetch_assoc();
    $fName = $res['fullName'];
    $date = $res['date'];
    $employeeId = $res['id'];

    $sql = "DELETE FROM leave_info WHERE id = '$id'";
    try {
      if($con->query($sql)){
        $_SESSION['success'] = 'Delete Succesfully';
        $activity = "Paid Leave for ".date('F d Y', strtotime($date))." is deleted to ".$fName."  by admin ".$adminName;
        $actType = 'paidLeave';
        include 'session/activity_upload.php';
      }
    } catch (Exception $th) {
      $_SESSION['error'] = $con->error;
    }
  }else{
    header('location: leave.php');
  }
?>