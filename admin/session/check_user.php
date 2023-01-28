<?php
  // start_session();
  if(isset($_SESSION['admin'])){
    include '../connect.php';
    $sql = "SELECT * FROM accounts";
    try {
      $res = $con->query($sql);
      $row = $res->fetch_assoc();
      $employee_id = $row['employee_no'];

      $sql = "SELECT * FROM employeelist WHERE id = '$employee_id'";
      $res = $con->query($sql);
      $row = $res->fetch_assoc();
      $adminName = $row['fName']." ".$row['lName'];
      $adminKey = $row['id'];
    } catch (Exception $th) {
      
    }
  }
?>