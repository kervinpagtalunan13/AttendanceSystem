<?php
  include 'session/check_session.php';

  if(isset($_POST['period'])){
    $_SESSION['period'] = $_POST['period'];
    $_SESSION['payroll_year'] = $_POST['year'];
  }else{
    header('location: payroll_management.php');
  }
?>