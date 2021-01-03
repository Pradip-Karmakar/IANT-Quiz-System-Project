<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['type'] != "0") {
header('location:../login.php');
}
require_once 'include/dataClass.php';
$dc = new Dataclass();
$opmd ="";
$delsucmsg;
$delfailmsg;
if (isset($_POST['btn-register']))
{
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$urname = $_POST['urname'];
$pass = $_POST['password'];
$pset = $_POST['pset'];
$cid = $_POST['cid'];
$st = $_POST['st'];
$bid = $_POST['bid'];
$type = "1";

$save = "insert into user(fname, mname, lname, urname, pass, st, pset, type, cid, bid) values('$fname','$mname','$lname','$urname','$pass','$st','$pset','$type','$cid','$bid')";
if ($dc->saveRecord($save))
{
$savesuc = "New User Register Successfully";
}
else
{
$savefail = "Something Preventing To Serve Petrol To Engine";
}
}
if (isset($_GET['action']) and $_GET['action'] == "delete") {
$id =  $_GET['id'];
if ($dc->getTable("delete from user where id='$id'")) {
$delsucmsg = "User Has Successfully Deleted";
}else{
$delfailmsg = "Delete Not possible";
}
}
if (isset($_POST['btn-update'])) {
$id = $_POST['editid'];
$sql = $dc->getTable("update user set fname='$_POST[fname]' , mname = '$_POST[mname]' , lname = '$_POST[lname]' , urname = '$_POST[urname]' , pass = '$_POST[pass]' , pset = '$_POST[pset]' , cid = '$_POST[cid]' , bid = '$_POST[bid]' , active = '$_POST[active]' where id='$id'");
if($sql){
  $sucup = "User Update Successfully";
}else{
  $failup = "Failed to Update";
}
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
    <link rel="stylesheet" href="css/bootstrap-confirm-delete.css">
    <link rel="stylesheet" href="css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="css/buttons.dataTables.min.css">
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
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Students</li>
        </ol>
        <span>
          <?php
          if(isset($delsucmsg)){
          ?>
          <div class="animated flash alert alert-success">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $delsucmsg; ?>
          </div>
          <?php
          }
          ?>
          <?php
          if(isset($delfailmsg)){
          ?>
          <div class="animated flash alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $delfailmsg; ?>
          </div>
          <?php
          }
          ?>
          <?php if (isset($savesuc)) { ?>
          <div class="animated flash alert alert-success">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $savesuc; ?>
          </div>
          <?php } ?>
          <?php if (isset($savefail)) { ?>
          <div class="animated flash alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $savefail; ?>
          </div>
          <?php } ?>
           <?php if (isset($sucup)) { ?>
          <div class="animated flash alert alert-success">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $sucup; ?>
          </div>
          <?php } ?>
           <?php if (isset($failup)) { ?>
          <div class="animated flash alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $failup; ?>
          </div>
          <?php } ?>
        </span>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-users"></i> Students List
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#add-user" style="float: right;">Add Student</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><center>Name</center></th>
                    <th><center>User-Id</center></th>
                    <th><center>Password</center></th>
                    <th><center>Paper Set</center></th>
                    <th><center>Course</center></th>
                     <th><center>Batch</center></th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tfoot>
                <tr>
                  <th><center>Name</center></th>
                    <th><center>User-Id</center></th>
                    <th><center>Password</center></th>
                    <th><center>Paper Set</center></th>
                    <th><center>Course</center></th>
                     <th><center>Batch</center></th>
                    <th><center>Action</center></th>
                </tr>
                </tfoot>
                <tbody>
                  
                  <?php
                  $sql = "select a.*,b.*,c.* from user a , course b ,batch c where a.cid = b.cid and a.type = 1 and a.bid = c.bid";
                  $fetch=$dc->getTable($sql);
                  while($row=mysqli_fetch_array($fetch))
                  {
                  ?>
                  <tr>
                    <td><center><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></center></td>
                    <td><center><?php echo $row['urname'];?></center></td>
                    <td><center><?php echo $row['pass'];?></center></td>
                    <td><center><?php echo $row['pset'];?></center></td>
                    <td><center><?php echo $row['cname'];?></center></td>
                    <td><center><?php echo $row['bname'];?></center></td>
                    <td class="text-center"><a href="tables.php?id=<?php echo $row['id']; ?>&action=update" class="link-color"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="tables.php?id=<?php echo $row['id']; ?>&action=delete" class="ml-2 link-color" onClick="return confirm('Are You Sure You Want To Delete This User')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
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
      <!-- Logout Modal-->
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
      <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form method="post" id="test" action="" autocomplete="off">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="myfont">Register User</h2>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" name="fname" id="fname" class="form-control" autocomplete="off" placeholder="Enter Your First Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" name="mname" id="mname" class="form-control" autocomplete="off" placeholder="Enter User Middle Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" name="lname" id="lname" class="form-control" autocomplete="off" placeholder="Enter User Last Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" name="urname" id="urname" class="form-control" autocomplete="off" placeholder="Enter Your User Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off" placeholder="Enter Your Password" onkeyup="CheckPasswordStrength(this.value)" required>
                        <span id="password_strength"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="password" name="repassword" id="repassword" class="form-control" autocomplete="off" placeholder="ReType Your Password" onkeyup='check();' required>
                        <span id='message'></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="text" name="pset" id="pset" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" placeholder="Allot A Paper Set" maxlength="1" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="cid" class="control-label">Select Course</label><br>
                        <select class="custom-select" name="cid">
                          <?php
                          $sql = "select * from course";
                          $fetch=$dc->getTable($sql);
                          while($row=mysqli_fetch_array($fetch))
                          {
                          ?>
                          <option value="<?= $row['cid'] ?>"><?= $row['cname'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="bid" class="control-label">Select Batch</label><br>
                        <select class="custom-select" name="bid">
                          <?php
                          $sql2 = "select * from batch";
                          $fetch2=$dc->getTable($sql2);
                          while($row2=mysqli_fetch_array($fetch2))
                          {
                          ?>
                          <option value="<?= $row2['bid'] ?>"><?= $row2['bname'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                   <input type="hidden" name="st" id="st" class="form-control" value="">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="submit" name="btn-register" value="Register" class="btn btn-block btn-primary">
                      </div>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- update -->
      
      <?php if (isset($_GET['action']) and $_GET['action'] == "update") {
      $id =  $_GET['id'];
      $recieve = $dc->getRow("select a.*,b.*,c.* from user a , course b , batch c where a.id='$id' and a.cid = b.cid and a.bid = c.bid");
      $opmd = '$("#update-user").modal("show");';
      }
      ?>
      <div class="modal fade" id="update-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form method="post" id="test" action="tables.php" autocomplete="off">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="myfont">Update User</h2>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="fname" class="control-label">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" autocomplete="off" value="<?php echo $recieve['fname']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                         <label for="mname" class="control-label">Middle Name</label>
                        <input type="text" name="mname" id="mname" class="form-control" autocomplete="off" value="<?php echo $recieve['mname']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                         <label for="lname" class="control-label">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" autocomplete="off" value="<?php echo $recieve['lname']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                         <label for="urname" class="control-label">Username Name</label>
                        <input type="text" name="urname" id="urname" class="form-control" autocomplete="off" value="<?php echo $recieve['urname']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                         <label for="pass" class="control-label">Password</label>
                        <input type="text" name="pass" id="pass" class="form-control" autocomplete="off" value="<?php echo $recieve['pass']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                         <label for="pset" class="control-label">Paper Set</label>
                        <input type="text" name="pset" id="pset" class="form-control" autocomplete="off" value="<?php echo $recieve['pset']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                         <label for="active" class="control-label">Active</label>
                        <input type="text" name="active" id="active" class="form-control" autocomplete="off" value="<?php echo $recieve['active']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="cid" class="control-label">Select Course</label><br>
                        <select class="custom-select" name="cid">
                          <option value="<?= $recieve['cid'] ?>"><?= $recieve['cname'] ?></option>
                          <?php
                          $sql1 = "select * from course";
                          $fetch=$dc->getTable($sql1);
                          while($row1=mysqli_fetch_array($fetch))
                          {
                          ?>
                          <option value="<?= $row1['cid'] ?>"><?= $row1['cname'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="bid" class="control-label">Select Batch</label><br>
                        <select class="custom-select" name="bid">
                          <option value="<?= $recieve['bid'] ?>"><?= $recieve['bname'] ?></option>
                          <?php
                          $sql2 = "select * from batch";
                          $fetch2=$dc->getTable($sql2);
                          while($row2=mysqli_fetch_array($fetch2))
                          {
                          ?>
                          <option value="<?= $row2['bid'] ?>"><?= $row2['bname'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="editid" id="editid" class="form-control" value="<?php echo $recieve['id']; ?>">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="submit" name="btn-update" value="Update" class="btn btn-block btn-primary">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <script src="js/buttons.bootstrap4.min.js"></script>
      <script src="js/buttons.flash.min.js"></script>
      <script src="js/buttons.html5.min.js"></script>
      <script src="js/buttons.print.min.js"></script>
      <script src="js/pdfmake.min.js"></script>
      <script src="js/vfs_fonts.js"></script>
      <script src="js/buttons.colVis.min.js"></script>
      <script src="js/dataTables.buttons.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>
      <script src="js/bootstrap-confirm-delete.js"></script>
      <script>
      /*password validations*/
      var check = function() {
      if(document.getElementById('repassword').value == ''){
      document.getElementById('message').innerHTML = '';
      
      
      } else if (document.getElementById('password').value ==
      document.getElementById('repassword').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Matching';
      } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Not matching';
      }
      }
      function CheckPasswordStrength(password) {
      var password_strength = document.getElementById("password_strength");
      //TextBox left blank.
      if (password.length == 0) {
      password_strength.innerHTML = "";
      return;
      }
      //Regular Expressions.
      var regex = new Array();
      regex.push("[A-Z]"); //Uppercase Alphabet.
      regex.push("[a-z]"); //Lowercase Alphabet.
      regex.push("[0-9]"); //Digit.
      regex.push("[$@$!%*#?&]"); //Special Character.
      var passed = 0;
      //Validate for each Regular Expression.
      for (var i = 0; i < regex.length; i++) {
      if (new RegExp(regex[i]).test(password)) {
      passed++;
      }
      }
      //Validate for length of Password.
      if (passed > 2 && password.length > 8) {
      passed++;
      passst = true;
      }
      //Display status.
      var color = "";
      var strength = "";
      switch (passed) {
      case 0:
      case 1:
      strength = "Weak";
      color = "red";
      break;
      case 2:
      strength = "Good";
      color = "darkorange";
      break;
      case 3:
      case 4:
      strength = "Strong";
      color = "blue";
      break;
      case 5:
      strength = "Very Strong";
      color = "green";
      break;
      }
      password_strength.innerHTML = strength;
      password_strength.style.color = color;
      }
      /*password validation end*/
      /*number validation*/
      function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 49 || charCode > 57)) {
      return false;
      }
      return true;
      }
      /*number validation end*/
      $(document).ready(function(){
      <?php echo $opmd; ?>
      $("#uname").keyup(function(event){
      var currentval = $(this).val();
      $.ajax({
      type:"POST",
      url:"../include/veremailusername.php",
      data:{ username : currentval },
      success : function ( data ){
      console.log(data);
      if (data == 'true') {
      $("#resultur").html("username is available");
      $("#resultur").css("color","green");
      $("#uname").css("border-color","green");
      urnamest = true;
      }
      
      else{
      $("#resultur").html("username is taken");
      $("#resultur").css("color","red");
      $("#uname").css("border-color","red");
      urnamest = false;
      }
      }
      });
      });
      //exist email check ajax
      $("#email").keyup(function(event){
      var currentval = $(this).val();
      $.ajax({
      type:"POST",
      url:"../include/veremailusername.php",
      data:{ email : currentval },
      success : function ( data ){
      if (data == 'true') {
      $("#resultemail").html("Email is available");
      $("#resultemail").css("color","green");
      emailst = true;
      }else{
      $("#resultemail").html("Email is taken");
      $("#resultemail").css("color","red");
      emailst = false;
      }
      }
      });
      });
      $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
      {
           extend: 'pdfHtml5',
           text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
           footer: true,
           orientation: 'landscape',
           pageSize: 'A4',
           exportOptions: {
                columns: [0,1,2,3]
            }
       },
       {
           extend: 'csv',
           text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> CSV',
           footer: false,
           exportOptions: {
                columns: [0,1,2,3]
            }
          
       },
       {
           extend: 'print',
           text: '<i class="fa fa-print" aria-hidden="true"></i> PRINT',
           footer: false,
           exportOptions: {
                columns: [0,1,2,3]
            }
       },
      ]
      });
      });
      </script>
    </div>
  </body>
</html>