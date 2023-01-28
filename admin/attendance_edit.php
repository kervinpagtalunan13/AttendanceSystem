<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  $output = [
    'error'=>true
  ];
  if(isset($_POST['time_in']) && isset($_POST['time_out']) && isset($_POST['total_hr']) && isset($_POST['attId']) && isset($_POST['id']) && isset($_POST['date'])){
    include '../connect.php';
    include '../timezone.php';
    $timeIn = $_POST['time_in'];
    $timeOut = $_POST['time_out'];
    $total_hr = $_POST['total_hr'];
    $attId = $_POST['attId'];
    $empId = $_POST['id'];
    $date = $_POST['date'];

    $sql = "SELECT time_in, time_out, fName, lName, mName FROM employeelist INNER JOIN schedules ON schedules.id = sched WHERE employeelist.id = '$empId'";
    $query = $con->query($sql);
    $result = $query->fetch_assoc();
    $time_start = $result['time_in'];
    $time_end = $result['time_out'];
    $empName = $result['fName']." ".$result['mName']." ".$result['lName'];

    // computing eligable hrs
    if( strtotime($time_start) > strtotime($time_end) ){
      $start = (strtotime('24:00:00') - strtotime($time_start)) / 3600;
      $end = (strtotime($time_end) - strtotime('00:00:00')) /3600;
      $eligableWorkingHr = $start + $end;
    }else{
        $eligableWorkingHr = (strtotime($time_end) - strtotime($time_start)) / 3600;
    }

    // pag masmalaki sa eligable hr
    // if($total_hr > $eligableWorkingHr){
    //   $output['message'] = 'Total hrs is bigger than elligable hrs';
    // }
    
    // kapag pasok sa eligale hrs
    // else{
      $minus_hr = 0;
      $isLate = 0;
      if( strtotime($timeIn) > strtotime($time_start) ){
        // $grace_period = 15;
        $sql = "SELECT grace_period FROM company_management";
        $query = $con->query($sql);
        $res = $query->fetch_assoc();
        $grace_period = $res['grace_period'];

        $isLate = 1;
          $late_min = (strtotime($timeIn) - strtotime($time_start)) / 60;       
          if($late_min/$grace_period >= 1){
            $late_hr = $late_min / 60;

            if( $late_hr <= 1){
                $minus_hr = 1;
            }else{
                $minus_hr = floor($late_hr);
                $remainder = fmod($late_hr, 1);
                if( $remainder >= ($grace_period/60 * 1)){
                    $minus_hr += 1;
                }
            }
        }
      }
      // kapag lagpas sa time_end ng sched
      // if( strtotime($timeOut) >  strtotime($time_end) ){
      //   $timeOut = $time_end;
      // }

      $early_timeout_deduc = 0;
      if( strtotime($timeOut) < strtotime($time_end) ){
        $early_timeout_deduc = ceil((strtotime($time_end) - strtotime($timeOut)) / 3600);
      }

      if(strtotime($timeIn) > strtotime($timeOut)){
        $start = (strtotime('24:00:00') - strtotime($time_start)) / 3600;
        $end = (strtotime($time_end) - strtotime('00:00:00')) /3600;

        $startMin = (strtotime('24:00:00') - strtotime($timeIn)) / 60;
        $endMin = (strtotime($timeOut) - strtotime('00:00:00')) /60;
        $workMin = $startMin + $endMin;
        if(($start + $end) > 8){
          $workingHour = 8 - $minus_hr- $early_timeout_deduc;
        }else{
          $workingHour = ($start + $end) - $minus_hr - $early_timeout_deduc;
        }
      }else{
        if(((strtotime($time_end) - strtotime($time_start)) / 3600) > 8){
          $workingHour = 8 - $minus_hr- $early_timeout_deduc;
        }else{
          $workingHour = ((strtotime($time_end) - strtotime($time_start)) / 3600) - $minus_hr - $early_timeout_deduc;
        }
        $workMin = (strtotime($timeOut) - strtotime($timeIn)) / 60;
      }
      $min2hr = intdiv($workMin, 60).':'.fmod($workMin, 60);

      $sql = "UPDATE attendance_csv SET `time_in`='$timeIn',`time_out`='$timeOut',`time_hr`='$min2hr',`total_hr`='$workingHour',`status`='$isLate' WHERE id = '$attId'";
      
      if($con->query($sql)){
        $output['error'] = false;
        // $output['message'] = 'Edited Succesfully'.$workingHour.'-'.$min2hr.'-'.$attId;
        $output['message'] = '<b>Attendance edited succesfully </b> ';
        $_SESSION['success'] = '<b>Attendance edited succesfully, </b> of '.$empName.' for '.date("F d, Y",strtotime($date));
        $_SESSION['from'] = $_POST['from'];
        $_SESSION['to'] = $_POST['to'];
        // include '../'
        $activity = "Attendance of ".$empName." of ".$date." is edited by Admin ".$adminName;
        $actType = "attendance";
        include 'session/activity_upload.php';
      }
    // }

  }else{
    header('location: employee_attendance.php');
  }

  // echo $attId.' '.$empId;
  echo json_encode($output);
?>