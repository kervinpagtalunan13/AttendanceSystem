<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = [
    'error'=>true
  ];

  if(isset($_POST['id']) && isset($_POST['date']) && isset($_POST['type'])){
    include '../connect.php';
    
    $key = $_POST['id'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    $sql = "SELECT * FROM employeelist WHERE id = '$key' AND employee_status = 'Active'";
    $query = $con->query($sql);

    // if may na fetch na user
    if($query->num_rows > 0){
      $row = $query->fetch_assoc();
      $employeeId = $row['id'];
      $fName = $row['fName'].' '.$row['lName'];
      $year = explode('-', $date);
      $year = $year[0];
      $sql = "SELECT * FROM leave_info WHERE employee_id = '$employeeId' and EXTRACT(YEAR FROM date) = '$year'";
      
      if($result = $con->query($sql)){

        $sql = "SELECT leave_limit FROM company_management";
        $query = $con->query($sql);
        $res = $query->fetch_assoc();
        $pa_limit = $res['leave_limit'];

        // if mas mababa sa 24
        if($result->num_rows < $pa_limit) {
          
          $sql = "SELECT * FROM `leave_info` WHERE employee_id = $employeeId AND date = '$date'";
          $result = $con->query($sql);

          // if walang same na date
          if($result->num_rows < 1){
            $sql = "INSERT INTO `leave_info`(`employee_id`, `date`, `type`) VALUES ('$employeeId','$date', '$type')";

            
            if($con->query($sql)){
              $_SESSION['success'] = "<strong>Added successfully!</strong> Paid Leave has been added to ".$fName;
              $output['error'] = false;
              $output['message'] = "<strong>Added successfully!</strong> Paid Leave has been added to ".$fName;
              $activity = "Paid Leave for ".date('F d Y', strtotime($date))." is added to ".$fName."  by admin ".$adminName;
              $actType = 'paidLeave';
              include 'session/activity_upload.php';
              
            }else{
              $_SESSION['error'] = $con->error;
            }     
          }
          // if may kamukha na date
          else{
            $output['message'] = "You've already taken this date for your Leave.";
            // $_SESSION['error'] = "You've already taken this date for your Leave.";
          }

        }
        // kapag sobra na sa 24
        else{
          $output['message'] = "Exceeds the amount of leave for the year of ".$year;
          // $_SESSION['error'] = "Exceeds the amount of leave for the year of ".$year;
        }      
      }else{
        $_SESSION['error'] = $con->error;
      }


    }
    // kapag walang na fetch na employee
    else{
      $output['message'] = "Cannot Find Employee";
      // $_SESSION['error'] = "Cannot Find Employee";
    }
  }else{
    header('location: leave.php');
  }

  echo json_encode($output);
  // header('location: leave.php');
?>