<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = [
    'error'=>true
  ];

  if(isset($_POST['sss']) && isset($_POST['ph']) && isset($_POST['pi']) && isset($_POST['id'])) {
    include '../connect.php';

    $id = $_POST['id'];
    $ph = $_POST['ph'];
    $sss = $_POST['sss'];
    $pi = $_POST['pi'];

    $output['error'] = false;

    $sql = "SELECT * FROM deductioninfo WHERE employee_id = '$id'";
    $result = $con->query($sql);

    // if walang row na nafetch meaning add
    if($result->num_rows < 1){
      $sql = "INSERT INTO `deductioninfo`(`employee_id`, `SSS`, `Philhealth`, `Pagibig`) VALUES ('$id','$sss','$ph','$pi')";
      if($con->query($sql)){
        $output['error'] = false;
        $output['message'] = 'Update Succesfully';
      }

    }else{
      $sql = "UPDATE `deductioninfo` SET `SSS`='$sss',`Philhealth`='$ph',`Pagibig`='$pi' WHERE employee_id = '$id'";
      if($con->query($sql)){
        $output['error'] = false;
        $output['message'] = 'Update Succesfully';
        
        $sql = "SELECT * FROM employeelist WHERE id = '$id'";
        $query = $con->query($sql);
        $res = $query->fetch_assoc();
        $empName = $res['fName']." ".$res['mName']." ".$res['lName'];
        
        $_SESSION['success'] = '<b>Updated Succesfully</b>, Deductions for Employee No.'.$id.' '.$empName;

        $activity = "Deduction of ".$empName."(".$id.") is edited by Admin ".$adminName."(".$adminKey.").";
        $actType = "deduction";
        include 'session/activity_upload.php';
      }
    }
  }else{
    header('location: deduction.php');
  }

  echo json_encode($output);
?>