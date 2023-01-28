<?php
  include 'session/check_session.php';
  include '../connect.php';
  include 'sidebar.html';
  include '../scripts.php';
  $id = (isset($_GET['id'])) ? $_GET['id'] : 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compensations & Deductions</title>
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
  <div class='main p-4 container-fluid'>
    <header class='d-flex align-items-center justify-content-between'>
      <div class="d-flex gap-2 align-items-center mb-3">
        <p class='fs-2 p-0 m-0'>Compensation & Deductions</p>
      </div>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Compensation & Deductions
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
    <div class=" bg-white p-4 rounded-3">
      <div class='d-flex align-items-center justify-content-between'>
        <button class='btn text-light rounded-1 py-1 d-flex align-items-center gap-1' id = 'add' style="background-color: #003B6E;">
          <div>
            <img src="../img/btn_icons/add.png" alt="" style="width: 1.2rem">
          </div>
          <span>Add Compensation/Deduction</span>
        </button>
        <div class='d-flex gap-1'>
          <!-- <select name="year" id="year" class='form-select shadow-none' style="max-width: max-content;">
            <option value="2022">2022</option>
          </select> -->
          <select name="" id="employee" class='form-select shadow-none' style="max-width: max-content;">
            <?php
              $sql = "SELECT * FROM employeelist WHERE employee_status = 'Active'";
              $res = $con->query($sql);
              while ($row = $res->fetch_assoc()) {
                $selected = ($row['id'] == $id) ? ' selected' : '';
                echo '
                <option'.$selected.' value = "'.$row['id'].'">'.$row['fName'].' '.$row['mName'].' '.$row['lName'].'
                </option>';
              }
            ?>
          </select>
        </div> 
      </div>
      <hr class="p-0 m-1">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Description</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Monthly Amount</th>
            <th>Year</th>
            <th>Months</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody>
            <?php
              $sql = "SELECT * FROM compensation_deductions WHERE employee_id = '$id' AND `status` = '0'";
              $res = $con->query($sql);
              while ($row = $res->fetch_assoc()) {
                $monthsText = '';
                $counter = 0;
                if($row['january']){
                  $monthsText .= ($counter == 0) ? 'January' : ', January';
                  $counter = 1;
                }if($row['november']){
                  $monthsText .= ($counter == 0) ? 'November' : ', November';
                  $counter = 1;
                }if($row['december']){
                  $monthsText .= ($counter == 0) ? 'December' : ', December';
                  $counter = 1;
                }
                $type = ($row['type'] == 1) ? 'Compensation' : 'Deduction';
                echo '
                <tr>
                  <td>'.$row['description'].'</td>
                  <td>'.$type.'</td>
                  <td>'.number_format($row['total'], 2).'</td>
                  <td>'.number_format($row['monthly_total'], 2).'</td>
                  <td>'.$row['year'].'</td>
                  <td>'.$monthsText.'</td>

                </tr>
                ';
              //   <td>
              //   <button class="btn btn-danger archiveBtns" id="archiveId-'.$row['id'].'">Archive</button>
              // </td>
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editing Attendance</h5>
            <button type="button" class="btn-close"  onclick='$("#edit-alert").hide()'data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-add">
              <div class="form-floating mb-2">
                <input type="text" name="employee" id="employeeLabel" class='form-control rounded-0 shadow-none' required autocomplete="off">
                <label for="employee">Employee</label>
              </div>
              <div class="form-floating mb-2">
                <input type="text" name="desc" id="desc" class='form-control rounded-0 shadow-none' required autocomplete="off">
                <label for="employee">Description</label>
              </div>
              <div class='d-flex gap-2 align-items-center'>
                <div class="form-floating mb-2 flex-grow-1">
                  <input type="text" name="amount" id="amount" class='form-control rounded-0 shadow-none' required autocomplete="off">
                  <label for="employee">Amount</label>
                </div>
                <input type="hidden" name="id" id="project-id">
                <div class="form-floating mb-2 flex-grow-1">
                  <select name="type" id="" class="form-select rounded-0 shadow-none">
                    <option value="1">compensation</option>
                    <option value="2">deduction</option>
                  </select>
                  <label for="type">type</label>
                </div>
              </div>
              <!-- months -->
              <div class="d-flex align-items-center gap-3">
                <div class="form-floating mb-2 flex-grow-1 align-self-start flex-grow-0">
                  <select name="year" id="" class="form-select rounded-0 shadow-none">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                  </select>
                  <label for="type">Year</label>
                </div>
                <div class="flex-grow-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="January" name="January">
                    <label class="form-check-label" for="January">January</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="February" name="February">
                    <label class="form-check-label" for="February">
                      February
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="March" name="March">
                    <label class="form-check-label" for="March">
                      March
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="April" name="April">
                    <label class="form-check-label" for="April">
                      April
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="May" name="May">
                    <label class="form-check-label" for="May">
                      May
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="June" name="June">
                    <label class="form-check-label" for="June">
                      June
                    </label>
                  </div>
                </div>

                <div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="July" name="July">
                    <label class="form-check-label" for="July">July</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="August" name="August">
                    <label class="form-check-label" for="August">
                      August
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="September" name="September">
                    <label class="form-check-label" for="September">
                      September
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="October" name="October">
                    <label class="form-check-label" for="October">
                      October
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="November" name="November">
                    <label class="form-check-label" for="November">
                      November
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="December" name="December">
                    <label class="form-check-label" for="December">
                      December
                    </label>
                  </div>
                </div>
              </div>
            </form>
            <div class="alert alert-danger position-relative mt-2" id="alert-add" role='alert'>
              <span id ='alert-content'></span>
              <button type="button" class="btn-close float-end" onclick='$("#alert-add").hide()' aria-label="Close"></button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" form="form-add" class="btn btn-primary" value = "Add">
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Archiving Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Do you really want to Archive this data?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id = "del-yes">Yes</button>
        </div>
      </div>
    </div>
  </div>
  <script type="module">
    import { inputNumber } from './inputNumber.js'
    $("#alert-add").hide()
    window.addEventListener('DOMContentLoaded', onChange)

    $('#amount').on('input', function(){
      let last = this.value
      if(! /[0-9\.]/.test(last[last.length - 1]) ){
        this.value = last.slice(0, -1)
      }
    })
    
    let autoCompleteData = []
    async function onChange(){
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

    }


    let delId = ''
    $('.archiveBtns').click(function(e){
      let rawId = e.currentTarget.id.split('-')
      delId = rawId[1]
      $('#delete').modal('show')
    })
    $('#del-yes').click(function(e){
      $.post('compensation_deduc_archive.php', {id: delId}, data => {
        if(!data.error){
          location.href = 'compensation_deduc.php?id=' + '<?php echo $id?>'
        }else{

        }
        console.log(data)
      }, 'json')
    })

    $('#employee').on('change', function(e){
      let id = e.currentTarget.value
      location.href = 'compensation_deduc.php?id='+id
    })
    $('#add').click(e=>{
      $('#add-modal').modal('show')
      $('#form-add').trigger('reset')
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
        $.post('compensation_deduc_add.php', $(this).serialize(), data => {
          if(!data.error){
            location.href = 'compensation_deduc.php?id='+value
          }else{

          }
        })
      }
    })

    $('table').DataTable()
  </script>
</body>
</html>