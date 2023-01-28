<?php
  include 'session/check_session.php';

  if(isset($_POST['table'])){
    include '../connect.php';


    $table = $_POST['table'];
    // $table = 'attendance';

    if($table == 'employeelist') {
      $sql = "SELECT * FROM $table WHERE employee_status = 'active' ORDER BY `id` DESC";
      $result = $con->query($sql);
      if($result){
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
      }
    }else if ($table == 'attendance_csv' || $table == 'overtime' || $table == 'cashadvance' || $table == 'holiday_event' || $table == 'leave_info'){
      $from = $_POST['from'];
      $to = $_POST['to'];

      // $from = '2022-09-16';
      // $to = '2022-09-17';
      $col = 'date';
      if($table == 'cashadvance'){
        $col = 'date_advanced';
      }
      if($table == 'holiday_event'){
        $col = 'start';
      }

      $sql = "SELECT * FROM $table WHERE $col BETWEEN '$from' AND '$to'";
      $result = $con->query($sql);
      if($result){
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
      }
    }else if( $table == 'holiday'){
      $from = $_POST['from'];
      $to = $_POST['to'];

      $from = substr($from, 5, 5);
      $to = substr($to, 5, 5 );

      $from = str_replace('/','-', $from);
      $to = str_replace('/','-', $to);


      // $toMonth = substr($to, 5, 2);
      // $toDay = substr($to, 8, 2 );


      $sql = "SELECT description, CONCAT(month,'-', day) as 'date' FROM holiday";

      $result = $con->query($sql);
      $data = $result->fetch_all(MYSQLI_ASSOC);

      $filtered = [];

      foreach ($data as $holiday) {
        foreach ($holiday as $key => $value) {
          if($key == 'date'){
            if($value >= $from && $value <= $to){
              $filtered[] = $holiday;
            }
          }
        }
      }

      
      echo json_encode($filtered);

    }else if( $table == 'compensation_deductions' ){
      $year = date('Y', strtotime($_POST['from']));
      $month = date('F', strtotime($_POST['from']));
      $sql = "SELECT * FROM $table WHERE `year` = '$year' AND $month = 1 AND `status` = '0'";
      $result = $con->query($sql);
      if($result){
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
      }
    }else{
      $sql = "SELECT * FROM $table";
      $result = $con->query($sql);
      if($result){
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
      }
    }
  }else{
    header('location: payroll_management.php');
  }
?>