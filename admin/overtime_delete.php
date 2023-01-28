<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  $output = [
    'error'=>true
  ];
  if(isset($_POST['id'])){
    include '../connect.php';
    include '../timezone.php';
    $id = $_POST['id'];

    $sql = "SELECT employeelist.id, date, CONCAT(fName, ' ', mName, ' ', lName) AS fullName FROM overtime INNER JOIN employeelist ON employeelist.id = overtime.employee_id WHERE overtime.id = '$id'";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
    $empNo = $row['id'];
    $empName = $row['fullName'];
    $date = $row['date'];
    $sql = "DELETE FROM overtime WHERE id = '$id'";
    try {
      if($con->query($sql)){
        $output['error'] = false;
        $output['message'] = 'Deleted Succesfully'.$empNo.$empName;
        $_SESSION['from'] = $_POST['from'];
        $_SESSION['to'] = $_POST['to'];
        // $activity = $empName."(".$empNo.")'s overtime for ".$date." is deleted by admin ".$adminName."(".$adminKey.").";
        // $empNo = 12;
        $_SESSION['success'] = "<b>Overtime deleted Succesfully, </b> to ".$empName;
        $activity = $empName." Overtime for ".date('F d, Y', strtotime($date))." is deleted by admin ".$adminName;
        $actType = 'overtime';
        include 'session/activity_upload.php';
      }
    } catch (Exception $th) {
      $output['message'] = $con->query;
    }
  }else{
    header('location: overtime.php');
  }
  echo json_encode($output);
?>