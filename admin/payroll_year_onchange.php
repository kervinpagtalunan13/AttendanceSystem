<?php
  include 'session/check_session.php';

  if(isset($_POST['year'])){
    $_SESSION['payroll_year'] = $_POST['year'];
  }else{
    header('location: payroll_management.php');
  }
?>