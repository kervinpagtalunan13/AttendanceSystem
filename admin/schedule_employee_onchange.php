<?php
        include '../connect.php';

        $sql = "SELECT employeelist.id, fName, lName, time_in, time_out, description FROM employeelist INNER JOIN schedules ON employeelist.sched = schedules.id INNER JOIN positions ON employeelist.employee_Role = positions.id;";
        $query = $con->query($sql);
        $schedule = $query->fetch_all(MYSQLI_ASSOC);
    
        echo json_encode($schedule);
        
?>