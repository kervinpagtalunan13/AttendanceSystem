<?php
global $con;
$con=new mysqli('localhost','root','','attendancesystem');
if(!$con){
    die(mysqli_error($con));
}
?>

