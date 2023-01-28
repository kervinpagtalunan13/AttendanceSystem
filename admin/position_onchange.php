<?php

    include '../connect.php';

    $sql = "SELECT * FROM positions";
    $query = $con->query($sql);
    $position = $query->fetch_all(MYSQLI_ASSOC);

    echo json_encode($position);
    // $data = [];
    // while($row = $query->fetch_assoc()){
    //     $subArray = [];
    //     $subArray[] = $row['id'];
    //     $subArray[] = $row['description'];
    //     $subArray[] = $row['rate'];
    //     $subArray[] = '<button class="btn btn-primary me-2">Edit</button><button class="del-btn btn btn-danger " id="del-'.$row['id'].'">Delete</button>';
    //     $data[] = $subArray;
    // }
    // $output = [
    //     'data'=>$data
    // ];

    //  echo json_encode($output);
    
?>