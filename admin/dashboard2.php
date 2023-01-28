<?php
  include 'session/check_session.php';
  include '../connect.php';
  include '../timezone.php';
  include '../scripts.php';
  include 'sidebar.html';

  if(isset($_SESSION['year'])){
    $year_count = $_SESSION['year'];
    unset($_SESSION['year']);
  }else{
    $year_count = date('Y');
  }

  $year_filter = date('Y');

  $sql = "SELECT * FROM employeelist";
  $query = $con->query($sql);
  $totalEmp = $query->num_rows;

  $sql = "SELECT * FROM positions WHERE `status`='1'";
  $query = $con->query($sql);
  $totalPos = $query->num_rows;
  $positionss = '[';
  $positionData = '[';
  while($positions = $query->fetch_assoc()){
    $positionss .= "'".$positions['description']."', ";
    $posId = $positions['id'];
    $sqlPos = "SELECT * FROM employeelist WHERE employee_role = '$posId' AND `employee_status`='Active'";
    $queryPos = $con->query($sqlPos);
    $positionData.= $queryPos->num_rows.", ";
  }
  $positionss.=']';
  $positionData.=']';

  $workType = ['Full-time', 'Part-time'];
  $workTypeData = [];
  foreach ($workType as $type) {
    $sqlWorkType = "SELECT * FROM employeelist WHERE workType = '$type' AND `employee_status`='Active'";
    $queryWorkType = $con->query($sqlWorkType);
    $workTypeData[$type] = $queryWorkType->num_rows;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../node_modules/chart.js/dist/chart.js"></script>
  <title>Chateau - Dashboard</title>
  <style>
    .hide-taskbar {
      max-width: 0px;
    }
  </style>
</head>
<body class='d-flex bg-secondary bg-opacity-10 position-relative'>
  <main class='container-fluid p-4 overflow-auto position-relative'>
    <!-- <div>
      button
    </div> -->
    </header>
    <header class='d-flex align-items-center justify-content-between'>
      <div class="d-flex gap-2 align-items-center">
        <!-- <button id="hide-taskbar">sidebar</button> -->
        <p class='fs-2 p-0'>Dashboard</p>
      </div>
      <small class='fw-semibold text-dark'>
        Home > Dashboard
      </small>
    </header> 
    
    <div id="">
      <div class="row gap-3 ms-1">
      <div class="bg-body shadow-sm rounded-1 col-12 col-sm-5 col-md-4 col-xl-2 pt-3 ps-0 pe-0 pb-0">
          <p class="ps-3 fs-6 text-dark m-0">Total Employees</p>
          <h3 class='ps-3'><?php echo $totalEmp?></h3>
          <!-- <div class="py-1 ps-3 bg-secondary bg-opacity-10">More Info</div>ss -->
        </div>
        <div class="bg-body shadow-sm rounded-1 col-12 col-sm-5 col-md-4 col-xl-2 p-3">
          <p class="fs-6 text-dark m-0">Number of Role</p>
          <h3><?php echo $totalPos?></h3>
        </div>
        <div class="d-none bg-body shadow-sm rounded-1 col-2 p-3">
          <p class="fs-6 text-dark m-0">Number of Schedules</p> 
          <h3><?php
                $sql = "SELECT * FROM schedules";
                if($query = $con->query($sql)){
                  echo $query->num_rows;
                } 
                ?></h3>
        </div>
        <div class="bg-body shadow-sm rounded-1 col-12 col-lg-6 p-3">
          <div class="d-flex align-items-center justify-content-between">
            <p class="fs-6 text-dark m-0 align-self-start mb-2">Payroll Information</p> 
            <div class="d-flex align-items-center gap-3 me-2">
              <!-- <input type="text" name="payroll-date" id="payroll-date" class="form-control text-end border-0 shadow-none" style='min-width: 300px'> -->
              <p>Current Period: <span id="period" class="">Oct 10, 2022 - Oct 24, 2022</span></p>
            </div>
          </div>
            <main class='row'>
              <div class="total-gross col-4">
                <p class="fs-6 text-dark m-0">Total Gross</p>  
                <h3 class=''>&#8369;<span id="gross"></span></h3>
              </div>
              <div class="deductions col-4">
                <p class="fs-6 text-dark m-0">Deductions</p>
                <h3 class=''>&#8369;<span id="deduction"></span></h3>
              </div>
              <div class="net-pay col-4">
                <p class="fs-6 text-dark m-0">Net Pay</p>
                <h3>&#8369;<span id="netpay"></span></h3>
              </div>
              <!-- <div class="deductions col-auto  d-flex align-items-center justify-content-center" style=''>
                <button class="btn btn-success py-1" onclick='location.href = "payroll_management.php"'>run payroll</button>
              </div> -->
            </main>
        </div>
        <div class=" rounded-1 col-auto">
          <p class="fs-6 text-dark m-0 ">Next Pay-day</p> 
          <div class="p-2 bg-success rounded-2">
            <div class="p4 text- bg-white rounded-1 text-center">
              <h1 id = 'nextPayDay-date'></h1>
            </div>
            <div class="p-0 bg-white rounded-1 text-center">
              <p id = 'nextPayDay-month' class='m-0 p-0 fs-6'></p>
            </div>
          </div>
        </div>
      </div> 
      
      <div class="row gap-3 ms-0 mt-3">
        <div class="bg-body shadow-sm rounded-2 col-12 col-md-5 col-xl-6 pt-3 p-1 m-0 position-relative overflow-hidden p-4 d-flex" id='' >
        <div style="height: 170px; width: 50%">
          <canvas id="employee-status" width="" height=""></canvas>
        </div>
        <div style="height: 170px; width: 50%">
          <canvas id="workType" width="" height=""></canvas>
        </div>
        </div>
        
        <div class="bg-body shadow-sm rounded-2 col-12 col-md-5 col-xl-3 p-1 pt-3 m-0 position-relative overflow-hidden p-4" id='' style="height: 210px" >
          <canvas id="rolePercentage" width="" height=""></canvas>
        </div>
        
        <!-- <div class="bg-body shadow-sm rounded-2 col-12 col-md-5 col-xl-3 pt-3 p-1 m-0 position-relative overflow-hidden p-4" id='' style="height: 210px">
        </div> -->

        <div class="col-12 col-md-5 col-xl-2 p-0 gap-3">
          <div class="row gap-3">

            <div class="bg-body shadow-sm col-5 col-md-12 ms-3 rounded-1 p-3 ">
              <p class="fs-6 text-dark m-0">Cash Advance Total</p>
              <h3>&#8369;<?php
                $sql = "SELECT SUM(total) AS 'ca_total' FROM cashadvance_total";
                if($query = $con->query($sql)){
                  $res = $query->fetch_assoc();
                  $ca_total = $res['ca_total'];
                  
                  echo number_format($ca_total);
                } 
                ?></h3>
          </div>

          <div class="bg-body shadow-sm col-5 col-md-12 ms-3 rounded-1 p-3 ">
            <p class="fs-6 text-dark m-0">Total Holidays</p>
            <h3><?php
                $sql = "SELECT * FROM holiday_event WHERE year(start) = '$year_filter'";
                if($query = $con->query($sql)){
                  echo $query->num_rows;
                } 
                ?></h3>
          </div>
        </div>
      </div>
      </div>
      
      <div class="bg-white mt-3 rounded-1 p-4 position-relative d-none" style="">
        <div class="d-flex justify-content-end position-absolute top-0 end-0">
          <label for="year" class='my-3 mt-4'>Select a year: </label>
          <select name="year" id="year-att" class='my-3 me-4 form-select' style='width: min-content'>
          <?php
            for($x = 2015; $x <= 2059; $x++){
              if($x == $year_count){
                echo '<option selected value = "'.$x.'">'.$x.'</button>';
              }else{
                echo '<option value = "'.$x.'">'.$x.'</button>';
              }
            }
            ?>
          </select>
        </div>
        <div id="" class='overflow-hidden' style="height: 400px" >
          <canvas id="monthlyAtt"></canvas>
        </div>
      </div>
    </div>
  </main>
  <?php
      $empStat = ['Active', 'In-active'];
      $empStatus = [];
      foreach ($empStat as $stat) {
        $sql = "SELECT * FROM employeelist WHERE employee_status = '$stat' ";
        if($query = $con->query($sql)){
            $empStatus[$stat] = $query->num_rows;
        }  
      }


      

  ?>

<?php
  $month = [
    1=>'January',2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July', 8=>'August',
    9=>'September', 10=>'October', 11=>'November', 12=>'December'
  ];
  $ontime = "[";
  $late = "[";
  foreach ($month as $key => $value) {
    $sql = "SELECT * FROM attendance_csv where YEAR(date) = '$year_count' AND MONTH(date) = '$key' AND status = '1'"; 
    $result = $con->query($sql);
    $late .= $result->num_rows. ", ";

    $sql = "SELECT * FROM attendance_csv where YEAR(date) = '$year_count' AND MONTH(date) = '$key' AND status = '0'"; 
    $result = $con->query($sql);
    $ontime .= $result->num_rows.", ";
  }
  $late .= ']';
  $ontime .= ']';
  ?>
  <script type="text/javascript">

    // $('#hide-taskbar').click(e=>{
    //   $('#side-bar').toggleClass('hide-taskbar')
    // })

    const ctx = document.getElementById('employee-status');
    const myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: ['Active', 'In-Active'],
          datasets: [{
              data: [<?php echo $empStatus['Active']; ?>, <?php echo $empStatus['In-active']; ?>],
              backgroundColor: [
                '#6CB4EE',
                'rgba(255, 99, 132, 1)',
              ],
              // borderColor: [
                // 'rgba(54, 162, 235)',
                // 'rgba(255, 99, 132)'
          // ],
              borderWidth: 1
          }]
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'right',
            },
            title: {
              display: true,
              text: 'Employee Status',
              align: 'start',
              font: {
                size: 14
              },
              padding: {
                bottom: 10
              }
            }
          },
        },
    })

    const rolePercentage = document.getElementById('rolePercentage');
    const rolePercentageChart = new Chart(rolePercentage, {
      type: 'doughnut',
      data: {
          labels: <?php echo $positionss; ?>,
          datasets: [{
              data: <?php echo $positionData; ?>,
              backgroundColor: [
                '#6CB4EE',
                '#17B169',
                '#F0E68C',
                'rgba(255, 99, 132, 1)'

                // 'rgba(255, 99, 132, 1)',
                // 'red',
                // 'green'
              ],
              borderWidth: 1
          }]
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'right',
            },
            title: {
              display: true,
              text: 'Roles',
              align: 'start',
              font: {
                size: 14
              },
              padding: {
                bottom: 10
              }
            }
          },
        },
    })

    const workType = document.getElementById('workType');
    const workTypeChart = new Chart(workType, {
      type: 'doughnut',
      data: {
          labels: ['Full-time', 'Part-time'],
          datasets: [{
              data: [<?php echo $workTypeData['Full-time'] ?>, <?php echo $workTypeData['Part-time'] ?>] ,
              backgroundColor: [
                '#6CB4EE',
                '#F0E68C',
              ],
              borderWidth: 1
          }]
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'right',
            },
            title: {
              display: true,
              text: ' ',
              align: 'start',
              font: {
                size: 14
              },
              padding: {
                bottom: 10
              }
            }
          },
        },
    })

    const monthlyAtt = document.getElementById('monthlyAtt');
    const monthlyAttChart = new Chart(monthlyAtt, {
      type: 'bar',
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [
            {
              label: 'On-time',
              backgroundColor: '#17B169',
              data: <?php echo $ontime; ?>
            },
            {
              label: 'late',
              backgroundColor: '#F0E68C',
              data: <?php echo $late; ?>
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            title: {
              display: true,
              text: 'Monthly Attendance Report',
              font: {
                size: 15
              },

              padding: 0
            },

          },
        },
    })

      window.addEventListener('DOMContentLoaded', loadInfo)
      window.addEventListener('DOMContentLoaded', loadPayrollInfo)

      async function loadInfo(){
        // let last_payroll = await getLastPayday()
        let dateNow = moment().format('D')
        let from, to
        let nextPayDay
        if(dateNow >= 15){
          from = moment().format('MMMM 16, YYYY')
          to = moment().endOf('months').format('MMMM DD, YYYY')
          nextPayDay = moment().endOf('months').format('DD')
        }else{
          from = moment().startOf('month').format('MMMM DD, YYYY')
          to = moment().format('MMMM 15, YYYY')
          nextPayDay = moment().endOf('months').format('15')
        }
        $('#period').html(`${from} - ${to}`)
        // let nextPayDay = 0
        // if(moment(last_payroll).format('D') >= 15 ){
        //   nextPayDay = moment(last_payroll).endOf('month')
        // }else{
        //   nextPayDay = 15
        // }

        // let date = moment(last_payroll.data).add(1, 'days')
        // let period = moment(last_payroll.data).add(1, 'days')

        $('#nextPayDay-month').text(moment().format('MMM'))
        $('#nextPayDay-date').text(nextPayDay)
        
        // $('#period').html(`${period.format('MMMM D')} - ${nextPayDay.format('MMMM D')}`)
      }

      // fetching lastpayday date from database
      async function getLastPayday() {
        // let fd = new FormData()
        // fd.append('type', 'last_period')
        // let res = await fetch('dashboard_info.php', {method: 'post', body: fd})
        // return res.json()
      }

      async function loadPayrollInfo(){
        let optionLocaleString = {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          }
        let gross = 0, netpay = 0, deduc = 0

        let month_period = 1
        let dateNow = moment().format('D')
        let from, to
        let from1 , to1
        if(dateNow > 15){
          from = moment().format('YYYY-MM-16')
          to = moment().endOf('months').format('YYYY-MM-DD')
          month_period = 2
          from1 = moment().startOf('month').format('YYYY-MM-DD')
          to1 =  moment().format('YYYY-MM-15')
        }else{
          from = moment().startOf('month').format('YYYY-MM-DD')
          to = moment().format('YYYY-MM-15')
        }
        // console.log(from, to)

        // let employees = await getData()
        // let attendance = await getData('attendance_csv', from, to)
        // let deductions = await getData('deductioninfo')
        // let positions = await getData('positions')
        // let overtimes = await getData('overtime', from, to)
        // let cash_advances = await getData('cashadvance', from, to)
        // let cash_advances_total = await getData('cashadvance_total')
        // let holidays = await getData('holiday_event', from, to)
        // let leaves = await getData('leave_info', from, to)
        let period_info = await getData('payroll_info')
        let employees = await getData()
        let attendance = await getData('attendance_csv', from, to)
        let positions = await getData('positions')
        let deductions = await getData('deductioninfo')
        let overtimes = await getData('overtime', from, to)
        let cash_advances = await getData('cashadvance', from, to)
        let cash_advances_total = await getData('cashadvance_total')
        let holidays = await getData('holiday_event', from, to)
        let leaves = await getData('leave_info', from, to)
        let compDeduc = await getData('compensation_deductions', from, to)
        let deduction_charts_data = await fetch('payroll_deduction_chart.php')
        let deduction_charts = await deduction_charts_data.json()
        
        // employees.forEach(employee => {
        //   let empAttendance = attendance.filter(att => att.Employee_ID == employee.id) 

        //   let empOvertime = overtimes.filter(ot => ot.employee_id == employee.id)           
        //   let pos = positions.filter(pos => pos.id == employee.employee_Role)  
        //   let role = pos[0].description
        //   let rate = pos[0].rate
        //   let empLeave = leaves.filter(leave => leave.employee_id == employee.id)
        //   let empDeductionsList = deductions.filter(deduc => deduc.employee_id == employee.id)

        //   let empDeductions = {
        //     SSS: empDeductionsList[0].SSS,
        //     PagIbig: empDeductionsList[0].Philhealth,
        //     PhilHealth: empDeductionsList[0].Pagibig,
        //   }

        //   let empCashAdvance = cash_advances_total.filter(ca => ca.employee_id == employee.id)

        //   let instance = new Payroll(employee.id, empAttendance, empOvertime, rate, empLeave, holidays, empDeductions, empCashAdvance, employee.date_added)

        //   gross += instance.totalGross
        //   netpay += instance.netpay
        //   deduc += instance.totalDeductions
        // })

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
          let first_period = period_info.filter(p => p.from == from1 && p.to == to1)
          // console.log(first_period)
          if(first_period.length > 0){
            first_period_data = JSON.parse(atob(first_period[0].data))
            emp_first_period_data = first_period_data.filter(firstPeriod => firstPeriod.id == employee.id)
          }
          // console.log(emp_first_period_data)
        }

        
        let instance = new Payroll(employee.id, empAttendance, empOvertime, rate, empLeave, holidays, empDeductions, empCashAdvance, employee.date_added, deduction_charts, month_period, emp_first_period_data, empCompDeduc)

        // console.log(instance.netpay)
        console.log(instance.totalGross)
        gross += instance.totalGross
        deduc += instance.totalDeductions
        netpay += instance.netpay
      })

        // let grossStr = gross.toLocaleString("en-US", optionLocaleString)
        // let netpayStr = netpay.toLocaleString("en-US", optionLocaleString)
        // let deducStr = deduc.toLocaleString("en-US", optionLocaleString)
        $('#gross').html(gross.toLocaleString("en-US", optionLocaleString))
        $('#netpay').html(netpay.toLocaleString("en-US", optionLocaleString))
        $('#deduction').html(deduc.toLocaleString("en-US", optionLocaleString))
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

      $('#year-att').change(e => {
        location.href = `dashboard_getinfo.php?year=${e.currentTarget.value}`
      })
      

        // class Payroll{
        //   constructor(id = 0, attendance, ot, rate, leave, holidays, deductions, cashAdvance, dateAdded){
        //     this.id = id
        //     this.attendance = attendance
        //     this.overtime = ot
        //     this.rate = parseFloat(rate).toFixed(2)
        //     this.leave = leave
        //     this.holidays = holidays
        //     this.deduc = deductions
        //     this.ca = cashAdvance
        //     this.dateAdded = dateAdded
        //   }
        //   get noOfDays(){
        //     return this.attendance.length
        //   }

        //   // gross
        //   get workingHr(){
        //     let time_hr = this.attendance.map(att => att.time_hr)
        //     return  Math.floor(time_hr.reduce((current, prev) => {
        //       return parseFloat(current) + parseFloat(prev)
        //     }, 0))
        //     // return Math.floor(working_hr)
        //   }
        //   get regularTotal(){
        //     return this.workingHr * this.rate
        //   }
        //   get otHrs(){
        //     let ot_hrs = this.overtime.map(ot => ot.ot_hr)
        //     return Math.floor(ot_hrs.reduce((current, prev) => {
        //       return parseFloat(current) + parseFloat(prev)
        //     }, 0))
        //     // return total_hr
        //   }
        //   get otTotal(){
        //     return this.otHrs * this.rate
        //   }
        //   get totalWorkingHrs(){
        //     return (this.workingHr + this.otHrs).toFixed(2)
        //   }
        //   get total(){
        //     return this.otTotal + this.regularTotal
        //   }
        //   get noOfLeave(){
        //     return this.leave.length
        //   }
        //   get leaveTotal(){
        //     return (8 * this.rate) * this.noOfLeave
        //   }
        //   get noOfHolidays(){
        //     // let urHolidays = this.holidays.filter(hol => Date.parse(hol.date) > Date.parse(this.dateAdded))
        //     return this.holidays.length
        //   }
        //   get holidaysTotal(){
        //     return this.noOfHolidays * (this.rate * 8)
        //   }

        //   deductions 
        //   get cashAdvance(){
        //     let deduc = 0
        //     if(this.ca.length > 0){
        //       let total = this.ca[0].total
        //       deduc = (parseFloat(total) >= 1000) ? 1000 : this.ca[0].total
        //     }
        //     return deduc
        //   }
        //   get SSS(){return parseFloat(this.deduc.SSS)}
        //   get Philhealth(){return parseFloat(this.deduc.PhilHealth)}
        //   get Pagibig(){return parseFloat(this.deduc.PagIbig)}

        //   // finals
        //   get totalGross(){
        //     return (this.total + this.holidaysTotal + this.leaveTotal)
        //     // return (this.total + this.leaveTotal).toFixed(2)
        //   }
        //   get totalDeductions(){
        //     return (this.SSS + this.Philhealth + this.Pagibig + parseFloat(this.cashAdvance))
        //   }
        //   get netpay(){
        //     return (this.totalGross - this.totalDeductions)
        //   }
        // }
    
    // class Payroll{
    //   constructor(id = 0, attendance, ot, rate, leave, holidays, deductions, cashAdvance, dateAdded, taxes, month_period, first_period, compDeduc){
    //     this.id = id
    //     this.attendance = attendance
    //     this.overtime = ot
    //     this.rate = parseFloat(rate).toFixed(2)
    //     this.leave = leave
    //     this.holidays = holidays
    //     this.deduc = deductions
    //     this.ca = cashAdvance
    //     this.dateAdded = dateAdded
    //     this.taxes = taxes
    //     this.first_period_data = first_period
    //     this.firstPeriodData = this.first_period_data[0]
    //     this.month_period = month_period
    //     this.compDeduc = compDeduc
    //   }
    //   get noOfDays(){
    //     return this.attendance.length
    //   }
    //   get basicPay(){
    //     return this.regularTotal
    //   }
    //   get basicHr(){
    //     let time_hr = this.attendance.map(att => att.total_hr)
    //     return  Math.floor(time_hr.reduce((current, prev) => {
    //       return Math.floor(parseFloat(current)) + Math.floor(parseFloat(prev))
    //     }, 0))
    //   }
      
    //   get monthlyGross(){
    //     if(this.first_period_data.length < 1){
    //       return 0 + this.totalGross
    //     }
    //     return this.firstPeriodData.total.gross + this.totalGross
    //   }
    //   // gross
    //   get workingHr(){
    //     let time_hr = this.attendance.map(att => att.total_hr)
    //     return  Math.floor(time_hr.reduce((current, prev) => {
    //       return Math.floor(parseFloat(current)) + Math.floor(parseFloat(prev))
    //     }, 0))
    //     // return Math.floor(working_hr)
    //   }
    //   get regularTotal(){
    //     return parseFloat(this.workingHr) * parseFloat(this.rate)
    //   }
    //   get otHrs(){
    //     let ot_hrs = this.overtime.map(ot => ot.ot_hr)
    //     return Math.floor(ot_hrs.reduce((current, prev) => {
    //       return parseFloat(current) + parseFloat(prev)
    //     }, 0))
    //     // return total_hr
    //   }
    //   get otTotal(){
    //     return this.otHrs * this.rate
    //   }
    //   get totalWorkingHrs(){
    //     return (this.workingHr + this.otHrs).toFixed(0)
    //   }
    //   get total(){
    //     return this.otTotal + this.regularTotal
    //   }
    //   get noOfLeave(){
    //     return this.leave.length
    //   }
    //   get leaveTotal(){
    //     return (8 * this.rate) * this.noOfLeave
    //   }
    //   get noOfHolidays(){
    //     // let urHolidays = this.holidays.filter(hol => Date.parse(hol.date) > Date.parse(this.dateAdded))
    //     return this.holidays.length
    //   }
    //   get holidaysTotal(){
    //     return this.noOfHolidays * (this.rate * 8)
    //   }
      
    //   // deductions 
    //   get cashAdvance(){
    //     let deduc = 0
    //     if(this.ca.length > 0){
    //       let total = this.ca[0].total
    //       deduc = (parseFloat(total) >= 1000) ? 1000 : this.ca[0].total
    //     }
    //     return deduc
    //   }
    //   get SSS(){
    //     if(this.month_period == 1)
    //       return 0
    //     else{
    //       let sss = this.taxes.sss
    //       let sss_deduc = 0
    //       sss.forEach(s => {
    //         if(s.to != 0){
    //           if(this.monthlyGross >= s.from && this.monthlyGross <= s.to){
    //             sss_deduc = s.EE
    //           }
    //         }else{
    //           if(this.monthlyGross >= s.from){
    //             sss_deduc = s.EE
    //           }
    //         }
    //       })  
    //       return parseFloat(sss_deduc)
    //     }
    //   }
    //   get SSSER(){
    //     if(this.month_period == 1)
    //       return 0
    //     else{
    //       let sss = this.taxes.sss
    //       let sss_er = 0
    //       sss.forEach(s => {
    //         if(s.to != 0){
    //           if(this.monthlyGross >= s.from && this.monthlyGross <= s.to){
    //             sss_er = s.ER
    //           }
    //         }else{
    //           if(this.monthlyGross >= s.from){
    //             sss_er = s.ER
    //           }
    //         }
    //       })  
    //       return parseFloat(sss_er)
    //     }
    //   }
      
    //   get Philhealth(){
    //     if(this.month_period == 1)
    //       return 0
    //     else{
    //       let ph = this.taxes.philhealth[0]
    //       let ph_deduc = 0
    //       if(this.monthlyGross > ph.floor && this.monthlyGross < ph.ceil){
    //         ph_deduc = this.monthlyGross * (ph.rate / 100)
    //       }else if(this.monthlyGross <= ph.floor){
    //         ph_deduc = 400
    //       }else{
    //         ph_deduc = 3200
    //       }

    //       return parseFloat(ph_deduc)
    //     }
    //   }

    //   get Pagibig(){
    //     if(this.month_period == 1)
    //       return 0
    //     else{
    //       let pi = this.taxes.pagibig
    //       let pi_deduc = 0
    //       pi.forEach((p, i) => {
    //         if(p.to != 0){
    //           if(this.monthlyGross >= p.from && this.monthlyGross <= p.to){
    //             pi_deduc = this.monthlyGross * (p.EE / 100)
    //           }
    //         }else{
    //           if(this.monthlyGross >= p.from){
    //             pi_deduc = this.monthlyGross * (p.EE / 100)
    //           }
    //         }
    //       })
    //       return (pi_deduc > 100) ? 100 : pi_deduc
    //     } 
    //   }
    //   get PagibigER(){
    //     if(this.month_period == 1)
    //       return 0
    //     else{
    //       let pi = this.taxes.pagibig
    //       let pi_deduc = 0
    //       pi.forEach((p, i) => {
    //         if(p.to != 0){
    //           if(this.monthlyGross >= p.from && this.monthlyGross <= p.to){
    //             pi_deduc = this.monthlyGross * (p.ER / 100)
    //           }
    //         }else{
    //           if(this.monthlyGross >= p.from){
    //             pi_deduc = this.monthlyGross * (p.ER / 100)
    //           }
    //         }
    //       })
    //       return (pi_deduc > 100) ? 100 : pi_deduc
    //     } 
    //   }

    //   // finals
    //   get withHoldingTax(){
    //     let withHoldingTax = 0
    //     let taxes = this.taxes.tax
    //     taxes.forEach(tax => {
    //       if(tax.to != 0){
    //         if(this.totalGross >= tax.from && this.totalGross <= tax.to){
    //           withHoldingTax = ((this.totalGross - tax.from) * (tax.percentage / 100)) + parseFloat(tax.amount_deduction)
    //         }
    //       }
    //       else{
    //         if(this.totalGross > tax.from){
    //           withHoldingTax = ((this.totalGross - tax.from) * (tax.percentage / 100)) + parseFloat(tax.amount_deduction)
    //         }
    //       }
    //     })

    //     return withHoldingTax
    //   }

    //   get deductions(){
    //     if(this.month_period == 1){
    //       return 0
    //     }
    //     let deductions = this.compDeduc.filter(cd => cd.type == 2)
    //     let total = deductions.reduce((x, y) => {
    //       return x + parseFloat(y.monthly_total)
    //     }, 0)
    //     return total
    //   }
    //   get deductionsList(){
    //     if(this.month_period == 1){
    //       return []
    //     }
    //     let compensations = this.compDeduc.filter(cd => cd.type == 2)
    //     let list = compensations.map(c => {
    //       return {description: c.description, amount: c.monthly_total}
    //     })
    //     return list
    //   }

    //   get compensations(){
    //     if(this.month_period == 1){
    //       return 0
    //     }
    //     let compensations = this.compDeduc.filter(cd => cd.type == 1)
    //     let total = compensations.reduce((x, y) => {
    //       return x + parseFloat(y.monthly_total)
    //     }, 0)
    //     return total
    //   }

    //   get compensationsList(){
    //     if(this.month_period == 1){
    //       return []
    //     }
    //     let compensations = this.compDeduc.filter(cd => cd.type == 1)
    //     let list = compensations.map(c => {
    //       return {description: c.description, amount: c.monthly_total}
    //     })
    //     return list
    //   }

    //   get totalGross(){
    //     return (this.total + this.holidaysTotal + this.leaveTotal + this.compensations)
    //     // return (this.total + this.leaveTotal).toFixed(2)
    //   }
    //   get totalDeductions(){
    //     return this.SSS + this.Philhealth + this.Pagibig + parseFloat(this.cashAdvance) + parseFloat(this.withHoldingTax) + this.deductions
    //   }
    //   get netpay(){
    //     return (this.totalGross - this.totalDeductions)
    //   }
    // }

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