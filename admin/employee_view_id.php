<?php
    include 'session/check_session.php';
    include '../scripts.php';
    include 'sidebar.html';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>Chateau - View ID</title>
</head>

<body class="body d-flex">
    <div class="p-4 bg-secondary bg-opacity-10 container overflow-auto">
        <header class="d-flex align-items-center justify-content-between">
            <p class='fs-2'>View Employee IDs</p>
            <small class='fw-semibold text-dark'>
                Home > Employee Management > Employee List > View Employee
            </small>
        </header>
        <?php
            if(isset($_SESSION['success'])){
            echo '
            <div class="alert alert-success position-relative" role="alert">
                <span>'.$_SESSION['success'].'</span>
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            unset($_SESSION['success']);
            }

            if(isset($_SESSION['error'])){
                echo '
                <div class="alert alert-danger position-relative" role="alert">
                    <span>'.$_SESSION['error'].'</span>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
                unset($_SESSION['error']);
            }
        ?>
        <div class="bg-white rounded-3 p-4 ">
            <div class="d-flex gap-3"> 
                <div class="">
                    <p class="fs-3">ID 1</p>
                    <img src="" class=' rounded-3' alt="" id = 'img-1' width = "500px">
                    <form action="employee_id_update.php" method="post" class="forms mt-4 d-flex gap-3" id="form-id1" enctype="multipart/form-data">
                        <input type="hidden" name="emp-id" value="<?php echo $id ?>">
                        <input type="hidden" name="id-no" value="1">
                        <input type="file" name="pic" id="" class="form-control" required accept="image/*">
                        <input type="submit" value="Change" class="btn btn-primary" name="update">
                    </form>
                </div>
                <div class="">
                    <p class="fs-3">ID 2</p>
                    <img src="" class='img-fluid rounded-3' alt=""  id = 'img-2' width = "500px">
                    <form action="employee_id_update.php" method="post" class="forms mt-4 d-flex gap-3" id="form-id2" enctype="multipart/form-data">
                        <input type="hidden" name="emp-id" value="<?php echo $id ?>">
                        <input type="hidden" name="id-no" value="2">
                        <input type="file" name="pic" id="" accept="image/*" class="form-control" required >
                        <input type="submit" value="Change" class="btn btn-primary">
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', onChange)
        let id = '<?php echo $id ?>'
        function onChange() {
            $.post('employee_viewid_onchange.php', {id: id}, data => {
                console.log(data)
                document.querySelector('#img-1').src = data.id1
                document.querySelector('#img-2').src = data.id2
            }, 'json')
        }

        $('.forms').submit(function(e){
            // e.preventDefault()
            // let id = e.currentTarget.id
            
            // console.log($(this).serialize())
            // let fd = new FormData($(this)[0])
            // $.ajax({
            //     url: 'employee_id_update.php',
            //     type: 'post',
            //     processData: false,
            //     contentType: false,
            //     data: fd,
            //     dataType: 'json',
            //     success: data => {
            //         console.log(data)
            //         onChange()
            //     }
            // })
        })

    </script>
</body>

</html>