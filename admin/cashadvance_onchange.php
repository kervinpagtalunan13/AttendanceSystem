<?php
  include 'session/check_session.php';
  include '../connect.php';
  
  $sql = "SELECT employee_id, fName, lName, amount, cashadvance.date_advanced, type 
  FROM cashadvance INNER JOIN employeelist ON employee_id = employeelist.id WHERE employeelist.employee_status = 'Active'";
  $query = $con->query($sql);
  $result = $query->fetch_all(MYSQLI_ASSOC);
  echo json_encode($result);


?>