// custom js File



//quiz page script start

// Get the modal

var modal = document.getElementById('myModal');
var referror = "You are Tries to refresh the Page."

// check user is refresh  the page or not
if (performance.navigation.type == 1) {
  modal.style.display = "block";
  document.getElementById('mtext').innerHTML = referror;
  setTimeout(function(){$('.mdc').click(); },500);
} else {
  console.info("This page is not reloaded");
}

// disable back button
(function (global) {

if(typeof (global) === "undefined")
{
  throw new Error("window is undefined");
}

  var _hash = "!";
  var noBackPlease = function () {
      global.location.href += "#";

  // making sure we have the fruit available for juice....
  // 50 milliseconds for just once do not cost much (^__^)
      global.setTimeout(function () {
          global.location.href += "!";
      }, 50);
  };

// Earlier we had setInerval here....
  global.onhashchange = function () {
      if (global.location.hash !== _hash) {
          global.location.hash = _hash;
      }
  };

  global.onload = function () {

  noBackPlease();
  };

})(window);
//END


// jquery start
$(document).ready(function() {



  //disable right click
  $(document).bind("contextmenu", function(e) {

    return false;
  });

  //if user tries to open or minimize browser then stop script
  $(window).blur(function() {
      modal.style.display = "block";
      document.getElementById('mtext').innerHTML = "You are Tries to leave the page.";
      setTimeout(function(){$('.mdc').click(); },500);
  });

  // question one by one script start

  var totalQuestions = $('.questions').length; // get total question on page with question class


  var currentQuestion = 0;
  $questions = $('.questions');
  $questions.hide();
  $('#submit').hide();
  $('#prev').hide();
  $($questions.get(currentQuestion)).fadeIn();
  $('#next').click(function() {
    $($questions.get(currentQuestion)).fadeOut(function() {
      currentQuestion = currentQuestion + 1;
      $('#prev').show();
      if (currentQuestion == totalQuestions - 1) {
        $($questions.get(currentQuestion)).fadeIn();
        $('#next').hide();
        $('#submit').show();
      } else {
        $($questions.get(currentQuestion)).fadeIn();
      }

    });
  });

  $('#next').click(function() {
    $('#next').hide();
    setTimeout(function() {
      $('#next').show();
    }, 300);
  });

 $('#prev').click(function() {
    currentQuestion = currentQuestion - 1;
    $($questions.get(currentQuestion + 1)).fadeOut(function() {
      $('#next').show();
      $('#submit').hide();

      $($questions.get(currentQuestion)).fadeIn();
      if (currentQuestion == 0) {
        $('#prev').hide();
      }
    });
  });

  // timer script
  

  // disable F5 and F12 key



});

//quiz page script end
