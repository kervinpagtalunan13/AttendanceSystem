<?php
  include 'session/check_session.php';

  include '../connect.php';
  $sql = "SELECT * FROM cashadvance_total INNER JOIN employeelist ON cashadvance_total.employee_id = employeelist.id";
  $result = $con->query($sql);
  echo json_encode($result->fetch_all(MYSQLI_ASSOC));

?>