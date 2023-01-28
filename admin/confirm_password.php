<?php
  include 'session/check_session.php';

  $output = [
    'error'=>true
  ];
  if(isset($_POST['pass'])){
    include '../connect.php';
    $pass = $_POST['pass'];
    $sql = "SELECT password FROM accounts";
    try {
      $query = $con->query($sql);
      $data = $query->fetch_assoc();
      $password = $data['password'];

      if($pass == $password){
        $output['error'] = false;
      }else{
        $output['message'] = "Wrong Password";
      }

    } catch (Exception $th) {
      $output['message'] = $con->error;
    }
  }

  echo json_encode($output);
?>