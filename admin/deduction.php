<?php
	include 'session/check_session.php';
	include '../scripts.php';
	include 'sidebar.html';	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chateau - Deductions</title>
</head>
<body class='d-flex bg-secondary bg-opacity-10'>
    <main class = 'p-4 container' >
		<header class="d-flex align-items-center justify-content-between">
        <p class='fs-2'>Deductions</p>
        <small class='fw-semibold text-dark'>
          Home > Employee Management > Deductions
        </small>
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
			<div class="alert alert-success position-relative" id ='alert-suc' role='alert'>
        <span id ='alert-content'></span>
        <button type="button" class="btn-close float-end" onclick='closeAlert()' aria-label="Close"></button>
      </div> 
      <div class="container p-4 bg-white rounded-2">
				<table class="table table-bordered mt-2 text-center" id='deduct-table'>
					<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>SSS</th>
						<th>PhilHealth</th>
						<th>Pag-ibig</th>
						<th>Tools</th>
					</tr>
				</thead>
					<tbody id = 'deduc-tbl'>
						
					</tbody>
				</table>
			</div>
			</main>
			
			<!-- Modals -->
	<div class="modal fade" id="edit2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Editing Deductions</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form-edit2" method='POST'>
						<p id="name" class="p-0 mb-1"></p>
						<div class="form-floating">
							<input type="text" name="sss" id="sss" class = 'form-control  mb-2 shadow-none rounded-0' required autocomplete='off' placeholer = 'SSS'>
							<label for="sss" class =''>SSS</label>
						</div>
						<div class="form-floating">
							<input type="text" name="ph" id="ph" class="form-control shadow-none mb-2  rounded-0" required autocomplete = 'off' placeholder="Philheakth">
							<label for="ph">PhilHealth</label>
						</div>
						<div class="form-floating">
							<input type="text" name="pi" id="pi" class="form-control shadow-none rounded-0" required autocomplete = 'off' placeholder="Pag-ibig">
							<label for="pi">Pag-ibig</label>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" form="form-edit2" class="btn btn-primary" value = "Edit">
				</div>
			</div>
		</div>
	</div>

<!-- modal-delete-confirm -->
	<div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Deleting Deduction</h5>
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

	<!-- modal for add -->
	<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Adding Deductions</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form-add">
						<label for="desc">Description</label>
						<input type="text" name="desc" id="" class = 'form-control mb-2 shadow-none rounded-0' required autocomplete='off'>
						<label for="amount">Amount</label>
						<input type="text" name="amount" id="" class="form-control shadow-none rounded-0" required autocomplete = 'off'>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" form="form-add" class="btn btn-primary" value = "Add">
				</div>
			</div>
		</div>
	</div>

	<!-- modal for edit -->

	<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Editing Deductions</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form-edit" method='POST'>
						<label for="desc">Description</label>
						<input type="text" name="desc" id="edit-desc" class = 'form-control mb-2 shadow-none rounded-0' required autocomplete='off'>
						<label for="amount">Amount</label>
						<input type="text" name="amount" id="edit-amount" class="form-control shadow-none rounded-0" required autocomplete = 'off'>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" form="form-edit" class="btn btn-primary" value = "Edit">
				</div>
			</div>
		</div>
	</div>
		<script>
				window.addEventListener('DOMContentLoaded', updateTable)

				function closeAlert(){
					$('.alert').hide()
				}

				document.querySelector('.form-control').addEventListener('input', function(){
					let last = this.value
					if(! /[0-9\.]/.test(last[last.length - 1]) ){
						this.value = last.slice(0, -1)
					}
				})

				$('.alert').hide()
				 function updateTable(){
					fetch('deduction_onchange.php')
					.then(res => res.json())
					.then(data => {

						let output = ''
						data.forEach(deduc => {
							let sss = (deduc.SSS == null) ? '0':  deduc.SSS
							let ph = (deduc.Philhealth == null) ? '0':  deduc.Philhealth
							let pi = (deduc.Pagibig == null) ? '0':  deduc.Pagibig
							output += `
							<tr>
							<td>${deduc.id}</td>
							<td>${deduc.fName} ${deduc.lName}</td>
							<td>&#8369;${sss}</td>
							<td>&#8369;${ph}</td>
							<td>&#8369;${pi}</td>
							<td>
							<button class='btn-edit btn btn-success py-1 px-2 d-flex align-items-center gap-1' id='editBtn-${deduc.id}'>
							<div>
								<img src="../img/btn_icons/edit.png" alt="" style="width: 1.2rem">
							</span>
							<span>Edit</span>
							</button>
							</tr>`
						})
						document.querySelector('#deduc-tbl').innerHTML = output			
						let editBtns = document.querySelectorAll('.btn-edit')
						editBtns.forEach(btn => {
							btn.addEventListener('click', (e) => {
							
								$('#edit2').modal('show')
								editId = e.currentTarget.id
							editId = editId.split('-')
							editId = editId[editId.length - 1]
							console.log()
							let info = data.filter(x => x.id == editId) 
							let fName = `${info[0].fName} ${info[0].mName} ${info[0].lName}, Employee No.${editId}`
							// console.log(info)
							let sss = (info[0].SSS == null) ? '0' : info[0].SSS
							let ph = (info[0].Philhealth == null) ? '0' : info[0].Philhealth
							let pi = (info[0].Pagibig == null) ? '0' : info[0].Pagibig
							$('#name').text(fName)
							$('#sss').val(sss)
							$('#ph').val(ph)
							$('#pi').val(pi)
						})
					})
					$('#deduct-table').dataTable()
					})
				 }			

				 $('#form-edit2').submit(function(e){
					e.preventDefault()
					let fd = new FormData(document.querySelector('#form-edit2'))
					fd.append('id', editId)
					fetch('deduction_update.php', {
						method: 'post',
						body: fd
					})
					.then(res => res.json())
					.then(data => {
						if(!data.error){
							location.href = 'deduction.php';
							updateTable()
							$('.alert').show()
							$('#alert-content').html(data.message)
						}
						console.log(data)
						$('#edit2').modal('hide')
					})
					console.log(editId)
				 })


			</script>
</body>
</html>