<?php
  include 'session/check_session.php';

  if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['type'])){
    include '../connect.php';
    
    $from = $_POST['from'];
    $to = $_POST['to'];
    $type = $_POST['type'];
    
    $sql = "SELECT employeelist.id, positions.description, fName, lName, time_in, time_out, total_hr, date, attendance_csv.status, attendance_csv.id as 'btnId' FROM attendance_csv INNER JOIN employeelist ON employeelist.id = attendance_csv.employee_id INNER JOIN positions ON positions.id = employeelist.employee_Role WHERE attendance_csv.date BETWEEN '$from' AND '$to'";
    $result = $con->query($sql);

    $data = [];

    if($type == 'json'){
      while($attendance = $result->fetch_assoc()){
        $subArray = [];
        $subArray['id'] = $attendance['id'];
        $subArray['name'] = $attendance['fName'].' '.$attendance['lName'];
        $subArray['position'] = $attendance['description'];
        $subArray['btnId'] = $attendance['btnId'];
        $subArray['status'] = $attendance['status'];
        $subArray['time_in'] = $attendance['time_in'];
        // $subArray['time_in'] = date('h:i A', strtotime($attendance['time_in']));
        if($attendance['time_out'] == '00:00:00'){
          $to = "Still working";
        }else{
          $to = date('h:i A', strtotime($attendance['time_out']));
        }
        $subArray['time_out'] = $attendance['time_out'];
        $subArray['date'] = $attendance['date'];
        $subArray['total_hr'] = $attendance['total_hr'];
        $data[] = $subArray;
      }
      echo json_encode($data);
    }

    if($type == 'array'){
      while($attendance = $result->fetch_assoc()){
        $subArr = [];
        $subArr[] = $attendance['id'];
        $subArr[] = $attendance['fName'].' '.$attendance['lName'];
        $subArr[] = $attendance['description'];
        $status = $attendance['status'];
        $stat = 'on-time';
        $color = 'success';
        if($status == 1){
          $stat = 'late';
          $color = 'warning';
        }
        $subArr[] = '<div class="d-flex text-'.$color.' ">'.date('h:i A', strtotime($attendance['time_in'])).'<p class="ms-2 rounded-2  py-0 px-1 text-'.$color.' fw-bold">'.$stat.'</p></div>';
        if($attendance['time_out'] == NULL){
          $subArr[] = "<span class='text-danger'>Didn't time-out</span>";
        }else{
          $subArr[] = date('h:i A', strtotime($attendance['time_out']));
        }
        
        $subArr[] = $attendance['date'];
        $subArr[] = "<div class='d-flex'><button class='edit-btn btn btn-success me-2' id='edit-".$attendance['btnId']."'>Edit</button><button class='del-btn btn btn-danger' id='del-".$attendance['btnId']."'>Delete</button></div>";
        // $subArr[] = '';
        $data[] = $subArr;
      }
      
      $output = [ 
        'data'=>$data
      ];
      
      echo json_encode($output);
    } 
  }else{
    header('location: employee_attendance.php');
  }
  // else{
  //   echo 'error';
  // } 
?>