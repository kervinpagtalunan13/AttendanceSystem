<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = [
    'error'=>true
  ];
  if(isset($_POST['id']) && isset($_POST['desc'])){
    include '../connect.php';
    $id = $_POST['id'];

    $sql = "SELECT * FROM employeelist WHERE employee_role = $id";
    $query = $con->query($sql);
    $desc = $_POST['desc'];
    if($query->num_rows > 0){
      $output['message'] = 'Cannot Delete, there are/is employee/s currently hold this role. To delete this role please Change The role of the employee/s who holds the same role. ';
      $_SESSION['error'] = 'Cannot Delete, there are/is employee/s currently hold this role. To delete this role please Change The role of the employee/s who holds the same role. ';
    }else{
      $sql = "UPDATE positions SET `status`='0' WHERE id = '$id'";
      if($con->query($sql)){
        $output['error'] = false;
        $output['message'] = 'Delete Succesfully';
        $_SESSION['success'] = 'Delete Succesfully';

        $activity = $desc."(".$id.") is deleted to Positions  by admin ".$adminName;
        $actType = 'position';
        include 'session/activity_upload.php';
      }
    }

 
  }else{
    header('location: position.php');
  }

  echo json_encode($output);
?>