<?php
  session_start();
    require 'Admin/include/dataClass.php';
    $dc = new Dataclass();

    if(isset($_SESSION['id'])){
      $dc->getTable("update user set active = 0 where id = '$_SESSION[id]'");
      session_destroy();
    }

    if (isset($_POST['submit'])) {

        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $record = $dc->getRow("select * from user where urname='$uname'");
          if (!empty($record))
            {
              if ($record['pass'] == $pwd)
               {
                  if ($record['type'] == "0")
                    {
                      $dc->getTable("update user set active = 1 where id = '$record[id]'");
                      $_SESSION['id'] = $record['id'];
                      $_SESSION['urname'] = $record['urname'];
                      $_SESSION['type'] = $record['type'];
                      $_SESSION['active'] = $record['active'];
                     /* setcookie(session)*/
                      header('location: Admin/index.php');
                    }
                  else
                    {
                      $dc->getTable("update user set active = 1 where id = '$record[id]'");
                      $_SESSION['id'] = $record['id'];
                      $_SESSION['fname'] = $record['fname'];
                      $_SESSION['mname'] = $record['mname'];
                      $_SESSION['lname'] = $record['lname'];
                      $_SESSION['urname'] = $record['urname'];
                      $_SESSION['cid'] = $record['cid'];
                      $_SESSION['pset'] = $record['pset'];
                      $_SESSION['sta'] = $record['st'];
                      $_SESSION['type'] = $record['type'];
                      $_SESSION['active'] = $record['active'];
                      header('location: index.php');
                    }
            }
              else
                  {
                      $loginpass ="Error In Login";                    
                  }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/sstyle.css"/>
  <link rel="stylesheet" href="css/animate.css"/>
  <link rel="stylesheet" href="fontm/font-mfizz.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css">

  


</head>

<body >
  <div id="particles-js">

</div>
<div class="col-md-12 text-center head">
  <h1>
    IANT EXAM SIMULATION
  </h1>
</div>

<div class="container" id="block">
<div class="text-center mx-5">
            <?php
                if(isset($loginpass)){
                  echo "<p style='color:red;'>$loginpass</p>";
                  unset($loginpass);
                }
             ?>
        </div>
  <div class="card">

    <form class="frm" method="post">

      <h1 class="card-header animated fadeInDownBig heading"><i class="fa fa-lock" aria-hidden="true"></i> Login </h1>

      <div class="card-block">
      <div class="animated slideInLeft">
        <input type="text" name="uname" placeholder="Enter Your Id" required/>
      </div>
      <div class="animated slideInRight">
        <input type="password" name="pwd" placeholder="Password" required/>
      </div>
      <div class="animated slideInUp">
        <input type="submit" name="submit" value="Submit">
      </div>
      </div>
    </form>
  </div>
  <div class="row mt-5">
    <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
      View Your ID
    </button>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ID LIST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="table_id" class="table">
          <thead>
		  <tr>
            <td><h3><b>Name</b></h3></td>
            <td><h3><b>ID</b></h3></td>
          </tr>
		  </thead>
		   <tbody>
          <?php

            $fetch=$dc->getTable("select * from user where type='1'");
                  while($row=mysqli_fetch_array($fetch)) {
           ?>
		  
          <tr>
            <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
            <td><?php echo $row['urname']; ?></td>
          </tr>
        <?php } ?>
			 </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/particles.min.js"></script>

<script type="text/javascript">
  particlesJS.load('particles-js', 'js/particle.json', function() {
    console.log('callback - particles.js config loaded');
  });
  
</script>
</body>


</html>
