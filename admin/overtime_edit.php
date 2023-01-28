<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = [
    'error'=>true
  ];
  if(isset($_POST['btnId']) && isset($_POST['edit_hrs'])){
    include '../connect.php';
    $id = $_POST['btnId'];
    $hrs = floor($_POST['edit_hrs']);

    $sql = "SELECT employeelist.id, date, CONCAT(fName, ' ', mName, ' ', lName) AS fullName FROM overtime INNER JOIN employeelist ON employeelist.id = overtime.employee_id WHERE overtime.id = '$id'";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
    $empNo = $row['id'];
    $empName = $row['fullName'];
    $date = $row['date'];

    $sql = "UPDATE overtime SET `ot_hr`='$hrs' WHERE id = '$id'";
    
    try {
      if($con->query($sql)){
        $output['error'] = false;
        $output['message'] = 'Edit Succesfully';
        $_SESSION['success'] = "<b>Overtime edited Succesfully, </b> to ".$empName;
        $_SESSION['from'] = $_POST['from'];
        $_SESSION['to'] = $_POST['to'];

        $activity = $empName." Overtime for ".date('F d, Y', strtotime($date))." is edited by admin ".$adminName;
        $actType = 'overtime';
        include 'session/activity_upload.php';
      }
    } catch (Exception $th) {
      $output['message'] = $con->error;
    }
  }else{
    header('location: overtime.php');
  }
  echo json_encode($output);
?>