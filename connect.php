<?php
global $con;
$con=new mysqli('localhost','root','','payrollsystem');
if(!$con){
    die(mysqli_error($con));
}
?>

