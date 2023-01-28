<?php
    include '../connect.php';
    $sql = "SELECT * FROM employeelist LEFT JOIN deductioninfo ON employeelist.id = deductioninfo.employee_id WHERE employee_status = 'Active'";
    $query = $con->query($sql);
    $deductions = $query->fetch_all(MYSQLI_ASSOC);

    echo json_encode($deductions)
?>