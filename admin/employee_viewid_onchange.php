<?php
  if(isset($_POST['id'])){
    include '../connect.php';
    $id = $_POST['id'];
    $sql = "SELECT id1, id2 FROM employeelist WHERE id = '$id'";
    $res = $con->query($sql);
    
    echo json_encode($res->fetch_assoc());
  }else{
    header('location: employee_list.php');
  }
  