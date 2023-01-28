<?php
        include 'session/check_session.php';

    include '../connect.php';
    include '../scripts.php';
    include 'sidebar.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <title>Chateau - Schedules</title>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
    <main class = 'p-4 w-100 overflow-auto'>
      <header class="d-flex align-items-center justify-content-between">
        <p class='fs-2'>Schedules</p>
        <small class='fw-semibold text-dark'>
          Home > Schedules
        </small>
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
      <div class="container p-4 bg-white rounded-2">
        <button id = 'btn-new' class = 'btn text-light rounded-1 py-1 mt-2 mb-2 d-flex align-items-center gap-1' style="background-color: #003B6E;">
          <div>
            <img src="../img/btn_icons/add.png" alt="" style="width: 1rem">
          </div>
          <span>New Schedule</span>
        </button>
        <table class = "table table-bordered tb-sched border text-center" id = "sched">
          <thead>
            <tr>
              <th>No. of Employees</th>
              <th>Time-in</th>
              <th>Time-out</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id = 'general-sched'>
          <?php
            $sql = "SELECT * FROM schedules WHERE status = '1'";
            $query = $con->query($sql);
            while($row = $query->fetch_assoc()){
              $sql = "SELECT * FROM employeelist WHERE `sched` = '".$row['id']."'";
              $res = $con->query($sql);
              echo "
                <tr class = ''>
                  <td>".$res->num_rows."</td>
                  <td>".date('g:i A', strtotime($row['time_in']))."</td>
                  <td>".date('g:i A', strtotime($row['time_out']))."</td>
                  <td class='d-flex justify-content-center gap-1'>
                    <button id='editComp-".$row['id']."'class = 'editComp btn btn-success rounded-1 py-1 d-flex align-items-center gap-1'>
                      <div>
                        <img src='../img/btn_icons/edit.png' alt='' style='width: 1.2rem'>
                      </div>
                      <span>Edit</span>
                    </button>
                    <button id='deletComp-".$row['id']."'class = 'delBtn btn btn-danger rounded-1 py-1 d-flex align-items-center gap-1'>
                      <div>
                        <img src='../img/btn_icons/delete.png' alt='' style='width: 1.2rem'>
                      </div>
                      <span>Archive</span>
                    </button>
                  </td>
                </tr>";
              }
            ?>
            </tbody>
        </table>
      </div>
        
        <!--  -->
      <div class="container p-4 bg-white rounded-2 mt-4">
      <header class="d-flex align-items-center justify-content-between">
        <p class='fs-2'>Employee Schedules</p>
      </header>
        <table class = "table table-bordered sched-emp text-center border table-sub"  id ='employee-sched'>
          <thead>
            <tr >
              <th>#</th>
              <th>Name</th>
              <th>Position</th>
              <th>Sched</th>
              <th>Actions</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
              $sql = "SELECT employeelist.id, fName, lName, time_in, time_out, description FROM employeelist INNER JOIN schedules ON employeelist.sched = schedules.id INNER JOIN positions ON employeelist.employee_Role = positions.id WHERE employee_status = 'Active';";
              $query = $con->query($sql);
              while($row = $query->fetch_assoc()){
                echo "
                  <tr class = ''>
                    <td>".$row['id']."</td>
                    <td>".$row['fName']." ".$row['lName']."</td>
                    <td>".$row['description']."</td>
                    <td>".date('g:i A', strtotime($row['time_in']))." - ".date('g:i A', strtotime($row['time_out']))."</td>
                    <td class='d-flex justify-content-center'>
                      <button id='editEmp-".$row['id']."'class = 'editEmp btn btn-success rounded-1 py-1 d-flex align-items-center gap-1'>
                        <div>
                          <img src='../img/btn_icons/edit.png' alt='' style='width: 1.2rem'>
                        </div>
                        <span>Edit</span>
                      </button>
                    </td>
                  </tr>";
                }
            ?>
          </tbody>
        </table>
      </div>
      </main>
    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editing Employee Schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-edit" method='POST'>
              <div class="form-floating">
                <select name="sched-id" id="sched-select" class="form-select rounded-0 shadow-none" placeholder="Schedule">
                </select>
                <label for="from">Schedule</label>
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
    <!-- add -->
    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Adding Schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-add" method='POST' action = 'schedule_add.php'>
              <div class="form-floating">
                <select name="from" id="from-add" class="form-select timeList rounded-0 shadow-none mb-3">
                </select>
                <label for="from">From</label>
              </div>
              <div class="form-floating">
                <select name="to" id="to-add" class="form-select timeList rounded-0 shadow-none">
                </select>
                <label for="to">To</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name='add' form="form-add" class="btn btn-primary" value = "Add">
          </div>
        </div>
      </div>
    </div>
    <!-- delete -->
    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Archiving Schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Do you really want to Archive this Schedule?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id = "del-yes">Yes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- editing company sched -->
    <div class="modal fade" id="editCompanySched" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editing Schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-edit-sched" method='POST'>
              <div class="form-floating">
                <select name="from" id="from-edit-sched-comp" class="form-select timeList rounded-0 shadow-none mb-3" placeholder="From">
                </select>
                <label for="from">From</label>
              </div>
              <div class="form-floating">
                <select name="to" id="to-edit-sched-comp" class="form-select timeList rounded-0 shadow-none" placeholder="To">
                </select>
                <label for="to">To</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" form="form-edit-sched" class="btn btn-primary" value = "Edit">
          </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', updateTable)
        document.addEventListener('DOMContentLoaded', updateEmployeeSched)
        document.addEventListener('DOMContentLoaded', timeList)

        let time_list = {
          '01:00:00' : '1:00 AM',
          '02:00:00' : '2:00 AM',
          '03:00:00' : '3:00 AM',
          '04:00:00' : '4:00 AM',
          '05:00:00' : '5:00 AM',
          '06:00:00' : '6:00 AM',
          '07:00:00' : '7:00 AM',
          '08:00:00' : '8:00 AM',
          '09:00:00' : '9:00 AM',
          '10:00:00' : '10:00 AM',
          '11:00:00' : '11:00 AM',
          '12:00:00' : '12:00 PM',
          '13:00:00' : '1:00 PM',
          '14:00:00' : '2:00 PM',
          '15:00:00' : '3:00 PM',
          '16:00:00' : '4:00 PM',
          '17:00:00' : '5:00 PM',
          '18:00:00' : '6:00 PM',
          '19:00:00' : '7:00 PM',
          '20:00:00' : '8:00 PM',
          '21:00:00' : '9:00 PM',
          '22:00:00' : '10:00 PM',
          '23:00:00' : '11:00 PM',
          '24:00:00' : '12:00 AM',
        }

        function timeList(){
          let output = ''
          // for(let cnt = 1; cnt<=24;cnt++){
          //   output += `<option>${cnt}:00:00</option>`
          // }
          Object.entries(time_list).forEach(([x, y]) => {
            output += `<option value = "${x}">${y}</option>`
          })
          document.querySelector('#from-add').innerHTML = output
          document.querySelector('#to-add').innerHTML = output
          // document.querySelector('#from-edit-sched-comp').innerHTML = output
          // document.querySelector('#to-edit-sched-comp').innerHTML = output
        }
        let editCompId = ''
        function updateTable() {
            let schedules 
            fetch('schedule_onchange.php')
            .then(res => res.json())
            .then(data => {
              schedules = data
                let output = ''
                let scheds = ''
                // <td>${sched.id}</td>
                data.forEach(sched => {
                    output += `
                        <tr class = 'border'>
                            <td>${sched.time_in}</td>
                            <td>${sched.time_out}</td>
                            <td>
                                <button id='editComp-${sched.id}'class = 'editBtn btn btn-success rounded-1 py-1'>Edit</button>
                                <button id='deletComp-${sched.id}'class = 'delBtn btn btn-danger rounded-1 py-1'>Delete</button>
                            </td>
                        </tr>`
                    // let fromTime = new Date(sched.time_in).toLocaleTimeString()
                    // console.log(fromTime.getHours())
                    let time_start = '', time_end = ''
                    Object.entries(time_list).forEach(([x, y]) => {
                      if(x == sched.time_in)
                        time_start = y
                      if(x == sched.time_out)
                        time_end = y
                    })
                    scheds += `
                      <option value='${sched.id}'>${time_start} - ${time_end}</option>`
                })

                document.querySelector('#sched-select').innerHTML = scheds
                // document.querySelector('tbody').innerHTML = output
                // edit
                $('.editComp').click(e => {
                  $('#editCompanySched').modal('show')
                  editCompId = getId(e.currentTarget.id)

                  let rowData = schedules.filter(sched => sched.id == editCompId)
                  console.log(rowData)
                  let from = rowData[0].time_in
                  let to = rowData[0].time_out
                  console.log(time_list[from])
                  let outputFrom = '', outputTo
                  Object.entries(time_list).forEach(([x, y]) => {
                    if(x == from){
                      outputFrom += `<option selected value='${x}'>${y}</option>`
                    }else{
                      outputFrom += `<option value='${x}'>${y}</option>`
                    }

                    if(x == to){
                      outputTo += `<option selected value='${x}'>${y}</option>`
                    }else{
                      outputTo += `<option value='${x}'>${y}</option>`
                    }
                  })

                  $('#from-edit-sched-comp').html(outputFrom)
                  $('#to-edit-sched-comp').html(outputTo)
                  // console.log(editCompId)
                })

              $('#sched').DataTable()


                // delete
                let delId = ''
                $(".delBtn").click(e=>{
                  $("#delete").modal('show')
                  delId = getId(e.currentTarget.id)
                })
                // if clicks delete
                $('#del-yes').click(() => {
                  $("#delete").modal('hide')
                  $.post('schedule_delete.php', {id: delId}, data=>{
                    location.href = `schedule.php`
                  })
                })

                
            })
        }

        $('#form-edit-sched').submit(e => {
          e.preventDefault()
          $.post('sched_edit_company.php', {
            id: editCompId,
            from: $('#from-edit-sched-comp').val(),
            to: $('#to-edit-sched-comp').val()
          }, data => {
            location.href = 'schedule.php'
          })
        })

        function updateEmployeeSched () { 
            let empData 
            fetch('schedule_employee_onchange.php')
            .then(res => res.json())
            .then(data => {
              output = ''
              empData = data
              data.forEach(row => {
                output += `
                    <tr>
                        <td>${row.id}</td>
                        <td>${row.fName} ${row.lName}</td>
                        <td>${row.description}</td>
                        <td>${row.time_in}-${row.time_out}</td>
                        <td>
                            <button id = 'edit-${row.id}' class = 'btnEdit btn btn-success shadow-none rounded-2 py-1'>Edit</button>                
                        </td>   
                    </tr>`
              })
              editId = ''
              schedValue = ''
              // document.querySelector('#employee-sched').innerHTML = output
              let btnEdit = document.querySelectorAll('.editEmp')
              btnEdit.forEach(btn => {
                btn.addEventListener('click', (e) => {
                editId = getId(e.currentTarget.id)
                $('#edit').modal('show')
                })
              })

              $('#employee-sched').DataTable()
              $('#form-edit').submit(function(e){
                let rowData = empData.filter(empd => empd.id == editId)
                let fullName = `${rowData[0].fName} ${rowData[0].lName}`
                console.log(rowData)
                e.preventDefault()
                // console.log(editId)
                // console.log($(this).serialize())
                let schedID = $('#sched-select').val()
                $.post('sched_edit_employee.php', {
                  id: editId,
                  name: fullName,
                  schedID: schedID
                }, 
                (data) => {
                  if(!data.error){
                    location.href = 'schedule.php'
                  }
                  $('#edit').modal('hide')

                  // console.log(data)
                  },
                  'json'
                )
              })

            })


          }
          function getId(id){
            let _id = id.split('-')
            _id = _id[_id.length - 1]
            return _id
          }
          
        $('#btn-new').click(()=>{
          $('#add').modal('show')
        })

        $('#form-add').submit(function(e){
          e.preventDefault()  
          let from = $('#from-add').val()
          let to = $('#to-add').val()
          let from_, to_
          // Object.entries(time_list).forEach(([x, y]) => {
          //   if( from == y )
          //   from_ = x
          //   if( to == y )
          //   to_ = x
          // })
          console.log(from, to)
          $.post('schedule_add.php', {
            from: from,
            to: to
          }, 
          data => {
            if(!data.error){
              // updateTable()
            }
            location.href='schedule.php';
            console.log(data)
            $('#add').modal('hide')
          }, 'json')
        })

        function edit(){
            $('#exampleModal').modal('show');
        }
    </script>
</body>
</html>