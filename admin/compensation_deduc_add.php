<?php
  include 'session/check_session.php';
  include 'session/check_user.php';

  $output = array(
    'error' => true
  );

  if(isset($_POST['desc']) && isset($_POST['year']) && isset($_POST['amount'])){
    include '../connect.php';
    $employee_id = $_POST['id'];
    $desc = $_POST['desc'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $year = $_POST['year'];
    $month = array(
      'January' => (isset($_POST['January'])) ? 1 : 0,
      'February' => (isset($_POST['February'])) ? 1 : 0,
      'March' => (isset($_POST['March'])) ? 1 : 0,
      'April' => (isset($_POST['April'])) ? 1 : 0,
      'May' => (isset($_POST['May'])) ? 1 : 0,
      'June' => (isset($_POST['June'])) ? 1 : 0,
      'July' => (isset($_POST['July'])) ? 1 : 0,
      'August' => (isset($_POST['August'])) ? 1 : 0,
      'September' => (isset($_POST['September'])) ? 1 : 0,
      'October' => (isset($_POST['October'])) ? 1 : 0,
      'November' => (isset($_POST['November'])) ? 1 : 0,
      'December' => (isset($_POST['December'])) ? 1 : 0,
    );
    
    $count = count(array_filter($month));
    $total = $amount / $count;

    $sql = "SELECT fName, mName, lName FROM employeelist WHERE id = '$employee_id'";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();
    $employeeName = $row['fName']." ".$row['mName']." ".$row['lName'];
    $descType = ($type == 1) ? "Compensation" : "Deductions";


    $sql = "INSERT INTO `compensation_deductions`(`employee_id`, `description`, `type`, `total`, `monthly_total`, `year`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `status`) VALUES ('$employee_id','$desc','$type','$amount','$total','$year','".$month['January']."', '".$month['February']."','".$month['March']."','".$month['April']."','".$month['May']."','".$month['June']."','".$month['July']."','".$month['August']."','".$month['September']."','".$month['October']."','".$month['November']."','".$month['December']."','0')";

    $con->query($sql);
    $_SESSION['success'] = "<b>$descType added Succesfully</b> to $employeeName";
    $output['error'] = false;

    $activity = "$desc($descType) is added with ".$employeeName." by Admin ".$adminName;
    $actType = "comp_deduc";
    include 'session/activity_upload.php';
    

    echo $sql;
    echo $total;
    echo json_encode($month); 
  }
?>