<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  $output = [
    'error'=>true
  ];
  if(isset($_POST['id']) && isset($_POST['hrs']) && isset($_POST['date'])){
    include '../connect.php';
    include '../timezone.php';
    $empKey = $_POST['id'];
    $date = $_POST['date'];
    $hr = floor($_POST['hrs']);
    try {
      $sql = "SELECT * FROM employeelist WHERE id = '$empKey'";
      if($query = $con->query($sql)){
        if($query->num_rows > 0){

          $result = $query->fetch_assoc();
          $id = $result['id'];
          $empName = $result['fName']." ".$result['mName']." ".$result['lName'];
          $sql = "SELECT * FROM overtime WHERE employee_id = '$id' AND date = '$date'";
          $query = $con->query($sql);
          if($query->num_rows < 1){
            $sql = "INSERT INTO `overtime`(`employee_id`, `ot_hr`, `date`) VALUES ('$id','$hr','$date')";
            if($con->query($sql)){
              $output['error'] = false;
              $output['message'] = 'Added Succesfully';
              $_SESSION['from'] = $_POST['from'];
              $_SESSION['to'] = $_POST['to'];
              $_SESSION['success'] = "<b>Overtime Added Succesfully, </b> to ".$empName;
              $activity = $hr." hour/s Overtime is added to ".$empName." for the ".date('F d, Y', strtotime($date))." by admin ".$adminName;
              $actType = 'overtime';
              include 'session/activity_upload.php';
            }
          }else{
            $output['message'] = 'You already have overtime at '.$date;
          }

        }else{
          $output['message'] = 'Cannot Find Employee';
        }
      }
    } catch (Exception $th) {
      
    }
  }else{
    header('location: overtime.php');
  }

  echo json_encode($output);
?>