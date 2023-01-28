<?php
  include 'session/check_session.php';

  if(isset($_POST['time_in']) && isset($_POST['time_out'])){
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    if( strtotime($time_in) > strtotime($time_out) ) {
      $start = (strtotime('24:00:00') - strtotime($time_in)) / 3600;
      $end = (strtotime($time_out) - strtotime('00:00:00')) / 3600;
      $total_hr = $start + $end;
    }else{
      $total_hr = (strtotime($time_out) - strtotime($time_in)) / 3600;
    }
    
    echo number_format((float)$total_hr, 2, '.', ''); 
  }else{
    // header('location: ')
  }
  
?>