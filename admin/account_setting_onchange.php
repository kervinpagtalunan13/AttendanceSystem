<?php
  include 'session/check_session.php';

  if(isset($_POST['type'])){
    include '../connect.php';
    $sql_where = '';
    $type = $_POST['type'];
    if($type == 'employeelist'){
      $sql_where .= " WHERE (employee_Role = '1' OR employee_Role = '9') AND employee_status = 'Active'";
      // $sql_where .= " WHERE employee_Role = '1' OR employee_Role = '9'";
    }
    $sql = "SELECT * FROM $type $sql_where";
    
    try {
      $result = $con->query($sql);
      $data = $result->fetch_all(MYSQLI_ASSOC);
      echo json_encode($data);
    } catch (Exception $th) {
      
    }
  }else{
    header('location: account_setting.php');
  }
?>