<?php
  include 'session/check_session.php';

  if(isset($_POST['type'])){
    include '../connect.php';
    $type = $_POST['type'];

    $sql = "SELECT * FROM company_management";
    try {
      $query = $con->query($sql);
      $row = $query->fetch_assoc();
      $data = [
        'data'=>$row[$type]
      ];
      echo json_encode($data);
    } catch (\Throwable $th) {
      echo $con->error;
    }
  }else{
    header('location: dashboard2.php');
  }
?>