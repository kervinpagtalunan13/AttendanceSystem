<?php
include 'session/check_session.php';
include '../connect.php';
include '../scripts.php';
include 'sidebar.html';
include '../timezone.php';

if(isset($_SESSION['scrollTop'])){
  $scrollTop = $_SESSION['scrollTop'];
  unset($_SESSION['scrollTop']);
}else{
  $scrollTop = 0;
}

if(isset($_SESSION['year'])){
  $year_filter = $_SESSION['year'];
  unset($_SESSION['year']);
}else{
  $year_filter = date('Y');
}

$id=$_GET['viewid'];

$attMonth = array(
  '01' => array('on-time'=>0, 'late'=>0),
  '02' => array('on-time'=>0, 'late'=>0),
  '03' => array('on-time'=>0, 'late'=>0),
  '04' => array('on-time'=>0, 'late'=>0),
  '05' => array('on-time'=>0, 'late'=>0),
  '06' => array('on-time'=>0, 'late'=>0),
  '07' => array('on-time'=>0, 'late'=>0),
  '08' => array('on-time'=>0, 'late'=>0),
  '09' => array('on-time'=>0, 'late'=>0),
  '10' => array('on-time'=>0, 'late'=>0),
  '11' => array('on-time'=>0, 'late'=>0),
  '12' => array('on-time'=>0, 'late'=>0)
);

$sql = "SELECT * FROM `attendance_csv` WHERE year(date) = '$year_filter' AND Employee_ID = '$id'";
$result = $con->query($sql);
// var_dump( $result->fetch_all(MYSQLI_ASSOC) );
while($row = $result->fetch_assoc()){
  $month = date('m', strtotime($row['date']));
  // echo $month;
  if($row['status']){
    $attMonth[$month]['late'] ++;
  }else{
    $attMonth[$month]['on-time'] ++;
  }
}
// var_dump($attMonth);
$late = '[';
$ontime = '[';
foreach ($attMonth as $att) {
  $late .= $att['late'].', ';
  $ontime .= $att['on-time'].', ';
}
$late .= ']';
$ontime .= ']';

// echo $ontime;
// echo $late;

$sql="Select * from `employeelist` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
// echo '<img src="'.base64_encode( $row['Image'] ).'"/>';
$fName=$row['fName'];
 $mName=$row['mName'];
 $lName=$row['lName'];
 
 $employeeId =$row['employee_Role'];

 $sqlPos = "SELECT * FROM positions WHERE id = '$employeeId'";
 $query = $con->query($sqlPos);
 $pos = $query->fetch_assoc();
 $employee_Role = $pos['description'];

 $schedId =$row['sched'];

 $sqlSched = "SELECT * FROM schedules WHERE id = '$schedId'";
 $querySched = $con->query($sqlSched);
$sched = $querySched->fetch_assoc(); 
 $schedule = date('g:i A', strtotime($sched['time_in'])).' - '.date('g:i A', strtotime($sched['time_out']));


 $Birthday=$row['Birthday'];
 $civilStatus=$row['civilStatus'];
 $SSS=$row['SSS'];
 $Tax=$row['Tax'];
 $Contact=$row['Contact'];
 $Email=$row['Email'];
 $PhilHealth=$row['PhilHealth'];
 $Pagibig=$row['Pagibig'];
 $Address=$row['Address'];
 $profilePic=$row['ProfilePic'];
 $id1=$row['id1'];
 $id2=$row['id2'];
//  $profile = "data:image;base64,".base64_encode($row['Image']);
 $id1=$row['id1'];
 $id2=$row['id2'];
 $employee_status=$row['employee_status'];
 $workType=$row['workType'];

 ($employee_status == "Active")? $color = "#22B544" : $color = "#FF5353";
 ($employee_status == "Active")? $color2 = "#FF5353" : $color2 = "#22B544";
 ($employee_status == "Active")? $label = "De-activate" : $label = "Re-activate"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../node_modules/chart.js/dist/chart.js"></script>
    <!-- <script src="../node_modules/chart.js/dist/"></script> -->
    <title>Chateau - Employee View</title>
</head>

<body class="body d-flex bg-secondary bg-opacity-10 ">
    <!-- <div class="topNav">
        <img src="img/logo.png" alt="" style="display: inline-block; width: 70px;">
        <a style="font-family:mBold; padding-left:20px;color:white; font-weight:600; font-size: 30px; color:black;">Payroll
            System</a>
        <div style="font-family:mBold; font-size:30px;color:black;margin-left: 850px;">Welcome, admin
            insert adminName -->
        <!-- </div>
    </div> -->
    <div class=" p-4 container overflow-auto" onscroll="getScrollTop(this)" id="main-div">
        <header class="d-flex align-items-center justify-content-between">
          <p class='fs-2'>View Employee</p>
          <small class='fw-semibold text-dark'>
              Home > Employee Management > Employee List > View Employee
          </small>
        </header>
        <?php
          if(isset($_SESSION['success'])){
              echo '
              <div class="alert alert-success position-relative" role="alert">
                  <span>'.$_SESSION['success'].'</span>
                  <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              ';
              unset($_SESSION['success']);
          }
          if(isset($_SESSION['error'])){
              echo '
              <div class="alert alert-danger position-relative" role="alert">
                  <span>'.$_SESSION['error'].'</span>
                  <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              ';
              unset($_SESSION['error']);
          }
        ?>
            <!--insert codes here-->
        <div class="bg-white p-4 rounded-3 mb-3">
          <!-- top -->
          <div class="d-flex gap-3 align-items-center position-relative">
            <div class='rounded-2'
                style="border-radius: 1rem; width: 150px; height: 150px; border: 1px black solid; 
                background-position: center; background-size:cover; background-image: url(<?php echo $profilePic?>)">   
            </div>
            <div class="">
              <p class="fs-3 m-1 mt-0"><?php echo $fName.' '.$mName.' '.$lName?></p>
              <div class='d-flex gap-2'>
                <!--Role-->
                <div class=" px-2 rounded-1 text-light" style = "background-color: #22B544"><?php echo $employee_Role; ?> </div>
                <!-- status -->
                <div class="px-2 text-light rounded-1" id = "status" style = "background-color:<?php echo $color?>" ><?php echo $employee_status; ?> </div>
                <!--Work type-->
                <div class="px-2 text-light rounded-1"style = "background-color: #22B544"><?php echo $workType; ?> </div>
                <!-- schedule -->
                <div class="px-2 text-light rounded-1" style = "background-color: #22B544"><?php echo $schedule; ?> </div>
              </div>
            </div>
            <a href="employee_edit.php?id=<?php echo $id?>" class='text-dark fs-4 text-decoration-none position-absolute top-0 end-0'>Edit&rarrhk;</a>

          </div>
          <!-- information -->
          <div class="my-3">
            <!-- personal Information -->
            <p class="fs-5 m-0">Personal Information</p>
            <div class="d-flex gap-3">
              <!--birthday -->
              <div class="form-floating">
              <input type="text" name="civil-status" id="" class='form-control bg-white border-1' value="<?php echo $Birthday?>" disabled>
                <label for="bday" class=''>Birthday</label>
              </div>

              
              <!--Civil Status -->
              <div class="form-floating">
                <input type="text" name="civil-status" id="" class='form-control bg-white border-1' value="<?php echo $civilStatus?>" disabled>
                <label for="civil-status" class=''>Civil Status</label>
              </div>
            </div>

            <p class="fs-5 m-0 mt-3">Contact Information</p>
            <div class="d-flex gap-3">
              <div class="form-floating">
              <input type="text" name="bday" id="" class="form-control bg-white border" value='<?php echo $Contact?>' disabled>
                <label for="bday" class=''>Contact #</label>
              </div>
              <div class="form-floating">
              <input type="text" name="bday" id="" class="form-control bg-white border" value='<?php echo $Email?>' disabled>
                <label for="bday" class=''>Email</label>
              </div>
              <div class="form-floating flex-grow-1">
              <input type="text" name="bday" id="" class="form-control bg-white border" value='<?php echo $Address?>' disabled>
                <label for="bday" class=''>Address</label>
              </div>
            </div>

            <!-- <p class="fs-5 m-0 mt-3">IDs</p> -->
            <!-- <div class="d-flex gap-3 align-items-center">
              <div class="form-floating">
                <input type="text" name="bday" id="" class="form-control bg-white border" value='<?php echo $Tax?>' disabled>
                <label for="bday" class=''>Tax number</label>
              </div>
              <div class="form-floating">
                <input type="text" name="bday" id="" class="form-control bg-white border" value='<?php echo $SSS?>' disabled>
                <label for="bday" class=''>SSS number</label>
              </div>
              <div class="form-floating">
              <input type="text" name="bday" id="" class="form-control bg-white border" value='<?php echo $Pagibig?>' disabled>
                <label for="bday" class=''>Pagibig number</label>
              </div>
              <div class="form-floating">
                <input type="text" name="bday" id="" class="form-control bg-white border" value='<?php echo $PhilHealth?>' disabled>
                <label for="bday" class=''>Philhealth number</label>
              </div>

              <a href="employee_view_id.php?id=<?php echo $id?>" class='fs-5 text-decoration-none text-dark'>View IDs&#8618;</a>

            </div> -->
          </div>

          <!-- buttons -->
          <div class="d-flex justify-content-end">
            <div style="">
              <!--view id-->
              <!-- <a href="employee_view_id.php?id1=<?php echo $id1?>&&id2=<?php echo $id2?>"><button style="background-color: #22B544;" class="btn rounded-2 text-light">View IDs</button></a> -->
              <!--edit-->
              <!-- <a href="employee_edit.php?id=<?php echo $id?>" class='text-dark fs-4 text-decoration-none'>Edit&rarrhk;</a> -->
              <!-- <button style="background-color: #1C9DFF;"
              class="btn text-light px-4 rounded-2">Edit</button> -->
              <!--archive-->
              <!-- <button id = "changeStatus" style="background-color: <?php echo $color2?>;"
              class="btn px-4 text-light rounded-2"><?php echo $label?></button> -->
            </div>
          </div>
        
        </div>


        <p class='fs-2 mt-3'>Attendance Report</p>
        <div class="bg-white rounded-3 p-4">
          <div class="d-flex align-items-center justify-content-end gap-1">
            <span>Year:</span>
            <select name="att-year" id="att-year" class="form-select" style="width: max-content;">
              <?php
                $sql = "SELECT DISTINCT year(`date`) AS 'year' FROM `attendance_csv`";
                $res = $con->query($sql);
                while($row = $res->fetch_assoc()){
                  $isSelected = ($row['year'] == $year_filter) ? "selected" : "";
                  echo "<option value='".$row['year']."' $isSelected>".$row['year']."</option>";
                }
              ?>
                <!-- <option value="2021">2021</option> -->
            </select>
          </div>
          <div id="" class='overflow-hidden' style="height: 400px">
          <canvas id="monthlyAtt"></canvas>
        </div>
        </div>


            <div class="bg-white rounded-3 p-4 d-none">
                <div class='d-flex gap-4'>
                    <!--Profile Photo Display-->
                    <div class='rounded-2'
                        style="border-radius: 1rem; width: 150px; height: 150px; border: 1px black solid; 
                        background-position: center; background-size:cover; background-image: url(<?php echo $profilePic?>)">   
                    </div>
                    <div style="">
                        <!--Employee Name-->
                        <div class="fs-3">
                            <?php echo $fName; ?> <?php echo $mName; ?> <?php echo $lName; ?>
                        </div>
                        
                        <div style="display: flex; gap:10px; margin-top:10px; margin-bottom:10px;">
                            <!--Role-->
                            <div class="role rounded-1"><?php echo $employee_Role; ?> </div>
                            
                            <!-- status -->
                            <div class="workType rounded-1" id = "status" style = "background-color:<?php echo $color?>" ><?php echo $employee_status; ?> </div><br>
                            <!--Work type-->
                            <div class="status  rounded-1"><?php echo $workType; ?> </div>
                            <!-- schedule -->
                            <div class="status rounded-1"><?php echo $schedule; ?> </div>
                        </div>

                        

                        <!--Line 1-->
                        <div style="align-items: center; display:flex; gap:100px; margin-top: 10px;">

                            <!--Birthday-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">Birthday</label>
                                <div style="font-family: mThin;"><?php echo $Birthday; ?> </div>
                            </div>

                            <!--Civil Status-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">Civil Status</label>
                                <div style="font-family: mThin;"><?php echo $civilStatus; ?> </div>
                            </div>

                            <!--SSS-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">SSS no.</label>
                                <div style="font-family: mThin;"><?php echo $SSS; ?> </div>
                            </div>

                            <!--Tax number-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">Tax no.</label>
                                <div style="font-family: mThin;"><?php echo $Tax; ?> </div>
                            </div>
                        </div>
                        <!--Line 1-->


                        <!--Line 2-->
                        <div style="align-items: center; display:flex; gap:60px; margin-top: 10px;">
                            <!--Contact no.-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">Contact no.</label>
                                <div style="font-family: mThin;"><?php echo $Contact; ?> </div>
                            </div>

                            <!--Email-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">Email</label>
                                <div style="font-family: mThin;"><?php echo $Email; ?></div>
                            </div>

                            <!--Pagibig no.-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">Pagibig no.</label>
                                <div style="font-family: mThin;"><?php echo $Pagibig; ?> </div>
                            </div>

                            <!--SSS-->
                            <div style="display:block; gap: 10px;">
                                <label class="inputLables">PhilHealth no.</label>
                                <div style="font-family: mThin;"><?php echo $PhilHealth; ?> </div>
                            </div>
                        </div>
                        <!--Line 2-->


                        <!--Line 3-->
                        <!--Address-->
                        <div style="display:block; gap: 10px; margin-top: 10px;">
                            <label class="inputLables">Address</label>
                            <div style="font-family: mThin;"><?php echo $Address; ?> 
                            </div>
                        </div>
                    </div>
                    <!--Line 3-->
                </div>
                
                
                <!--btns-->
                <!--btns-->
                
                
                
                <!--stop above this line-->
                <div style="">
                    <!--view id-->
                    <a href="employee_view_id.php?id1=<?php echo $id1?>&&id2=<?php echo $id2?>"><button style="background-color: #22B544;" class="detailsBtns rounded-2">View IDs</button></a>
                    <!--edit-->
                    <a href="employee_edit.php?id=<?php echo $id?>"><button style="background-color: #1C9DFF;"
                    class="detailsBtns rounded-2">Edit</button></a>
                    <!--archive-->
                    <button id = "changeStatus" style="background-color: <?php echo $color2?>;"
                    class="detailsBtns rounded-2"><?php echo $label?></button>
                </div>
            </div>
            <!-- <button id="asd">asdsa</button> -->
        </div>
        
    <!-- </div> -->
    <!-- </div> -->
</div>
<script>
  let divScrollTop = 0
  let div = document.querySelector('#main-div')
  div.scrollTop = <?php echo $scrollTop?>
  
  $('#att-year').on('change', function(e){
    let year = e.currentTarget.value
    $.post('emplyee_att_onchange.php', {year: year,scrollTop: divScrollTop}, data => {
      location.href = 'employee_view.php?viewid=<?php echo $id?>'
    })
  })
    function getScrollTop(event){
      divScrollTop = event.scrollTop
    }

    let monthlyAtt = document.getElementById('monthlyAtt');
    let monthlyAttChart = new Chart(monthlyAtt, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [
          {
            label: 'On-time',
            backgroundColor: '#17B169',
            data: <?php echo $ontime?>
                },
                {
                  label: 'late',
                  backgroundColor: '#F0E68C',
                  data: <?php echo $late?>
                }
              ]
            },
            options: {
              maintainAspectRatio: false,
              plugins: {
                title: {
                  display: true,
                  text: 'Monthly Attendance Report',
                  font: {
                    size: 15
                  },
                  
                  padding: 0
                },
                
              },
            },
        })
        $("#changeStatus").click(()=>{
          
          status = "<?php
                $sql1="Select `employee_status` from `employeelist` where id=$id";
                $result1=mysqli_query($con,$sql1);
                $row1=mysqli_fetch_assoc($result1);
                
                echo $row1["employee_status"];
                ?>"
               
                id = "<?php echo $id?>"

                // $.post("showStatus.php", {id: id}, (data)=>{
                // alert(data)
                // })
                btn = $("#changeStatus")
                label = $("#status")
                // alert(status)
                if(status == "Active"){                   
                    $.post("deactivate.php", {dectivateid: id}, (data)=>{
                        location.href = "viewEmployee.php?viewid=" + id
                        // btn.css("backGround", "#FF5353").html("Re-activate")
                        // label.css("backGround", "#FF5353")
                        // label.html("In-active")
                    })
                }
                else if(status == "In-active"){                   
                    $.post("reactivate.php", {reactivateid: id}, (data)=>{
                        location.href = "viewEmployee.php?viewid=" + id
                        // btn.css("backGround", "#FF5353").html("De-activate")
                        // label.css("backGround", "#22B544")
                        // label.html("Active")
                    })
                }
        })

       
    </script>
</body>

</html>