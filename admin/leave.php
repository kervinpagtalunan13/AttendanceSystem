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
  <title>Chateau - Leave</title>
  <style>
    button {
      background-color: #025093;
    }
    .ui-autocomplete { 
    z-index:2147483647; 
    overflow-y: auto; 
    overflow-x: hidden;
    max-height: 200px;
  }
  </style>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
  <div class="container p-4">
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Leave</p>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Employee Management > Leave
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
    <div class="container bg-white p-4 rounded-3">
      <button class="btn btn-primary border-0 mb-3 rounded-1 px-3 d-flex align-items-center gap-1" id ='btn-add' style='background-color: #025093;'>
        <div>
          <img src="../img/btn_icons/add.png" alt="" style="width: 1.2rem">
        </div>
        <span>New</span>
      </button>
      <table class="table table-bordered " id ='table-main'>
      <thead>
        <tr>
          <th>Employee #</th>
          <th>Name</th>
          <th>Date</th>
          <th>Leave Type</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT *, leave_info.id as 'btnId' FROM leave_info INNER JOIN employeelist ON leave_info.employee_id = employeelist.id ORDER BY date DESC";
          $query = $con->query($sql);
          while($row = $query->fetch_assoc()){
            $date = date('F d, Y', strtotime($row['date']));
            $type = ($row['type'] == 1) ? "Vacation Leave" : "Sick Leave";
            echo '
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['fName'].' '.$row['lName'].'</td>
            <td>'.$date.'</td> 
            <td>'.$type.'</td> 

            <td>
              <button id = "del-'.$row['btnId'].'"class="del-btn btn btn-danger rounded-2 py-1 d-flex align-items-center gap-1">
              <div>
                <img src="../img/btn_icons/delete.png" alt="" style="width: 1.2rem" class="">
              </span>  
              <span>Delete</span>
              </button>
            </td>
            </tr>
            ';
          }
          ?>
      </tbody>
    </table>
  </div>
  </div>
  <!-- modal -->
  <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-1">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Adding Paid Leave</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form-add" method = "POST" action="">
            <div class="form-floating">
              <input type="text" name="key" id="addKey" class = 'form-control mb-2 shadow-none rounded-0' required placeholder='employee'>
              <label for="key">Employee</label>
            </div>

            <div class="form-floating mb-2">
              <select name="type" id="typeAdd" class="form-select rounded-0 shadow-none">
                <option value="1">Vacation Leave</option>
                <option value="2">Sick Leave</option>
              </select>
              <label for="type">type</label>
            </div>
            
            <input type="hidden" id="project-id" name="id">
            <div class="form-floating">
              <input type="date" name="date" id="addDate" class="form-control shadow-none rounded-0" required placeholder="Date">
              <label for="date">Date</label>
            </div>
					</form>
          <div class="alert alert-danger position-relative  mt-2" role="alert">
            <span id ='alert-content'></span>
            <button type="button" class="btn-close float-end" onclick="$('.alert').hide()" aria-label="Close"></button>
          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" form="form-add" class="btn btn-primary" value = "Add" name='add'>
				</div>
			</div>
		</div>
  </div>
  <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Deleting Holiday</h5>
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
  <script>
    let autoCompleteData
    fetch('fetch_employees.php')
    .then(res => res.json())
    .then(data => {
      autoCompleteData = data
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
    })
    
    const getId = (id) => {
      let rawId = id.split('-')
      return rawId[1]
    }
    $('#add .alert').hide()

    // delete
    let delId = ''
    $('.del-btn').click(e=>{
      $('#delete').modal('show')
      delId = getId(e.currentTarget.id)
    })
    $('#del-yes').click(e=>{
      $.post('leave_delete.php', {id: delId}, data => {
        location.href = 'leave.php'
      })
    })

    // add
    $('#btn-add').click(()=>{
      $('#add').modal('show')
    })

    $('#form-add').submit(function(e){
      e.preventDefault()
      console.log($(this).serialize())
      let label = $("#addKey").val()

      let validator = autoCompleteData.filter(data => data.label == label)
      if(validator.length < 1){
        $('.alert-danger').show()
        $('#alert-content').html("<b>Cannot find employee</b> <br><small>Please choose employee on dropdown</small>")
      }else{
        let id = validator[0].value
        let date = $("#addDate").val()
        $.post('leave_add.php', {
          id: id,
          date: date,
          type: $('#typeAdd').val()
        }, data=>{
          if(!data.error){
            location.href = 'leave.php'
          }else{
            $('.alert-danger').show()
            $('#alert-content').html(data.message)
          }
        }, 'json')
      }
    })

    $('table').DataTable({
      order: []
    });
  </script>
</body>
</html>