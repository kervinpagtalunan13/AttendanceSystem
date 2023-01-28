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
  <title>Chateau - Activity Log</title>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
  <div class="container p-4 overflow-auto">
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Activity Log</p>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Activity Log
        </small>
      </div>
    </header>
    <div class="bg-white rounded-3 p-4">
      <table class="table table-bordered" id="table-logs">
        <thead>
          <tr>
            <th class="text-start" >Activity</th>
            <th style="width: max-content">Time</th>
            <th style="width: max-content">Date</th>
          </tr>
        </thead>
        <tbody id ="log-table">
          <?php
            $sql = "SELECT * FROM activity_logs";
            $query = $con->query($sql);

            // while ($row = $query->fetch_assoc()) {
              // $subArr = [];
              // $subArr['activity'] = $row['activity'];
              // $subArr['time'] = date(('h:i:s A'), strtotime($row['time']));
              // $subArr['date'] = date(('F d Y'), strtotime($row['date']));
              // $data[] = $subArr;
            //   echo '<tr>
            //           <td>'.$row['activity'].'</td>
            //           <td>'.date('g:i:s A', strtotime($row['time'])).'</td>
            //           <td>'.date('F d, Y', strtotime($row['date'])).'</td>
            //         </tr>';
            // }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    $.post('activity_log_load.php',{go: 'go'}, data => {
      console.log(data)
      let output = ''
      data.reverse().forEach(dat => {
        output += `       
          <tr>
            <td class="text-start">${dat.activity}</td>
            <td>${dat.time}</td>
            <td>${dat.date}</td>
          </tr>`
      })
      $('tbody').html(output)
      $('table').DataTable({
        order: []
      })
    }, 'json')
    </script>
</body>
</html>