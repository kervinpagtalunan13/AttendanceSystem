<?php
  include 'session/check_session.php';
  include '../scripts.php';
  include '../connect.php';
  include '../timezone.php';
  include 'sidebar.html';
  
  $dateNow = date('Y-m-d');
  if(isset($_SESSION['from']) && isset($_SESSION['to'])){
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    unset($_SESSION['from']);
    unset($_SESSION['to']);
  }else{
    $from = date('Y-m-d');
    $to = date('Y-m-d');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chateau - Attendace Table</title>
  <style>
  .ui-autocomplete { 
    z-index:2147483647; 
    overflow-y: auto; 
    overflow-x: hidden;
    max-height: 200px;
  }
  </style>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
  <main class='p-4 container overflow-auto'>
    <!-- header -->
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Attendance</p>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Timekeeping > Attendance
        </small>
      </div>
    </header> 
    <?php
      if(isset($_SESSION['success'])){
        echo '
        <div class="alert alert-success d-flex align-items-center justify-content-between rounded-2" role="alert">
          <div class="">
            '.$_SESSION['success'].'
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['success']);
      }
      if(isset($_SESSION['error'])){
        echo '
        <div class="alert alert-danger d-flex align-items-center justify-content-between rounded-2" role="alert">
          <div class="">
            '.$_SESSION['error'].'
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['error']);
      }
    ?>
    <!-- main -->
    <div class="bg-white p-4 rounded-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <!-- <div class='d-flex align-items-center gap-1'>
          <button class='btn text-light rounded-1 py-1 d-flex align-items-center gap-1' id = 'upload' style="background-color: #003B6E;">
            <div>
              <img src="../img/btn_icons/add.png" alt="" style="width: 1.2rem">
            </div>
            <span>Upload</span>
          </button>
          <button class='btn text-light rounded-1 py-1 d-flex align-items-center gap-1' id = 'manualy-add' style="background-color: #003B6E;">
            <div>
              <img src="../img/btn_icons/add.png" alt="" style="width: 1.2rem">
            </div>
            <span>Manualy add</span>
          </button>
        </div> -->
        <div>
            <div class="form-floating">
                <select name="emp" id="id" class="form-select">
                    <?php 
                        $sql = "SELECT * FROM employeelist";
                        $query = $con->query($sql);
                        while($row = $query->fetch_assoc()){
                            echo "
                                <option id='".$row['id']."'>".$row['fName']." ".$row['mName']." ".$row['lName']."</option>
                            ";
                        }
                    ?>
                </select>
                <label for="emp">Employee</label>
            </div>
            
        </div>
        <div class="d-flex">
          <img src="../img/icons/icons8-calendar-48.png" class=''alt="" style='width: 2rem'>
          <input type="text" name='' class='form-control shadow-none p-1 text-end' style='min-width: 310px' id ='attendance-date'>
        </div>
      </div>
      <table class='table table-bordered text-start' id='attendance-table'>
        <thead>
          <tr>
            <th>Employee #</th>
            <th>Name</th>
            <th>Position</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Date</th>
            <th class='tools'>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          //  WHERE attendance_csv.date BETWEEN '$from' AND '$to'
            $sql = "SELECT employeelist.id, positions.description, fName, mName, lName, time_in, time_out, total_hr, date, attendance_csv.status, attendance_csv.id as 'btnId' FROM attendance_csv INNER JOIN employeelist ON employeelist.id = attendance_csv.employee_id INNER JOIN positions ON positions.id = employeelist.employee_Role WHERE attendance_csv.date BETWEEN '$from' AND '$to'";
            $result = $con->query($sql);

            while ($row = $result->fetch_assoc()) {
              $isLate = 'on-time';
              $textColor = "success";
              if( $row['status'] == 1){
                $isLate = 'late';
                $textColor = "warning";
              }
              $isNull = ($row['time_out']) ? date('g:i:s A', strtotime($row['time_out'])) : "Didn't time out";
              
              echo '<tr>
                      <td>'.$row['id'].'</td>
                      <td>'.$row['fName'].' '.$row['mName'].' '.$row['lName'].'</td>
                      <td>'.$row['description'].'</td>
                      <td class="position-relative">
                        <span class="text-'.$textColor.' float-start">'.date('g:i:s A', strtotime($row['time_in'])).'</span>
                        <span class="text-'.$textColor.' ms-1"><b>'.$isLate.'</b></span>
                      </td>
                      <td>'.$isNull.'</td>
                      <td>'.date('F d, Y', strtotime($row['date'])).'</td>
                      <td class="tools d-flex gap-1">
                        <button class="edit-btn btn btn-success py-0 px-2 d-flex align-items-center gap-1" id="edit-'.$row["btnId"].'">
                        <div>
                          <img src="../img/btn_icons/edit.png" alt="" style="width: 1.2rem">
                        </div>
                        <span>Edit</span>
                        </button>
                        <button class="del-btn btn btn-danger px-1 py-1 d-flex align-items-center gap-1" id="del-'.$row['btnId'].'">
                          <div>
                            <img src="../img/btn_icons/delete.png" alt="" style="width: 1.2rem">
                          </div>
                          <span>Delete</span>
                        </button>
                      </td>
                    </tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <!-- modals -->
  <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Deleting Attendance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete this data?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id = "del-yes">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editing Attendance</h5>
            <button type="button" class="btn-close"  onclick='$("#edit-alert").hide()'data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-edit">
              <!-- <input type="text" name="" id="name"> -->
              <!-- name -->
              <div class="form-floating">
                <input type="text" name="key" id="edit-name" class = 'form-control mb-2 shadow-none rounded-0' required autocomplete='on' placeholder='employee key' disabled>
                <label for="key">Name</label>
              </div>
              <!-- date -->
              <div class="form-floating">
                <input type="date" name="date" id="edit-date" class='form-control shadow-none rounded-0' required placholder='text' value = "" disabled>
                <label for="date">Date</label>
              </div>
              <!-- time -->
              <div class="d-flex gap-2">
                <div class="form-floating mt-2 flex-grow-1">
                  <input type="time" name="edit-timeIn" id="edit-timeIn" class='form-control shadow-none rounded-0' required placholder='text' value = "">
                  <label for="edit-timeIn">Time In</label>
              </div>
              <div class="form-floating mt-2 flex-grow-1">
                <input type="time" name="edit-timeOut" id="edit-timeOut" class='form-control shadow-none rounded-0' required placholder='text' value = "">
                <label for="edit-timeOut">Time Out</label>
              </div>
            </div>
            <!-- total-hr -->
              <div class="form-floating mt-2">
                <input type="text" name="edit-hrs" class="form-control shadow-none rounded-0 mb-2" required autocomplete = 'off' placeholder='hrs' id ='edit-hrs' disabled>
                <label for="hrs">Total hrs</label>
              </div>
              <div id = 'edit-alert'class="alert alert-danger position-relative  mt-2" role="alert">
                <span id ='alert-content'></span>
                <button type="button" class="btn-close float-end" onclick="$('#edit-alert').hide()" aria-label="Close"></button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" form="form-edit" class="btn btn-primary" value = "Edit">
          </div>
        </div>
      </div>
  </div>
  
  <div class="modal fade" id="upload-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Uploading Attendance</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
          <form action="employee_upload_attendance.php" method="post" enctype="multipart/form-data" id = 'form-upload' class='d-flex justify-content-center'>
            <div class="mb-3">
              <label for="formFile" class="form-label">Upload a csv file</label>
              <input type="file" name="file" id="formFile" class = 'form-control shadow-none rounded-0' accept = '.csv' required>
            </div>
          </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" form="form-upload" class="btn btn-primary" value = "upload" name = 'import'>
				</div>
			</div>
		</div>
	</div>

  <div class="modal fade" id="manual-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Adding Attendance</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
          <form method="post" id = 'form-add' class=''>
            <input type="hidden" name="id" id="project-id">
            <div class="form-floating mb-2">
              <input type="text" name="employee" id="employeeLabel" class='form-control rounded-0 shadow-none' required >
              <label for="employee">Employee</label>
            </div>
            <div class='d-flex gap-2 mb-2'>
              <div class="form-floating flex-grow-1">
                <input type="time" name="timeIn" id="" required class="form-control rounded-0 shadow-none" placeholder="time">
                <label for="timeIn">Time in</label>
              </div>
              <div class="form-floating flex-grow-1">
                <input type="time" name="timeOut" id="" required class='form-control rounded-0 shadow-none' placeholder="time">
                <label for="">Time out</label>
              </div>
            </div>
            <div class="form-floating">
              <input type="date" name="date" id="" required placeholder="Date" class='form-control rounded-0 shadow-none'>
              <label for="date">Date</label>
            </div>
            <div class="alert alert-danger position-relative mt-2" id="alert-add" role='alert'>
              <span id ='alert-content'></span>
              <button type="button" class="btn-close float-end" onclick='$("#alert-add").hide()' aria-label="Close"></button>
            </div>
          </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" form="form-add" class="btn btn-primary" value = "upload" name = 'import'>
				</div>
			</div>
		</div>
	</div>
  <script>
      $('.alert').hide()
      // $('.tools').hide()
      // $('#show-tools').click(e=>{
      //   $('.tools').toggle()
      // })


      $('#success').hide()
      $('#upload').click(()=>{
        $('#upload-modal').modal('show')
      })

      let emp = ''
      let autoCompleteData = []
      $.ajax({
        type:'post',
        url: 'fetch_employees.php',
        dataType: 'json',
        async: false,
        success: data => {
          emp = data
          autoCompleteData = data
          $( "#employeeLabel" ).autocomplete({
          minLength: 0,
          source: autoCompleteData,
          focus: function( event, ui ) {
            $( "#employeeLabel" ).val( ui.item.label );
            return false;
          },
          select: function( event, ui ) {
            $( "#employeeLabel" ).val( ui.item.label );
            $( "#project-id" ).val( ui.item.value );
    
            return false;
          }
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
          return $( "<li>" )
            .append( "<div>" + item.label + "</div>" )
            .appendTo( ul );
        };
        }
      })

      $('#form-add').submit(function(e){
        e.preventDefault()
        console.log($(this).serialize())

        let value = $('#project-id').val()
        let label = $('#employeeLabel').val()
        let validator = autoCompleteData.filter(data => data.label == label)

        if(validator.length < 1){
          $('#alert-add').show()
          $('#alert-add span').html("<b>Cannot find employee</b> <br><small>Please choose employee on dropdown</small>")
        }else{
          $.post('employee_add_attendance.php', $(this).serialize() , data => {
            if(!data.error){
              location.href = "employee_attendance.php";
            }else{
              $('#alert-add').show()
              $('#alert-add span').html(data.message)
            }

            console.log(data)
          }, 'json')
        }
      })

      $('#manualy-add').click(()=>{
        $('#manual-modal').modal('show')
        console.log('asdasd')
      })

      $('#attendance-date').daterangepicker({
        startDate: moment('<?php echo $from ?>').format('MMMM DD, YYYY'),
        endDate: moment('<?php echo $to ?>').format('MMMM DD, YYYY'),
        ranges:{
          'today': [moment(), moment()],
          'yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'last 15 days': [moment().subtract(14, 'days'), moment()],
          'last 30 days': [moment().subtract(29, 'days'), moment()],
          'this month': [moment().startOf('month'), moment().endOf('month')],
          'last month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
          format: 'MMMM DD, YYYY', 
          // format: 'YYYY/MM/DD', 

        }
      })  

      
      $('#attendance-date').change(function(){
        // onChange()
        let date_range = $('#attendance-date').val().split(' - ')
        let from = date_range[0]
        let to = date_range[1]
        $.post('overtime_date_onchange.php', {from: from, to: to}, data => {
          location.href = 'employee_attendance.php'
        })
      })
      
      
      // deleting 
      $('.del-btn').click(e => {
        delId = getId(e.currentTarget.id)
        rowData = attData.filter(att => att.btnId == delId)
        console.log(rowData)
        $('#delete').modal('show')
      })
      
      $('#del-yes').click(()=>{
        $.post('attendance_delete.php', {
          id: delId, 
          date: rowData[0].date, 
          name: rowData[0].name, 
          empId: rowData[0].id}, 
          data => {
            if(!data.error){
              $('#success').show()
            $('#alert-content').html(data.message)
            onChange()
            location.href = 'employee_attendance.php'
          }
        }, 'json')
        $('#delete').modal('hide')
      })

      function getId(id){
        let idRaw = id.split('-')
        return idRaw[1]
      }
      
      $('.edit-btn').click(e => {
        editId = getId(e.currentTarget.id)
        console.log(editId)
        rowData = attData.filter(att => att.btnId == editId)
        $('#edit-name').val(rowData[0].name)
        $('#edit-date').val(rowData[0].date)
        $('#edit-timeIn').val(rowData[0].time_in)
        $('#edit-timeOut').val(rowData[0].time_out)
        $('#edit-hrs').val(rowData[0].total_hr)
        $('#edit').modal('show')
      })
       
      $('#form-edit').submit(function(e){
        e.preventDefault()
        let fd = new FormData()
        $.post('attendance_edit.php', {
          id: rowData[0].id,
          date: rowData[0].date,
          attId : editId,
          time_in : $('#edit-timeIn').val(),
          time_out : $('#edit-timeOut').val(),
          total_hr: $('#edit-hrs').val(),
          from: from,
          to: to
        },
        data => {
          if(!data.error){
            location.href = 'employee_attendance.php'
          }else{
            $('#edit-alert').show()
            $('#edit-alert span').html(data.message)
          }
        },
        'json')
      })
      
      window.addEventListener('DOMContentLoaded', onChange)
      
      let editId = ''
      let delId = ''
      let rowData 
      let from, to
      let attData
      
      async function onChange(){
        let dates = $('#attendance-date').val().split(' - ')
        
        from = dayjs(dates[0]).format('YYYY-MM-DD')
        to = dayjs(dates[1]).format('YYYY-MM-DD')

        let fd = new FormData()
        
        fd.append('from', from)
        fd.append('to', to)
        fd.append('type', 'json')
        let res = await fetch('attendance_onchange.php', {
          method: 'post',
          body: fd
        })
        
        attData = await res.json()
      }
      
      $('#edit-timeIn').change(()=>{
        hrOnchange()
      })
      $('#edit-timeOut').change(()=>{
        hrOnchange()
      })
      
      async function hrOnchange(){
        let computed_hrs = ''
        let fd = new FormData()
        fd.append('time_in', $('#edit-timeIn').val())
        fd.append('time_out', $('#edit-timeOut').val())
        
        let res = await fetch('hour_onchange.php', {
          method: 'post',
          body: fd
        })
        let data = await res.text()
        $('#edit-hrs').val(data)
      }
      $('#attendance-table').DataTable({order: []})
  </script>
</body>
</html>