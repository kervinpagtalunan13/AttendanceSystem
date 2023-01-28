<?php
    $output = [
        'error' => true
    ];

    if(isset($_POST['key']) && isset($_POST['status'])){
        include 'connect.php';
        include 'timezone.php';

        $key = $_POST['key'];
        $status = $_POST['status'];

        $sql = "SELECT * FROM employeelist WHERE employee_key = '$key' AND employee_status = 'Active'";
        $result = $con->query($sql);
        // $employee = $result->fetch_assoc();

        // pag may row na nafetch
        if($result->num_rows > 0){
            
            $employee = $result->fetch_assoc();
            $employee_id = $employee['id'];
            $employee_sched = $employee['sched'];

            // getting the schedule
            $sqlSched = "SELECT * FROM schedules WHERE id = '$employee_sched'";
            $res = $con->query($sqlSched);
            $sched = $res->fetch_assoc();
            $time_in = $sched['time_in'];

            $timeIn = $sched['time_in'];
			$timeOut = $sched['time_out'];			

            //making time and date
            $dateNow = date('Y-m-d');
            $timeNow = date('H:i:s');

            // if time-in
            if($status == 'in'){

                $sql = "SELECT * FROM attendance WHERE employee_id = '$employee_id' and date = '$dateNow'";
                $result = $con->query($sql);

                // if walang nakita na match
                if($result->num_rows < 1){

                     // titignan kung may attendance na hindi ka nakapag time out
                     $sql = "SELECT * FROM attendance WHERE employee_id = '$employee_id' and time_out = '00:00:00'";
                     $result = $con->query($sql);

                     if($result->num_rows > 0) {
                        $output['message'] = 'You have\'nt time-out on your last timed-in. Please timed-out first';
                     } else {
                        // checks if late
                        $isLate = 0;
                        if(strtotime($timeNow) > strtotime($time_in)) {
                            $isLate = 1;
                        }
                        //  inserting into attendance
                        $sql = "INSERT INTO `attendance`(`employee_id`, `time_in`, `status`, `date`) VALUES ('$employee_id','$timeNow','$isLate','$dateNow')";

                        if($con->query($sql)){
                            $output['error'] = false;
                            $output['message'] = 'checked in!';
                        }


                     }
                }
                // if may nakita na match meaning may attendance na sya for today
                else{
                    $output['message'] = 'You\'ve already checked-in for today';
                }
                
             
            }
            // if time-out
            else{
                $sql = "SELECT * FROM attendance WHERE employee_id = '$employee_id' and date = '$dateNow'";
                $result = $con->query($sql);

                // kapag walang na fetch na row meaning wala ka pang attendance for today
                if($result->num_rows < 1){

                    // titignan kung may attendance na hindi ka nakapag time out
                    $sql = "SELECT * FROM attendance WHERE employee_id = '$employee_id' and time_out = '00:00:00'";
                    $result = $con->query($sql);

                    // if meron 
                    if($result->num_rows > 0){
                        $y = $result->fetch_assoc();
                        $timed_in = $y['time_in'];
                        $attendance_id = $y['id'];
                        $date_created = $y['date'];
                        $workingHour = '';


                        if( strtotime($timed_in) > strtotime($timeNow) ) {
                            $start = (strtotime('24:00:00') - strtotime($timed_in)) / 3600;
                            $end = (strtotime($timeNow) - strtotime('00:00:00')) / 3600;
                            $workingHour = $start + $end;
                        }else{
                            $workingHour = (strtotime($timeNow) - strtotime($timed_in)) / 3600;
                        }

                         // computing num hours         
                         $time_hr = abs($workingHour);

                        //  eligible hours

                        if( strtotime($timeIn) > strtotime($timeOut) ){
                            $start = (strtotime('24:00:00') - strtotime($timeIn)) / 3600;
                            $end = (strtotime($timeOut) - strtotime('00:00:00')) /3600;
                            $eligableWorkingHr = $start + $end;
                        }else{
                            $eligableWorkingHr = (strtotime($timeOut) - strtotime($timeIn)) / 3600;
                            $eligableWorkingHr = abs($eligableWorkingHr); 
                        }

                        // grace period
                        $minus_hr = 0;
                        $grace_period = 15;
                        if( strtotime($timed_in) > strtotime($timeIn) ){
                            $late_min = (strtotime($timed_in) - strtotime($timeIn)) / 60;       
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

                            if( strtotime($timed_in) > strtotime($timeNow) ) {
                                $start = (strtotime('24:00:00') - strtotime($timeIn)) / 3600;
                                $end = (strtotime($timeNow) - strtotime('00:00:00')) / 3600;
                                $workingHour = ($start + $end) - $minus_hr;
                            }else{
                                $workingHour = (strtotime($timeNow) - strtotime($timed_in)) / 3600;
                            }

                            $workingHour = ((strtotime($timeNow) - strtotime($timeIn)) / 3600) - $minus_hr;
                            $time_hr = $workingHour;

                            if($time_hr < 0){
                                $time_hr = 0;
                            }
                        }else{
                            
                        }

                        $eligableWorkingHr -= $minus_hr;

                        // if eligible hrs is bigger than working_hr
                        if( $time_hr > $eligableWorkingHr ) {
                            $overtime_hr = $time_hr - $eligableWorkingHr;
                            $time_hr = $eligableWorkingHr;

                            $sql = "INSERT INTO `overtime`(`employee_id`, `ot_hr`, `date`) VALUES ('$employee_id','$overtime_hr','$date_created')";

                            $con->query($sql);
                        }

                         // updating to time out
                         $sql = "UPDATE `attendance` SET `time_out`='$timeNow',`time_hr`=
                         '$time_hr' WHERE id = '$attendance_id'";
    
                         if($con->query($sql)){                       
                             $output['error'] = false;
                             $output['message'] = 'Timed-out';
                         }

                    }else{
                        $output['message'] = 'You have\'nt checked in for today';
                    }

                }
                // if may nafetch na row meaning nag attendance ka na
                else{
                    $attendance_details = $result->fetch_assoc();
                    $timed_out = $attendance_details['time_out'];
                    $timed_in = $attendance_details['time_in'];
                    $attendance_id = $attendance_details['id'];
                    $date = $attendance_details['date'];
                    // meaning pag hindi pa nagtitime out
                    if($timed_out == '00:00:00'){
                        
                        // computing num hours
                        $workingHour = (strtotime($timeNow) - strtotime($timed_in)) / 3600;
                        $time_hr = abs($workingHour);

                        //  eligible hours
                        // if(strtotime($timeIn) > strtotime($timeIn))

                        if( strtotime($timeIn) > strtotime($timeOut) ){
                            $start = (strtotime('24:00:00') - strtotime($timeIn)) / 3600;
                            $end = (strtotime($timeOut) - strtotime('00:00:00')) /3600;
                            $eligableWorkingHr = $start + $end;
                        }else{
                            $eligableWorkingHr = (strtotime($timeOut) - strtotime($timeIn)) / 3600;
                            $eligableWorkingHr = abs($eligableWorkingHr); 
                        }

                        $cash_on_hand = 20.75; 

                        // computting in grace period
                        $minus_hr = 0;
                        $grace_period = 15;
                        if( strtotime($timed_in) > strtotime($timeIn) ){
                            $late_min = (strtotime($timed_in) - strtotime($timeIn)) / 60;       
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
                            $workingHour = ((strtotime($timeNow) - strtotime($timeIn)) / 3600) - $minus_hr;
                            $time_hr = $workingHour;

                            if($time_hr < 0){
                                $time_hr = 0;
                            }
                        }else{
                            // if(strtotime($timeNow) < strtotime($timeIn)){
                            //     $time_hr = 0;
                            // }
                        }

                        $eligableWorkingHr -= $minus_hr;

                        if( $time_hr > $eligableWorkingHr) {
                            $overtime_hr = $time_hr - $eligableWorkingHr;
                            $time_hr = $eligableWorkingHr ;

                            $sql = "INSERT INTO `overtime`(`employee_id`, `ot_hr`, `date`) VALUES ('$employee_id','$overtime_hr','$date')";

                            $con->query($sql);
                        }
                        // updating to time out


                        $sql = "UPDATE `attendance` SET `time_out`='$timeNow',`time_hr`=
                        '$time_hr' WHERE id = '$attendance_id'";

                        if($con->query($sql)){                       
                            $output['error'] = false;
                            $output['message'] = 'Timed-out';
                        }
                        
                    }
                    // kapag nag time out na
                    else{
                        $output['message'] = 'You\'ve already timed-out for today';
                    }
                }
            }

        }
        // pag walang row na fetch
        else{
            $output['message'] = 'Cannot find Employee';
        }
        
    }

    echo json_encode($output);
?>