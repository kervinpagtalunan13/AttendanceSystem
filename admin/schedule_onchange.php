<?php
    include '../connect.php';

    $sql = "SELECT * FROM schedules";
    $query = $con->query($sql);
    $schedule = $query->fetch_all(MYSQLI_ASSOC);

    echo json_encode($schedule);
?>