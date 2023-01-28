<?php
  session_start();
  if(isset($_GET['month'])){
    $_SESSION['month'] = $_GET['month'];
  }
  header('location: holiday.php');
?>