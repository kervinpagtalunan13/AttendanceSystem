<?php
	session_start();
    include '../scripts.php';
	if(isset($_SESSION['admin'])){
		header('location:dashboard2.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chateau Payroll System</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">

    <style>
        body {
            background-image: url('../img/bg/login.png');
            background-position: center;
            background-size:cover;
        }
    </style>
</head>

<body class="d-flex flex-column align-items-center justify-content-center h-100">
    <!-- <div class=""> -->

        <div class="bg-light rounded-2 shadow-lg p-4">
            <img src="../img/logo.png"
                style="width: 80px; display: block; margin: 0 auto">
            <header
                style="padding-top: 10px;text-align: center; font-size: 20px; font-weight: 600; font-family:mBold;">
                Payroll System
            </header>
            <form  id = "form" style="" class="mt-3">
                <!--username input-->
                <input style="" class="bg-light form-control shadow-none mb-2" required name = "user" placeholder="username">
                <!--password input-->
                <input type="password" style="" class="bg-light form-control shadow-none mb-2" placeholder="password" required name = "pass">
                <!--login btn-->
                <div class="text-center">
                    <button type="submit" class="loginBtn mb-0">Login</button>
                </div>
                <!--back to portal btn-->
            </form>
            <div class="text-center ">
                <a class="" href="#" id="" style="font-family:mThin;font-size: 13px; text-align: center; margin-left: 0px;">Go back to Main Portal</a>
            </div>
        </div>
        <div class="alert alert-danger mt-1 text-center" style="min-width: 260px">
            
        </div>
    <!-- </div> -->
    <script>
        $('.alert').hide()
        $("#form").submit(function(e){
            e.preventDefault()
            $.post('login.php', $(this).serialize(), data => {
                if(!data.error){
                    location.href = "dashboard2.php";
                }else{
                    // alert(data.message)
                    $('.alert').show()
                    $('.alert').html(data.message)
                }
            }, 'json')
        })
    </script>
</body>

</html>