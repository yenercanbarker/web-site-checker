<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/sweetalert2.min.css" rel="stylesheet">

  <title>Web Site Checker - Matris Software</title>
</head>

<body>

  <div id="loginmodal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">CheckMyWeb.online Login Panel </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="loginform" class="pt-2" method="post">
            <div class="mb-2 font-italic text-danger"> Please fill the blanks, * is required. </div>
            <div class="form-group pt-2">
              <label for="exampleInputEmail1">Email Address *</label>
              <input type="email" class="form-control " id="email" aria-describedby="emailHelp"
                placeholder="Enter your email address">
            </div>
            <div class="form-group pt-1">
              <label for="exampleInputPassword1">Password *</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button id="loginbutton" type="button" class="btn btn-primary"> Login </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation Bar id="mainnavbar" -->
  <div class="container-fluid bg-info">
    <nav id="mainnavbar"
      class="navbar navbar-expand-lg container-fluid col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-8">
      <a class="navbar-brand" href="#">
        <img id="brandlogo" src="images/logo.jpg" alt="Brand Logo" class="d-inline-block align-middle">
        Website Checker
      </a>
      <button id="menuicon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span> <i class="fas fa-bars"></i> </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link scroll" data-easing="easeInQuad" href="#top">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scroll" data-easing="easeInQuad" href="#howitworks">How?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scroll" data-easing="easeInQuad" href="#pricing">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scroll" data-easing="easeInQuad" href="#contact" data-scroll="contact">Contact</a>
          </li>
        </ul>
        <?php if(!isset($_SESSION['id'])): ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#loginmodal" style="cursor: pointer">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pricing">Sign Up</a>
          </li>
        </ul>
        <?php else: ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="app/dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="logoutbutton" style="cursor: pointer"> Logout </a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
    </nav>
  </div>

  <div class="continer-fluid">
    <div class="row">
      <div class="mainslider col-md-12">
        <!-- Slider -->
        <div id="mainslider" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#mainslider" data-slide-to="0" class="active"></li>
            <li data-target="#mainslider" data-slide-to="1"></li>
            <li data-target="#mainslider" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/slider/slider1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/slider/slider2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/slider/slider3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#mainslider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#mainslider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <a class="scroll" id="gotopbutton" data-easing="easeInQuad" title="Go to Up" href="#top"> UP </a>
      <section id="info" data-anchor="info">
        <div class="toppanelcontentcontainer container-fluid ml-auto col-xs-12">
          <div class="row">
            <div class="firstpanel container-fluid col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-12 text-center">
              <div
                class="col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-8  container-fluid ml-auto pt-4 pb-3 mb-3 mt-3">
                <div class="container-fluid ml-auto">
                  <h1 class="text-center pb-4"> Is Your Website Online? </h1>
                  Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen
                  bir
                  matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı
                  1500'lerden
                  beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle
                  kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum
                  pasajları
                  da
                  içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum
                  sürümleri
                  içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.
                </div>
                <br> <br>
                <div class="container-fluid col-xs-10">
                  <div class="row">
                    <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                      <div class="servicescard card p-4">
                        <div class="card-body">
                          <i class="fas fa-clock" style="font-size: 80px"></i>
                          <h6 class="pt-4"> We'll check your page every 15 minutes, 30 minutes, 1 / 3 / 6 hours.</h6>
                        </div>
                      </div>
                      <br>
                    </div>

                    <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                      <div class="servicescard card p-4">
                        <div class="card-body">
                          <i class="fas fa-envelope" style="font-size: 80px"></i>
                          <h6 class="pt-4"> If something went wrong in your website we'll send you a mail and you'll get
                            information.
                          </h6>
                        </div>
                      </div>
                      <br>
                    </div>

                    <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                      <div class="servicescard card p-4">
                        <div class="card-body">
                          <i class="fas fa-clipboard-list" style="font-size: 80px"></i>
                          <h6 class="pt-4"> We'll get info to you your website's weekly, monthly and yearly reports.
                          </h6>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </section>

      <div class="parallax container-fluid col-xs-12">
        <div class="container-fluid col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-8 pt-4 pb-3 mb-3 mt-3">
          <h1 class="text-white font-italic text-center"> "Time isn't the
            main thing. <br> It's the only thing." </h1>
        </div>
      </div>

      <div id="secondpanel" class="container-fluid col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-12 text-center">
        <section id="howitworks" data-anchor="howitworks">
          <div class="col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-8 container-fluid ml-auto pt-4 pb-3 mb-3 mt-3">
            <div class="toppanelintroduction container-fluid ml-auto col-xs-10">
              <h1 class="text-center pb-4"> How It Works? </h1>
              Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen
              bir
              matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı
              1500'lerden
              beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını
              sürdürmekle
              kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum
              pasajları
              da
              içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum
              sürümleri
              içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.
            </div>
            <br> <br>
            <div class="container-fluid col-xs-10">
              <div class="row">
                <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                  <div class="servicescard card p-4">
                    <div class="card-body">
                      <i class="fas fa-clock" style="font-size: 80px"></i>
                      <h6 class="pt-4"> We'll check your page every 15 minutes, 30 minutes, 1 / 3 / 6 hours.</h6>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                  <div class="servicescard card p-4">
                    <div class="card-body">
                      <i class="fas fa-envelope" style="font-size: 80px"></i>
                      <h6 class="pt-4"> If something went wrong in your website we'll send you a mail and you'll
                        get
                        information.
                      </h6>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                  <div class="servicescard card p-4">
                    <div class="card-body">
                      <i class="fas fa-clipboard-list" style="font-size: 80px"></i>
                      <h6 class="pt-4"> We'll get info to you your website's weekly, monthly and yearly reports.
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>



      <div id="thirdpanel" class="container-fluid col-xs-12 text-center bg-info">
        <section id="pricing" data-anchor="pricing">
          <div
            class="bg-light col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-8  container-fluid ml-auto pt-4 pb-3 mb-3 mt-3">
            <div class="toppanelintroduction container-fluid ml-auto col-xs-10">
              <h1 class="text-center pb-4"> Pricing </h1>
              Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen
              bir
              matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı
              1500'lerden
              beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını
              sürdürmekle
              kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum
              pasajları
              da
              içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum
              sürümleri
              içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.
            </div>
          </div>
      </div>
      </section>
    </div>

    <div id="fourthpanel" class="container-fluid col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-12 text-center">
      <section id="contact" data-anchor="contact">
        <div class="col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-8  container-fluid ml-auto pt-4 pb-3 mb-3 mt-3">
          <div class="toppanelintroduction container-fluid ml-auto col-xs-10">
            <h1 class="text-center pb-4"> Contact </h1>
            Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen
            bir
            matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı
            1500'lerden
            beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle
            kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum
            pasajları
            da
            içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum
            sürümleri
            içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.
          </div>
          <br> <br>
          <div class="container-fluid col-xs-10">
            <div class="row">
              <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                <div class="servicescard card p-4">
                  <div class="card-body">
                    <i class="fas fa-clock" style="font-size: 80px"></i>
                    <h6 class="pt-4"> We'll check your page every 15 minutes, 30 minutes, 1 / 3 / 6 hours.</h6>
                  </div>
                </div>
                <br>
              </div>

              <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                <div class="servicescard card p-4">
                  <div class="card-body">
                    <i class="fas fa-envelope" style="font-size: 80px"></i>
                    <h6 class="pt-4"> If something went wrong in your website we'll send you a mail and you'll get
                      information.
                    </h6>
                  </div>
                </div>
                <br>
              </div>

              <div class="container col-sm-10 col-md-4 col-lg-4 col-xl-4">
                <div class="servicescard card p-4">
                  <div class="card-body">
                    <i class="fas fa-clipboard-list" style="font-size: 80px"></i>
                    <h6 class="pt-4"> We'll get info to you your website's weekly, monthly and yearly reports.
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  </div>
  </div>


  <div class="container-fluid bg-info text-center">
    <div class="row">
      <div id="footercontent" class="container-fluid">
        <h1 class=""> Footer </h1>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <script src="js/smooth-scroll.polyfills.js"></script>
  <script src="js/sweetalert2.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/parallax.min.js"></script>
</body>

</html>