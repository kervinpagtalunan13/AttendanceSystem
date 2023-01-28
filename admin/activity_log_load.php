<?php
  include 'session/check_session.php';
  include '../connect.php';
  if(isset($_POST['go'])){

    $sql = "SELECT * FROM activity_logs";
    try {
      $query = $con->query($sql);
    // $res = $query->fetch_all(MYSQLI_ASSOC);
    $data = [];
    while ($row = $query->fetch_assoc()) {
      $subArr = [];
      $subArr['activity'] = $row['activity'];
      $subArr['time'] = date(('g:i:s A'), strtotime($row['time']));
      $subArr['date'] = date(('F d, Y'), strtotime($row['date']));
      $data[] = $subArr;
    }
    // $output = [ 
    //   'data'=>$data
    // ];
    echo json_encode($data);
    } catch (Exception $th) {
      echo $con->error;
    }
  }else{

    // header('location: activity_log.php');
  }
  
?>