<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  // clearstatcache();
  $output = array(
    'error'=>true
  );

  if(isset($_GET['id'])){ 
    include '../connect.php';


    $id = $_GET['id'];
    $fName = $_POST['fName'];
    $mName = $_POST['mName'];
    $lName = $_POST['lName'];
    $role = $_POST["role"];
    $workType = $_POST['workType'];
    $empStatus = $_POST['empStatus'];
    $civilStat = $_POST['civilStatus'];
    $Birthday = $_POST['Birthday'];
    $email = $_POST["Email"];

    if($email == ''){
      $email = "NULL";
    }else{
      $email = "'$email'";
    }

    $no = $_POST["Contact"];
    $add = $_POST["Address"];
    $fingerprint = $_POST['fingerprint'];
    $sched = $_POST['schedule'];

    

    $taxNo = $_POST['taxNo'];
    $SSS = $_POST['SSS'];
    $Pagibig = $_POST['Pagibig'];
    $PhilHealth = $_POST['PhilHealth'];


    $sql = "UPDATE `employeelist` SET `civilStatus`='$civilStat', `Contact`='$no',`Email` = $email,
    `Address`='$add' ,`Birthday`='$Birthday',`employee_status`='$empStatus',`fName`='$fName',`mName`='$mName',`lName`='$lName', `employee_Role`='$role', fingerprint_id = '$fingerprint', sched = '$sched', workType='$workType', Tax='$taxNo', SSS='$SSS', PhilHealth='$PhilHealth', Pagibig='$Pagibig'";

    // $picLocation = '';
    if(file_exists($_FILES['profilePic']['tmp_name'])){
      $profilePicture = $_FILES['profilePic']['name'];
      $picExtension = explode(".", $profilePicture);
      $countPic = count($picExtension);
      $picLocation = "../employees_files/profile_pics/Employee".$id.".".$picExtension[$countPic-1];
      $sql .= ", `ProfilePic`='$picLocation'";
      // $_SESSION['success'] = 'Update Succesfully';
      $output['pic'] = "yes";
    }

    $sql .= " WHERE id='$id'";
    try {
      if($con->query($sql)){
        $_SESSION['success'] .= 'Update Succesfully';
        $output['message'] = 'Update Succesfully';
        $output['error'] = false;
        if(file_exists($_FILES['profilePic']['tmp_name'])){
          // unlink($picLocation);
          // $_SESSION['success'] = "Update Succesfully";
          // unlink($picLocation);
          move_uploaded_file($_FILES['profilePic']['tmp_name'], $picLocation);
          $output['pic2'] = "yes";
        }
      } 

      $activity = "Employee No.".$id." ".$fName." ".$mName." ".$lName." is edited by Admin ".$adminName;
      $actType = 'employeeEdit';
      include 'session/activity_upload.php';
      header('location: employee_view.php?viewid='.$id);

    } catch (Exception $th) {
      $_SESSION['error'] = $con->error;
      $output['message'] = $con->error;
      
      header('location: employee_view.php?viewid='.$id);
    }
  }else{
    header('location: employee_edit.php?id='.$id);
  }

  echo json_encode($output);
?>