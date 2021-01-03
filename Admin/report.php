<?php
	session_start();
	ob_start();
	if (!isset($_SESSION['id']) || $_SESSION['type'] != "0") {
	header('location:../login.php');
	}
	require_once 'include/dataclass.php';
	$dc = new Dataclass();
	if (!isset($_GET['id'])) {
		header("location: index.php");
	}else{
		$rid = $_GET['id'];
	}
	$res=$dc->getRow("select a.*,b.*,c.*,d.* from user d join result a on a.id = d.id join batch c on c.bid = d.bid join course b on b.cid = a.cid where a.rid = '$rid'");
	$marks = round($res['mark'] , 2);
	$passm = ceil($res['tot']*0.75);
	$wid = ceil((100*$res['ra'])/$res['tot']);
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
		<style type="text/css">
			.reportcard{
				border: 2px solid grey;
			}
			
			.reporthead img{
				width:200px;
				height:80px;
				margin-top: 40px;
				margin-left: 40px;
					
			}
			.reporthead .heading{
				text-align: center;
				padding-top: 10px;
				font-size: 50px;
			}
			.reporthead .subhead{
				text-align: center;
				font-size: 30px;
			}
			.detail{
				padding-top: 30px;
				padding-left: 180px;
				font-weight: bold;
			}
			.detail2{
				padding-left: 180px;
				font-weight: bold;
			}
			.detail3{
				padding-top: 20px;
				padding-left: 180px;
				font-weight: bold;
			}
			.progress1{
				padding-top: 20px;
				padding-left: 180px;
				font-weight: bold;
			}
			.progress {
				height: 30px;
			}
			.progress .sr-only {
			position: relative;
			}
			.progress2{
				padding-right: 180px;
				padding-left: 180px;
			}
			.text720{
				font-size: 18px;
			}
			.progress3{
				padding-top: 20px;
				padding-left: 180px;
				font-weight: bold;
			}
			.detail3i{
				padding-top: 20px;
				padding-left: 180px;
				font-weight: bold;
				margin-bottom: 40px;
			}
			.buttondwn{
				padding-top: 10px;
				padding-bottom: 10px;
			}
		</style>
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
							<i class="fa fa-user mr-2"></i>
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
					<li class="breadcrumb-item active">Report</li>
				</ol>
				<div class="container reportcard" id="report">
					<div class="row">
						<div class="col reporthead mb-3">
							<img src="../img/new.png" alt=""><br><br>
							<p class="heading">EXAMINATION SCORE REPORT</p>
							<h5 class="subhead"><?= $res['cname'] ?></h5>
						</div>
					</div>
					<div class="row detail">
						<div class="col-lg-6 col-md-6">
							<p>Candidate : <span ><?= $res['fname']." ".$res['mname']." ".$res['lname']; ?></span></p>
						</div>
						<div class="col-lg-6 col-md-6">
							<p>Date : <?= $res['date'] ?></p>
						</div>
					</div>
					<div class="row detail2">
						<div class="col-lg-6 col-md-6">
							<p>Roll No : <?= $res['urname'] ?></p>
						</div>
						<div class="col-lg-6 col-md-6">
							<p>Time Taken : <?= $res['time'] ?></p>
						</div>
					</div>
					<div class="row progress1">
						<div class="col">
							<p>Required Score :</p>
						</div>
					</div>
					<div class="row progress2">
						<div class="col">
							<div class="progress">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary text720" style="width:75%;" ><?= $passm ?></div>
							</div>
						</div>
					</div>
					<div class="row progress3">
						<div class="col">
							<p>Your Score :</p>
						</div>
					</div>
					<div class="row progress2">
						<div class="col">
							<div class="progress">

								<?php if ($marks >= $passm){
								?>								 
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-success text720" style="width:<?= $wid ?>%;" ><?= $marks ?> </div>
								<?php }else{ ?>
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger text720" style="width:<?= $wid ?>%;" ><?= $marks ?> </div>
								<?php
									}
								?>
								
								
								
							</div>
						</div>
					</div>
					<div class="row detail">
						<div class="col-lg-6 col-md-6">
							Passing Score : <?= $passm  ?> / <?= $res['tot'] ?>
						</div>
						<div class="col-lg-6 col-md-6">
							Your Score :<?= $marks ?> / <?= $res['tot'] ?>
						</div>
					</div>
					<div class="row detail3">
						<div class="col-lg-6 col-md-6">
							Right Answers : <?= $res['ra'] ?>
						</div>
						<div class="col-lg-6 col-md-6">
							Wrong Answers : <?= $res['wa'] ?>
						</div>
					</div>
					<div class="row detail3i">
						<div class="col-lg-6 col-md-6">
							Question Set : <?= $res['pset'] ?>
						</div>
						<?php if ($marks < $passm) {
						?>
						<div class="col-lg-6 col-md-6">
							Grade : <span style="font-weight: bold; color: red;">FAIL</span>
						</div>
						<?php
						}
						else{
						?>
						<div class="col-lg-6 col-md-6">
							Grade : <span style="font-weight: bold; color: green;">PASS</span>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="row buttondwn">
					<div class="col">
						<center><button type="buttom" class="btn btn-success" id="pr"><i class="fa fa-download"></i> Download</button></center>
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
		<!-- Bootstrap core JavaScript-->
		<script src="../js/html2canvas.js"></script>
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
		<script>
				$(document).ready(function(){
					$("#pr").click(function(){
						html2canvas($("#report")[0]).then(canvas => {
		saveAs(canvas.toDataURL(), '.png');
		});
					});
					function saveAs(uri, filename) {
		var link = document.createElement('a');
		if (typeof link.download === 'string') {
		link.href = uri;
		link.download = filename;
		//Firefox requires the link to be in the body
		document.body.appendChild(link);
		//simulate click
		link.click();
		//remove the link when done
		document.body.removeChild(link);
		} else {
		window.open(uri);
		}
		}
				});
				
		</script>
		
	</div>
</body>
</html>