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
  <title>Chateau - Account Settings</title>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
  <div class="container p-4">
    <header class='d-flex align-items-center justify-content-between'>
      <p class='fs-2 '>Account Setting</p>
      <div class="">
        <small class='fw-semibold text-dark'>
          Home > Account Setting
        </small>
      </div>
    </header>
    <!-- alert -->
    <div class="alert position-relative" id ="alert-main" role="alert">
      <span id ="alerCont"></span>
      <button type="button" class="btn-close float-end" onclick="$('#alert-main').hide()" aria-label="Close"></button>
    </div>
    <div class="rounded-3">
      <div class="bg-white mb-3 rounded-3 p-4">

        <p class='fs-5 m-1'>Account User</p>
        <div class="d-flex gap-3">
          <div class="border rounded-2" id="profile-pic" style="width: 140px; height: 140px; background-position: center; background-size:cover;"></div>
          <div>
            <div class=""><span class='fs-5'>Name: </span><span id='name'></span></div>
            <div class=""><span class='fs-5'>Role: </span><span id='role'></span></div>
            <div class=""><span class='fs-5'>Employee #: </span><span id='empNo'></span></div>
            <button class="btn text-white mt-2" id='change-user' style="background-color: #003B6E">Change</button>
          </div>
        </div>
      </div>

      <div class="bg-white mb-3 rounded-3 p-4">
        <p class='fs-5 m-1'>Change Password</p>
        <form action="" id="change-pass">
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="oldPass"name='oldPassword' placeholder='' style = 'max-width: 350px' required>
            <label for="oldPassword">Old Password</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="newPass"name='newPassword' placeholder='' style = 'max-width: 350px' required>
            <label for="newPassword">New Password</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="confPass"name='confirmPassword' placeholder='' style = 'max-width: 350px' required>
            <label for="confirmPassword">Confirm new Password</label>
          </div>
          <input type="submit" id="changePass"class='btn text-light'value="Change Password" style="background-color: #003B6E">
        </form>
      </div>
    </div>
  </div>
  <!-- modal -->
  <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Changing Admin</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form-edit">
            <select name="" id="user-list" name = 'id' class='form-select'>

            </select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" form="form-edit" class="btn btn-primary" value = "save">
				</div>
			</div>
		</div>
	</div>
    <script>
      window.addEventListener('DOMContentLoaded', onChange)
      $('.alert').hide()
      async function onChange(){
        let employees = await getData('employeelist')
        let user = await getData('accounts')
        let roles = await getData('positions')

        let admin = employees.filter(emp => emp.id == user[0].employee_no)
        let role = roles.filter(role => role.id == admin[0].employee_Role)
        $('#name').html(`${admin[0].fName} ${admin[0].mName} ${admin[0].lName}`)
        $('#role').html(role[0].description)
        $('#empNo').html(admin[0].id)
        document.querySelector('#profile-pic').style.backgroundImage = `url('${admin[0].ProfilePic}')`
        let output = ''
        employees.forEach(emp => {
          if(emp.id == user[0].employee_no){
            output += `<option selected value = "${emp.id}">${emp.fName} ${emp.lName} (${emp.id})</option>`
          }else
            output += `<option value = "${emp.id}">${emp.fName} ${emp.lName} (${emp.id})</option>`
        })
        document.querySelector('#user-list').innerHTML = output
      }

      async function getData(table){
        let fd = new FormData()
        fd.append('type', table)
        let res = await fetch('account_setting_onchange.php', {
          method: 'post',
          body: fd
        })
        let data = await res.json()
        return data
      }

      $('#form-edit').submit(function(e){
        e.preventDefault()
        $.post('account_user_change.php', {id: $('#user-list').val()}, data => {
          if(!data.error){
            console.log(data.message)
            onChange()
            $('#alert-main').show()
            $('#alert-main').removeClass('alert-danger')
            $('#alert-main').addClass('alert-success')
            $('#alert-main span').html(data.message)
          }
        }, 'json')
        $('#edit').modal('hide')
      })

      $('#change-user').click(()=>{
        $('#edit').modal('show')
      })

      // change-user
      $("#change-pass").submit(function(e){
        e.preventDefault()
        let oldPass = $('#oldPass').val()
        let newPass = $('#newPass').val()
        let confPass = $('#confPass').val()
        let Modal = $('#alert-main')
        let modalCont = $('#alert-main span')
        // console.log($(this).serialize())
        if(newPass != confPass){
          Modal.show()
          Modal.removeClass('alert-success')
          Modal.addClass('alert-danger')
          modalCont.html("New Password does not match")
        }else if(newPass.length < 7){
          Modal.show()
          Modal.removeClass('alert-success')
          Modal.addClass('alert-danger')
          modalCont.html("New Password must be atleast 8 characters")
        }else{
          if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(newPass)){
            $.post('account_change_pass.php', $(this).serialize(), data=>{
              if(!data.error){
                Modal.show()
                Modal.removeClass('alert-danger')
                Modal.addClass('alert-success')
                modalCont.html(data.message)
                $(this).trigger("reset")
              }else{
                Modal.show()
                Modal.removeClass('alert-success')
                Modal.addClass('alert-danger')
                modalCont.html(data.message)
              }
            }, 'json')
          }else{
            Modal.show()
            Modal.removeClass('alert-success')
            Modal.addClass('alert-danger')
            modalCont.html("<b>Cannot Change Password</b>, Password must contain 1 upperase character and 1 number")
          }
          
        }
        
      })
    </script>
</body>
</html>