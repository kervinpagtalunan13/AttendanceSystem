<?php
    include 'session/check_session.php';

    include '../connect.php';
    include '../scripts.php';
    include 'sidebar.html';
    $id=$_GET['id'];
    $sql="Select * from `employeelist` where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    // echo '<img src="'.base64_encode( $row['Image'] ).'"/>';
    $fingerPrint_id=$row['fingerprint_id'];
    $fName=$row['fName'];
    $mName=$row['mName'];
    $lName=$row['lName'];
    $employee_Role=$row['employee_Role'];
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
    $schedule = $row['sched'];
    $id1=$row['id1'];
    $id2=$row['id2'];
    //  $profile = "data:image;base64,".base64_encode($row['Image']);
    $id1=$row['id1'];
    $id2=$row['id2'];
    $employee_status=$row['employee_status'];
    $workType=$row['workType'];
    
    // echo $profilePic;
    clearstatcache();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <title> Chateau - Edit Employee</title>
</head>

<body class="body d-flex bg-secondary bg-opacity-10">

    
    <div class="p-4 container overflow-scroll">
    <header class="d-flex align-items-center justify-content-between">
      <p class='fs-2'>Edit Employee</p>
      <small class='fw-semibold text-dark'>
        Home > Employee Management > Add Employee
      </small>
    </header>
    <div class="alert position-relative" role="alert">
        <span></span>
        <button type="button" class="btn-close float-end" onclick="$('.alert').hide()"></button>
    </div>
    <!-- <img src="../EmployeeFiles/ProfilePic/Employee1.jpg" alt=""> -->
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
        <div class="p-4 bg-white rounded-3">
            <!--insert codes here-->

            <!--First Line of Form-->
            <div class="">
                <!-- <header style="font-family:mBold; font-weight: 600; font-size: 30px;">Edit Employee</header> -->

                
                <form method="post" action='employee_update.php?id=<?php echo $id?>' enctype="multipart/form-data" id='form'>
                    <!--Profile Photo Display-->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div style="display:flex; align-items: center; gap:20px;">
                        <div class ='rounded-1' id="pic"
                        style="border-radius: 1rem; width: 150px; height: 150px; border: 1px black solid; 
                        background-position: center; background-size:cover; background-image: url(<?php echo $profilePic ?>)">   
                        </div>
                        <div>
                            <label class="inputLables">Choose Profile Picture (Please use a formal photo)<label class="req">*</label></label><br>
                            <input name="profilePic" type="file" accept="image/*" id = "profilePic" class='form-control'>
                        </div>
                    </div>
                    <script>
                        $(document).ready(()=>{
                        const image_input = document.querySelector("#profilePic");
                        var uploaded_image = "";
                        image_input.addEventListener("change", () => {

                            const reader = new FileReader();
                            reader.addEventListener("load", () => {
                            uploaded_image = reader.result;
                            document.querySelector(
                                "#pic"
                            ).style.backgroundImage = `url(${uploaded_image})`;
                            });
                            reader.readAsDataURL(image_input.files[0]);
                        });
                        })
                    </script>
                    <br>
                    <!--First Line of Form-->
                    <!--Second Line of Form-->
                    <p class="fs-4 m-0">Information</p>
                    <div style="" class='d-flex align-items-center gap-3'>
                        <!--First Name Input-->
                        <div style="display:block;" class='form-floating flex-grow-1'>
                            <input id="fName" name="fName" class=" form-control" type="text" value="<?php echo $fName?>" required placeholder='asdads'>
                            <label for='fName' class="">First Name</label>
                        </div>

                        <!--Middle Name Input-->
                        <div style="display:block;" class='form-floating flex-grow-1'>
                            <input id="mName" name="mName" class=" form-control" type="text" value="<?php echo $mName?>" required placeholder='asd'>
                            <label for='mName' class="">Middle Name</label>
                        </div>

                        <!--Last Name Input-->
                        <div style="display:block;" class='form-floating flex-grow-1'>
                            <input id="lName" name="lName" class=" form-control" type="text"  value="<?php echo $lName?>" required placeholder='asd'>
                            <label for='lName' class="">Last Name</label>
                        </div>
                        <div style="display:block;" class='form-floating'>
                            <input id="Birthday" name="Birthday" class=" form-control" type="date" value=<?php echo $Birthday; ?> required>
                            <label class="">Birthday</label>
                        </div>

                        <div style="" class='form-floating'>
                            <select id="civil-stat" name="civilStatus" class="form-select" style="" required>
                                <!--Select Input for civil status-->
                                <?php 
                                    if($civilStatus == "Single"){
                                        echo'
                                        <option value="Single" selected>Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        ';
                                    }else if($civilStatus == "Married"){
                                        echo'
                                        <option value="Single">Single</option>
                                        <option value="Married" selected>Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        ';
                                    }
                                    else if($civilStatus == "Divorced"){
                                        echo'
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced" selected>Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        ';
                                    }else if($civilStatus == "Widowed"){
                                        echo'
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed" selected>Widowed</option>
                                        ';
                                    }
                                    ?>
                               
                            </select>
                            <label class="">Civil Status</label>
                        </div>

                        
                        
                        
                    </div>
                
                <!--Second Line of Form-->
                
                
                
                <!--Third Line of Form-->
                <p class="fs-4 m-0 mt-3">Contact Information</p>
                <div style="" class='d-flex align-items-center gap-3'>
                    <!--Contact # Input-->
                    <div style="display:block;" class='form-floating'>
                        <input id="no" name="Contact" class="form-control" type="text" value="<?php echo $Contact; ?>" required placeholder = 'asdasd'>
                        <label class="">Contact Number</label>
                    </div>
                    
                    <!--Email Input-->
                    <div style="display:block;" class='form-floating'>
                        <input id="email" name="Email" class="form-control" type="email" style='min-width: 280px' value="<?php echo $Email; ?>" placeholder = 'asdasd'>
                        <label class="">Email</label>
                    </div>
                    
                    <!--Address-->
                    <div style="" class='form-floating flex-grow-1'>
                        <input id="add" name="Address" class="form-control" type="text" style="" value="<?php echo $Address; ?>" required>
                            <label class="">Full address</label>
                        </div>
                        <!--SSS Input-->
                        <!-- <div style="">
                            <label class="inputLables">SSS Number</label><br>
                            <input name="SSS" class="textInputs" type="text" value="<?php echo $SSS; ?>" disabled>
                        </div> -->
                        
                        <!--Tax Number Input-->
                        <!-- <div style="margin-left: 30px; display:block;">
                            <label class="inputLables">Tax Number</label><br>
                            <input name="Tax" class="textInputs" type="text" value="<?php echo $Tax; ?>" disabled>
                        </div>-->
                        
                    </div>
                    
                    <!--Third Line of Form-->
                    
                    
                    
                    <!--Fourth Line of Form-->
                    <p class="fs-4 m-0 mt-3">Work Information</p>
                    <div style="" class='d-flex align-items-center gap-3'>
                        <!-- Work type-->
                        <div style=" display:block;"class='form-floating'>
                            <select name="workType" class="form-select" style="" required>
                                <?php
                                    if($workType == "Full-time"){
                                        echo '
                                        <option value = "Full-time" selected>Full-time</option>
                                        <option value = "Part-time">Part-time</option>';
                                    }else if($workType == "Part-time"){
                                        echo '
                                        <option value = "Full-time">Full-time</option>
                                        <option value = "Part-time" selected>Part-time</option>';
                                    }
                                    ?>
                               
                               
                            </select>
                            <label class="inputLables">Work type</label>
                        </div>
                        <!--Role Input-->
                        <div style="" class='form-floating'>
                            <select name="role" id="role"class="form-select" style="" required>
                                <?php 
                                    $sql = "SELECT * FROM positions";
                                    $query = $con->query($sql);
                                    while($row = $query->fetch_assoc()){
                                        if($employee_Role == $row['id']){
                                            echo '
                                            <option value = "'.$row['id'].'" selected>'.$row['description'].'</option>
                                            ';
                                        }else{
                                            echo '
                                            <option value = "'.$row['id'].'">'.$row['description'].'</option>
                                            ';
                                        }
                                    }
                                    ?>
                            </select>
                            <label class="inputLables">Designation</label>
                        </div>
                        
                        <!-- schedule -->
                        <div class="form-floating ">
                            <select name="schedule" id="" class='form-select'>
                                <?php
                                $sqlSched = "SELECT * FROM schedules";
                                $querySched = $con->query($sqlSched);
                                while($sched = $querySched->fetch_assoc()) {
                                    if($schedule == $sched['id']){
                                        echo '<option value = "'.$sched['id'].'" selected>
                                        '.date('g:i A ',strtotime($sched['time_in'])).'-'.date('g:i A', strtotime($sched['time_out'])).'
                                        </option>';
                                    }else{
                                        echo '<option value = "'.$sched['id'].'">
                                        '.date('g:i A', strtotime($sched['time_in'])).'-'.date('g:i A', strtotime($sched['time_out'])).'
                                        </option>';

                                    }
                                }        
                                ?>
                            </select>
                            <label class="">Schedule</label>
                        </div>
                        
                        <div style="display:block;" class='form-floating'>
                            <input name="fingerprint" class="form-control" type="text" value="<?php echo $fingerPrint_id; ?>" id='finger-print' placeholder='asdas'>
                            <label class="">Finger print ID</label>
                        </div>
                        <!--Status-->
                        <div style=" display:block;" class='form-floating'>
                            
                            <select id="empStatus" name="empStatus" class=" form-select border border-<?php 
                                echo ($employee_status == 'Active') ? 'success' : 'danger'
                            ?> border-2" style="" required>
                                <?php
                                    if($employee_status == "Active"){
                                        echo '
                                        <option class="text-success" value = "Active" selected>Active</option>
                                        <option value = "In-Active">In-Active</option>
                                        ';
                                    }else if($employee_status == "In-Active"){
                                        echo '
                                        <option value = "Active">Active</option>
                                        <option value = "In-Active" selected>In-Active</option>
                                        ';
                                    }
                                ?>
                            </select>
                            <label class="">Status</label>
                        </div>
                        
                        <!--PhilHealth Number Input-->
                        <!-- <div style="display:block;">
                            <label class="inputLables">PhilHealth Number</label><br>
                            <input name="PhilHealth" class="textInputs" type="text" value="<?php echo $PhilHealth; ?>" disabled>
                        </div> -->
                        
                        <!-- PagIbig Number Input-->
                        <!-- <div style="display:block;">
                            <label class="inputLables">PagIbig Number</label><br>
                            <input name="Pagibig" class="textInputs" type="text" value="<?php echo $Pagibig; ?>" disabled>
                        </div> -->
                    </div>

                    <!-- Ids -->
                    <p class="fs-4 m-0 mt-3">IDs</p>
                    <div class='d-flex align-items-center gap-3'>
                        <div style="display:block;" class='form-floating'>
                            <input id="taxNo" name="taxNo" class="form-control IDs" type="text" value="<?php echo $Tax; ?>" required placeholder = 'asdasd'>
                            <label class="">Tax No.</label>
                        </div>
                        <div style="display:block;" class='form-floating'>
                            <input id="SSS" name="SSS" class="form-control IDs" type="text" value="<?php echo $SSS; ?>" required placeholder = 'asdasd'>
                            <label class="">SSS no.</label>
                        </div>
                        <div style="display:block;" class='form-floating'>
                            <input id="Pagibig" name="Pagibig" class="form-control IDs" type="text" value="<?php echo $Pagibig; ?>" required placeholder = 'asdasd'>
                            <label class="">Pagibig No.</label>
                        </div>
                        <div style="display:block;" class='form-floating'>
                            <input id="PhilHealth" name="PhilHealth" class="form-control IDs" type="text" value="<?php echo $PhilHealth; ?>" required placeholder = 'asdasd'>
                            <label class="">PhilHealth No.</label>
                        </div>
                    </div>

                    <div class='d-flex justify-content-end'>
                        <button class="rounded-2 p-0 py-0 addBtnn" type="submit" name="update">Edit Employee</button>
                    </div>
                </form>
        <script>
            let alert = $('.alert')
            let alertCont = $('.alert span')
            alert.hide()

            $('.IDs').on('input', function(e){
                let last = this.value
                if(last.length > 14){
                    this.value = last.slice(0, -1)
                }
                if(! /[0-9\-]/.test(last[last.length - 1]) ){
                    this.value = last.slice(0, -1)
                }
            })

            $('#no').on('input', function(e){
                let last = this.value
                if(last.length > 11){
                    this.value = last.slice(0, -1)
                }
                if(! /[0-9]/.test(last[last.length - 1]) ){
                    this.value = last.slice(0, -1)
                }
            })

            $('form').submit(function(e){
                // console.log('asd')
                // e.preventDefault()
                // Swal.fire({
                //     html: `<small>I hereby the certify that the above information is true and correct</small></br></br>
                //         <small>DISCLAIMER: the data is highly confidential. DATA PRIVACY ACT: Republic Act No.10173</small>
                //     `,
                //     icon: 'info',
                //     showCloseButton: true,
                //     allowOutsideClick: false,
                //     confirmButtonText: 'OK',
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         let fd = new FormData($('form')[0])
                // // console.log(fd)
                //         $.ajax({
                //             url: 'employee_update.php',
                //             type: 'post',
                //             processData: false,
                //             contentType: false,
                //             data: fd,
                //             dataType: 'json',
                //             success: data => {
                //                 console.log(data)
                //                 alert.show()
                //                 if(!data.error){
                //                     location.href = 'employee_edit.php?id=<?php echo $id ?>'
                //                     alert.removeClass('alert-danger')
                //                     alert.addClass('alert-success')
                //                     alertCont.html(data.message)
                //                 }else{
                //                     alert.removeClass('alert-success')
                //                     alert.addClass('alert-danger')
                //                     alertCont.html(data.message)
                //                 }
                //             }
                //         })
                //     }
                // })
                // console.log($(this).serialize())

            })
            $('#form').submit(function(e){
                // e.preventDefault()
                // Swal.fire({
                //     html: `<small>I hereby the certify that the above information is true and correct</small></br></br>
                //         <small>DISCLAIMER: the data is highly confidential. DATA PRIVACY ACT: Republic Act No.10173</small>
                //     `,
                //     icon: 'info',
                //     showCloseButton: true,
                //     allowOutsideClick: false,
                //     confirmButtonText: 'OK',
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         $(this).unbind('submit').submit()
                //     }
                // })
            })
        // $("form").submit((e)=>{
        //     $.post("employee_update.php", 
        //     {
        //     id: "<?php echo $id?>",
        //     fName: $("#fName").val(),
        //     mName: $("#mName").val(),
        //     lName: $("#lName").val(),
        //     no: $("#no").val(),
        //     email: $("#email").val(),
        //     add: $("#add").val(),
        //     civilStat: $("#civil-stat").val(),
        //     Birthday: $("#Birthday").val(),
        //     empStatus: $("#empStatus").val(),
        //     role: $("#role").val(),
        //     fingerprint: $('#finger-print').val()
        //     }, 
        //     (data)=>{
        //         // alert(data)
        //         location.href="employee_edit.php?id=" + "<?php echo $id?>"
        //     })
        //     e.preventDefault()
        // })
    </script>
            </div>
        </div>
    </div>
</body>

</html>