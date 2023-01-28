<?php
  include '../connect.php';
  include '../scripts.php';
  include 'sidebar.html';
  include '../timezone.php';

 
  $year_filter = date('Y');
  $month_filter = date('m');

  $monthList = [
    'January' => 1,
    'February' => 2,
    'March' => 3,
    'April' => 4,
    'May' => 5,
    'June' => 6,
    'July' => 7,
    'August' => 8,
    'September' => 9,
    'October' => 10,
    'November' => 11,
    'December' => 12
  ];
  $monthOutput = '';
  foreach ($monthList as $key => $value) {
    if($value == $month_filter){
      $monthOutput .= "<option selected value='".$value."'>".$key."</option>";
    }else{
      $monthOutput .= "<option value='".$value."'>".$key."</option>";
    }
  }
  
  $sql = "SELECT DISTINCT EXTRACT(YEAR FROM `from`) as 'year' FROM payroll_info ORDER BY `year` ASC";
  $year_list = '';
  try {
    $query = $con->query($sql);
    while ($row = $query->fetch_assoc()) {
      if($year_filter == $row['year']){
        $year_list .= '<option selected value = "'.$row['year'].'">'.$row['year'].'</option>';
      }else{
        $year_list .= '<option value = "'.$row['year'].'">'.$row['year'].'</option>';
      }
    }
  } catch (\Throwable $th) {
    echo 'Error';
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Generation</title>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
  <div class='main p-4 container-fluid'>
    <header class='d-flex align-items-center justify-content-between'>
      <div class="d-flex gap-2 align-items-center mb-3">
        <p class='fs-2 p-0 m-0'>Report Generation</p>
        <script src="../plugin/FileSaver.js"></script>
        <script src="../plugin/xlsx.full.min.js"></script>
      </div>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Report Generation
        </small>
      </div>
    </header> 
    <div class=" bg-white p-4 rounded-3">

      <div class="justify-content-between">
        <p class="fs-4 p-0 m-0 mb-1">Alphalist</p>
        <div class = 'd-flex gap-1 aling-items-center'>
          <select name="type" id="type" class='form-select' style="width: max-content">
            <option value="1">SSS</option>
            <option value="2">Philhealth</option>
            <option value="3">Pag-ibig</option>
            <option value="4">BIR</option>
          </select>
          <select name="year" id="year" class="form-select shadow-none" style="width: max-content">
            <?php
              echo $year_list
            ?>
          </select>
          <button class = 'btn btn-success rounded-1 d-flex align-items-center gap-1' id ='deduc-download'>
            <div>
              <img src="../img/btn_icons/excel.png" alt="" style="width: 1.2rem">
            </div>
            <span>Download Excel</span>
          </button>
        </div>

        <p class="fs-4 p-0 m-0 mb-1 mt-4">Attendance</p>
        <div class = 'd-flex gap-1 aling-items-center'>
          <select name="year" id="attYearFilter" class="form-select shadow-none" style="width: max-content">
            <?php
              echo $year_list
            ?>
          </select>
          <select name="year" id="attMonthFilter" class="form-select shadow-none" style="width: max-content">
            <?php
              echo $monthOutput
            ?>
          </select>
          <button class = 'btn btn-success rounded-1 d-flex align-items-center gap-1' id ='att-download'>
            <div>
              <img src="../img/btn_icons/excel.png" alt="" style="width: 1.2rem">
            </div>
            <span>Download Excel</span>
          </button>
        </div>

        <!-- <p class="fs-4 p-0 m-0 mb-1 mt-4">Attendance</p>
        <div class = 'd-flex gap-1 aling-items-center'>
          
          <button class = 'btn btn-success rounded-1 d-flex align-items-center gap-1' id ='download'>
            <div>
              <img src="../img/btn_icons/excel.png" alt="" style="width: 1.2rem">
            </div>
            <span>Download Excel</span>
          </button>
        </div> -->

      </div>
      <table class="table table-bordered mt-3 d-none" id = "PagIbigTable">
        <thead>
          <tr>
            <th>Pagibig ID</th>
            <th>Name</th>
            <th>Period Covered</th>
            <th>EE Share</th>
            <th>ER Share</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <script>

    </script>
    <script>
      let optionLocaleString = {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      }
      $('#year').on('change', e => {
        onChange(e.currentTarget.value)
      })
      const EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
      const EXCEL_EXTENSION = '.xlsx';

      $('#deduc-download').click(function(){
        let val = $('#type').val()
        let data = []
        let fileName = ''
        if(val == 3) {
          data = pagIbigAllData
          fileName = 'Pagibig_Alphalist'+yearData
        }else if(val == 1) {
          data = SSSAllData
          fileName = 'SSS_Alphalist'+yearData
        }else if(val == 2) {
          data = philHealthAllData
          fileName = 'PhilHealth_Alphalist'+yearData
        }else if(val == 4) {
          data = BirAllData
          fileName = 'BIR_Alphalist'+yearData
        }

        // excel(data, fileName)
        const wb = XLSX.utils.book_new();
        let ws = XLSX.utils.json_to_sheet(data);
        // ws["!margins"]={left:1.0, right:1.0, top:1.0, bottom:1.0, header:0.5,footer:0.5}
        ws['!protect'] = {objects: false}

        // ws['!cols'].push({ width: 20 })
        // ws['!margins']['left'] = 'wide'
        // wb.Props.Title = "Chataue"
        // ws[!cols] = [
        //   {width: 50},
        //   {width: 50}
        // ]
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        XLSX.writeFile(wb , fileName+".xlsx");
      })

      $('#att-download').click(function(){
        
        let month = dayjs(attMonth).format('MMMM')
        excel(attAllData, `Attendance-${month}-${attYear}`)
      })

      $('#attYearFilter').change(function(e){
        attFilterOnChange()
      })
      $('#attMonthFilter').change(function(e){
        attFilterOnChange()
      })

      function attFilterOnChange(){
        let year = $('#attYearFilter').val()
        let month = $('#attMonthFilter').val()
        // console.log(year, month)
        attOnchange(year, month)
      }


      function excel(data, fileName){
        const worksheet = XLSX.utils.json_to_sheet(data)
        worksheet['!protect'] = {objects: false}
        const workbook = {
          Sheets: {
            'data': worksheet
          },
          SheetNames: ['data']
        }

        const excelBuffer = XLSX.write(workbook, {bookType: 'xlsx', type: 'array'})
        console.log(excelBuffer)
        saveAsExcel(excelBuffer, fileName)
      }

      function saveAsExcel(buffer, filename){
        const data = new Blob([buffer], {type: EXCEL_TYPE})
        saveAs(data, filename)
      }

      
      let yearData 
      
      let pagIbigAllData = []
      let SSSAllData = []
      let philHealthAllData = []
      let BirAllData = []

      let attAllData = []
      let attYear = ''
      let attMonth = ''
      window.addEventListener('DOMContentLoaded', onChange(<?php echo $year_filter; ?>))
      window.addEventListener('DOMContentLoaded', attOnchange('<?php echo $year_filter; ?>', '<?php echo $month_filter; ?>'))

      async function onChange(year){
        pagIbigAllData = []
        SSSAllData = []
        philHealthAllData = []
        BirAllData = []
        yearData = year
        let employees = await getData('employeelist')
        // console.log(employees)
        let payroll_info = await getData('payroll_info')

        let periods = payroll_info.filter(d => dayjs(d.from).format('YYYY') == year && (d.period == 1 || d.period == 2) && d.status == 1)

        let compensationPeriod = payroll_info.filter(d => dayjs(d.from).format('YYYY') == year && (d.period == 3 || d.period == 4) && d.status == 1)
        console.log(compensationPeriod)

        let employeesID = []
        periods.forEach(period => {
          let periodData = JSON.parse(atob(period.data))
          periodData.forEach(pd => {
            if(!employeesID.includes(pd.id)){
              employeesID.push(pd.id)
            }
          })
        });
        // console.log(employeesID)
        employeesID.forEach(id => {
          let empData = employees.filter(emp => emp.id == id)
          let totalpiEE = 0, totalpiER = 0
          let totalsssEE = 0, totalsssER = 0
          let totalPhContribution = 0

          let grossCompensation = 0, basicPay = 0, overtime = 0, paidLeave = 0, holidays = 0, withHoldingTax = 0, 
          compensation = 0, otherDeduction = 0, midYearPay = 0, thirtheenMonthPay = 0

          periods.forEach(period => {
            let periodData = JSON.parse(atob(period.data))
            let empPeriodData = periodData.filter(pd => pd.id == id)
            // console.log(empPeriodData)
            if(empPeriodData.length > 0){
              // Pagibig
              totalpiEE += empPeriodData[0].deduction.PagIbig
              totalpiER += empPeriodData[0].ERShare.pagIbig
              // SSS
              totalsssEE += empPeriodData[0].deduction.SSS
              totalsssER += empPeriodData[0].ERShare.SSS
              // Philhealth
              totalPhContribution += empPeriodData[0].deduction.PhilHealth

              // BIR
              grossCompensation += empPeriodData[0].total.gross
              basicPay += empPeriodData[0].gross.basicPay
              overtime += empPeriodData[0].gross.overtime.amount
              paidLeave += empPeriodData[0].gross.leave.amount
              holidays += empPeriodData[0].gross.holidays.amount
              withHoldingTax += empPeriodData[0].deduction.withHoldingTax
              compensation += empPeriodData[0].compensation.total
              otherDeduction += empPeriodData[0].otherDeduction.total
            }
          })

          compensationPeriod.forEach(compPeriod => {
            let periodData = JSON.parse(atob(compPeriod.data))
            let empPeriodData = periodData.filter(pd => pd.id == id)
            // console.log(empPeriodData[0].total)
            if(empPeriodData.length > 0){     
              if(compPeriod.period == 4){
                midYearPay += empPeriodData[0].total
              }else if(compPeriod.period == 3){
                thirtheenMonthPay += empPeriodData[0].total
              }
            }
            console.log(midYearPay, thirtheenMonthPay)
          })

          const pagIbigData = {
            "Pag-ibig No": empData[0].Pagibig,
            "Last Name": empData[0].lName,
            "First Name": empData[0].fName,
            "Middle Name": empData[0].mName,
            "Period Cover": `01/01/${year} - 12/31/${year}`,
            EE: totalpiEE.toFixed(2),
            ER: totalpiER.toFixed(2),
          }

          const SSSData = {
            "SSS No.": empData[0].SSS,
            "Last Name": empData[0].lName,
            "First Name": empData[0].fName,
            "Middle Name": empData[0].mName,
            "Period Cover": `01/01/${year} - 12/31/${year}`,
            EE: totalsssEE.toFixed(2),
            ER: totalsssER.toFixed(2),
          }

          const philHealthData = {
            "PhilHealth No.": empData[0].PhilHealth,
            "Last Name": empData[0].lName,
            "First Name": empData[0].fName,
            "Middle Name": empData[0].mName,
            "Period Cover": `01/01/${year} - 12/31/${year}`,
            "Premium Contribution": totalPhContribution.toFixed(2),
          }
          const BIRData = {
            "Tax No.": empData[0].Tax,
            "Last Name": empData[0].lName,
            "First Name": empData[0].fName,
            "Middle Name": empData[0].mName,
            "Period Cover": `01/01/${year} - 12/31/${year}`,
            "Gross Compensation": (grossCompensation + midYearPay + thirtheenMonthPay).toFixed(2),
            "BasicPay": basicPay.toFixed(2),
            "Overtime Pay": overtime.toFixed(2),
            "Paid Leave": paidLeave.toFixed(2),
            "Holidays": holidays.toFixed(2), 
            "Mid Year Pay": midYearPay.toFixed(2),
            "13th month Pay": thirtheenMonthPay.toFixed(2),
            "Compensation": compensation.toFixed(2),
            "SSS, PhilHealth, Pagibig Contribution": (totalpiEE + totalsssEE + totalPhContribution).toFixed(2),
            "Other deduction": otherDeduction.toFixed(2),
            "withHoldingTax": withHoldingTax.toFixed(2)
          }

          pagIbigAllData.push(pagIbigData)
          SSSAllData.push(SSSData)
          philHealthAllData.push(philHealthData)
          BirAllData.push(BIRData)

          // console.log(BIRData)
        })
      }



      async function attOnchange(year, month){
        attYear = year
        attMonth = month
        attAllData = []
        let fd = new FormData()
        fd.append('year', year)
        fd.append('month', month)
        fd.append('table', 'attendance_csv')
        let res = await fetch('report_generation_get_info.php', {method: 'post', body: fd})
        let attendance = await res.json() 
        // console.log(attendance)
          attendance.forEach(att => {
            const ATT_DATA = {
              "Last Name": att.lName,
              "First Name": att.fName,
              "Middle Name": att.mName,
              "Time In": att.time_in,
              "Time Out": `${att.time_out}`,
              "Total Hrs": att.time_hr,
              "Status": (att.status == 0) ? "On-time" : "Late",
              "Date": att.date
            }
            attAllData.push(ATT_DATA)
          })
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
    </script>
</body>
</html>