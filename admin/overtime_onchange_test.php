<?php
    include '../connect.php';
    if(isset($_POST['from']) && isset($_POST['to'])){
      $from = $_POST['from'];
      $to = $_POST['to'];
      // $sql = "SELECT *, overtime.id AS 'btnId' FROM overtime INNER JOIN employeelist ON employeelist.id = overtime.employee_id WHERE date BETWEEN '$from' AND '$to' ORDER BY date DESC";
      $sql = "SELECT *, overtime.id AS 'btnId' FROM overtime INNER JOIN employeelist ON employeelist.id = overtime.employee_id WHERE date BETWEEN '$from' AND '$to' ORDER BY date DESC";
      $result = $con->query($sql);
      
      if($result){
        $data = [];

        while ($row = $result->fetch_assoc()) {
          $subArray = [];
          $subArray[] = $row['id'];
          $subArray[] = $row['fName'].' '.$row['mName'].' '.$row['lName'];
          $subArray[] = $row['ot_hr'];
          $subArray[] = $row['date'];
          $subArray[] = "<button class='edit-btn btn btn-success rounded-2' id='edit-".$row['btnId']."'>Edit</button>
                   <button class='del-btn btn btn-danger rounded-2' id='del-".$row['btnId']."'>Delete</button>";
          $data[] = $subArray;
        }

        $output = [
          'data'=>$data
        ];

        echo json_encode($output);
      }
    }
?>