<?php
  include 'session/check_session.php';
  if(isset($_POST['year']) && isset($_POST['scrollTop'])){
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['scrollTop'] = $_POST['scrollTop'];
  }
?>