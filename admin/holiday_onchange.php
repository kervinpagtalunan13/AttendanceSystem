<?php
  include '../connect.php';

  $where_sql = '';
  if(!empty($_GET['start']) && !empty($_GET['start'])){
    $where_sql .= "WHERE start BETWEEN '".$_GET['start']."' AND '".$_GET['end']."' ";
  }
  if(isset($_POST['type'])){
    $where_sql .= "WHERE type = 1";
  }
  $sql = "SELECT * FROM holiday_event $where_sql";
  $result = $con->query($sql);

  $eventsArr = array();
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      array_push($eventsArr, $row);
    }
  }

  echo json_encode($eventsArr);
  // $sql = "SELECT * FROM holiday";
  // $result = $con->query($sql);

  // $data = [];

  // while($row = $result->fetch_assoc()){
  //   $subArray = [];
  //   $subArray['id'] = $row['id'];
  //   $subArray['description'] = $row['description'];
  //   // $subArray['date'] = $row
  //   $subArray['day'] = $row['day'];
  //   $monthName = $row['month'];
  //   $dateObj = DateTime::createFromFormat('!m', $monthName);
  //   $subArray['month'] = $dateObj->format('F');
  //   // $subArray[] = $row['date_added']
  //   $data[] = $subArray;
  // }

  // // echo json_encode($result->fetch_all(MYSQLI_ASSOC));
  // echo json_encode($data);
  ?>