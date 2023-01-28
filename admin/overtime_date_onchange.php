<?php
  include 'session/check_session.php';
  $output = array(
    'error'=>true
  );
  if(isset($_POST['from']) && isset($_POST['from'])){
    $_SESSION['from'] = date('Y-m-d' ,strtotime($_POST['from']));
    $_SESSION['to'] = date('Y-m-d', strtotime($_POST['to']));
    $output['error'] = false;
  }else{
    header('location: employee_attendance.php');
  }
  echo json_encode($output);
?>