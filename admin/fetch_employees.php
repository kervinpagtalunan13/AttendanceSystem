<?php
  include '../connect.php';
  
  $sql = "SELECT * FROM employeelist WHERE employee_status = 'Active'";
  $res = $con->query($sql);

  $mainArr = [];
  while($row = $res->fetch_assoc()){
    $subArray = [];
    $subArray['value'] = $row['id'];
    $subArray['label'] = $row['fName']. " " .$row['mName']." ".$row['lName']. ", (".$row['id'].")";
    $mainArr[] = $subArray;
  }

  echo json_encode($mainArr);
?>