$(document).ready(function () {

  if (document.querySelector('[data-easing]')) {
    var easeInQuad = new SmoothScroll('[data-easing="easeInQuad"]', {
      easing: 'easeInQuad'
    });
  }

  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      document.getElementById("gotopbutton").style.display = "block";
    } else {
      document.getElementById("gotopbutton").style.display = "none";
    }
  }

  $('#loginbutton').on('click', function () {
    $("#loginbutton").attr("disabled", "disabled");

    var email = $('#email').val();
    var password = $('#password').val();

    if (email != "" && password != "") {
      $.ajax({
        url: "app/login.php",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        cache: false,
        success: function (loginResult) {
          if (loginResult == true) {
            location.href = "index.php";
          } else if (loginResult == false) {
            Swal.fire({
              type: 'error',
              title: 'Invalid Username or Password!',
              text: 'Oops!'
            })
          }
        }
      });
    } else {
      Swal.fire(
        'Please check the inputs!',
        'You have to fill the inputs!',
        'error'
      )
    }

    $("#loginbutton").removeAttr("disabled");
  });

  $('#logoutbutton').on('click', function () {
    $("#logoutbutton").attr("disabled", "disabled");

    $.get("app/logout.php", function () {
      location.href = 'index.php';
    });

    $("#logoutbutton").removeAttr("disabled");
  });


});