<?php
  include 'session/check_session.php';
  include '../scripts.php';
  include '../timezone.php';
  include '../connect.php';
  include 'sidebar.html';

  if(isset($_SESSION['period'])){
    $periodId = $_SESSION['period'];
  }
  if(isset($_SESSION['payroll_year'])){
    $year_filter = $_SESSION['payroll_year'];
    // unset($_SESSION['payroll_year']);
  }else{
    $year_filter = date('Y');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chateau - Payroll</title>
  <script src="../plugin/FileSaver.js"></script>
        <script src="../plugin/xlsx.full.min.js"></script>
  <style>
    .hide-taskbar {
      max-width: 0px;
      /* transition: 300ms; */
    }
    th, td {
      font-size: .9rem;
    }
    th {
      font-size: .87rem;
    }
    .total {
      background-color: #77DD77;
    }
  </style>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
  <div class="main p-4 container-fluid overflow-auto">
    <header class='d-flex align-items-center justify-content-between'>
      <div class="d-flex gap-2 align-items-center mb-3">
        <i class="fa-regular fa-chevron-right mt-1" style="transform: scale(1.5); cursor: pointer" id="hide-taskbar"></i>
        <p class='fs-2 p-0 m-0'>Payroll Management</p>
      </div>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Payroll Information
        </small>
      </div>
    </header> 
    <?php
      if(isset($_SESSION['success'])){
        echo '
        <div class="alert alert-success position-relative" id ="alert-suc" role="alert">
          <span id ="">'.$_SESSION['success'].'</span>
          <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['success']);
      }
      if(isset($_SESSION['error'])){
        echo '
        <div class="alert alert-success position-relative" id ="alert-suc" role="alert">
          <span id ="">'.$_SESSION['error'].'</span>
          <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['error']);
      }
    ?>
    <!-- main -->
    <div class=" bg-white p-4 rounded-3">
      <div class="">
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-1">
          <button class="btn text-white border-0 rounded-1 shadow-none d-flex align-items-center gap-1" id = "new" style="background-color: #003B6E">
            <div>
            <img src="../img/btn_icons/add.png" alt="" style="width: 1rem">
          </div>
          <span>
            Add Period
          </span>
          </button>

          <button class="btn text-white border-0 rounded-1 shadow-none d-flex align-items-center gap-1" id = "new-compensation" style="background-color: #003B6E">
            <div>
              <img src="../img/btn_icons/add.png" alt="" style="width: 1rem">
            </div>
            <span>
              Add Compensation
            </span>
          </button>
        </div>
        
        <div class="d-flex gap-1">
          <select name="" id="year-list" class="form-select shadow-none" style="width: max-content">
            <?php
              $sql = "SELECT DISTINCT EXTRACT(YEAR FROM `from`) as 'year' FROM payroll_info ORDER BY `year` ASC";
              try {
                $query = $con->query($sql);
                while ($row = $query->fetch_assoc()) {
                  if($year_filter == $row['year']){
                    echo '<option selected value = "'.$row['year'].'">'.$row['year'].'</option>';
                  }else{
                    echo '<option value = "'.$row['year'].'">'.$row['year'].'</option>';
                  }
                }
              } catch (\Throwable $th) {
                echo 'Error';
              }
            ?>
          </select>
          <select name="" id="period-list" class="form-select rounded-1 shadow-none" style = "max-width: max-content">
            <?php
              $sql = "SELECT * FROM payroll_info WHERE EXTRACT(YEAR FROM `from`) = '$year_filter' ORDER BY `from` DESC";
              if($query = $con->query($sql)){
                while($row = $query->fetch_assoc()){
                  $monthNum = date('m', strtotime($row['from']));
                  $period = "1st Period";

                  if($row['period'] == 2){
                    $period = "2nd Period";
                  }else if($row['period'] == 3){
                    $period = '13th month pay';
                  }else if($row['period'] == 4){
                    $period = 'mid year pay';
                  }

                  $year  = date('Y', strtotime($row['from']));
                  $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                  $monthName = $dateObj->format('F');
                  if($row['period'] == 3){
                    $monthName = "Compensation";
                  }else if($row['period'] == 4){
                    $monthName = "Compensation";
                  }
                  if($row['id'] == $periodId){
                    echo "<option value='".$row['id']."' selected>".$monthName." (".$period.")</option>";
                  }else{
                    echo "<option value='".$row['id']."'>".$monthName." (".$period.")</option>";
                  }
                }
              }
              ?>
            <!-- <option>value</option> -->
          </select>
        </div>
      </div>
      <div class="print my-1 d-flex justify-content-between gap-1 align-items-center border-bottom pb-1">
        <div class="">
          <!-- <input class="form-check-input me-2 shadow-none" type="checkbox" id="show-detail">
          <label class="form-check-label text-dark" for="show-detail">Show Details</label> -->
          <!-- <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="show-details">
            <label class="form-check-label" for="show-details">show details</label>
          </div> -->
          <p class="m-0">Date: <span id="dateLabel"></span></p>
        </div>
        <div class="d-flex gap-1">
          <!-- payslip -->
          <button class = 'btn btn-primary border-0 rounded-1 d-flex align-items-center gap-1' id='printAll' style="background-color: #003B6E;">
            <div>
              <img src="../img/btn_icons/payslip.png" alt="" style="width: 1.2rem">
            </div>
            <span>Pay Slip</span>
          </button>

          <!-- excell -->
          <button class = 'btn btn-success rounded-1 d-flex align-items-center gap-1' id ='table2excel'>
            <div>
              <img src="../img/btn_icons/excel.png" alt="" style="width: 1.2rem">
            </div>
            <span>Excel</span>

            <!-- releas payroll -->
          </button>
          <button class = 'btn btn-success rounded-1 d-flex align-items-center gap-1' id = 'release-payroll'>
            <div>
              <img src="../img/btn_icons/payslip.png" alt="" style="width: 1.2rem">
            </div>
            <span>Release Payroll</span>
          </button>
        </div>
      </div>
      <div class="overflow-auto">
        <!-- regular period -->
        <table class = 'table border table-bordered mt-2' id='table-payroll'>
          <thead class = 'table-primary'>
          <tr>
              <th colspan="2" style="text-align: center;" class="">Details</th>
              <th colspan="9" style="text-align: center;">Addition</th>
              <th colspan="6" style="text-align: center;">Deduction</th>
              <th colspan="3" style="text-align: center;">Total</th>
              <th colspan="3" style="text-align: center;"></th>
          </tr>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th class="total" style="">No. of days</th>
              <th class='details total' style="">rate / hr</th>
              <th class='total' style="">OT hrs</th>
              <th style="">Total hr</th>
              <th class='details total' style="">No of Leave</th>
              <th class='details total' style="">Paid Leave</th>
              <th class='details total' style="">No, of holiday</th>
              <th class='details total' style="">holiday</th>
              <th class='details total' style="">Compensation</th>
              <th class='details total' style="">Cash Advance</th>
              <th class='details' style="">SSS</th>
              <th class='details' style="">philhealth</th>
              <th class='details' style="">pag-ibig</th>
              <th class='details' style="">Tax</th>
              <th class='details' style="">Others</th>
              <th style="">Total Deductions</th>
              <th>Total Gross</th>
              <th>Net Pay</th>
              <th class='tools'>Tools</th>
            </tr>
          </thead>
          <tbody>
            <!--  -->
          </tbody>
        </table>
        
        <!-- 13th month pay -->
        <table class='table table-bordered w-100' id="thirteenMonthTable">
          <thead class="table-primary">
            <tr>
              <th colspan="4" class="py-1">Information</th>
              <th colspan="12" class="text-center py-1">Basic Pay</th>
              <th colspan="1" class="py-1">Total</th>
            </tr>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Rate</th>
              <th>Basic hr/s</th>
              <th>Jan</th>
              <th>Feb</th>
              <th>Mar</th>
              <th>April</th>
              <th>May</th>
              <th>June</th>
              <th>July</th>
              <th>Aug</th>
              <th>Sep</th>
              <th>Oct</th>
              <th>Nov</th>
              <th>Dec</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
        
        <!-- mid-year -->
        <table class='table table-bordered w-100' id="midYearTable">
          <thead class="table-primary">
            <tr>
              <th colspan="4" class="py-1">Information</th>
              <th colspan="6" class="text-center py-1">Basic Pay</th>
              <th colspan="1" class="py-1">Total</th>
            </tr>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Rate</th>
              <th>Basic hr/s</th>
              <th>Jan</th>
              <th>Feb</th>
              <th>Mar</th>
              <th>April</th>
              <th>May</th>
              <th>June</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- modals -->

  <div class="modal fade" id="add" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Adding period</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" id="form-add">
        <div class="d-flex align-items-center justify-content-between gap-2">
          <select name="" id="monthList" class="form-select"></select>
          <select name="" id="period" class="form-select">
            <option value="1">First Period</option>
            <option value="2">Second Period</option>
          </select>
        </div>
        <input type="text" class="form-control my-3 bg-white" id="date" disabled required>
        </form>
        <div class="alert alert-danger position-relative" id ="alert-add" role="alert">
          <span id =""></span>
          <button type="button" class="btn-close float-end" onclick="closeAlert()" aria-label="Close"></button>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form = "form-add">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="add-compensation" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Adding Compensation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" id="form-add-compensation">
          <div class="d-flex gap-1">
            <select name="year" id="asd" class="form-select">
              <?php
              $sql = "SELECT DISTINCT EXTRACT(YEAR FROM `from`) as 'year' FROM payroll_info ORDER BY `year` ASC";
              try {
                $query = $con->query($sql);
                while ($row = $query->fetch_assoc()) {
                  if($year_filter == $row['year']){
                    echo '<option selected value = "'.$row['year'].'">'.$row['year'].'</option>';
                  }else{
                    echo '<option value = "'.$row['year'].'">'.$row['year'].'</option>';
                  }
                }
              } catch (\Throwable $th) {
                echo 'Error';
              }
            ?>
            </select>
            <select name="type" id="" class="form-select">
              <option value="3">13th Month Pay</option>
              <option value="4">Mid Year Pay</option>
            </select>
          </div>
        </form>
        <div class="alert alert-danger position-relative" id ="" role="alert">
          <span id =""></span>
          <button type="button" class="btn-close float-end" onclick="closeAlert()" aria-label="Close"></button>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form = "form-add-compensation">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="released" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Notice</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="fs-6">This payroll period is already released</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="release" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Releasing payroll</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class='fs-6'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id = "relYes">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="notice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Releasing payroll</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class='fs-6'>It's not payday yet.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
          <!-- <button type="button" class="btn btn-primary" id = "relYes">Confirm</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confPassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
          <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Confirm Password to continue</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" id="form-conf">
              <div class="form-floating">
                <input type="password" class="form-control" name = "pass" required>
                <label for="confPass">Password</label>
              </div>
              <div class="alert alert-danger position-relative mt-2" role="alert" id ="conf-alert">
                <span id ='alert-suc-content'></span>
                <button type="button" class="btn-close float-end" onclick="$('.alert').hide()" aria-label="Close"></button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" form="form-conf"class="btn btn-primary">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  <script>
        $('#hide-taskbar').click(e=>{
      $('#side-bar').toggleClass('hide-taskbar')
    })
    $('#thirteenMonthTable').hide()
    $('#midYearTable').hide()

    // window.addEventListener('DOMContentLoaded', loadPeriod)
    window.addEventListener('DOMContentLoaded', onChange($('#period-list').val()))
    $('#confPassModal .alert').hide()
    $('#add .alert').hide()
    $('#add-compensation .alert').hide()
    

    $('#new-compensation').click(e=>{
      // $('#new-compensation').modal('show')
      $('#add-compensation').modal('show')
      $('#add-compensation .alert').hide()
    })

    $('#form-add-compensation').submit(function(e){
      e.preventDefault()
      $.post('payroll_add_compensation.php', $(this).serialize(), data => {
        if(!data.error){
          location.href = 'payroll_management.php'
        }else{
          $('#add-compensation .alert').show()
          $('#add-compensation .alert span').html(data.message)
        }
        // console.log(data)
      }, 'json')
    })

    let from1, to1
    $('#new').click(e=>{
      $('#add').modal('show')
      let period = $('#period').val()
      let monthNo = $('#monthList').val()
      let monthText = ''
      Object.entries(months).forEach(([x, y]) => {
        if(y == monthNo)
          monthText = x
      })

      let date = `${moment().format('YYYY')}-${monthNo}-01`
      let from, to
      if(period == '1'){
        from1 = moment(date).startOf('month').format(`YYYY-MM-DD`)
        to1 = moment(date).format(`YYYY-MM-15`)
        from = moment(date).startOf('month').format(`MMMM D, YYYY`)
        to = moment(date).format(`MMMM 15, YYYY`)
      }else{ 
        from1 = moment(date).format(`YYYY-MM-16`)
        to1 = moment(date).endOf('month').format(`YYYY-MM-DD`)
        from = moment(date).format(`MMMM 16, YYYY`)
        to = moment(date).endOf('month').format(`MMMM D, YYYY`)
      }
      
      $('#date').val(`${from} - ${to}`)
      closeAlert()
    })

    function closeAlert(){
      $('#add .alert').hide()
      $('#add-compensation .alert').hide()
    }
    let months = {
      January: '01',
      February: '02',
      March: '03',
      April: '04',
      May: '05',
      June: '06',
      July: '07',
      August: '08',
      September: '09',
      October: '10',
      November: '11',
      December: '12'
    }
    let monthNow = moment().format('M')
    // console.log(Object.entries(months))
    let monthContent = ''
    Object.entries(months).forEach(([x, y]) => {
      if(y == monthNow){
        monthContent += `<option value="${y}" selected>${x}</option>`
      }else{
        monthContent += `<option value="${y}">${x}</option>`
      }
    })
    $('#monthList').html(monthContent)

    $('#monthList').change(e=>{
      let value = e.currentTarget.value
      let periodValue = $('#period').val()
      loadDate(value, periodValue)
    })
    $('#period').change(e=>{
      let value = e.currentTarget.value
      let monthValue = $('#monthList').val()
      loadDate(monthValue, value)
    })
    let from, to
    function loadDate(month, period){
      let date = `${moment().format('YYYY')}-${month}-15`
      // console.log()
      if(period == 1){
        from = moment(date).startOf('month').format('MMMM D, YYYY')
        to =  moment(date).format('MMMM 15, YYYY')

        from1 = moment(date).startOf('month').format('YYYY-MM-DD')
        to1 =  moment(date).format('YYYY-MM-15')
      }else{
        from = moment(date).format('MMMM 16, YYYY')
        to =  moment(date).endOf('month').format('MMMM D, YYYY')

        from1 = moment(date).format('YYYY-MM-16')
        to1 =  moment(date).endOf('month').format('YYYY-MM-DD')
      }
      // console.log(from, to)
      $('#date').val(`${from} - ${to}`)
    }

    $('#form-add').submit(function(e){
      e.preventDefault()
      // if( $('#date').val() == '' ){
      //   $('#alert-add').show()
      //   $('#alert-add span').html("Please Select Period")
      // }
      $.post('payroll_add.php', {
        from: from1,
        to: to1,
        period: $('#period').val()

      }, data => {
        if(!data.error){
          location.href = 'payroll_management.php';
        }else{
          console.log(data)
          $('#alert-add').show()
          $('#alert-add span').html(data.message)
        }
        // console.log(data)
      }, 'json')
    })

    let onselect
    $("#release-payroll").click(e=>{
      let desc = ''
      let dateUntil = ''
      let year = dayjs(onselect[0].from).format('YYYY')
      let month = dayjs(onselect[0].from).format('MMMM')
      let done = ''
      if(onselect[0].period == 3){
        desc = `13th month pay for the year of ${year}`
        dateUntil = dayjs(onselect[0].to).subtract(10, 'days').format('MMMM DD, YYYY')
        done += 'not allow to modified and change any data of rows on this period once it\'s done. Do you want to continue?'
      }else if(onselect[0].period == 4){
        desc = `Mid year pay for the year of ${year}`
        dateUntil = dayjs(onselect[0].to).format('MMMM DD, YYYY')
        done += 'not allow to modified and change any data of rows on this period once it\'s done. Do you want to continue?'
      }else{
        desc = `Payroll period for ${month} of ${year} (${(onselect[0].period == 1) ? '1st period' : '2nd period'}) `
        dateUntil = dayjs(onselect[0].to).format('MMMM DD, YYYY')
        done += 'deduct cash advance balance of employees with sufficient netpay. Do you want to continue?'
      }

      if(onselect[0].data != null && onselect[0].status == 1){
        $('#released .modal-body p').text(`${desc} is already released.`)
        $('#released').modal('show')
      }else{
        if(dayjs(dateUntil).format('YYYY-MM-DD') > moment().format('YYYY-MM-DD')){
          $('#notice .modal-body p').text(`${desc}
          is cannot be release until ${dateUntil}.`)
          $('#notice').modal('show')
          
        }else{
          $('#release .modal-body p').text(`
          Upon releasing the ${desc}. The system will ${done}`)
          $('#release').modal('show')
        }
      }
    })

    $('#relYes').click(e=>{
      $('#release').modal('hide')
      $('#form-conf').trigger('reset')
      $('#confPassModal .alert').hide()
      $('#confPassModal').modal('show')
    })

    $('#form-conf').submit(function(e){
        e.preventDefault()
        $.post('confirm_password.php', $(this).serialize(), data => {
          if(!data.error){
            let id = onselect[0].id
            // let month = onselect[0].from
            let period = onselect[0].period
            let to = onselect[0].to;
            if(period == 1 || period == 2){
              let empWithCA = allData.filter(emp => emp.deduction.CashAdvance.amount > 0 && emp.total.net >= 0)
              let filtered = btoa(JSON.stringify(empWithCA))
              let pr_data = btoa(JSON.stringify(allData))
              $.post('payroll_release_period.php', {data: pr_data, id: id, filtered: filtered, period: period}, data => {
                if(!data.error){
                  location.href = 'payroll_management.php'
                }else{
  
                }
                // console.log(data)
              }) 
            }else if(period == 3 || period == 4){
              let pr_data = btoa(JSON.stringify(allData))
              $.post('payroll_release_compensation.php', {data: pr_data, id: id, period: period, year: dayjs(to).format('YYYY')}, data => {
                if(!data.error){
                  location.href = 'payroll_management.php'
                }else{
  
                }
                // console.log(data)
              }) 
            }
          }else{
            $('#confPassModal .alert').show()
            $('#confPassModal .alert span').html(data.message)
          }
        }, 'json')
      })
    // $('.details').hide() 

    $('#period-list').change(e=>{
      let id = e.currentTarget.value
      onChange(id)
      $.post('payroll_period_onchange.php', {period: id, year: '<?php echo $year_filter ?>'}, data=>{
        location.href = 'payroll_management.php'
      })
    })

    $('#year-list').change(function(e){
      let year = $(this).val()
      $.post('payroll_year_onchange.php', {year: year}, data=>{
        location.href = 'payroll_management.php'
      })
    })

    $('#printAll').click(e=>{
      let url = ''
      if(onselect[0].period == 1 || onselect[0].period == 2 ){
        url = 'printall.php'
      }else if(onselect[0].period == 3){
        url = 'print_13monthpay.php'
      }else {
        url = 'print_midyearpay.php'
      }

      let data = btoa(JSON.stringify(allData))
      let form = document.createElement("form");
      form.target = "_blank"
      form.method = "POST"
      form.action = url

      let input = document.createElement("input")
      input.type = "text"
      input.name = "data"
      input.value = data
      form.appendChild(input)

      document.body.appendChild(form)
      form.submit()
      document.body.removeChild(form)

    })
    let table2print
    const EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
    const EXCEL_EXTENSION = '.xlsx';
    let yearPayroll = ''
    let monthPayroll = ''
    $('#table2excel').click(e=>{
      // let data = []
      let fileName = ''
      if(table2print == 1){
        fileName = monthPayroll+"_1stPeriod_"
      }else if(table2print == 2){
        fileName = monthPayroll+"_2ndPeriod_"
      }else if(table2print == 3){
        fileName = "13thMonthPay_"
      }else if(table2print == 4){
        fileName = "MidYearPay_"
      }
      console.log(table2print)
      const worksheet = XLSX.utils.json_to_sheet(allDataa)
      worksheet['!protect'] = {objects: false}
        const workbook = {
          Sheets: {
            'data': worksheet
          },
          SheetNames: ['data']
        }
      const excelBuffer = XLSX.write(workbook, {bookType: 'xlsx', type: 'array'})
      // console.log(excelBuffer)
      console.log(allDataa)
      saveAsExcel(excelBuffer, fileName)
      // var table2excel = new Table2Excel();
      // // if(table)
      // if(table2print == 1 || table2print == 2){
      //   table2excel.export(document.querySelectorAll("#payroll-table"));
      // }else if(table2print == 3){
      //   table2excel.export(document.querySelectorAll("#thirteenMonthTable"));
      // }else if(table2print == 4){
      //   table2excel.export(document.querySelectorAll("#midYearTable"));
      // }

    })

    function saveAsExcel(buffer, filename){
      const data = new Blob([buffer], {type: EXCEL_TYPE})
      saveAs(data, filename + yearPayroll)
    }
    let period_info 
    // async function loadPeriod(){
    //   let payroll_info = await getData('payroll_info')
    //   period_info = payroll_info
    // }
    
    let allData = []
    let allDataa = []
    
    async function onChange(id) {    
          let period_info = await getData('payroll_info')
          let data = period_info.filter(info => info.id == id)
          let month_period = data[0].period
          table2print = month_period
          onselect = data
          let from = data[0].from
          let to = data[0].to
          let status = data[0].status
          yearPayroll = dayjs(from).format('YYYY')
          monthPayroll = dayjs(from).format('MMMM')
          if(status == 1){
            $('#release-payroll span').html('Already Released')
          }

          let first_period = []
          if(month_period == 2){
            let from_first_period = dayjs(from).format('YYYY-MM-01')
            let to_first_period = dayjs(from).format('YYYY-MM-15')
             first_period = period_info.filter(x => x.from == from_first_period && x.to == to_first_period)
          }

          let optionLocaleString = {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          }

          if(month_period != 1 && month_period != 2){
            $('#table-payroll').hide()
          }
          if(month_period == 3){
            $('#thirteenMonthTable').show()
          }
          if(month_period == 4){
            $('#midYearTable').show()
          }
          // console.log(first_period)
          // date period label

          var options = {year: 'numeric', month: 'long', day: 'numeric' };
          let payroll_data = data[0].data
          let fromDate = new Date(from)
          let toDate = new Date(to)
          let fromDateLong = fromDate.toLocaleDateString("en-US", options)
          let toDateLong = toDate.toLocaleDateString("en-US", options)
          $('#dateLabel').html(`${fromDateLong} - ${toDateLong}`)
          
          allData = []
          // getting the data
          let employees = await getData()
          let attendance = await getData('attendance_csv', from, to)
          let positions = await getData('positions')

          if(month_period == 3){
            let output = ''
            let periods = period_info.filter(pi => pi.from >= from && pi.to <= to && pi.period != 3 && pi.period != 4)
            if(status == 0){

            employees.forEach(emp => {
              let rate = positions.filter(pos => pos.id == emp.employee_Role)
              
              const monthlyBasicPay = {
                name: `${emp.fName} ${emp.mName} ${emp.lName}`,
                role: rate[0].description,
                rate: {
                  hourly: rate[0].rate,
                  daily: rate[0].rate * 8,
                  monthly: (rate[0].rate * 8) * 26,
                },
                months: {
                  January: 0, February: 0, March: 0, April: 0, May: 0, June: 0,
                  July: 0, August: 0, September: 0, October: 0, November: 0, December: 0
                },
                hours: {
                  January: 0, February: 0, March: 0, April: 0, May: 0, June: 0,
                  July: 0, August: 0, September: 0, October: 0, November: 0, December: 0
                },
                totalHrs: 0,
                totalBasicPay: 0,
                total: 0
              }
              
              let totalBasicHr = 0
              periods.forEach(per => {
                let data = (per.data) ? JSON.parse(atob(per.data)) : []
                let empData = data.filter(d => d.id == emp.id)
                if(empData.length > 0){
                  // console.log(empData[0].gross)
                  totalBasicHr += empData[0].gross.basicHr
                  monthlyBasicPay.months[dayjs(per.from).format('MMMM')] += empData[0].gross.basicPay
                  monthlyBasicPay.hours[dayjs(per.from).format('MMMM')] += empData[0].gross.basicHr
                }else{

                }
              })

              let monthOutput = ''
              Object.entries(monthlyBasicPay.months).forEach(([x, y]) => {
                monthOutput += `<td>&#8369;${(y.toLocaleString("en-US", optionLocaleString))}</td>`
              })
              monthlyBasicPay.totalBasicPay = Object.values(monthlyBasicPay.months).reduce((x, y) => {
                return x + y
              }, 0)
              monthlyBasicPay.total = monthlyBasicPay.totalBasicPay / 12
              monthlyBasicPay.totalHrs = Object.values(monthlyBasicPay.hours).reduce((x, y) => {
                return x + y
              }, 0)
              output += `   
                <tr>
                  <td>${emp.id}</td>
                  <td>${emp.fName} ${emp.mName} ${emp.lName}</td>
                  <td>&#8369;${rate[0].rate.toLocaleString("en-US", optionLocaleString)}</td>
                  <td>${monthlyBasicPay.totalHrs}</td>
                  ${monthOutput}
                  <td>&#8369;${monthlyBasicPay.total.toLocaleString("en-US", optionLocaleString)}</td>
                </tr>
              `
              allDataa.push({
                name: `${emp.fName} ${emp.mName} ${emp.lName}`,
                rate: rate[0].rate,
                "Total hrs": monthlyBasicPay.totalHrs,
                January: monthlyBasicPay.months.January, 
                February: monthlyBasicPay.months.February,
                March: monthlyBasicPay.months.March,
                April: monthlyBasicPay.months.April,
                May: monthlyBasicPay.months.May,
                June: monthlyBasicPay.months.June,
                July: monthlyBasicPay.months.July,
                August: monthlyBasicPay.months.August,
                September: monthlyBasicPay.months.September,
                October: monthlyBasicPay.months.October,
                November: monthlyBasicPay.months.November,
                December: monthlyBasicPay.months.December,
                Total: monthlyBasicPay.total.toLocaleString("en-US", optionLocaleString)
              })
              allData.push(monthlyBasicPay)
            })          
          }else{
            let eData = JSON.parse(atob(onselect[0].data))

            eData.forEach(data => {
              let monthOutput = ''
              Object.values(data.months).forEach(month => {
                monthOutput += `<td>&#8369;${month.toLocaleString("en-US", optionLocaleString)}</td>`
              })
              output += `
              <tr>
                <td>${data.id}</td>
                <td>${data.name}</td>
                <td>&#8369;${data.rate.hourly.toLocaleString("en-US", optionLocaleString) }</td>
                <td>${data.totalHrs}</td>
                ${monthOutput}
                <td>&#8369;${data.total.toLocaleString("en-US", optionLocaleString)}</td>
              </tr>`
              allDataa.push({
                name: data.name,
                rate: data.rate.hourly,
                "Total hrs": data.totalHrs,
                January: data.months.January, 
                February: data.months.February,
                March: data.months.March,
                April: data.months.April,
                May: data.months.May,
                June: data.months.June,
                July: data.months.July,
                August: data.months.August,
                September: data.months.September,
                October: data.months.October,
                November: data.months.November,
                December: data.months.December,
                Total: data.total.toLocaleString("en-US", optionLocaleString)
              })
              allData.push(data)
            })
          }
            $('#thirteenMonthTable tbody').html(output)
            $('#thirteenMonthTable').DataTable()
          }else if(month_period == 4){
            let periods = period_info.filter(pi => pi.from >= from && pi.to <= to && pi.period != 4 && pi.period != 3)
            let output = ``
            if(status == 0){

            employees.forEach(emp => {
              // const monthlyBasicPay = {
                //   January: 0, February: 0, March: 0, April: 0, May: 0, June: 0
                // }
              let rate = positions.filter(pos => pos.id == emp.employee_Role)
              const monthlyBasicPay = {
                id: emp.id,
                name: `${emp.fName} ${emp.mName} ${emp.lName}`,
                role: rate[0].description,
                rate: {
                  hourly: rate[0].rate,
                  daily: rate[0].rate * 8,
                  monthly: (rate[0].rate * 8) * 26,
                },
                months: {
                  January: 0, February: 0, March: 0, April: 0, May: 0, June: 0,
                },
                hours: {
                  January: 0, February: 0, March: 0, April: 0, May: 0, June: 0
                },
                totalHrs: 0,
                totalBasicPay: 0,
                total: 0
              }
              let totalBasicHr = 0
              periods.forEach(per => {
                let data = (per.data) ? JSON.parse(atob(per.data)) : []
                let empData = data.filter(d => d.id == emp.id)
                if(empData.length > 0){
                  console.log(empData[0].gross)
                  totalBasicHr += empData[0].gross.basicHr
                  // console.log(empData)
                  monthlyBasicPay.months[dayjs(per.from).format('MMMM')] += empData[0].gross.basicPay
                  monthlyBasicPay.hours[dayjs(per.from).format('MMMM')] += empData[0].gross.basicHr
                }else{

                }
              })

              let monthOutput = ''
              Object.entries(monthlyBasicPay.months).forEach(([x, y]) => {
                monthOutput += `<td>&#8369;${y.toLocaleString("en-US", optionLocaleString)}</td>`
              })
              monthlyBasicPay.totalHrs = Object.values(monthlyBasicPay.hours).reduce((x, y) => {
                return x + y
              }, 0)
              monthlyBasicPay.totalBasicPay = Object.values(monthlyBasicPay.months).reduce((x, y) => {
                return x + y
              }, 0)
              monthlyBasicPay.total = monthlyBasicPay.totalBasicPay / 6
              
              output += `
              <tr>
                <td>${emp.id}</td>
                <td>${emp.fName} ${emp.mName} ${emp.lName}</td>
                <td>&#8369;${(rate[0].rate).toLocaleString("en-US")}</td>
                <td>${monthlyBasicPay.totalHrs}</td>
                ${monthOutput}
                <td>&#8369;${monthlyBasicPay.total.toLocaleString("en-US", optionLocaleString)}</td>
              </tr>`
              allDataa.push({
                name: `${emp.fName} ${emp.mName} ${emp.lName}`,
                rate: rate[0].rate,
                "Total hrs": monthlyBasicPay.totalHrs,
                January: monthlyBasicPay.months.January, 
                February: monthlyBasicPay.months.February,
                March: monthlyBasicPay.months.March,
                April: monthlyBasicPay.months.April,
                May: monthlyBasicPay.months.May,
                June: monthlyBasicPay.months.June,
                Total: monthlyBasicPay.total.toLocaleString("en-US", optionLocaleString)
              })
              allData.push(monthlyBasicPay)

            })
            }else{
              let eData = JSON.parse(atob(onselect[0].data))

              eData.forEach(data => {
                let monthOutput = ''
                Object.values(data.months).forEach(month => {
                  monthOutput += `<td>&#8369;${month.toLocaleString("en-US", optionLocaleString)}</td>`
                })
                output += `
                <tr>
                  <td>${data.id}</td>
                  <td>${data.name}</td>
                  <td>&#8369;${data.rate.hourly}</td>
                  <td>${data.totalHrs}</td>
                  ${monthOutput}
                  <td>&#8369;${data.total.toLocaleString("en-US", optionLocaleString)}</td>
                </tr>`
                // console.log(data.months)
                allDataa.push({
                  name: data.name,
                  rate: data.rate.hourly,
                  "Total hrs": data.totalHrs,
                  January: data.months.January, 
                  February: data.months.February,
                  March: data.months.March,
                  April: data.months.April,
                  May: data.months.May,
                  June: data.months.June,
                  Total: data.total.toLocaleString("en-US", optionLocaleString)
                })
                allData.push(data)
              })
            }

            $('#midYearTable tbody').html(output)
            $('#midYearTable').DataTable()
          }
          else if(month_period == 1 || month_period == 2){

            let deductions = await getData('deductioninfo')
            let overtimes = await getData('overtime', from, to)
            let cash_advances = await getData('cashadvance', from, to)
            let cash_advances_total = await getData('cashadvance_total')
            let holidays = await getData('holiday_event', from, to)
            let leaves = await getData('leave_info', from, to)
            let compDeduc = await getData('compensation_deductions', from, to)
            let deduction_charts_data = await fetch('payroll_deduction_chart.php')
            let deduction_charts = await deduction_charts_data.json()
            console.log(compDeduc)
            let instance = []
            let output = ''
            if(status == 0){
              employees.forEach((employee, index) => {
                
                // let empAttendance = attendance.filter(att => att.employee_id == employee.id) 
                let empAttendance = attendance.filter(att => att.Employee_ID == employee.id) 
                
                let empCompDeduc = compDeduc.filter(cd => cd.employee_id == employee.id)
                let empOvertime = overtimes.filter(ot => ot.employee_id == employee.id)           
                let pos = positions.filter(pos => pos.id == employee.employee_Role)  
                let role = pos[0].description
                let rate = pos[0].rate
                let empLeave = leaves.filter(leave => leave.employee_id == employee.id)
              let empDeductionsList = deductions.filter(deduc => deduc.employee_id == employee.id)
              
              let empDeductions = {
                SSS: empDeductionsList[0].SSS,
                PagIbig: empDeductionsList[0].Philhealth,
                PhilHealth: empDeductionsList[0].Pagibig,
              }
              
              let empCashAdvance = cash_advances_total.filter(ca => ca.employee_id == employee.id)
              let emp_first_period_data = []
              if(month_period == 2){
                if(first_period.length > 0){
                  first_period_data = JSON.parse(atob(first_period[0].data))
                  emp_first_period_data = first_period_data.filter(firstPeriod => firstPeriod.id == employee.id)
                }
                // console.log(emp_first_period_data)
              }
              
              let instance = new Payroll(employee.id, empAttendance, empOvertime, rate, empLeave, holidays, empDeductions, empCashAdvance, employee.date_added, deduction_charts, month_period, emp_first_period_data, empCompDeduc)
              
              // console.log(instance.basicPay)
              console.log(instance.compensations)
              console.log(instance.compensationsList)


              let colorGross = '', colorNetpay = ''
              colorGross = instance.totalGross < 0 ? 'danger' : 'success'
              colorNetpay = instance.netpay < 0 ? 'danger' : 'success'
              // console.log(instance.basicHr)

              output += `
              <tr>
              <td>${employee.id}</td>
              <td>${employee.lName} ${employee.fName} ${employee.mName}</td>
              <td>${instance.noOfDays}</td> 
              <td class='details'>&#8369;${instance.rate}</td>
              <td>${instance.otHrs}</td>
              <td>${instance.totalWorkingHrs}</td>
              <td class='details'>${instance.noOfLeave}</td>
              <td class='details'>&#8369;${instance.leaveTotal.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>${instance.noOfHolidays}</td>
              <td class='details'>&#8369;${instance.holidaysTotal.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>&#8369;${instance.compensations.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>&#8369;${instance.cashAdvance.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>&#8369;${instance.SSS.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>&#8369;${instance.Philhealth.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>&#8369;${instance.Pagibig.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>&#8369;${instance.withHoldingTax.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='details'>&#8369;${instance.deductions.toLocaleString("en-US", optionLocaleString)}</td>
              <td>&#8369;${instance.totalDeductions.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='text-${colorGross}'>&#8369;${instance.totalGross.toLocaleString("en-US", optionLocaleString)}</td>
              <td class='text-${colorNetpay}'>&#8369;${instance.netpay.toLocaleString("en-US", optionLocaleString)}</td>
              `
              const DATA = {
                name: `${employee.fName} ${employee.mName} ${employee.lName}`, 
                id: `${employee.id}`,
                employeeKey: `${employee.employee_key}`,
                date: {
                  from: from,
                  to: to
                },
                role: role,
                rate: {
                  monthly: (instance.rate*8) * 26,
                  daily: instance.rate * 8,
                  hourly: instance.rate
                },
                IDs: {
                  SSS: employee.SSS,
                  PagIbig: employee.Pagibig,
                  PhilHealth: employee.PhilHealth
                },
                compensation: {
                  total: instance.compensations,
                  list: instance.compensationsList
                },
                ERShare: {
                  SSS: instance.SSSER,
                  pagIbig: instance.PagibigER
                },
                otherDeduction: {
                  total: instance.deductions,
                  list: instance.deductionsList
                },
                deduction: {
                  SSS: instance.SSS,
                  PagIbig: instance.Pagibig,
                  PhilHealth: instance.Philhealth,
                  CashAdvance: {qty: 2, amount: instance.cashAdvance},
                  withHoldingTax: instance.withHoldingTax,
                  other: 0
                },
                gross: {
                  presentDays: {qty: instance.noOfDays, amount: instance.regularTotal},
                  basicPay: instance.basicPay,
                  basicHr: instance.basicHr,
                  overtime: {qty: instance.otHrs, amount: instance.otTotal},
                  holidays: {qty: instance.noOfHolidays, amount: instance.holidaysTotal},
                  leave: {qty: instance.noOfLeave, amount: instance.leaveTotal},
                  totalWorkHr: instance.totalWorkingHrs
                },
                total: {
                  gross: instance.totalGross,
                  deduction: instance.totalDeductions,
                  net: instance.netpay,
                }
              }
              // console.log(DATA)
              
              // console.log(DATA)
              allData.push(DATA)
              allDataa.push({
                id: `${employee.id}`,
                name: `${employee.fName} ${employee.mName} ${employee.lName}`, 
                rate: instance.rate, 
                "OT hrs": instance.otHrs,
                "total hrs": instance.totalWorkingHrs,
                "No of Leave": instance.noOfLeave,
                "Paid Leave": instance.leaveTotal,
                "No of Holiday:": instance.noOfHolidays,
                "Holiday": instance.holidaysTotal,
                "Compensation": instance.compensations,
                "Cash Advance": instance.cashAdvance,
                "SSS": instance.SSS,
                "PhilHealth": instance.Philhealth,
                "Pag-ibig": instance.Pagibig,
                "Withholding Tax": instance.withHoldingTax,
                "Other Deductions": instance.deductions,
                "Total Deductions": instance.totalDeductions,
                "Total Gross": instance.totalGross,
                "Net Pay":  instance.netpay
              })
              // console.log(DATA.ERShare)
              let eData = btoa(JSON.stringify(DATA))
              // console.log(eData)
              output += `<td><a href='print.php?data=${eData}' class='btn btn-success d-flex align-items-center gap-1' target='_blank' style="max-width: max-content">
              <div>
              <img src="../img/btn_icons/payslip.png" alt="" style="width: 1.2rem">
              </div>
              <span class="d-flex gap-1"><span>Pay</span><span>Slip</span></span>
              </a></td></tr>`
            })
            // if(month_period == 1){
              $.post('payroll_put_data.php', {data: btoa(JSON.stringify(allData)), id: id}, data => {
                console.log(data) 
              })
              // }
            }else{
              let p_data = JSON.parse(atob(payroll_data))
              // console.log(p_data)
              $('#release-payroll span').html('Already Released')
              p_data.forEach(row_data => {
                // console.log(`${row_data.deduction.cashAdvance}`)
                let colorGross = '', colorNetpay = ''
                colorGross = row_data.total.gross < 0 ? 'danger' : 'success'
                colorNetpay = row_data.total.net < 0 ? 'danger' : 'success'
                
                output += `
                <tr>
                <td>${row_data.id}</td>
                <td>${row_data.name}</td> 
                <td>${row_data.gross.presentDays.qty}</td>
                <td class='details'>&#8369;${row_data.rate.hourly}</td>
                <td>${row_data.gross.overtime.qty}</td>
                <td>${row_data.gross.totalWorkHr}</td>
                <td class='details'>${row_data.gross.leave.qty}</td>
                <td class='details'>&#8369;${row_data.gross.leave.amount.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>${row_data.gross.holidays.qty}</td>
                <td class='details'>&#8369;${row_data.gross.holidays.amount.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>${row_data.compensation.total.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>&#8369;${row_data.deduction.CashAdvance.amount.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>&#8369;${row_data.deduction.SSS.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>&#8369;${row_data.deduction.PhilHealth.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>&#8369;${row_data.deduction.PagIbig.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>&#8369;${row_data.deduction.withHoldingTax.toLocaleString("en-US", optionLocaleString)}</td>
                <td class='details'>&#8369;${row_data.otherDeduction.total.toLocaleString("en-US", optionLocaleString)}</td>
                <td>&#8369;${row_data.total.deduction.toLocaleString("en-US")}</td>
                <td class='text-${colorGross}'>&#8369;${row_data.total.gross.toLocaleString("en-US")}</td>
                <td class='text-${colorNetpay}'>&#8369;${row_data.total.net.toLocaleString("en-US")}</td>
                `
                let eData = btoa(JSON.stringify(row_data))
                allData.push(row_data)
                allDataa.push({
                id: `${row_data.id}`,
                name: `${row_data.name}`, 
                "No of Days": row_data.gross.presentDays.qty,
                rate: row_data.rate.hourly, 
                "OT hrs": row_data.gross.overtime.qty,
                "total hrs": row_data.gross.totalWorkHr,
                "No of Leave": row_data.gross.leave.qty,
                "Paid Leave": row_data.gross.leave.amount.toLocaleString("en-US"),
                "No of Holiday:": row_data.gross.holidays.qty,
                "Holiday": row_data.gross.holidays.amount.toLocaleString("en-US"),
                "Compensation": instance.compensations,
                "Cash Advance": instance.cashAdvance,
                "SSS": row_data.deduction.SSS.toLocaleString("en-US"),
                "PhilHealth": row_data.deduction.PhilHealth.toLocaleString("en-US"),
                "Pag-ibig": row_data.deduction.PagIbig.toLocaleString("en-US"),
                "Withholding Tax": row_data.deduction.withHoldingTax.toLocaleString("en-US"),
                "Other Deductions": row_data.otherDeduction.total.toLocaleString("en-US"),
                "Total Deductions": row_data.total.deduction.toLocaleString("en-US"),
                "Total Gross": row_data.total.gross.toLocaleString("en-US"),
                "Net Pay":  row_data.total.net.toLocaleString("en-US")
              })
                output += `<td><a href='print.php?data=${eData}' class='btn btn-success d-flex align-items-center' style="max-width: max-content" target='_blank'>
                <div>
                  <img src="../img/btn_icons/payslip.png" alt="" style="width: 1.2rem">
                </div>
                <span class="d-flex gap-1"><span>Pay</span><span>Slip</span></span>
                </a>
                </td></tr>`
              })
            }
            document.querySelector('tbody').innerHTML = output
            
            
            table = $('#table-payroll').DataTable({
              "order": [],
              "pageLength": 50,
              "columnDefs": [
                {className: "detail", "targets": [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]}
              ]
            })

            // $('.detail').hide() 
            // $('#show-details').change(()=>{
            //     // alert('asd') class='tools'
            //     $('.detail').toggle() 
            //   })
              // table.destroy()
              // table = $('#table-payroll').DataTable({
                // scrollY:        "300px",
                // scrollX:        true,
                // scrollCollapse: true,
                // paging:         false,
                // fixedColumns:   {
            //     left: 0
            // }
            // }) 
            
            // table.destroy()
            // $('#table-payroll').DataTable({
              //   "columnDefs": [
                //     {className: "detail", "targets": [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]}
                //   ]
                // })     
                // $('.details').hide() 
                // $('#show-detail').change(()=>{
                  //   // alert('asd') class='tools'
                  //   $('.details').toggle() 
                  // })
            }
          }

        async function getData(table = 'employeelist', from = '', to = '') {
          let formData = new FormData()
          formData.append('table', table)
          formData.append('from', from)
          formData.append('to', to)
          
          let data = await fetch('payroll_getinfo.php', {
            method: 'post',
            body: formData
          })
          
          return data.json()
        }

    class Payroll{
      constructor(id = 0, attendance, ot, rate, leave, holidays, deductions, cashAdvance, dateAdded, taxes, month_period, first_period, compDeduc){
        this.id = id
        this.attendance = attendance
        this.overtime = ot
        this.rate = parseFloat(rate).toFixed(2)
        this.leave = leave
        this.holidays = holidays
        this.deduc = deductions
        this.ca = cashAdvance
        this.dateAdded = dateAdded
        this.taxes = taxes
        this.first_period_data = first_period
        this.firstPeriodData = this.first_period_data[0]
        this.month_period = month_period
        this.compDeduc = compDeduc
      }
      get noOfDays(){
        return this.attendance.length
      }
      get basicPay(){
        return this.regularTotal
      }
      get basicHr(){
        let time_hr = this.attendance.map(att => att.total_hr)
        return  Math.floor(time_hr.reduce((current, prev) => {
          return Math.floor(parseFloat(current)) + Math.floor(parseFloat(prev))
        }, 0))
      }
      
      get monthlyGross(){
        if(this.first_period_data.length < 1){
          return 0 + this.totalGross
        }
        return this.firstPeriodData.total.gross + this.totalGross
      }
      // gross
      get workingHr(){
        let time_hr = this.attendance.map(att => att.total_hr)
        return  Math.floor(time_hr.reduce((current, prev) => {
          return Math.floor(parseFloat(current)) + Math.floor(parseFloat(prev))
        }, 0))
        // return Math.floor(working_hr)
      }
      get regularTotal(){
        return parseFloat(this.workingHr) * parseFloat(this.rate)
      }
      get otHrs(){
        let ot_hrs = this.overtime.map(ot => ot.ot_hr)
        return Math.floor(ot_hrs.reduce((current, prev) => {
          return parseFloat(current) + parseFloat(prev)
        }, 0))
        // return total_hr
      }
      get otTotal(){
        return this.otHrs * this.rate
      }
      get totalWorkingHrs(){
        return (this.workingHr + this.otHrs).toFixed(0)
      }
      get total(){
        return this.otTotal + this.regularTotal
      }
      get noOfLeave(){
        return this.leave.length
      }
      get leaveTotal(){
        return (8 * this.rate) * this.noOfLeave
      }
      get noOfHolidays(){
        // let urHolidays = this.holidays.filter(hol => Date.parse(hol.date) > Date.parse(this.dateAdded))
        return this.holidays.length
      }
      get holidaysTotal(){
        return this.noOfHolidays * (this.rate * 8)
      }
      
      // deductions 
      get cashAdvance(){
        let deduc = 0
        if(this.ca.length > 0){
          let total = this.ca[0].total
          deduc = (parseFloat(total) >= 1000) ? 1000 : this.ca[0].total
        }
        return deduc
      }
      get SSS(){
        if(this.month_period == 1)
          return 0
        else{
          let sss = this.taxes.sss
          let sss_deduc = 0
          sss.forEach(s => {
            if(s.to != 0){
              if(this.monthlyGross >= s.from && this.monthlyGross <= s.to){
                sss_deduc = s.EE
              }
            }else{
              if(this.monthlyGross >= s.from){
                sss_deduc = s.EE
              }
            }
          })  
          return parseFloat(sss_deduc)
        }
      }
      get SSSER(){
        if(this.month_period == 1)
          return 0
        else{
          let sss = this.taxes.sss
          let sss_er = 0
          sss.forEach(s => {
            if(s.to != 0){
              if(this.monthlyGross >= s.from && this.monthlyGross <= s.to){
                sss_er = s.ER
              }
            }else{
              if(this.monthlyGross >= s.from){
                sss_er = s.ER
              }
            }
          })  
          return parseFloat(sss_er)
        }
      }
      
      get Philhealth(){
        if(this.month_period == 1)
          return 0
        else{
          let ph = this.taxes.philhealth[0]
          let ph_deduc = 0
          if(this.monthlyGross > ph.floor && this.monthlyGross < ph.ceil){
            ph_deduc = this.monthlyGross * (ph.rate / 100)
          }else if(this.monthlyGross <= ph.floor){
            ph_deduc = 400
          }else{
            ph_deduc = 3200
          }

          return parseFloat(ph_deduc)
        }
      }

      get Pagibig(){
        if(this.month_period == 1)
          return 0
        else{
          let pi = this.taxes.pagibig
          let pi_deduc = 0
          pi.forEach((p, i) => {
            if(p.to != 0){
              if(this.monthlyGross >= p.from && this.monthlyGross <= p.to){
                pi_deduc = this.monthlyGross * (p.EE / 100)
              }
            }else{
              if(this.monthlyGross >= p.from){
                pi_deduc = this.monthlyGross * (p.EE / 100)
              }
            }
          })
          return (pi_deduc > 100) ? 100 : pi_deduc
        } 
      }
      get PagibigER(){
        if(this.month_period == 1)
          return 0
        else{
          let pi = this.taxes.pagibig
          let pi_deduc = 0
          pi.forEach((p, i) => {
            if(p.to != 0){
              if(this.monthlyGross >= p.from && this.monthlyGross <= p.to){
                pi_deduc = this.monthlyGross * (p.ER / 100)
              }
            }else{
              if(this.monthlyGross >= p.from){
                pi_deduc = this.monthlyGross * (p.ER / 100)
              }
            }
          })
          return (pi_deduc > 100) ? 100 : pi_deduc
        } 
      }

      // finals
      get withHoldingTax(){
        let withHoldingTax = 0
        let taxes = this.taxes.tax
        taxes.forEach(tax => {
          if(tax.to != 0){
            if(this.totalGross >= tax.from && this.totalGross <= tax.to){
              withHoldingTax = ((this.totalGross - tax.from) * (tax.percentage / 100)) + parseFloat(tax.amount_deduction)
            }
          }
          else{
            if(this.totalGross > tax.from){
              withHoldingTax = ((this.totalGross - tax.from) * (tax.percentage / 100)) + parseFloat(tax.amount_deduction)
            }
          }
        })

        return withHoldingTax
      }

      get deductions(){
        if(this.month_period == 1){
          return 0
        }
        let deductions = this.compDeduc.filter(cd => cd.type == 2)
        let total = deductions.reduce((x, y) => {
          return x + parseFloat(y.monthly_total)
        }, 0)
        return total
      }
      get deductionsList(){
        if(this.month_period == 1){
          return []
        }
        let compensations = this.compDeduc.filter(cd => cd.type == 2)
        let list = compensations.map(c => {
          return {description: c.description, amount: c.monthly_total}
        })
        return list
      }

      get compensations(){
        if(this.month_period == 1){
          return 0
        }
        let compensations = this.compDeduc.filter(cd => cd.type == 1)
        let total = compensations.reduce((x, y) => {
          return x + parseFloat(y.monthly_total)
        }, 0)
        return total
      }

      get compensationsList(){
        if(this.month_period == 1){
          return []
        }
        let compensations = this.compDeduc.filter(cd => cd.type == 1)
        let list = compensations.map(c => {
          return {description: c.description, amount: c.monthly_total}
        })
        return list
      }

      get totalGross(){
        return (this.total + this.holidaysTotal + this.leaveTotal + this.compensations)
        // return (this.total + this.leaveTotal).toFixed(2)
      }
      get totalDeductions(){
        return this.SSS + this.Philhealth + this.Pagibig + parseFloat(this.cashAdvance) + parseFloat(this.withHoldingTax) + this.deductions
      }
      get netpay(){
        return (this.totalGross - this.totalDeductions)
      }
    }
  </script>
</body>
</html>