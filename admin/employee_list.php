<?php
  include 'session/check_session.php';
  include '../scripts.php';
  include '../connect.php';
  include 'sidebar.html';

  $type = (isset($_GET['type'])) ? $_GET['type'] : 'Active';
  $color = ($type == 'Active') ? "success" : "danger";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <title>Chateau - Employee List</title>
</head>
<body class='d-flex bg-secondary bg-opacity-10' >
  <main class = 'container-fluid p-4 overflow-auto'>
    <header class="d-flex align-items-center justify-content-between">
      <p class='fs-2'>Employee List</p>
      <small class='fw-semibold text-dark'>
        Home > Employee Management > Employee List
      </small>
    </header>
    <?php
        // echo "<script>
        // Swal.fire({
          //   position: 'top-end',
          //   icon: 'success',
          //   title: 'Your work has been saved',
          
          // })
          // </script>";
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
    <div class="container p-4 bg-white rounded-2">
      <div class="mb-2 d-flex justify-content-between">
      <button id="toggle" class="btn btn-<?php echo $color?> toggleBTN rounded-1 text-white" style=""><?php echo $type?></button>
      <!-- <button id="showInactive" class="btn btn-success toggleBTN rounded-1 text-white" style="">Active</button> -->
        <button class="btn btn-primary rounded-1 py-1 d-flex align-items-center gap-1" id ="new">
          <div>
            <img src="../img/btn_icons/add.png" alt="" style="width: 1.2rem">
          </div>
          <span>Add Employee</span>
        </button>
      </div>
      <table class='table table-bordered'>
        <thead>
          <tr>
            <th>#</th>
            <!-- <th>Employee Key</th> -->
            <th>Name</th>
            <th>Role</th>
            <th>Employee Since</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql="Select * from `employeelist` where employee_status='$type'";
            $result=mysqli_query($con,$sql);
            if($result){
              while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $date_added=$row['date_added'];
                $fName=$row['fName'];
                $lName=$row['lName'];
                $employee_Role=$row['employee_Role'];
                $sql2 = "SELECT * FROM positions WHERE id = $employee_Role";
                $result2 = $con->query($sql2);
                $rowPos = $result2->fetch_assoc();
                $posDesc = $rowPos['description'];
                $status = $row['employee_status'];      
                $employee_key = $row['employee_key'];
                $pic = $row['ProfilePic'];
                // <td>'.$employee_key .'</td>
                echo '
                <tr>
                <td>'.$id.'</td>
                <td>
                  <div class="rounded-1 float-start"
                  style="width: 2rem; height: 2rem;
                  background-position: center; background-size:cover; background-image: url('.$pic.');">  </div>'.$fName.' '.$lName.
                '</td>
                <td>'.$posDesc.'</td>
                <td>'.date('F d, Y', strtotime($date_added)).'</td>';

                echo '<td class ="d-flex justify-content-center">
                <a href="employee_view.php?viewid='.$id.'" class="btn btn-primary py-0 px-1 pe-2 d-flex align-items-center justify-content-center gap-0" style="width: max-content">
                  <div id = "pic" class=""
                  style="width: 2rem; height: 2rem; background-position: center; background-size:cover; background-image: url(../img/icons/view.png)">
                  </div>
                  <span class="mb-1 p-0" style="">view</span>
                </a>';
                // <button class="btn btn-primary py-1 me-2">view</button>
                echo '</td></tr>';
              }  
              // echo "<button onclick = 'changeStatusInactive(\"$id\")' class='btn btn-danger py-1 me-2' style='background-color:#FF5353;'>De-activate</button>";              
            }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <div class="modal modal-xl fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">adding employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form id="form-add" enctype="multipart/form-data"> 
              <!--  -->
              <div style="display:flex; align-items: center; justify-content:start; gap:20px;">
                <!--Profile Photo Display-->
                <div id="db-pic" class='rounded-1'
                  style=" margin-top: 0; width: 150px; height: 150px; border: 1px black solid; background-position: center; background-size:cover;">
                </div>
                <!--Profile Photo Input-->
                <div>
                  <label class="inputLables">Choose Profile Picture (Please use a formal photo)<label class="req">*</label></label><br>
                  <input name="profilePic" type="file" accept="image/*" id = "profilePic" class='form-control' required>
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
                                "#db-pic"
                            ).style.backgroundImage = `url(${uploaded_image})`;
                            });
                            reader.readAsDataURL(image_input.files[0]);
                        });
                        })
                </script>
              </div>
              <!--  -->
              <p class='fs-4 m-0'>Information</p>
              <div class='d-flex gap-3 mb-3'>
                <!--First Name Input-->
                <div style="" class='form-floating flex-grow-1 flex-shrink-1'>
                  <input name="fName" class="form-control rounded-2" type="text"  placeholder='firsname'required>
                  <label class="" style='font-size: .9rem;'>First Name<label class="req">*</label></label>
                </div>

                  <!--Middle Name Input-->
                <div style="" class='form-floating  flex-grow-1'>
                  <input name="mName" class="form-control rounded-2" type="text"  placeholder='middlename'required>
                  <label class="" style='font-size: .9rem'>Middle Name</label>
                </div>
                  
                  <!--Last Name Input-->
                <div style="display:block;" class='form-floating  flex-grow-1'>
                  <input name="lName" class="form-control" type="text"  placeholder = 'lastname'required>
                  <label class="" style='font-size:.9rem'>Last Name<label class="req">*</label></label>
                </div>
                  
                  <!-- birthday -->
                <div style="" class='form-floating '>
                  <input name="Birthday" class=" form-control" type="date" required>
                  <label class="" style='font-size: .9rem'>Birthday<label class="req">*</label></label>
                </div>

                  <!--Select Input for civil status-->
                <div style="" class='form-floating'>
                  <select name="civilStatus" class=" form-select" required>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  <label class="" style='font-size: .9rem'>Civil Status<label class="req">*</label></label>
                </div>
              </div>
              <!--  -->
              <p class="fs-4 p-0 m-0">Contact Information</p>
              <div class="d-flex gap-3 align-items-center mb-3">
                <div style="display:block;" class='form-floating'>
                  <input name="Contact" class=" form-control" type="text" id='no' placeholder = 'asd'required>
                    <label class="" style='font-size: .9rem'>Contact Number<label class="req">*</label></label>
                </div>
              
                <!--Email Input-->
                <div style="display:block;" class='form-floating'>
                  <input name="Email" class=" form-control" type="email"  placeholder='asd'>
                    <label class="" style='font-size: .9rem'>Email<label class="req">*</label></label>
                </div>

                <div style="display:block; margin-top: 5px;" class='form-floating flex-grow-1'>
                    <input name="Address" class=" form-control " type="text" style=""  placeholder='asdasd'required>
                    <label class="" style='font-size: .9rem'>Full address<label class="req">*</label></label>
                </div>
              </div>
              <!--  -->
              <p class="fs-4 m-0">ID Information</p>
              <div style="" class='d-flex align-items-center gap-3'>                          
                <!--Tax Number Input-->
                <div style="" class='form-floating flex-grow-1 '>
                  <input name="Tax" class=" form-control flex-grow-1 IDs" type="text"  placeholder='asd'required>
                    <label class=" " style='font-size: .9rem'>Tax Number<label class="req">*</label></label>
                </div>
                
                <!--SSS Input-->
                <div style="" class='form-floating flex-grow-1'>
                  <input name="SSS" class=" form-control IDs" type="text"  placeholder='asd'required>
                  <label class=" ">SSS Number<label class="req">*</label></label>
                </div>
              
                <!-- philhealth -->
                <div style="display:block;" class='form-floating flex-grow-1'>
                  <input name="PhilHealth" class=" form-control IDs" type="text"  placeholder='asd'required>
                  <label class="" style='font-size: .9rem'>PhilHealth Number<label class="req">*</label></label>
                </div>
              
                <!--PagIbig Number Input-->
                <div style="display:block;" class='form-floating flex-grow-1'>
                  <input name="Pagibig" class=" form-control IDs" type="text"  placeholder='asd'required>
                  <label class=""style='font-size: .9rem'>PagIbig Number<label class="req">*</label></label>
                </div>
              </div>
              <div style=" display:flex; align-items: center; gap:30px;" class='mb-3 mt-2'>
                <!--ID 1 Input-->
                <div style="" class='m-0 p-0'>
                  <label class="" style='font-size: .9rem'>ID 1<label class="req" >*</label></label>
                  <input name="id1" type="file" accept="image/*"  class='form-control'required>
                </div>
                <!--ID 2 Input-->
                <div style="" class=''>
                  <label class="">ID 2<label class="req">*</label></label>
                  <input name="id2" type="file" accept="image/*" class='form-control'required>
                </div>
              </div>
              <p class="fs-4 m-0">Work Information</p>
              <div class="d-flex align-items-center gap-3">
                <!-- work type -->
                <div style=" display:block;" class='form-floating  flex-grow-0'>
                  <select name="workType" class="form-select" style="" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                  </select>
                  <label class="" style='font-size: .9rem'>Work type<label class="req">*</label></label>
                </div> 

                <!--Role Input-->
                <div style="display:block;" class='form-floating '>
                  <select name="employee_Role" class="form-select" style=""  required>
                    <?php
                      $sqlPos = "SELECT * FROM positions";
                      $query = $con->query($sqlPos);
                      while($pos = $query->fetch_assoc()) {
                        echo '<option value = "'.$pos['id'].'">
                        '.$pos['description'].'
                        </option>';
                      }
                    ?>
                  </select>
                  <label class="">Designation<label class="req">*</label></label>
                </div>
                <!-- schedule -->
                <div class="form-floating ">
                  <select name="schedule" id="" class='form-select'required>
                    <?php
                      $sqlSched = "SELECT * FROM schedules";
                      $querySched = $con->query($sqlSched);
                      while($sched = $querySched->fetch_assoc()) {
                        echo '<option value = "'.$sched['id'].'">
                        '.date('g:i A ', strtotime($sched['time_in'])).'-'.date('g:i A ',strtotime($sched['time_out'])).'
                        </option>';
                      }        
                    ?>
                  </select>
                  <label class="" style='font-size: .9rem'>Schedule<label class="req">*</label></label>
                </div>

                <div class="form-floating">
                  <input type="text" name="fingerPrint" id="" class="form-control"  placeholder='asd'required>
                  <label class="" style='font-size: .9rem'>finger print ID<label class="req">*</label></label>
                </div>
              </div>
              <div class="alert alert-danger position-relative mt-3" role="alert" id = "addAlert">
                <span></span>
                <button type="button" class="btn-close float-end" onclick="$('#addAlert').hide()" aria-label="Close"></button>
              </div>
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" form="form-add" class="btn btn-primary" value = "add" name = "add">
          </div>
        </div>
      </div>
    </div>
  <script>

    // $('.alert').hide()
    $('#addAlert').hide()
    $('table').DataTable()
    $('#new').click(e=>{
      $('#add').modal('show')
    })

    $('#no').on('input' ,function(e){
      let last = this.value
      if(last.length > 11){
        this.value = last.slice(0, -1)
      }
      if(! /[0-9]/.test(last[last.length - 1]) ){
        this.value = last.slice(0, -1)
      }
    })

    $('.IDs').on('input', function(e){
      let last = this.value
      if(last.length > 14){
          this.value = last.slice(0, -1)
      }
      if(! /[0-9\-]/.test(last[last.length - 1]) ){
          this.value = last.slice(0, -1)
      }
    })

    $('#form-add').submit(function(e){
      // let contactNo = $('#no').val()
      // if(/[0-9]{11}$/.test(contactNo))
      let fd = new FormData($('#form-add')[0])
      e.preventDefault()
      Swal.fire({
        html: `<small>I hereby the certify that the above information is true and correct</small></br></br>
              <small>DISCLAIMER: the data is highly confidential. DATA PRIVACY ACT: Republic Act No.10173</small>
        `,
        icon: 'info',
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: 'employee_add.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: fd,
            dataType: 'json',
            success: data => {
              console.log(data)
              if(!data.error){
                location.href = "employee_list.php"
              }else{
                $('#addAlert').show()
                $('#addAlert span').html(data.message)
              }
            }
          })
        }
      })
    })

    $('#toggle').click(function(){
      let btnText = $(this).html()
      let state = (btnText == 'Active') ? 'In-Active' : 'Active'
      location.href = 'employee_list.php?type='+state
    })

    // $('')
    // function changeStatusInactive(id) {
    //tapos may ajax na na pinapasa yung id
    // $.post("deactivate.php", {dectivateid: id}, (data)=>{
    //     // tapos dito yung ajax kung saan after ng succesfull na edit ng status ifefetch nya yung nasa DB table
    //     // para maupdate yung table sa web, bali concept nito is kada update is iloload palagi yung table para realtime updata
    //     // para no need na magload nung page
    //     $.post("showInactive.php", {type: "showActive"},(data)=>{
    //     $("tbody").html(data)
    //     })  
    //   })
    // }

      // function kung saan dederetso kapag niclick yung re-activate button
      // function changeStatusActive(id) {
      // //tapos may ajax na na pinapasa yung id
      // $.post("reactivate.php", {reactivateid: id}, ()=>{
      //   // tapos dito yung ajax kung saan after ng succesfull na edit ng status ifefetch nya yung nasa DB table
      //   // para maupdate yung table sa web, bali concept nito is kada update is iloload palagi yung table para realtime updata
      //   // para no need na magload nung page
      //   $.post("showInactive.php", {type: "showInactive"},(data)=>{
      //   $("tbody").html(data)
      //     })  
      //   })
      // }

    // $("#showInactive").click(()=>{
    //     if($("#showInactive").html() == "Active"){
    //         $("#showInactive").html("Inactive").css("backgroundColor", "red")
    //         $.post("showInactive.php", {type: "showInactive"},(data)=>{
    //         $("tbody").html(data)
    //     })
    //     }else{
    //         $("#showInactive").text("Active").css("backgroundColor", "#00DB00")  
    //         $.post("showInactive.php", {type: "showActive"},(data)=>{
    //         $("tbody").html(data)
    //     })                    
    //     }
    // })
  </script>
</body>
</html>