<?php 
  // include '..../timezone.php';
  $dateNow = date('Y-m-d');
  $timeNow = date('H:i:s'); 
  $sql = "INSERT INTO `activity_logs`(`activity`, `date`, `time`, `type`) VALUES ('$activity','$dateNow','$timeNow', '$actType')";
  $con->query($sql);
?>