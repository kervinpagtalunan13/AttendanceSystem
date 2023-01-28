<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = [
    'error' => true
  ];

  if(isset($_POST['amount']) && isset($_POST['id'])) {
    include '../connect.php';
    $date = date('Y-m-d');
    $key = $_POST['id'];
    $amount = $_POST['amount'];

    // function addDeduction($emp_id, $amounts, $date, $con){ 
    //   $sql = $sql = "INSERT INTO `cashadvance`(`id`, `employee_id`, `Amount`, `date_advanced`) VALUES ('[value-1]','$emp_id','$amounts','$date')";
    //   if($con->query($sql)){
    //     $sql = "SELECT * FROM `cashadvance_total` WHERE id = '$emp_id'";
    //     $result = $con->query($sql);
    //     $row = $result->fetch_assoc();
    //     $total = $row['total'];
        
    //     $total += $amounts;
    //     $sql = "UPDATE `cashadvance_total` SET `total` = '$total' WHERE employee_id = '$emp_id'";
    //     if($con->query($sql)){

    //     }
    //   }
    // }

    $sql = "SELECT * FROM employeelist WHERE id = '$key'";
    $result = $con->query($sql);

    // kapag meron na employee sa list
    if($result->num_rows > 0){
      $res = $result->fetch_assoc();
      $employeeId = $res['id'];
      $empName = $res['fName']." ".$res['mName']." ".$res['lName'];

      $yearNow = date('Y');
      $monthNow = date('m');
      $dateNow = date('Y-m-d');
      
      $sql = "SELECT ca_limit FROM company_management";
      $query = $con->query($sql);
      $res = $query->fetch_assoc();
      $ca_limit = $res['ca_limit'];

      $sql = "SELECT * FROM cashadvance_total WHERE employee_id = '$employeeId'";
      $result = $con->query($sql);

      // kapag walang na fetch gagawa ng total sa table
      if($result->num_rows < 1) {
        // echo 'wala ka pa don, gagawa';
        if($amount <= $ca_limit){
          $sql = "INSERT INTO `cashadvance_total`(`employee_id`, `total`) VALUES ('$employeeId', '$amount')";
          if($con->query($sql)){
            // addDeduction($employeeId, $amount, $dateNow, $con);
            $output['error'] = false;
            $output['message'] = 'Cash advance succesfully';
            $_SESSION['success'] = 'Cash advance succesfully';

            $sql = $sql = "INSERT INTO `cashadvance`(`employee_id`, `Amount`, `date_advanced`) VALUES ('$key','$amount','$date')";
            $con->query($sql);

            $activity = $empName."(".$employeeId.") advanced &#8369;".$amount." by admin ".$adminName;
            $actType = 'cashAdvance';
            include 'session/activity_upload.php';
          }
        }else{
          $output['message'] = '<b>Cash advance limit exceeds</b><br> cash advance exceeds '.$ca_limit;
        }
        
      }
      // if meron
      else{
        $row = $result->fetch_assoc();
        $total = $row['total'];

        if($total + $amount > $ca_limit){
          $output['message'] = '<b>Cash advance limit exceeds</b><br> cash advance exceeds '.$ca_limit;
        }else{
          // addDeduction($employeeId, $amount, $dateNow, $con); 
          $newTotal = $total + $amount;
          $sql = "UPDATE cashadvance_total SET total = '$newTotal' WHERE employee_id = '$employeeId'";
          $con->query($sql);
          $output['error'] = false;
          $output['message'] = 'Cash advance succesfully';  
          $_SESSION['success'] = 'Cash advance succesfully';

          $sql = $sql = "INSERT INTO `cashadvance`(`employee_id`, `Amount`, `date_advanced`) VALUES ('$key','$amount','$date')";
          $con->query($sql);

          $activity = $empName."(".$employeeId.") advanced &#8369;".$amount." by admin ".$adminName;
          $actType = 'cashAdvance';
          include 'session/activity_upload.php';
        }
      }
    }
    // kapag walang nakita
    else{
      $output['message'] = 'Cannot find Employee';
    }
  }
  // kapag walang ininput
  else{
    $output['message'] = 'Input Credentials';
    header('location: cash_advance.php');
  }

  echo json_encode($output);
?>