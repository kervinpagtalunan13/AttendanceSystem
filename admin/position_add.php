<?php
    include 'session/check_session.php';
    include 'session/check_user.php';
    include '../timezone.php';

    $output = [
        'error'=>true
    ];
    if(isset($_POST['desc']) && isset($_POST['rate'])) {
        include '../connect.php';
        $_SESSION['success'] = 'Added Succesfully';
        $desc = $_POST['desc'];
        $rate = $_POST['rate'];

        $sql = "INSERT INTO `positions`(`description`, `rate`, `status`) VALUES ('$desc','$rate', '1')";

        if($con->query($sql)){
            $id = $con->insert_id;
            $output['error'] = false;
            $output['message'] = 'Added Succesfully';
            $_SESSION['success'] = $desc.' is Added Succesfully';
            // $id = 1;
            $activity = $desc."(".$id.") is added to Positions  by admin ".$adminName;
            $actType = 'position';
            include 'session/activity_upload.php';
        }
    }else{
        header('location: position.php');
        $_SESSION['error'] = 'mali';
    }

    echo json_encode($output);
?>