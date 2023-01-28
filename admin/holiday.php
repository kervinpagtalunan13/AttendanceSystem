<?php
    include 'session/check_session.php';

  include '../scripts.php';
  include '../timezone.php';
  include '../connect.php';
  include 'sidebar.html';
  if(isset($_SESSION['month'])){
    $month_count = $_SESSION['month'];
    unset($_SESSION['month']);
  }else{
    $month_count = date('m');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../node_modules/fullcalendar/main.js"></script>
  <link rel="stylesheet" href="../node_modules/fullcalendar/main.css">
  <!-- <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css"> -->
  <link href='../node_modules/bootstrap-icons/font/bootstrap-icons.css' rel='stylesheet'>

  <title>Holidays</title>
  <style>
    /* .fc .fc-col-header-cell-cushion {
        display: inline-block;
        padding: 20px 0px;
        
    }
    .fc .fc-col-header-cell {
      background-color: #025093;
      color: white
    } */
    /* .fc-day-sun {

      border-radius: 1rem;
    } */
    /* .fc-event-title-container{
      background-color: #025093;  
      border: 1px solid #025093;
    } */
    .fc .fc-view  {
      border-radius: 1rem;

    }
    .fc .fc-today-button {
      background-color: #025093;
      border-color: #025093;
    }
    .fc .fc-prev-button,  .fc .fc-next-button{
      background-color: #025093;
      border-color: #025093;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function(){
      let staticHoliday = []
      $.ajax({
        url: 'holiday_onchange.php',
        type: 'post',
        data: {
          type: 'static'
        },
        async: false,
        dataType: 'json',
        success: data=>{
          staticHoliday = data
          // console.log(data)
        }
      })
      let calendarEl = document.querySelector('#calendar')
      let calendar = new FullCalendar.Calendar(calendarEl, {
        eventColor: '#025093',
        eventBackgroundColor: '#025093',
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        height: 600,
        events: 'holiday_onchange.php',
        selectable: true,
        selectOverlap: false,
        expandRows: true,
        selectAllow: function(event){
          let start = moment(event.start).format('YYYY-MM-DD')
          let end = moment(event.end).subtract(1, 'days').format('YYYY-MM-DD')
          return start == end
        },
        eventClick: function(info){
          info.jsEvent.preventDefault()
          $('#modal').modal('show');
          let viewContent = `
          <h3 class="text-center">${info.event.title}</h3>
          <p class="text-center">${ (!info.event.extendedProps.description) ? "No Description" :  info.event.extendedProps.description}</p>`
          
          let id = info.event.id
          // staticHoliday.forEach(holData => console.log(holData.type))
          let rowData = staticHoliday.filter(holData => holData.id == id)

          if(rowData.length < 1){
            viewContent +=           
            `<div class="d-flex justify-content-end">
              <button class="del-btn btn btn-danger" id="${info.event.id}">
                Delete
              </button>
            </div>
            `
          }
          $('#modal .modal-body').html(viewContent)

          $(".del-btn").click(e=>{
            // console.log(e.currentTarget.id)
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to delete this holiday?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.post('holiday_delete.php', {
                  id: info.event.id, 
                  desc: info.event.extendedProps.description, 
                  date: info.event.startStr
                  }, 
                  data => {
                  $('#modal').modal('hide')
                  calendar.refetchEvents();
                  Swal.fire(
                  'Deleted!',
                  info.event.title + ' holiday has been deleted.',
                  'success'
                )
                })
              }
            })
          })
        },
        select: function(start, end){
          $('#add-form').trigger('reset')
          $('#add').modal('show')
          $('#add #date').val(start.startStr)
        }
      })
      calendar.render()
      // console.log('asdasd')

      $('#add-form').submit(function(e){
      e.preventDefault()
      let date = $('#date').val()
      let title = $('#title').val()
      let desc = $('#desc').val()
      // console.log(start)

      $.post('holiday_add.php', {
        title: title,
        date: date,
        desc: desc
      }, data=>{
        Swal.fire(
          'Success!',
          'Holiday is Successfully Added!',
          'success'
        )
        console.log(data)
        $('#add').modal('hide')
        calendar.refetchEvents();
      }, 'json')
    })
    })
  </script>
</head>
<body class='d-flex bg-secondary bg-opacity-10' >
  <div class="p-4 container overflow-auto">
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Holidays</p>
        <small class='fw-semibold text-dark'>
          Home > Time Keeping > Holidays
        </small>
    </header> 
    <div class="container-fluid bg-white p-4 rounded-3 mb-4">
      <div id="calendar"></div>
    </div>
  </div>
  <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Holiday</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button> -->
          <!-- <button type="button" class="btn btn-primary">Understood</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Adding Holidays</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id ="add-form">
            <div class="form-floating">
              <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
              <label for="title">Title</label>
            </div>
            <div class="form-floating mt-2">
              <!-- <input type="text-area"  rows="3" name="desc" id="desc" class="form-control" placeholder="Description"> -->
              <textarea name="desc" id="desc" cols="" rows="5" class="form-control" placeholder="Description"></textarea>
              <label for="desc">Description(optional)</label>
            </div>
              <div class="form-floating mt-2">
                <input type="text" name="date" id="date" class="form-control " placeholder="Start" disabled>
                <label for="date">Date</label>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" form="add-form" value="Add">
        </div>
      </div>
    </div>
  </div>
  <script>
    // $('#alert-add').hide()
    // const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    // const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    // let allData
    // fetch('holiday_onchange.php')
    // .then(res => res.json())
    // .then(data => allData = data)

    // let month_count = '<?php echo $month_count?>'

    // $('#month').change(()=>{
    //   let month = $('#month').val()
    //   location.href = `holiday_month_filter.php?month=${month}`
    // })
    // function closeAlert(){
    //   $('.alert').hide()
    // }

    // // deleting
    // let delId = ''
    // $('.del-btn').click(e => {
    //   delId = getId(e.currentTarget.id)
    //   $('#delete').modal('show')
    // })

    // $('#del-yes').click(e => {
    //   let rowData = allData.filter(all => all.id == delId)
    //   location.href = `holiday_delete.php?id=${delId}&month=${month_count}&desc=${rowData[0].description}`
    // })


    // function getId(id){
    //   let idd = id.split('-')
    //   return idd[1]
    // }

    // // adding
    // $('#btn-add').click(()=>{
    //   $('#add').modal('show')
    // })

    // $('#form-add').submit(function(e){
    //   e.preventDefault()
    //   let result
    //   $.post('holiday_add.php', {desc: $('#desc').val(), date: $('#date').val(), month: month_count}, data => {
    //     $('.alert').show()
    //     if(!data.error){
    //       result = data.error
    //       location.href = 'holiday.php'
    //     }else{
    //       $('#alert-add').show()
    //       $('#alert-add span').html(data.message)
    //     }
    //   }, 
    //   'json')
    // })
    // $('#tableHoliday').DataTable()
  </script>
</body>
</html>