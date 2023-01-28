<?php
  include '../timezone.php';
  include 'session/check_session.php';
  include 'session/check_user.php';

  $output = array(
    'error' => true
  );

  if(isset($_POST['timeIn']) && isset($_POST['date']) && isset($_POST['timeOut']) && isset($_POST['id']) ){
    include '../connect.php';
    $employee_id =  $_POST['id'];
    $time_in =  $_POST['timeIn'];
    $time_out =  $_POST['timeOut'];
    $date =  $_POST['date'];

    $output['timeIn'] = $time_in;
    $output['timeOut'] = $time_out;

    try {
      $sql = "SELECT * FROM attendance_csv WHERE employee_id = $employee_id AND date = '$date'";  
      $result = $con->query($sql);

      if($result->num_rows > 0){
        $output['message'] = '<b>Cannot be added</b>, <br>Cannot add two attendance at the same Date';
      }else{
        $sql = "SELECT time_in, time_out, fName, mName, lName FROM employeelist INNER JOIN schedules ON schedules.id = employeelist.sched WHERE employeelist.id = '$employee_id'";
        $res = $con->query($sql);
        $row = $res->fetch_assoc();
        $time_start = $row['time_in'];
        $time_end = $row['time_out'];
        $empName = $row['fName']." ".$row['mName']." ".$row['lName'];

        // main computation


        // checks if late
        $isLate = 0;
        $minus_hr = 0;
        if( strtotime($time_in) > strtotime($time_start)){
          $isLate = 1;
          
          $late_min = (strtotime($time_in) - strtotime($time_start)) / 60;   
          // $grace_period = 15;
          $sql = "SELECT grace_period FROM company_management";
          $query = $con->query($sql);
          $res = $query->fetch_assoc();
          $grace_period = $res['grace_period'];
          
          // kapag lagpas sa graceperiod
          if($late_min/$grace_period >= 1){
            $late_hr = $late_min / 60;
            
            if($late_hr <= 1){
              $minus_hr ++;
            }else{
              $minus_hr = floor($late_hr);
              $remainder = fmod($late_hr, 1);
              if( $remainder >= ($grace_period/60 * 1)){
                $minus_hr += 1;
              }
            }
          }                
        }

        // early time out deduc
        $early_timeout_deduc = 0;
        if( strtotime($time_out) < strtotime($time_end) ){
          $early_timeout_deduc = ceil((strtotime($time_end) - strtotime($time_out)) / 3600);
        }

        // checks if masmalaki yung time-in sa time-out
        if(strtotime($time_in) > strtotime($time_out)){
          $start = (strtotime('24:00:00') - strtotime($time_start)) / 3600;
          $end = (strtotime($time_out) - strtotime('00:00:00')) /3600;

          $startMin = (strtotime('24:00:00') - strtotime($time_in)) / 60;
          $endMin = (strtotime($time_out) - strtotime('00:00:00')) /60;
          $workMin = $startMin + $endMin;

          if(($start + $end) > 8){
            $working_hr = 8 - $minus_hr- $early_timeout_deduc;
          }else{
            $working_hr = ($start + $end) - $minus_hr - $early_timeout_deduc;
          }
          // $working_hr = $start + $end - $minus_hr - $early_timeout_deduc;
        }else{
          if(((strtotime($time_end) - strtotime($time_start)) / 3600) > 8){
            $working_hr = 8 - $minus_hr- $early_timeout_deduc;
          }else{
            $working_hr = ((strtotime($time_end) - strtotime($time_start)) / 3600) - $minus_hr - $early_timeout_deduc;
          }
          $workMin = (strtotime($time_out) - strtotime($time_in)) / 60;
          // $working_hr = ((strtotime($time_end) - strtotime($time_start)) / 3600) - $minus_hr - $early_timeout_deduc;
        }

        $min2hr = intdiv($workMin, 60).':'.fmod($workMin, 60);

        if($working_hr < 0){
          $working_hr = 0;
        }
        if($working_hr > 8){
          $working_hr = 8;
        }

        $sql = "INSERT INTO `attendance_csv`(`Employee_ID`, `time_in`, `time_out`, `time_hr`, `total_hr`, `status`, `date`) VALUES ('$employee_id','$time_in','$time_out','$min2hr', '$working_hr', '$isLate', '$date')";

        $con->query($sql);
        
        $_SESSION['success'] = "<b>Attendance Added Succesfully</b>, $empName's attendance for ".date('F d, Y', strtotime($date));
        $output['error'] = false;
        $output['message'] = "<b>Attendance Added Succesfully</b>, $empName's attendance for ".date('F d, Y', strtotime($date));

        $_SESSION['from'] = $date;
        $_SESSION['to'] = $date;
        // include '../'
        $activity = "Attendance of ".$empName." of ".$date." is added by Admin ".$adminName;
        $actType = "attendance";
        include 'session/activity_upload.php';

        // $output['early_timeout_deduc'] = $early_timeout_deduc;
        // $output['late'] = $minus_hr;
        // $output['workmin'] = $min2hr;
        // $output['working_hr'] = $working_hr;
      }

    } catch (\Throwable $th) {
      $output['message'] = $con->error;
    }
    // $output['error'] = false;
  }else{
    header('location: employee_attendance.php');
  }
  echo json_encode($output);
?>