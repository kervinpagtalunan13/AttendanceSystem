<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = array(
    'error' => true
  );
  if(isset($_POST['data']) && isset($_POST['id']) && isset($_POST['period']) && isset($_POST['year'])){
    include '../connect.php';
    $data = $_POST['data'];
    $year = $_POST['year'];
    $id = $_POST['id'];
    $desc = ($_POST['period'] == 3) ? "13th month pay" : "Mid Year Pay";
    $sql = "UPDATE payroll_info SET `status` = '1', `data` = '$data' WHERE `id` = '$id'";
    try {
      $con->query($sql);
      $output['error'] = false;
      $_SESSION['success'] = '<b>Payroll Released Succesfully</b>, '.$desc.' for the year of '.$year;
      $actType = 'payroll';
      $activity = $desc." for the year of ".$year." is released by Admin ".$adminName;
      include 'session/activity_upload.php';
    } catch (\Throwable $th) {
      $output['message'] = $con->query;
    }
  }else{
    header('location: payroll_management.php');
  }

  echo json_encode($output);
?>