<?php
  include 'sidebar.html';
  include '../scripts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script>
    
    document.addEventListener('DOMContentLoaded', function(){
      async function onChange(){

      }
      $('table').DataTable()
    })
  </script>
</head>
<body class="d-flex bg-secondary bg-opacity-10">
  <div class="container p-4">
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Account Setting</p>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Account Setting
        </small>
      </div>
    </header>
    <div class="bg-white mb-3 rounded-3 p-4">
      <div class="mb-2 d-flex align-items-center justify-content-between">
        <button class="btn btn-primary">Add 13 month / mid year</button>
        <select name="year" id="year" class="form-select" style = "max-width: max-content"  >
          <option value="2022">2022</option>
          <option value="2023">2023</option>
        </select>
      </div>
      <table class='table table-bordered'>
        <thead class="table-primary">
          <tr>
            <th colspan="2" class="py-1">Information</th>
            <th colspan="12" class="text-center py-1">Basic Pay</th>
            <th colspan="1" class="py-1">Total</th>
          </tr>
          <tr>
            <th>#</th>
            <th>Name</th>
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
    </div>
  </div>
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
</body>
</html>