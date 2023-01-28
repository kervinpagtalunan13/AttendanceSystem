<?php
  include 'session/check_session.php';
  include '../connect.php';
  if(isset($_POST['from']) && isset($_POST['to'])){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $sql = "SELECT *, overtime.id AS 'btnId' FROM overtime INNER JOIN employeelist ON employeelist.id = overtime.employee_id WHERE date BETWEEN '$from' AND '$to' ORDER BY date DESC";
    $result = $con->query($sql);
    if($result){
      $data = $result->fetch_all(MYSQLI_ASSOC);
      echo json_encode($data);
    }
  }else{
    header('location: overtime.php');
  }
?>