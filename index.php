<?php
    // include 'scripts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="plugin/jquery-3.6.1.js"></script> 
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.css">
  <script src="plugin/bootstrap/js/bootstrap.js"></script>

    <title>Attendance</title>
    <style>
        #form-attendance {
            min-width: 500px
        }
        .alert {
          min-width: 500px;
        }
    </style>
</head>
<body class = 'd-flex flex-column justify-content-center align-items-center vh-100 gap-0'>
  

<form action="" id = 'form-attendance' class = "m-2 p-4 d-flex flex-column gap-2 align-items-start border shadow-sm bg-light">
        <h1>Attendance</h1>
        <select name="status" id="" class = "form-select rounded-0 shadow-none">
            <option value="in">Time-in</option>
            <option value="out">Time-out</option>
        </select>
        <input type="text" name = 'username' placeholder = 'username' class = "form-control rounded-0 shadow-none">
        <input type="text" name = 'password' placeholder = 'password' class = "form-control rounded-0 shadow-none">
        <input type="submit" value="Proceed" class = "btn btn-success btn-lg rounded-1">
    </form>
        <div class="alert mx-100 d-absolute" role="alert">
        </div>
    <script>
        $('.alert').hide()
        $('#form-attendance').submit(function(e){
            e.preventDefault()
            
            // $.post('attendance.php', $(this).serialize(), (data)=>{
            //     console.log(data)
            // })
            $.ajax({
                url: 'attendance.php',
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(result){
                    console.log(result)
                    // alert(result.message)
                    $('.alert').show()
                    if(!result.error){
                      $('.alert').addClass('alert-success')
                      $('.alert').removeClass('alert-danger')
                    }else{
                      $('.alert').addClass('alert-danger') 
                      $('.alert').removeClass('alert-success')
                    }
                    $('.alert').html(result.message)
                    setTimeout(()=>{
                      $('.alert').hide()
                    }, 7000)
                }
            })
        })
    </script>
</body>
</html>