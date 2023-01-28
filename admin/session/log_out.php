<?php
  session_start();
  include '../../timezone.php';
  include '../../connect.php';
  if(!isset($_SESSION['admin'])){
    session_destroy();
    header("location: ../index.php");
  }else{
    include 'check_user.php';
    $activity = "admin ".$adminName."(".$adminKey.") has logged out";
    $actType = '';
    include 'activity_upload.php';
    session_destroy();
    header("location: ../index.php");

  }
?>