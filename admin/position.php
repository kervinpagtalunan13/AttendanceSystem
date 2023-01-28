<?php
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
    <title>Document</title>
    <style>
    </style>
</head>
<body class='d-flex alingn-items-center bg-secondary bg-opacity-10'>
    <div class = 'main container p-4'>
      <header class="d-flex align-items-center justify-content-between">
        <p class='fs-2'>Chateau - Designations</p>
        <small class='fw-semibold text-dark'>
          Home > Designations
        </small>
      </header>
      <div class="alert position-relative" id ='alert-suc' role='alert'>
        <span id ='alert-content'></span>
        <button type="button" class="btn-close float-end" onclick='closeAlert()' aria-label="Close"></button>
      </div>
      <!-- <h1>Position</h1> -->
      <div class="container p-4 bg-white rounded-2">
        <button id = "btn-add" class = 'btn btn-primary mb-2'>New Position</button>
        <!-- <button id='show-tools' class='btn btn-success mb-2'>show tools</button> -->
        <table class = 'table table-bordered border' id ='table-pos'>
          <thead>
            <tr>
              <!-- <th>#</th> -->
              <th>Description</th>
              <th>Rate</th>
              <th class='tools w-25' >Tools</th>
            </tr>
          </thead>
          <tbody>
 
          </tbody>  
        </table>
      </div>
    </div>

        
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
              <label for="amount">Rate</label>
              <input type="text" name="rate" id="" class="form-control shadow-none rounded-0" required autocomplete = 'off'>
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
            <h5 class="modal-title" id="staticBackdropLabel">Editing Position</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-edit" method='POST'>
              <label for="desc">Description</label>
              <input type="text" name="desc" id="edit-desc" class = 'form-control mb-2 shadow-none rounded-0' required autocomplete='off'>
              <label for="amount">Amount</label>
              <input type="text" name="amount" id="edit-rate" class="form-control shadow-none rounded-0" required autocomplete = 'off'>
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
      // $(document).ready(function(){
        // let table
        // function x(callback){
        //   table = $('#table-pos').DataTable({
        //     'ajax': {
        //       url: 'position_onchange.php',
        //       type: 'post',
        //     },
        //     "columnDefs": [
        //       { className: "tools", targets: 3 },
        //     ]
        //   })       
        //   setTimeout(() => {
        //     callback() 
        //   }, 1000);
        // }
      // })

      

        // adding
        // function y(){

        // $('#btn-add').click(()=>{
        //     $('#add').modal('show')
        // })

        // $('#form-add').submit(function(e){
        //   e.preventDefault()
        //   $.post('position_add.php', $(this).serialize(), (data)=>{
        //     onChange()
        //     $('#add').modal('hide')
        //   })
        //   $('#add').modal('hide')
        // })
        // console.log(document.querySelector('button'))
      // }
        
        // deleting
        // $('.del-btn').click(()=>{
          //   $('#delete').modal('show')
          //   console.log('asd')
          // })
          // let delBtns = document.querySelectorAll('.del-btn')
          // console.log(document.querySelectorAll('#del-1'))
          
        //   function onChange(){
        //     table.destroy()
        //     table = $('#table-pos').DataTable({
        //       'ajax': {
        //       url: 'position_onchange.php',
        //       type: 'post'
        //     }
        //   })
        // }

        // x(y)
    </script>

    <script>
      // $('#alert-suc').hide()
      $('.alert').hide()
      function closeAlert(){
        $('.alert').hide()
      }
      // $('.edit-btn').click((e)=>{
      //   // $('#add').modal('show')
      // })
      // output = []
      // content = ''
      // $.post('position_onchange.php', data => {
      //   output = data
      // }, 'json')
      // output.forEach(pos => {
      //     // posDetails.push(pos)
      //       content += `
      //         <tr>
      //           <td>${pos.id}</td>
      //             <td>${pos.description}</td>
      //             <td>${pos.rate}</td>
      //             <td>
      //               <button id='edit-${pos.id}'class='edit-btn btn btn-success py-1 rounded-1'>Edit</button>
      //               <button id='del-${pos.id}'class='del-btn btn btn-danger py-1 rounded-1'>Delete</button>
      //             </td>
      //           </tr>`
      //   })

    window.addEventListener('DOMContentLoaded', updateTable)
    // updateTable()
    
    fromChange = false
    async function updateTable(){
      let pos = await fetch('position_onchange.php')
      let data = await pos.json()
      let output = ''
      var posDetails = []
      // let table = document.querySelector('#table-pos')
      // delete table.DataTable
      
        data.forEach(pos => {
          posDetails.push(pos)
          
          // <td>${pos.id}</td>
          output += `
          <tr>
                  <td>${pos.description}</td>
                  <td>${pos.rate}</td>
                  <td class='tools'>
                      <button id='edit-${pos.id}'class='edit-btn btn btn-success py-1 rounded-1'>Edit</button>
                      <button id='del-${pos.id}'class='del-btn btn btn-danger py-1 rounded-1'>Delete</button>
                    </td>
                </tr>`
        })
      document.querySelector('tbody').innerHTML = output
      let table = $('#table-pos').DataTable()

      delId = ''
      let delBtns = document.querySelectorAll('.del-btn')
      delBtns.forEach(btn => {
        btn.addEventListener('click', (e)=>{
          delId = e.currentTarget.id
          $('#delete').modal('show')
        })
      })

      $('#del-yes').click(()=>{
        let id = getId(delId)
        $.post('position_delete.php', {id: id}, (data)=>{
          // updateTable()
          // console.log(data)
          $('.alert').show()
          if(!data.error){
            updateTable()
            $('.alert').removeClass('alert-danger')
            $('.alert').addClass('alert-success')
            $('#alert-content').html(data.message)
          }else{
            $('.alert').removeClass('alert-success')
            $('.alert').addClass('alert-danger')
            $('#alert-content').html(data.message)
          }
        }, 'json')
        $('#delete').modal('hide')
      })

      function getId(id){
        let id1 = id.split('-')
        return id1[id1.length - 1]
      }


      delId = ''
      let editBtns = document.querySelectorAll('.edit-btn')
      editBtns.forEach(btn => {
        btn.addEventListener('click', (e)=>{
          delId = getId(e.currentTarget.id)
          let delData = posDetails.filter(pos => pos.id == delId)
          $('#edit').modal('show')
          $('#edit-desc').val(delData[0].description)
          $('#edit-rate').val(delData[0].rate)
          
        })
      }) 

      $('#form-edit').submit(function(e){
        e.preventDefault()
        $('#edit').modal('hide')
        console.log(delId)
        console.log($('#edit-desc').val())
        console.log($('#edit-rate').val())
        $.post('position_edit.php', {
          id: delId,
          desc: $('#edit-desc').val(),
          rate: $('#edit-rate').val()
        }, (data) => {
          $('.alert').show()
          if(!data.error){
            // $('.tools').slideToggle()
            updateTable()
            $('.alert').removeClass('alert-danger')
            $('.alert').addClass('alert-success')
            $('#alert-content').html(data.message)
          }
          fromChange = true
        }, 'json')
      })
    }
    
    $('#btn-add').click(()=>{
      $('#add').modal('show')
    })

    $('#form-add').submit(function(e){
      e.preventDefault()
      $.post('position_add.php', $(this).serialize(), (data)=>{
        $('.alert').show()
        if(!data.error){
          updateTable()
          $('.alert').removeClass('alert-danger')
          $('.alert').addClass('alert-success')
          $('#alert-content').html(data.message)
        }
      }, 'json')
      $('#add').modal('hide')
    })
    </script>
        
</body>
</html>