 <?php
  include 'session/check_session.php';
  include '../connect.php';
  include '../timezone.php';
  $output = array(
    'error'=>true
  );

  if(isset($_POST['amount']) && isset($_POST['id']) && isset($_POST['operation'])){
    $sql = "SELECT ca_limit FROM company_management";
    $query = $con->query($sql);
    $res = $query->fetch_assoc();
    $ca_limit = $res['ca_limit'];
    $ca_amount = $_POST['amount'];
    $operation = $_POST['operation'];

    $empId = $_POST['id'];

    $sql = "SELECT * FROM cashadvance_total INNER JOIN employeelist ON cashadvance_total.employee_id = employeelist.id WHERE cashadvance_total.employee_id = '$empId'";
    $query = $con->query($sql);
    $res = $query->fetch_assoc();
    $ca_total = $res['total'];
    $empName = $res['fName']." ".$res['mName']." ".$res['lName'];
    if($operation == "add"){
        if($ca_total + $ca_amount <= $ca_limit){
          $output['error'] = false;
          $_SESSION['success'] = "<b>Cash advance added Succesfully</b>, &#8369;".$ca_amount." is added to ".$empName;
          $newTotal = $ca_total + $ca_amount;
          editWrite($empId, $newTotal, "add", $empName, $ca_amount);
        }else{
          $output['message'] = "<b>Cash advance exceeds</b><br> cash advance amount exceeds &#8369;".$ca_limit;
        }
    }else{
      if($ca_total - $ca_amount >= 0){
        $output['error'] = false;
        $_SESSION['success'] = "<b>Cash advance deduct Succesfully</b>, &#8369;".$ca_amount." is deducted to ".$empName;
        $newTotal = $ca_total - $ca_amount;
        editWrite($empId, $newTotal, "deduct", $empName, $ca_amount);
      }else{
        $output['message'] = "<b>Cash advance exceeds</b><br> cash advance amount is lower than &#8369;0";
      }
    }
    
  }else{
    header('location: cash_advance.php');
  }

  function editWrite($id, $total, $operation, $name, $amount){
    include '../timezone.php';
    $type = ($operation == 'add') ? 0 : 1;
    $date = date('Y-m-d');
    $sql = $sql = "INSERT INTO `cashadvance`(`employee_id`, `Amount`, `date_advanced`, `type`) VALUES ('$id','$amount','$date', '$type')";

    include '../connect.php';

    if($con->query($sql)){
      // $sql = "SELECT * FROM `cashadvance_total` WHERE id = '$emp_id'";
      // $result = $con->query($sql);
      // $row = $result->fetch_assoc();
      // $total = $row['total'];
      
      // $total += $amounts;
      $sql = "UPDATE `cashadvance_total` SET `total` = '$total' WHERE employee_id = '$id'";
      if($con->query($sql)){
        
      }
    }
    
    
    include 'session/check_user.php';
    // write in activilogs
    global $activity, $actType ;
    $activity = $name."(".$id.") cash advances balance is edited by admin ".$adminName;
    $actType = 'cashAdvance';
    include 'session/activity_upload.php';
  }

  echo json_encode($output);
