<?php
  session_start();
if (!isset($_SESSION['id']) || $_SESSION['type'] != "1") {
header('location:login.php');
  }
  if($_SESSION['sta'] == 'diq'){
	  die("You are Disqualified");
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
  </head>
  <body>
    <div class="back">

      <img src="img/4.jpg" class="bgimg" type="jpg/jpeg">

    </div>

    <div class="container-fluid text-center">
      <div class="row1">
        <div class="col-md-12">
          <p class="text-right heading"><a class="btn btn-danger" href="logout.php">Logout</a></p>
          <h1 class="heading">
            IANT EXAM SIMULATION
          </h1>
          <h3 class="heading">Welcome, <?php echo $_SESSION['fname']." ".$_SESSION['mname']." ".$_SESSION['lname'] ?> </h3>

        </div>
      </div>
      <div class="row" style="margin-top:15vh">
        <div class="col animated">
          <a class="btn btn-primary tbtn" href="q1r1-test.php"><h1 class="q"><i class="fa fa-book" aria-hidden="true"></i> EXAM</h1></a>
        </div>
      </div>
	</div>
	
    <div class="container-fluid text-center">
      <div class="col-sm-12">
        <h4 class="present">Design & Developed by : Pradip S Karmakar</h4>
      </div>
    </div>

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
