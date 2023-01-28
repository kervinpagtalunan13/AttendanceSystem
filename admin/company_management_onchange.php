<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  include '../timezone.php';

  $output = array(
    'error'=>true
  );
  include '../connect.php';
  if(isset($_POST['type'])){
    $type = $_POST['type'];
    $value = $_POST['value'];
    $sql = "UPDATE company_management SET $type = '$value'";
    try {
      $con->query($sql);
      $output['error'] = false;
      $desc = '';
      $label = '';
      // $desc = ($type == 'grace_period') ? "Grace period " : ($type == 'leave_limit') ? "Paid Leave limit" : ($type == 'ca_limit') ? "Cash Advance Limit" : "asds";
      if($type == 'grace_period'){
        $activity = "Grace period is change to ".$value." mintues by admin ".$adminName."(".$adminKey.")";
      }
      if($type == 'leave_limit'){
        $activity = "Paid Leave limit is change to ".$value." days by admin ".$adminName."(".$adminKey.")";
      }
      if($type == 'ca_limit'){
        $activity = "Cash Advance Limit is change to &#8369 ".$value." by admin ".$adminName."(".$adminKey.")";
      }
      
      $actType = 'companyManagement';
      include 'session/activity_upload.php';

    } catch (\Throwable $th) {
      //throw $th;
    }
    echo json_encode($output);
  }else{
    // header('location: company_management.php');
  }

  if(isset($_POST['col'])){
    $sql = "SELECT * FROM company_management";
    $query = $con->query($sql);
    echo json_encode($query->fetch_assoc());
  }else{
    // header('location: company_management.php');
  }
?>