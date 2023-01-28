<?php
  include 'sidebar.html';
  include '../scripts.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>Welcome admin!</title>
  </head>
  
  <body class="body d-flex">
    <div class="topNav">
      <img
        src="../img/logo.png"
        alt=""
        style="display: inline-block; width: 50px"
      />
      <a
        style="
          font-family: mBold;
          padding-left: 20px;
          color: white;
          font-weight: 600;
          font-size: 30px;
        "
        >Payroll System</a
      >
      <div
        style="
          font-family: mBold;
          font-size: 30px;
          color: white;
          margin-left: 850px;
        "
      >
        Welcome, admin
        <!--insert adminName-->
      </div>
    </div>
    <div class="bgg">
      <div class="contents">
        <div class="adminControls">
          <header
            style="
              font-family: mBold;
              font-weight: 600;
              padding-left: 30px;
              padding-top: 30px;
              font-size: 30px;
            "
          >
            Admin Controls
          </header>
          <div class="btnList">
            <a href="#"
              ><img class="btns" src="../img/btns/companyManagement.png" alt=""
            /></a>
            <a href="employeeManagement.php"
              ><img class="btns" src="../img/btns/employeeManagement.png" alt=""
            /></a>
            <a href="#"
              ><img class="btns" src="../img/btns/payrollInformation.png" alt=""
            /></a>
            <a href="#"
              ><img class="btns" src="../img/btns/timekeeping.png" alt=""
            /></a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
