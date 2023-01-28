<?php
  if(isset($_POST['table'])){
    include '../connect.php';
    $table = $_POST['table'];

    $where = '';
    if($table == 'attendance_csv'){
      $month = $_POST['month'];
      $year = $_POST['year'];
      $sql = "SELECT * FROM attendance_csv INNER JOIN employeelist ON employeelist.id = attendance_csv.employee_id WHERE year(`date`) = '$year' AND month(`date`) = '$month'";
      // $where = "WHERE ";
    }

    // $sql = "SELECT * FROM $table $where";

    $res = $con->query($sql);
    $data = $res->fetch_all(MYSQLI_ASSOC);
  }else{
    header('location: report_generation.php');
  }

  echo json_encode($data);
?>