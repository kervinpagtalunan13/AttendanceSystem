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
  <title>Chateau - Cash Advance</title>
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
  <!-- Modal -->
  <main class='p-4 container overflow-auto '>
    <header class="d-flex align-items-center justify-content-between">
      <p class='fs-2'>Cash Advance</p>
      <small class='fw-semibold text-dark'>
        Home > Cash Advance
      </small>
    </header>
    <!-- <div class="d-flex flex-column align-items-center gap-4 p-4 rounded-3 bg-white"> -->
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
      <div class="tbl-2 p-4 bg-white rounded-2 ">
        <div class='d-flex'>
          <button class="btn text-light shadow-none rounded-1 mb-2 d-flex align-items-center gap-1"  id="new" style="background-color: #003B6E;">
            <div>
              <img src="../img/btn_icons/add.png" alt="" style="width: 1rem">
            </div>
            <span>New Cash Advance</span>
          </button>
        </div>
        <table class='table text-center align-self-start table-bordered' id ='table-ca'>
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="tbody-total">
          </tbody>
        </table>
      </div> 
    <div class="tbl-1 p-4 bg-white rounded-2 mt-4 d-none">
      <header class="d-flex align-items-center justify-content-between">
        <p class='fs-2'>History</p>
      </header>
      <table class = 'table table-hover border text-center' id='table-history'>
        <thead>
          <tr>
            <th scope = 'col'>Employee Id</th>
            <th scope = 'col'>Name</th>
            <th scope = 'col'>Amount</th>
            <th scope = 'col'>Date</th>
          </tr>
        </thead>
        <tbody id ='tbl-history'>
          <!--  -->
        </tbody>
      </table>
    </div>
    <!-- <input id="project" required name="id" class="form-control">
  <input type="hidden" id="project-id" name="id2"> -->
  <!-- <input type="text" name="employeeLabel" id="employeeLabel" class="form-control rounded-0 shadow-none" required>
  <input type="hidden" id="project-id" name="id"> -->


<!-- Modal -->

</main>
<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editing Cash Advance Balance</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="fs-6 m-0" id = "edit-name">Kervin Robby Paraiso Pagtalunan (1)</p>
        <p class="fs-6" id = "edit-ca-total">Cash Advance balance: &#8369;<span id ="ca-balance">3000</span></p>
        <form action="" id="form-edit">
          <input type="hidden" name="id" id="edit-id">
          <div class="form-floating">
            <input type="text" class="form-control shadow-none rounded-0 mb-2" name="amount" autocomplete="off" required id="edit-amount">
            <label for="amount">Amount</label>
          </div>
          <div class="d-flex gap-3">
            <div class="form-check">
              <input type="radio" class="form-check-input" name="operation" id="add-radio" value="add" required>
              <label for="add-radio">Add</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="operation" id="minus-radio" value="minus">
              <label for="minus-radio">Minus</label>
            </div>
          </div>
        </form>
        <div class="alert alert-danger position-relative mt-3" role="alert" id = "editAlert">
          <span></span>
          <button type="button" class="btn-close float-end" onclick="$('#editAlert').hide()" aria-label="Close"></button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update" form='form-edit'>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Cash Advance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id = "form-add">
          <div class = ''>
            <!-- <label for="emp-key" class="form-label">Employee</label> -->
            <!-- <input type="text" name="employeeLabel" id="employeeLabel" class="form-control rounded-0 shadow-none" required>
            <input type="hidden" id="project-id" name="id"> -->
            <div class="form-floating">
              <input type="text" name="employeeLabel" id="employeeLabel" class="form-control rounded-0 shadow-none" required placeholder="asd">
              <label for="employeeLabel">employee</label>
            </div>
            <input type="hidden" id="project-id" name="id">
            <div class="form-floating mt-2">
              <input type="number" name="amount" id="amount" class="form-control rounded-0 shadow-none" required placeholder="asd">
              <label for="amount" class="form-label">Amount</label>
            </div>
          </div>
        </form>
        <div class="alert alert-danger position-relative mt-2" id="alert-add" role='alert'>
          <span id ='alert-content'></span>
          <button type="button" class="btn-close float-end" onclick='$("#alert-add").hide()' aria-label="Close"></button>
        </div>
      </div>
      <div class = 'modal-footer'> 
        <button name="" id="" class="btn btn-secondary rounded-1 shadow-none" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" form="form-add"value="Add" class = "btn btn-primary rounded-1 shadow-none">
      </div>
    </div>
  </div>
</div> 


<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="fs-6 m-0 ">Employee Name: <span id = "empName"></span></p>
        <p class="fs-6 m-0 mb-2">Employee No.: <span id = "empNo"></span></p>
        <table class="table table-bordered view-table">
          <thead>
            <tr>
              <th>Description</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody id ="view-history">

          </tbody>
        </table>
      </div>
      <div class = 'modal-footer pb-0'> 
      </div>
  </div>
</div> 


<!-- <div class="modal fade" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Cash Advance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id = "form-add">
          <div class = ''>
            <label for="emp-key" class="form-label">Employee Key</label>
            <input type="text" name="key" id="" class="form-control rounded-0 shadow-none" required>
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="" class="form-control rounded-0 shadow-none mb-4" required>
          </div>
          <div class="alert" role = "alert"></div>
          <div class = 'modal-footer pb-0'> 
            <button name="" id="" class="btn btn-danger btn-lg rounded-0 shadow-none py-1" data-bs-dismiss="modal">Cancel</button>
            <input type="submit" value="Add" class = "btn btn-success btn-lg rounded-0 shadow-none py-1">
          </div>

        </form>
      </div>
    </div>
  </div>
</div >  -->
  <script type="module">
    $('#editAlert').hide()
    import { inputNumber } from './inputNumber.js'

    $('#edit-amount').on('input', inputNumber)
    window.addEventListener('DOMContentLoaded', cashAdvanceOnchange)

    function closeAlert(){
      $('#alert-add').hide()
    }

    $('#alert-add').hide()

    $("#new").click(e=>{
      $('#exampleModal').modal('show')
      $('#form-add').trigger('reset')
      closeAlert()
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
        let id = validator[0].value
        let amount = $('#amount').val()

        $.ajax({
        type: 'post',
        url: 'cashadvance_add.php',
        data: {
          amount: amount,
          id: id
        },
        dataType: 'json',
        success: (data) => {
            console.log(data)
            if(!data.error) {
                location.href = 'cash_advance.php';
            }else{
                $('#alert-add').show()
                $('#alert-add span').html(data.message)
            }
        }
      })
      }
      $('#project-id').val('')

    })
    let autoCompleteData
    async function cashAdvanceOnchange(){
      let data = await fetch('cashadvance_onchange.php')
      let history = await data.json()
      let data2 = await fetch('cashadvancetotal_onchange.php')
      let employees = await data2.json()

      let autoCompleteDataRes = await fetch('fetch_employees.php')
      autoCompleteData = await autoCompleteDataRes.json()
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

      console.log(autoCompleteData)
      history = history.reverse()
      let output = ''
      employees.forEach(emp => {
      output += `
          <tr>
            <td scope = 'row'>${emp.employee_id}</td>
            <td>${emp.fName} ${emp.lName}</td>
            <td>&#8369;${emp.total}</td>
            <td class="d-flex gap-1 justify-content-center ">
              <button id='view-${emp.employee_id}' class='view-btn btn btn-primary py-0 d-flex align-items-center gap-1' >
                <div class="mt-1">
                  <img src="../img/icons/view.png" alt="" style="width: 1.8rem">
                </div>
                <span>view</span>
              </button>
              <button id='edit-${emp.employee_id}' class='edit-btn btn btn-success d-flex align-items-center gap-1'>
                <div>
                  <img src="../img/btn_icons/edit.png" alt="" style="width: 1.2rem">
                </div>
                <span>Edit</span>
              </button>
            </td>
          </tr>`
      })
      document.querySelector('#tbody-total').innerHTML = output

      $('.view-btn').click(e => {
        $('#view').modal('show')
        let empId = getId(e.currentTarget.id)
        let rowData = employees.filter(emp => emp.id == empId)
        $("#empName").html(`${rowData[0].fName} ${rowData[0].mName} ${rowData[0].lName}`)
        $("#empNo").html(empId)
        let empHistory = history.filter(his => his.employee_id == empId)

        let output = ''
        console.log(empHistory)
        empHistory.forEach(empHis => {
          let desc = ''
          if(empHis.type == 1){
            desc = `cash advance balance deducted ${empHis.amount}`
          }else if (empHis.type == 0){
            desc = `advanced ${empHis.amount}`
          }
          else if (empHis.type == 3){
            desc = `added ${empHis.amount}`
          }
          else if (empHis.type == 4){
            desc = `deducted ${empHis.amount}`
          }
          output += `
            <tr>
              <td>${desc}</td>
              <td>${empHis.date_advanced}</td>
            </tr>
          `
        })
        $('#view-history').html(output)
        // $('.view-table').DataTable() 


      })

      $('.edit-btn').click(e => {
        $('#editAlert').hide()
        $('#form-edit').trigger('reset')
        $('#edit').modal('show')
        let editId = getId(e.currentTarget.id)
        let rowData = employees.filter(emp => emp.id == editId)
        $('#edit-id').val(rowData[0].employee_id)
        $('#edit-name').html(`${rowData[0].fName} ${rowData[0].mName} ${rowData[0].lName} (${rowData[0].employee_id})`)
        $('#ca-balance').html(`${rowData[0].total}`)
      })

      $('#table-ca').DataTable()

    }
    
    function getId(id){
      let rawId = id.split('-')
      return rawId[1]
    }

    $("#form-edit").submit(function(e){
      e.preventDefault()
      let operation = $("#add-radio").is(":checked") ? "add" : "minus"
      $.post('cash_advance_edit.php', {
        id: $('#edit-id').val(),
        amount: $('#edit-amount').val(),
        operation: operation,
        // name: ,
      }, data => {
        if(!data.error){
          location.href = 'cash_advance.php'
        }else{
          $('#editAlert').show()
          $('#editAlert span').html(data.message)
        }
      }, 'json')
    })

    
    // cash advance onchange table
    // function cashAdvanceOnchange(){
    //   let history 
    //   fetch('cashadvance_onchange.php')
    //   .then(res => res.json())
    //   .then(data => {
    //     let output = ''
    //     data.forEach(detail => {
    //       let {id, fName, lName, amount, date} = detail
    //     output += `
    //       <tr>
    //         <td scope = 'row'>${detail.employee_id}</td>
    //         <td>${fName} ${lName}</td>
    //         <td>${amount}</td>
    //         <td>${detail.date_advanced}</td>
    //       </tr>
    //     `
    //     })
    //     // document.querySelector('#tbl-history').innerHTML = output
    //     $('#table-history').DataTable()
    //     history = data
    //   })

    //   fetch('cashadvancetotal_onchange.php')
    //   .then(res => res.json())
    //   .then(data => {
    //     let output = ''
    //     // <button id='view-${emp.employee_id}' class='view-btn btn btn-primary'>Vew</button>
    //     data.forEach(emp => {
    //       output += `
    //          <tr>
    //            <td scope = 'row'>${emp.employee_id}</td>
    //            <td>${emp.fName} ${emp.lName}</td>
    //            <td>${emp.total}</td>
    //            <td>
    //             <button id='view-${emp.employee_id}' class='view-btn btn btn-primary'>view</button>
    //             <button id='edit-${emp.employee_id}' class='edit-btn btn btn-success'>Edit</button>
    //           </td>
    //           </tr>`
          
    //     })
    //     document.querySelector('#tbody-total').innerHTML = output
    //     $('.view-btn').click(e => {
    //       $('#view').modal('show')
    //       console.log('history')
    //     })
    //     $('#table-ca').DataTable()
    //   })
    // }
  </script>
</body>
</html>