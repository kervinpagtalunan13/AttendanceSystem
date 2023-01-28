<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  $output = [
    'error'=>true
  ];
  
  if(isset($_POST['import'])){
    include '../connect.php';
    include '../timezone.php';
    $fileName = $_FILES['file']['tmp_name'];
    
    if($_FILES['file']['size'] > 0){
      $file = fopen($fileName, 'r');
      $attUploaded = 0;
      $isFirstRow = 0;
      while(($column = fgetcsv($file, 10000, ",")) !== FALSE){
        $isFirstRow ++;
        if($isFirstRow != 1){
          $f_id = $column[0];
          $sql = "SELECT * FROM employeelist WHERE fingerprint_id = '$f_id'";
          $result = $con->query($sql);
          
          // pag may nafetch
          if($result->num_rows > 0){
            $empRow = $result->fetch_assoc();
            $employee_id = $empRow['id'];
            $sched = $empRow['sched'];
            
            $sql = "SELECT * FROM schedules WHERE id = '$sched'";
            $result = $con->query($sql);
            $schedRow = $result->fetch_assoc(); 
            $time_start = $schedRow['time_in'];
            $time_end = $schedRow['time_out'];
            
            $date = date('Y-m-d', strtotime($column[4]));
            $time_in = $column[1];
            $time_out = $column[2];
            
            // titignan kung may existing attendance record na sa parehong araw
            $sql = "SELECT * FROM attendance_csv WHERE employee_id = $employee_id AND date = '$date'";  
            $result = $con->query($sql);
            
            // pag meron
            if($result->num_rows > 0){
              
            }
                
            // pag wala
            else{
              
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
              
              $early_timeout_deduc = 0;
              if( strtotime($time_out) < strtotime($time_end) ){
                $early_timeout_deduc = ceil((strtotime($time_end) - strtotime($time_out)) / 3600);
              }

              // checks if masmalaki yung time-in sa time-out
              if(strtotime($time_in) > strtotime($time_out)){
                $start = (strtotime('24:00:00') - strtotime($time_start)) / 3600;
                $end = (strtotime($time_out) - strtotime('00:00:00')) /3600;
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
                // $working_hr = ((strtotime($time_end) - strtotime($time_start)) / 3600) - $minus_hr - $early_timeout_deduc;
              }
              
              if($working_hr < 0){
                $working_hr = 0;
              }
              if($working_hr > 8){
                $working_hr = 8;
              }
              // echo $working_hr. ', ';
              if($time_out == ''){
                $sql = "INSERT INTO `attendance_csv`(`Employee_ID`, `time_in`, `time_out`, `time_hr`, `total_hr`, `status`, `date`) VALUES ('$employee_id','$column[1]',NULL,'$column[3]', '$working_hr', '$isLate', '$date')";
              }else{
                $sql = "INSERT INTO `attendance_csv`(`Employee_ID`, `time_in`, `time_out`, `time_hr`, `total_hr`, `status`, `date`) VALUES ('$employee_id','$column[1]','$time_out','$column[3]', '$working_hr', '$isLate', '$date')";
                
              }
              
              if($con->query($sql)){
                $output['error'] = false;   
                $attUploaded ++;     
              } 
            }          
          }
        }
      }
      $_SESSION['success'] = "<b>Attendance uploaded, </b>".$attUploaded." attendance are uploaded.";
      $activity = "Attendance was uploaded with ".$attUploaded." attendance uploaded by Admin ".$adminName;
      $actType = "attendance";
      include 'session/activity_upload.php';
    }
    
  }
  header('location: employee_attendance.php');
  ?>