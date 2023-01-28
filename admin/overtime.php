<?php
  include 'session/check_session.php';
  include '../scripts.php';
  include '../timezone.php';
  include '../connect.php';
  include 'sidebar.html';

  $dateNow = date('Y-m-d');
  if(isset($_SESSION['from']) && isset($_SESSION['from'])){
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    unset($_SESSION['from']);
    unset($_SESSION['to']);
  }else{
    $from = date('Y-m-d');
    $to = date('Y-m-d');
  }
  // echo $from."-".$to;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chateau - Overtime Table</title>
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
  <div class='p-4 container overflow-auto'>
    <!-- header -->
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Overtime</p>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Time Keeping > Overtime
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
    <!-- <div class="alert alert-success position-relative  mt-2" role="alert">
      <span id ='alert-suc-content'></span>
      <button type="button" class="btn-close float-end" onclick="$('.alert').hide()" aria-label="Close"></button>
    </div> -->
    <!-- body-->
    <div class="container-fluid bg-white p-4 rounded-3 mb-4">
      <!-- <p class='fs-4 '>Overtime List</p> -->
      <div class="d-flex justify-content-between align-items-center">
        <button class="btn text-light mb-2 d-flex align-items-center py-1 gap-1" id ='btn-new' style="background-color: #003B6E;">
          <div>
            <img src="../img/btn_icons/add.png" alt="" style="width: 1.2rem">
          </div>
          <span>Add Overtime</span>
        </button>
        <div class="d-flex">
          <img src="../img/icons/icons8-calendar-48.png" class=''alt="" style='width: 2rem'>
          <input type="text" name='' class='form-control shadow-none p-1 text-end' style='min-width: 310px' id ='overtime-date' >
        </div>
      </div>
      <table class='table table-bordered' id ="table-history" id='table-history'>
        <thead class=' text-center'>
          <tr class=''>
            <th>Employee #</th>
            <th>Name</th>
            <th>OT hr</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id = 'tbody-all'>
        <?php
            $sql = "SELECT *, overtime.id AS 'btnId' FROM overtime INNER JOIN employeelist ON employeelist.id = overtime.employee_id WHERE date BETWEEN '$from' AND '$to' ORDER BY date DESC";
            try {
              $result = $con->query($sql);
              while($row = $result->fetch_assoc()){
                echo '
                  <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['fName']. ' '.$row['mName'].' '.$row['lName'].'</td>
                    <td>'.$row['ot_hr'].'</td>
                    <td>'.date('F d, Y', strtotime($row['date'])).'</td>
                    <td class="d-flex gap-1 justify-content-center">
                      <button class="edit-btn btn btn-success rounded-2 py-1 d-flex align-items-center gap-1" id="edit-'.$row['btnId'].'">
                      <div>
                        <img src="../img/btn_icons/edit.png" alt="" style="width: 1.2rem">
                      </div>
                      <span>Edit</span>
                      </button>
                      <button class="del-btn btn btn-danger rounded-2 py-1 d-flex align-items-center gap-1" id="del-'.$row['btnId'].'">
                      <div>
                        <img src="../img/btn_icons/delete.png" alt="" style="width: 1.2rem">
                      </div>
                      <span>Delete</span>
                      </button>
                    </td>
                  </tr>';
              }
            } catch (\Throwable $th) {

            }
          ?>
        </tbody>
      </table>
    </div>
    
    <div class="container-fluid bg-white p-4 rounded-3 d-none">
      <p class='fs-4 '>Employee's overtime hrs</p>
      <table class='table table-bordered align-self-start' id ='table-hr'>
        <thead class='text-center'>
          <tr>
            <th>Name</th>
            <th>OT hrs</th>
            <th>Tools</th>
          </tr>
        </thead>
        <tbody id = 'tbody-ot'>

        </tbody>
      </table>
    </div>
    
    <script>
      console.log(new Date('January 23, 2022').getFullYear())
      $('#hh').html(
        // moment('February 14, 2001').format('YYYY/MM/DD')
      )
    </script>
  </div>
  <!-- modals -->
  <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Adding Overtime</h5>
          <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-add">
            <!-- <input type="text" name="" id="name"> -->
            <div class="form-floating">
              <input type="text" name="key" id="addKey" class = 'form-control mb-2 shadow-none rounded-0' required placeholder='employee key'>
              <label for="key">Employee</label>
            </div>
            <input type="hidden" id="project-id" name="id">
            <div class="form-floating">
              <input type="text"  name="hrs" id="addHrs" class="number form-control shadow-none rounded-0 mb-2" required autocomplete = 'off' placeholder='hrs'>
              <label for="hrs">Total hrs</label>
            </div>
            <div class="form-floating">
              <input type="date" name="date" id="addDate" class='form-control shadow-none rounded-0' required placholder='date' value = "<?php echo $dateNow?>" max = '<?php echo $dateNow?>'>
              <label for="date">Date</label>
            </div>
            <div class="alert alert-danger position-relative  mt-2" role="alert">
              <span id ='alert-content'></span>
              <button type="button" class="btn-close float-end" onclick="$('.alert').hide()" aria-label="Close"></button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick='closeModal()'>Close</button>
          <input type="submit" form="form-add" class="btn btn-primary" value = "Add">
        </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editing Overtime</h5>
            <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-edit">
              <!-- <input type="text" name="" id="name"> -->
              <div class="form-floating">
                <input type="text" name="key" id="edit-name" class = 'form-control mb-2 shadow-none rounded-0' required autocomplete='on' placeholder='employee key' disabled>
                <label for="key">Name</label>
              </div>
              <div class="form-floating">
                <input type="text" name="hrs" class="form-control shadow-none rounded-0 mb-2" required autocomplete = 'off' placeholder='hrs' id ='edit-hrs' >
                <label for="hrs">Total hrs</label>
              </div>
              <div class="form-floating">
                <input type="date" name="date" id="edit-date" class='form-control shadow-none rounded-0' required placholder='text' value = "" disabled>
                <label for="date">Date</label>
              </div>
              <div class="alert alert-danger position-relative  mt-2" role="alert">
                <span id ='alert-content'></span>
                <button type="button" class="btn-close float-end" onclick="$('.alert').hide()" aria-label="Close"></button>
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

    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
          <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Deleting Overtime</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Do you really want to delete this data?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id = "del-yes">Yes</button>
          </div>
        </div>
      </div>
    </div>
  <script type="">
    // import { inputNumber } from './inputNumber.js'

    $('.number').on('input', function(e){
      let last = $(this).val()
      if(! /[0-9]/.test(last[last.length - 1]) ){
        $(this).val(last.slice(0, -1))
      }
    })
    // $('.number').on('input', inputNumber)

    $('#edit-hrs').on('input', function(e){
      let last = $(this).val()
      if(! /[0-9]/.test(last[last.length - 1]) ){
        $(this).val(last.slice(0, -1))
      }
    })
   
    $('#overtime-date').daterangepicker({
      startDate: moment('<?php echo $from ?>').format('MMMM D, YYYY'),
      endDate: moment('<?php echo $to ?>').format('MMMM D, YYYY'),
      ranges: {
        'today': [moment(), moment()],
        'yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'last 15 days': [moment().subtract(14, 'days'), moment()],
        'last 30 days': [moment().subtract(29, 'days'), moment()],
        'this month': [moment().startOf('month'), moment().endOf('month')],
        'last month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      locale: {
        format: 'MMMM D, YYYY',
        // format: 'YYYY/MM/DD'
      }
    })

    
    $('#overtime-date').change(function(){
      let date_range = $('#overtime-date').val().split(' - ')
      let from = date_range[0]
      let to = date_range[1]
      $.post('overtime_date_onchange.php', {from: from, to: to}, data => {
        location.href = 'overtime.php'
      })
    })
    
    $('.alert').hide()
    
    const closeModal = () => {
      $(".modal").modal('hide')
      document.querySelector('form').reset()
      $('.alert-danger').hide()
    }
    
    window.addEventListener('DOMContentLoaded', updateTable)
    
    // adding
    $('#btn-new').click(()=>{
      $('#add').modal('show')
    })
    
    $('#form-add').submit(function(e){  
      e.preventDefault()
      let label = $('#addKey').val()
      let validator = autoCompleteData.filter(data => data.label == label)
      console.log(validator)
      if(validator.length < 1){
        $('.alert-danger').show()
        $('#alert-content').html("<b>Cannot find employee</b> <br><small>Please choose employee on dropdown</small>")
      }else{
        let id = validator[0].value
        $.post('overtime_add.php', {
          id: id,
          hrs: $('#addHrs').val(),
          date: $('#addDate').val(),
          from: '<?php echo $from?>',
          to: '<?php echo $to?>'
        }, data => {
          if(!data.error){
            location.href = 'overtime.php';
          }else{
            $('.alert-danger').show()
            $('#alert-content').html(data.message)
          }
          console.log(data.message)
        }, 'json')
      }
    })
    
    let allData = []
    let dataRow
    let editId = ''
    let delId = ''
    let autoCompleteData
    async function updateTable(){
      // for auto complete
      let autoCompleteDataRes = await fetch('fetch_employees.php')
      autoCompleteData = await autoCompleteDataRes.json()
      $( "#addKey" ).autocomplete({
      minLength: 0,
      source: autoCompleteData,
      focus: function( event, ui ) {
        $( "#addKey" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#addKey" ).val( ui.item.label );
        $( "#project-id" ).val( ui.item.value );
 
        return false;
        }
      })
      .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
          .append( "<div>" + item.label + "</div>" )
          .appendTo( ul );
      };


      let date_range = $('#overtime-date').val().split(' - ')
      from = date_range[0]
      to = date_range[1]

      from =  dayjs(from).format('YYYY-MM-DD')
      to =  dayjs(to).format('YYYY-MM-DD')

      console.log(from, to) 
      let fd = new FormData()
      fd.append('from', from)
      fd.append('to', to)
      let result = await fetch('overtime_onchange.php', {
        method: 'post',
        body: fd
      })
      let data = await result.json()
      allData = data
    }

    
    
    // deleting
    $('.del-btn').click(function(e){
      $('#delete').modal('show')
      delId = getId(e.currentTarget.id)
      console.log(delId)
    })
    
    $('#del-yes').click(()=>{
      $('#delete').modal('hide')
      console.log(delId)
      $.post('overtime_delete.php', {id: delId, from: '<?php echo $from?>', to: '<?php echo $to?>'}, data => {
        if(!data.error){
          location.href = 'overtime.php'
        }else{
          
        }
        console.log(data)
      }, 'json')
      
    })
    
    // editing
    $('.edit-btn').click(function(e){
      editId = getId(e.currentTarget.id)
      dataRow = allData.filter(ot => ot.btnId == editId)
      // console.log(dataRow)
      $('#edit').modal('show')
      $('#edit-name').val(`${dataRow[0].fName} ${dataRow[0].mName} ${dataRow[0].lName}`)
      $('#edit-hrs').val(parseFloat(dataRow[0].ot_hr).toFixed())
      $('#edit-date').val(dataRow[0].date)
    })
    
    $('#form-edit').submit(function(e){
      e.preventDefault()
      let fd = new FormData()
      Object.keys(dataRow[0]).forEach(x => fd.append(x, dataRow[0][x]))
      fd.append('edit_hrs', $('#edit-hrs').val())
      fd.append('from', '<?php echo $from?>')
      fd.append('to', '<?php echo $to?>')
      
      fetch('overtime_edit.php', {
        method: 'post',
        body: fd
      })
      .then(res => res.json())
      .then(data => {
        if(!data.error){
          location.href = 'overtime.php'
        }else{
          
        }
      })
    })
    
    function getId(id){
      let id_raw = id.split('-')
      return id_raw[1]
    }
    let dt = $('#table-history').DataTable()
  </script>
</body>
</html>