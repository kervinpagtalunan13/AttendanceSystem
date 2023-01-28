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
  <title>Chateau - Company Management</title>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
  <div class="container p-4">
    <!-- header -->
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Company Management</p>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Company Management
        </small>
      </div>
    </header>
    <div class="alert alert-success position-relative" id="alert-main" role='alert'>
      <span id ='alert-content'></span>
      <button type="button" class="btn-close float-end" onclick='closeAlert()' aria-label="Close"></button>
    </div>
    <!-- body -->
    <div class="">
      <!-- grace period -->
      <div class="bg-white mb-3 rounded-3 p-4">
        <p class='fs-5 m-1'>Grace period</p>
        <select name="" id="gracePeriod" class='form-select'>
          <!-- <option value="10">10 minutes</option>
          <option value="15">15 minutes</option>
          <option value="20">20 mintues</option>
          <option value="30">30 mintues</option> -->
        </select>
        <button class="btn text-white px-4 mt-2" id="save-gp" style="background-color: #003B6E">Save</button>
      </div>

      <div class="bg-white mb-3 rounded-3 p-4 d-none">
        <p class='fs-5 m-1'>Paid Leave Limit</p>
        <select name="" id="paidLeave" class='form-select'>
          <!-- <option value="10">10</option>
          <option value="12">12</option>
          <option value="15">15</option> -->
        </select>
        <div class="">
          <button class="btn text-light px-4 mt-2" id="save-pl" style="background-color: #003B6E">Save</button>
        </div>
      </div>

      <div class="bg-white mb-3 rounded-3 p-4">
        <p class='fs-5 m-1'>Cash Advance Limit</p>
        <select name="" id="cashAdvance" class='form-select'>
          <!-- <option value="3000">3,000</option>
          <option value="5000">5,000</option>
          <option value="7000">7,000</option> -->
        </select>
        <button class="btn text-light mt-2 px-4" id="save-ca" style="background-color: #003B6E">Save</button>
      </div>

    </div>
  </div>
  <div class="modal fade" id="confPassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
          <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Enter Password to continue</h5>
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
    function closeAlert(){
      $("#alert-main").hide()
    }
    $('.alert').hide()
    onLoad()
    async function onLoad(){
      let fd = new FormData()
      fd.append('col', 'asd')
      let res = await fetch('company_management_onchange.php', {method: 'post', body: fd})
      let datas = await res.json()

      let gps = {
        "10 minutes": 10,
        "15 minutes": 15,
        "20 minutes": 20,
        "30 minutes": 30
      }
      let data = ''
      Object.entries(gps).forEach(([key, val]) => {
        if(datas.grace_period == val){
          data += `<option value="${val}" selected>${key}</option>`
        }else{
          data += `<option value="${val}">${key}</option>`
        }
      })
      $('#gracePeriod').html(data)

      data = ''
      let pl = [12, 15, 20, 24]
      pl.forEach(p => {
        if(datas.leave_limit == p){
          data += `<option value="${p}" selected>${p}</option>`
        }else{
          data += `<option value="${p}">${p}</option>`
        }
      })
      $('#paidLeave').html(data)

      data = ''
      let ca = [1000, 3000, 5000]
      ca.forEach(p => {
        if(datas.ca_limit == p){
          data += `<option value="${p}" selected>&#8369 ${p.toLocaleString("en-US")}</option>`
        }else{
          data += `<option value="${p}">&#8369 ${p.toLocaleString("en-US")}</option>`
        }
      })
      $('#cashAdvance').html(data)
    }

    let alertMain = $("#alert-main")
    let alertCont = $("#alert-main span")
    alertMain.hide()
    let type, value
    $('#save-gp').click(e=>{
      value = $('#gracePeriod').val()
      type = 'grace_period'
      
      $('#confPassModal').modal('show')
    })
    
    $('#save-pl').click(e=>{
      value = $('#paidLeave').val()
      type = 'leave_limit'

      $('#confPassModal').modal('show')
    })

    $('#save-ca').click(e=>{
      value = $('#cashAdvance').val()
      type = 'ca_limit'
      
      $('#confPassModal').modal('show')
    })

    $('#form-conf').submit(function(e){
    e.preventDefault()
    $.post('confirm_password.php', $(this).serialize(), data => {
      if(!data.error){
        $.post('company_management_onchange.php', {type: type, value: value}, data => {
          if(!data.error){
            alertMain.show()
            $('#confPassModal').modal('hide')
            $('#form-conf').trigger('reset')

            let cont = ''
            if(type == "grace_period"){
              cont = `<b>Grace period is updated to</b> ${value} mintues`

            }
            if(type == "leave_limit"){
              cont = `<b>Leave limit is updated to</b> ${value} days`
            }
            if(type == "ca_limit"){
              cont = `<b>Cash advance limit is updated to</b> &#8369 ${value} `
            }

            // Swal.fire({
            //   position: 'top-end',
            //   icon: 'success',
            //   title: 'Your work has been saved',
            //   showConfirmButton: true,
            //   // timer: 1500
            // })

            alertCont.html(cont)
          }
        }, 'json')
      }else{
        $('#confPassModal .alert').show()
        $('#confPassModal .alert span').html(data.message)
      }
    }, 'json')
  })




  </script>
</body>
</html>