<?php

  session_start();


  if(isset($_POST['rr'])){
    $_SESSION["referror"] = $_POST['rr'];
  }
  if(isset($_GET['time'])){
    $_SESSION["ts"] = $_GET['time'];
  }



 ?>
