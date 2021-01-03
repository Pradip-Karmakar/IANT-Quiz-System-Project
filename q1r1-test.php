<?php
  session_start();
  require 'Admin/include/dataClass.php';
  $dc = new Dataclass();
if (!isset($_SESSION['id']) || $_SESSION['type'] != "1") {
header('location:login.php');
  }
  if($_SESSION['type'] == 0){
	  die("admin can not give an Exam");
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
  <title>IANT</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>

  <div class="container">
    <div class="row" style="margin-top:15vh">
      <div class="col-md-6 offset-3">
        <h1 class="text-center">END IN <i class="fa fa-clock-o" aria-hidden="true"></i> <span id="time"></span></h1>
      </div>

    </div>
    <div class="row" style="margin-top:5vh">
      <div class="col-md-8 offset-2">
        <form action="q1r1-res.php" method="post" id="myform">
          <?php
          $qid = 0;
          $sql = "select * from question where pset = '$_SESSION[pset]' and cid = '$_SESSION[cid]' ORDER BY RAND() LIMIT 50";
          $res=$dc->getTable($sql);
          while ($row = mysqli_fetch_array($res)) {
           ?>
          <div class="questions">
            <input type="hidden" name="id[<?php echo $qid; ?>]" value="<?php echo $row['qid']; ?>">
            <div class="card">
              <div class="card-header card-inverse card-primary ">
                <p style="color:white"><?php echo $qid+1; ?>. <?php echo $row['que']; ?></p>
              </div>
              <div class="card-block p-4">
                <div class="options">
                  <label class="custom-control custom-radio">
                    <input id="radio1" type="radio" name="que[<?php echo $qid; ?>]" value="1" class="option custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $row['o1']; ?></span>
                  </label><br>
                  <label class="custom-control custom-radio">
                    <input id="radio1" type="radio" name="que[<?php echo $qid; ?>]" value="2" class="option custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $row['o2']; ?></span>
                  </label><br>
                  <label class="custom-control custom-radio">
                    <input id="radio1" type="radio" name="que[<?php echo $qid; ?>]" value="3" class="option custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $row['o3']; ?></span>
                  </label><br>
                  <label class="custom-control custom-radio">
                    <input id="radio1" type="radio" name="que[<?php echo $qid; ?>]" value="4" class="option custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $row['o4']; ?></span>
                  </label><br>
                  <input class="option" type="radio" name="que[<?php echo $qid; ?>]" value="0" checked style="display:none">
                </div>
              </div>
            </div>
          </div>
          <?php
          $qid++;
        }
         ?>
          <br>
          <div class="text-center">
          <input type="button" id='prev' value="Previous" class="btn btn-primary"> <input type="button" id='next' value="Next" class="btn btn-primary">
          <input type="submit" id='submit' value="Submit" class="btn btn-primary">
        </div>
        </form>
      </div>
    </div>
  </div>
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <p id="mtext"></p>
      <button type="button" class="btn btn-primary mdc">close</button>
    </div>
  </div>
  <!-- javascript files -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/custom.js"></script>
  <script type="text/javascript">

  var startTime = new Date().getTime();        //Start the clock!
 window.onbeforeunload = function()        //When the user leaves the page(closes the window/tab, clicks a link)...
 {
     var endTime = new Date().getTime();        //Get the current time.
     var timeSpent = (endTime - startTime);        //Find out how long it's been.
     var xmlhttp;        //Make a variable for a new ajax request.
     if (window.XMLHttpRequest)        //If it's a decent browser...
     {
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp = new XMLHttpRequest();        //Open a new ajax request.
     }
     else        //If it's a bad browser...
     {
         // code for IE6, IE5
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");        //Open a different type of ajax call.
     }
     var url = "em.php?time="+timeSpent;        //Send the time on the page to a php script of your choosing.
     xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
     xmlhttp.send(null);        //Send the request and don't wait for a response.
 }

  $(document).ready(function() {

    function disableF(e) {
      if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 123 || (e.which || e.keyCode) == 122){ e.preventDefault();}
    };
    $(document).on("keydown", disableF);

    $(".mdc").click(function() {
        $.ajax({
            type: "POST",
            url: 'em.php',
            data: { rr : "You are disqualified because of you try to refresh or leave the page" },
            success: function(data)
            {}
        });
        setTimeout(function(){$('#submit').click(); },500);
    });
    function startTimer(duration, display) {
      var timer = duration,
        minutes, seconds;
      setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        sc = minutes != "00" ? "Minutes" : "seconds";

        display.text(minutes + ":" + seconds + " " + sc);

        if (--timer < 0) {
          timer = duration;
        }
      }, 1000);
    }

    jQuery(function($) {
      var Minutes = 3600,
        display = $('#time'),
        mili = Minutes * 1000;
      startTimer(Minutes, display);
      setTimeout(function() {
        $('#submit').click();
      }, mili);
    });
  });



  </script>
</body>

</html>
