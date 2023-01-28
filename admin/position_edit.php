<?php
    include 'session/check_session.php';
    include 'session/check_user.php';
    include '../timezone.php';
    $output = [
        'error'=>true
    ];
    if(isset($_POST['id']) && isset($_POST['desc']) && isset($_POST['rate'])) {
        include '../connect.php';
        $id = $_POST['id'];

        $sql = "SELECT * FROM positions WHERE id = '$id'";
        $query = $con->query($sql);
        $row = $query->fetch_assoc();
        $recentDesc = $row['desc'];
        $recentRate = $row['rate'];

        $desc = $_POST['desc'];
        $rate = $_POST['rate'];

        $query = "UPDATE `positions` SET `description`='$desc',`rate`='$rate' WHERE id = '$id'";
        $result = $con->query($query);

        if($result){
            $output['error'] = false;
            $output['message'] = 'Edit Succesfully';
            $_SESSION['success'] = 'Edit Succesfully';

            $activity = "Position no.".$id." ".$desc." is edited by admin ".$adminName;
            $actType = 'position';
            include 'session/activity_upload.php';
        } 
    }else{
        // include 'session/activity_upload.php';
        header('location: position.php');
    }

    echo json_encode($output);
?>