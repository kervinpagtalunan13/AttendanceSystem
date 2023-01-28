<?php
  include 'session/check_session.php';
  include 'session/check_user.php';
  $output = array('error'=>true);
  // isset($_POST['fingerPrint']) && isset($_POST['fName']) && isset($_POST['mName']) && isset($_POST['lName']) && isset($_POST['employee_Role']) && isset($_POST['schedule']) && isset($_POST['Birthday']) && isset($_POST['civilStatus']) && isset($_POST['SSS']) && isset($_POST['Tax']) && isset($_POST['Contact']) && isset($_POST['Email']) && isset($_POST['PhilHealth']) && isset($_POST['Pagibig']) && isset($_POST['Address']) && isset($_POST['workType']) && 
  if(isset($_POST['fingerPrint']) && isset($_POST['fName']) && isset($_POST['mName']) && isset($_POST['lName']) && isset($_POST['employee_Role']) && isset($_POST['schedule']) && isset($_POST['Birthday']) && isset($_POST['civilStatus']) && isset($_POST['SSS']) && isset($_POST['Tax']) && isset($_POST['Contact']) && isset($_POST['Email']) && isset($_POST['PhilHealth']) && isset($_POST['Pagibig']) && isset($_POST['Address']) && isset($_POST['workType'])){
    include '../connect.php';

    $fName=$_POST['fName'];
    $mName=$_POST['mName'];
    $lName=$_POST['lName'];
    $employee_Role=$_POST['employee_Role'];
    $employee_sched=$_POST['schedule'];
    $Birthday=$_POST['Birthday'];
    $civilStatus=$_POST['civilStatus'];
    $SSS=$_POST['SSS'];
    $Tax=$_POST['Tax'];
    $Contact=$_POST['Contact'];
    $Email=$_POST['Email'];

    // if($Email == ''){
    //   $Email = "NULL";
    // }
    if($Email == ''){
      $Email = "NULL";
    }else{
      $Email = "'$Email'";
    }
    $PhilHealth=$_POST['PhilHealth'];
    $Pagibig=$_POST['Pagibig'];
    $Address=$_POST['Address'];
    $workType=$_POST['workType'];
    $fingerPrint = $_POST['fingerPrint'];
    $employee_status="Active";

    //creating employee key
    $letters = '';
    $numbers = '';
    foreach (range('A', 'Z') as $char) {
      $letters .= $char;
    }
    for($i = 0; $i < 10; $i++){
      $numbers .= $i;
    }
    $employee_key = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

    $sql="insert into `employeelist` (employee_key, fingerprint_id,fName, mName,lName,employee_Role,Birthday,civilStatus,SSS,Tax,Contact,Email,PhilHealth,Pagibig,Address,workType,sched, employee_status)
    values('$employee_key', '$fingerPrint','$fName','$mName','$lName','$employee_Role','$Birthday','$civilStatus','$SSS' ,'$Tax','$Contact',$Email,'$PhilHealth','$Pagibig','$Address','$workType','$employee_sched', '$employee_status')";

    try {
      if($result = $con->query($sql)){
        $id = $con->insert_id;
        //kinukuha yung file name ng mga image
        $profilePicture = $_FILES['profilePic']['name'];
        $id1 = $_FILES['id1']['name'];
        $id2 = $_FILES['id2']['name'];
    
        //kinuha yung file extension ng mga Image
        $picExtension = explode(".", $profilePicture);
        $countPic = count($picExtension);
    
        $id1Extension = explode(".", $id1);
        $countid1 = count($id1Extension);
    
        $id2Extension = explode(".", $id2);
        $countid2 = count($id2Extension);
    
        //sineset na yung filepath
        $picLocation = "../employees_files/profile_pics/Employee".$id.".".$picExtension[$countPic-1];
        $id1Location = "../employees_files/IDs/EmployeeID1_".$id.".".$id1Extension[$countid1-1];
        $id2Location = "../employees_files/IDs/EmployeeID2_".$id.".".$id2Extension[$countid2-1];
    
    
        $sql="UPDATE `employeelist` SET `ProfilePic`='$picLocation',`id1` = '$id1Location',`id2`='$id2Location' WHERE id = $id";
        // $result=mysqli_query($con,$sql);
        if($con->query($sql)){
          #minomive na yung mga files sa folder sa htdocs
          move_uploaded_file($_FILES['profilePic']['tmp_name'], $picLocation);
          move_uploaded_file($_FILES['id1']['tmp_name'], $id1Location);
          move_uploaded_file($_FILES['id2']['tmp_name'], $id2Location);
          // $_SESSION['success'] = 'Added Succesfully';
          $sql = "INSERT INTO `deductioninfo`(`employee_id`, `SSS`, `Philhealth`, `Pagibig`) VALUES ('$id','255','255','255')";
          $con->query($sql);
          $_SESSION['success'] = '<b>Added Succesfully</b>, '.$fName." ".$mName." ".$lName. " has been added to Employee List";
          $output['message'] = 'Added Succesfully';
          $output['error'] = false;
          $output['session'] = $_SESSION['success'];
          $activity = $fName." ".$mName." ".$lName." has been added to Employee List by admin ".$adminName;
          $actType = 'employeeEdit';
          include 'session/activity_upload.php';
        }
      }
    } catch (Exception $th) {
      $_SESSION['error'] = $con->error;
      $output['message'] = $con->error;
    }
  }else{
    header('location: employee_list.php');
  }
  
  echo json_encode($output);
?>