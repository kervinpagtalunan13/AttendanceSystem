<?php
  if(isset($_POST['data']) && isset($_POST['id'])){
    include '../connect.php';
    $data = $_POST['data'];
    $id = $_POST['id'];

    $sql = "UPDATE `payroll_info` SET `data`='$data' WHERE id = '$id'";
    $con->query($sql);
    // echo 'asdsad';
  }