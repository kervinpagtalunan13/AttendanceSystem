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
    <title>Chateau - Designations</title>
    <style>
    </style>
</head>
<body class='d-flex alingn-items-center bg-secondary bg-opacity-10'>
    <div class = 'main container p-4 overflow-auto'>
      <header class="d-flex align-items-center justify-content-between">
        <p class='fs-2'>Designations</p>
        <small class='fw-semibold text-dark'>
          Home > Designations
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
      <div class="container p-4 bg-white rounded-2">
        <button id = "btn-add" class = 'btn text-light mb-2 d-flex align-items-center gap-1' style="background-color: #003B6E;">
          <div>
            <img src="../img/btn_icons/add.png" alt="" style="width: 1rem">
          </div>
          <span>New Designation</span>
        </button>
        <table class = 'table table-bordered' id ='table-pos'>
          <thead>
            <tr>
              <th>No. of Employees</th>
              <th>Description</th>
              <th>Rate</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM positions WHERE `status` = '1'";
              $query = $con->query($sql);
              while($res = $query->fetch_assoc()){
                $sql = "SELECT * FROM employeelist WHERE employee_Role = '".$res['id']."'";
                $result = $con->query($sql);

                echo "
                <tr>
                <td>".$result->num_rows."</td>
                <td>".$res['description']."</td>
                <td>&#8369;".$res['rate']."</td>
                <td class='tools d-flex gap-1 justify-content-center'>
                    <button id='edit-".$res['id']."'class='edit-btn btn btn-success py-1 rounded-1 d-flex align-items-center gap-1'>
                      <div>
                        <img src='../img/btn_icons/edit.png' alt='' style='width: 1.2rem'>

                      </div>
                    <span>Edit</span>
                    </button>
                    <button id='del-".$res['id']."'class='del-btn btn btn-danger py-1 rounded-1 d-flex align-items-center gap-1'>
                       <div>
                        <img src='../img/btn_icons/delete.png' alt='' style='width: 1.2rem'>

                       </div>     
                    <span>Archive</span>
                    </button>
                  </td>
                </tr>
                ";
              }
            ?>
          </tbody>  
        </table>
      </div>
    </div>   
    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">	
          <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Archiving Designation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Do you really want to delete this data?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id = "del-yes">Yes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Adding Designation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-add">
              <div class="form-floating">
                  <input type="text" name="desc" id="" class = 'form-control mb-2 shadow-none rounded-0' required autocomplete='off' placeholder="Description">
                <label for="desc">Description</label>
              </div>
              <div class="form-floating">
                <input type="text" name="rate" id="addAmount" class="form-control shadow-none rounded-0" required autocomplete = 'off' placeholder="Rate">
                <label for="amount">Rate</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" form="form-add" class="btn btn-primary" value = "Add">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editing Designation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-edit" method='POST'>
              <div class="form-floating">
                <input type="text" name="desc" id="edit-desc" class = 'form-control mb-2 shadow-none rounded-0' required autocomplete='off' placeholder="Description">
                <label for="desc">Description</label>
              </div>
              <div class="form-floating">
                <input type="text" name="amount" id="edit-rate" class="form-control shadow-none rounded-0" required autocomplete = 'off' placeholder="amount">
                <label for="amount">Amount</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" form="form-edit" class="btn btn-primary" value = "Edit">
          </div>
        </div>
      </div>
    </div>

		<script type="module">
      import {inputNumber} from './inputNumber.js'

      document.querySelector('#addAmount').addEventListener('input', function(){
        let last = this.value
        if(! /[0-9\.]/.test(last[last.length - 1]) ){
          this.value = last.slice(0, -1)
        }
      })
      document.querySelector('#edit-rate').addEventListener('input', function(){
        let last = this.value
        if(! /[0-9\.]/.test(last[last.length - 1]) ){
          this.value = last.slice(0, -1)
        }
      })

      window.addEventListener('DOMContentLoaded', getData())
      let allData
      async function getData(){
        let res = await fetch('position_onchange.php')
        let data = await res.json()
        allData = data
      }
      // adding
      $('#btn-add').click(()=>{
        $('#add').modal('show')
      })

      $('#form-add').submit(function(e){
        e.preventDefault()
        $.post('position_add.php', $(this).serialize(), (data)=>{
            location.href = 'position_.php'
        }, 'json')
      })

      // deleting
      let delId
      $('.del-btn').click(e=>{
        delId = getId(e.currentTarget.id)
        $('#delete').modal('show')
      })

      $('#del-yes').click(()=>{
        let rowData = allData.filter(all => all.id == delId)
        $.post('position_delete.php', {id: delId, desc: rowData[0].description}, (data)=>{
          location.href = 'position_.php'
        })
      })
      
      // editing
      let editBtn = ''
      $(".edit-btn").click(e => {
        $('#edit').modal('show')
        editBtn = getId(e.currentTarget.id)
        let row = allData.filter(data => data.id == editBtn)
        $('#edit-desc').val(row[0].description)
        $('#edit-rate').val(row[0].rate)
      })

      $('#form-edit').submit(e => {
        e.preventDefault()
        $.post('position_edit.php', {
          id: editBtn,
          desc: $('#edit-desc').val(),
          rate: $('#edit-rate').val(),
        }, data => {
          location.href = 'position_.php'
        })
      })

      function getId(id){
        let id1 = id.split('-')
        return id1[id1.length - 1]
      }

      $('#table-pos').DataTable()
      
    </script>
        
</body>
</html>