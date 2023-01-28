<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = array(
    'error'=>true
  );
  if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['desc'])){
    $title = $_POST['title'];
    $date = $_POST['date'];
    // $end = $_POST['end'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `holiday_event`(`title`, `description`, `start`, `end`) VALUES ('$title', '$desc', '$date','$date')";
    if( $con->query($sql) ){
      $output['error'] = false;
      $output['message'] = "added succesfully";

      $activity = $title." is added to holidays for the date ".$date." by admin ".$adminName;
      $actType = 'holiday';
      include 'session/activity_upload.php';
    }
  }
  echo json_encode($output);

  // if(isset($_POST['desc']) && isset($_POST['date'])){
  //   include '../connect.php';
  //   $asd = $_POST['desc'];
  //   $desc = str_replace("'","''",$asd);
  //   $date = $_POST['date'];
  //   // $sql = "INSERT INTO `holidays`(`description`, `day`) VALUES ('$desc', '$date')";

  //   $month = substr($date, 5, 2 );
  //   $day = substr($date, 8, 2 );
    
  //   $sql = "SELECT * FROM holiday WHERE day = $day AND month = $month";
  //   $result = $con->query($sql);
  //   $date_2 = date('Y').'-'.$month.'-'.$day;
  //   if($result->num_rows > 0){
  //     $output['message'] = 'Date has already been taken';
  //   }else{
  //     $sql = "INSERT INTO `holiday`(`description`, `day`, `month`, `date_2`,`type`) VALUES ('$desc', '$day', '$month', '$date_2', '0')";
      
  //     if($con->query($sql)){
  //       $output['error'] = false;
  //       $output['message'] = 'Added Succesfully';
  //       $_SESSION['success'] = 'Added Succesfully';
  //       $_SESSION['month'] = $_POST['month'];

  //       $activity = $desc." is added to holidays for the date ".$date." by admin ".$adminName."(".$adminKey.")";
  //       $actType = 'leave';
  //       include 'session/activity_upload.php';
  //     }
  //   }

  // }else{
  //   header('location: holiday.php');
  // }
  // echo json_encode($output);
  ?>