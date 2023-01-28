<?php

  $deduction_list = array();
  include '../connect.php';
  $sql = "SELECT * FROM chart_bir";
  try {
    // with holding tax
    $query = $con->query($sql);
    $res = $query->fetch_all(MYSQLI_ASSOC);
    $deduction_list['tax'] = $res;

    // philhealth
    $query = $con->query("SELECT * FROM chart_philhealth");
    $res = $query->fetch_all(MYSQLI_ASSOC);
    $deduction_list['philhealth'] = $res;

    // pag-ibig
    $query = $con->query("SELECT * FROM chart_pagibig");
    $res = $query->fetch_all(MYSQLI_ASSOC);
    $deduction_list['pagibig'] = $res;

    // SSS
    $query = $con->query("SELECT * FROM chart_sss");
    $res = $query->fetch_all(MYSQLI_ASSOC);
    $deduction_list['sss'] = $res;
  } catch (\Throwable $th) {
    
  }

  echo json_encode($deduction_list);