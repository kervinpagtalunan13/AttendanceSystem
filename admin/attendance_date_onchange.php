<?php
  include 'session/check_session.php';
  $output = array(
    'error'=>true
  );
  if(isset($_POST['from']) && isset($_POST['from'])){
    $_SESSION['from'] = $_POST['from'];
    $_SESSION['to'] = $_POST['to'];
    $output['error'] = false;
  }else{
    header('location: employee_attendance.php');
  }
  echo json_encode($output);
?>