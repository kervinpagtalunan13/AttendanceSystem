<?php
    session_start();
    if(isset($_SESSION['admin'])){
        header('location: dashboard2.php');
    }
    include '../connect.php';
    include '../timezone.php';
    $output = [
        'error'=>true
    ];
    if(isset($_POST['user']) && isset($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM `accounts` WHERE username = '$user'";
        try {
            $query = $con->query($sql);
            if($query->num_rows > 0){
                $row = $query->fetch_assoc();
                $realPass = $row['password'];
                
                if($pass == $realPass){
                    $output['error'] = false;
                    $_SESSION['admin'] = "online";
                    include 'session/check_user.php';
                    
                    // adding to activity_logs
                    $activity = "Admin (".$adminName.") has logged in";
                    $date = date('Y-m-d');
                    $time = date('H:i:s');
                    $sql = "INSERT INTO `activity_logs`(`activity`, `date`, `time`) VALUES ('$activity','$date', '$time')";
                    $con->query($sql);
                }else{
                    $output['message'] = "Invalid Password";
                }
            }else{
                $output['message'] = "Invalid Account";
            }
        } catch (Exception $th) {
            $outpit['message'] = $con->error;
        }
        // if($result = $con->query($sql)){
        //     $output['error'] = false;
        //     $output['message'] = 'Successfully Login';
            // #tinignan kung may result tru row kung 0 yung row walang ganon na username pag hindi 0 meaning meron
            // $rowCount = $result->num_rows;
            
            // #kapag 0 yung row meaning walang ganon na account sa database
            // if($rowCount == 0){
            //     // echo "invalid account";
            //     $output['message'] = "Invalid Account";
            // }else{
                
            //     $row = $result->fetch_assoc();
                
            //     if($row['password'] == $pass){
            //         // echo "success";
            //         $output['error'] = false;
            //         $output['message'] = "Success";
            //         // $_SESSION['admin'] = 'online';
            //         // include 'session/check_user.php';
            //     }else{
            //         // echo "wrong password";
            //         $output['message'] = "Wrong Password";
    
            //     }
            // }
        // }
    }else{
        $output['message'] = "Input Credentials";
    }
    echo json_encode($output);
?>