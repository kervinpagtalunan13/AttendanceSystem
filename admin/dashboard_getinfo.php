<?php
  include 'session/check_session.php';

  if(isset($_GET['year'])){
    $_SESSION['year'] = $_GET['year'];
  }

  header('location: dashboard2.php');
?>