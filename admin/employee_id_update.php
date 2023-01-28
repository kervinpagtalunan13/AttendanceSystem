<?php
  include 'session/check_session.php';

  $output = array(
    'error'=>true
  );
  if(isset($_POST['emp-id']) && isset($_POST['id-no']) ){
    include '../connect.php';
    $id = $_POST['emp-id'];
    if(file_exists($_FILES['pic']['tmp_name'])){
      $idNo = ($_POST['id-no'] == 1) ? 1 : 2;
      $pic = $_FILES['pic']['name'];
      $picExtension = explode(".", $pic);
      $countPic = count($picExtension);
      $picLocation = "../employees_files/IDs/EmployeeID".$idNo."_".$id.".".$picExtension[$countPic-1];
      $output['pic'] = $picLocation;

      $sql = "UPDATE employeelist SET id".$idNo." = '$picLocation' WHERE id = '$id'";
      if($con->query($sql)){
        unlink($picLocation);
        move_uploaded_file($_FILES['pic']['tmp_name'], $picLocation);
        $_SESSION['success'] = "ID update Successfully";
        // $output['pic2'] = "yes";
        $output['message'] = "Updated Succesfully";
        header("location: employee_view_id.php?id=".$id);
      }
    }

    $output['error'] = false;
  }else{

  }

  echo json_encode($output);