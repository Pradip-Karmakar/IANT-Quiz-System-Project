<?php
session_start();
include 'include/dataClass.php';
$sum="0";
$dc = new Dataclass();
if (!isset($_SESSION['id']) || $_SESSION['type'] != "0") {
header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IANT Admin</title>
    <link rel="icon" href="../assets/img/icon.png">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="fixed-nav sticky-footer bg-dark myfont" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top admin-cst-nav" id="mainNav">
      <a class="navbar-brand" href="index.php"><img src="../img/new.png" alt="" width="220px" height="60px"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="index.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Students">
            <a class="nav-link" href="tables.php">
              <i class="fa fa-users"></i>
              <span class="nav-link-text">Students</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Results">
            <a class="nav-link" href="result.php">
              <i class="fa fa-flag-checkered"></i>
              <span class="nav-link-text">Results</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Questions Bank">
            <a class="nav-link" href="question.php">
              <i class="fa fa-question-circle"></i>
              <span class="nav-link-text">Questions Bank</span>
            </a>
          </li>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Courses">
            <a class="nav-link" href="course.php">
              <i class="fa fa-book"></i>
              <span class="nav-link-text">Courses</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Batch">
            <a class="nav-link" href="batch.php">
              <i class="fa fa-clock-o"></i>
              <span class="nav-link-text">Batch</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Question">
            <a class="nav-link" href="addq.php">
              <i class="fa fa-plus"></i>
              <span class="nav-link-text">Add Question</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user mr-2"></i><?php echo $_SESSION['urname']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out mr-2" aria-hidden="true"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="content-wrapper mt-4">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-question"></i>
                </div>
                <div class="mr-5"><?php $getdate = $dc->getTable("select que from question");
                  $sum = $getdate->num_rows;
                  echo $sum;
                ?> Questions !</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="question.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-users"></i>
                </div>
                <div class="mr-5"><?php $getdate = $dc->getTable("select urname from user where type = 1");
                  $sum = $getdate->num_rows;
                  echo $sum;
                ?> Students !</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tables.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-desktop"></i>
                </div>
                <div class="mr-5"><?php $getdate = $dc->getTable("select urname from user where type = 0");
                  $sum = $getdate->num_rows;
                  echo $sum;
                ?> Admins !</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="orders.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-book"></i>
                </div>
                <div class="mr-5"><?php $getdate = $dc->getTable("select cid from course");
                  $sum = $getdate->num_rows;
                  echo $sum;
                ?> Courses !</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="course.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          
        </div>
        <div class="row">
          <!-- <div class="col-lg-8">
            Example Bar Chart Card
            <div class="card mb-3">
              <div class="card-header">
              <i class="fa fa-bar-chart"></i> Income Chart </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 my-auto">
                    <canvas id="myBarChart" width="100" height="50"></canvas>
                  </div>
                  <div class="col-sm-12 text-center mt-5">
                    <div class="row">
                      <div class="col text-center">
                        <div class="h4 mb-0 text-primary"><?php
                          $getprice = $dc->getRow("select sum(acut) as total from booking");
                          $sum= $getprice['total'];
                          $fmt = new NumberFormatter( 'en_IN', NumberFormatter::CURRENCY );
                          echo $fmt->formatCurrency( $sum, "INR");
                        ?></div>
                        <div class="small text-muted">Booking Income</div>
                      </div>
                      <div class="col text-center">
                        <div class="h4 mb-0 text-primary"><?php
                          $getcut = $dc->getRow("select sum(admincut*qty) as total1 from orders");
                          $sumcut= $getcut['total1'];
                          $fmt = new NumberFormatter( 'en_IN', NumberFormatter::CURRENCY );
                          echo $fmt->formatCurrency( $sumcut, "INR");
                        ?></div>
                        <div class="small text-muted">Orders Income</div>
                      </div>
                      <div class="col text-center">
                        <div class="h4 mb-0 text-primary"><?php $fmt = new NumberFormatter( 'en_IN', NumberFormatter::CURRENCY );
                        echo $fmt->formatCurrency( $sumcut + $sum, "INR"); ?></div>
                        <div class="small text-muted">Total Income</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="col col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
              <i class="fa fa-pie-chart"></i> Progress Counter </div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="50"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>Copyright © XLOAD Inc. 2019</small>
          </div>
        </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="../logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
       <?php $getid = $dc->getRow("select id from user") ?>
      <p style="display: none;" id="uidd"><?= $getid['id'] ?></p>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <script src="js/sb-admin-charts.js"> </script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>
      
    </div>
  </body>
</html>