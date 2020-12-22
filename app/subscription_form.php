<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css" />

  <title>Web Site Checker Subscription Form</title>
</head>

<body style="background-color: #5bc0de;">

  <div class="container-fluid bg-info">
    <nav id="mainnavbar"
      class="navbar navbar-expand-lg container-fluid col-xs-11 col-sm-10 col-md-10 col-lg-10 col-xl-8">
      <a class="navbar-brand" href="#">
        <img id="brandlogo" src="../images/logo.jpg" alt="Brand Logo" class="d-inline-block align-middle">
        Website Checker
      </a>
      <button id="menuicon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span> <i class="fas fa-bars"></i> </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Go to Website</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="container-fluid col-md-6 mt-5">
    <div class="row">
      <div id="form" class="container-fluid p-5">
        <b> <i> CheckMyWeb.online Subscription Form </i> </b>
        <hr>

        <?php
          if(isset($_POST['submit']))
          {
            if(!isset($_POST['name']) || empty($_POST['name']))
            {
              echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your name!"."</div>";
              $nameisset = false;
            }
            else
            {
              $name = htmlspecialchars($_POST['name']);
              $name = trim($name);
              if($name == "")
              {
                echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your name"."</div>";
                $nameisset = false;
              } 
              else
                $nameisset = true;
            }

            if(!isset($_POST['surname']) || empty($_POST['surname']))
            {
              echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your surname!"."</div>";
              $surnameisset = false;
            }
            else
            {
              $surname = htmlspecialchars($_POST['surname']);
              $surname = trim($surname);
              if($surname == "")
              {
                echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your surname"."</div>";
                $surnameisset = false;
              } 
              else
                $surnameisset = true;
            }

            if(!isset($_POST['email']) || empty($_POST['email']))
            {
              echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your email"."</div>";
              $emailisset = false;
            }
            else
            {
              $email = htmlspecialchars($_POST['email']);
              $email = trim($email);
              if($email == "")
              {
                echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your email"."</div>";
                $emailisset = false;
              } 
              else
                $emailisset = true;
            }

            if(!isset($_POST['password']) || empty($_POST['password']))
            {
              echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your password!"."</div>";
              $passwordisset = false;
            }
            else
            {
              $password = htmlspecialchars($_POST['password']);
              $password = trim($password);
              if($password == "")
              {
                echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your password"."</div>";
                $passwordisset = false;
              } 
              else
                $passwordisset = true;
            }

            if(!isset($_POST['expirationdate']) || empty($_POST['expirationdate']))
            {
              echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your password!"."</div>";
              $expirationdateisset = false;
            }
            else
            {
              $expirationdate = htmlspecialchars($_POST['expirationdate']);
              /*
              $expirationdate = new DateTime($expirationdate);
              $expirationdatecheck = new DateTime();
              $fark = $expirationdate->diff($expirationdatecheck);
              $tarih = $fark->format("%d gün");
              echo $tarih;
              */
              $expirationdateisset = true;
            }

            if(!isset($_POST['subscriptiontype']) || empty($_POST['subscriptiontype']))
            {
              echo '<div style="background-color: darkred; padding: 10px; margin-bottom: 10px; color: white;">'."Please enter your password!"."</div>";
              $subscriptiontypeisset = false;
            }
            else
            {
              $subscriptiontype = htmlspecialchars($_POST['subscriptiontype']);
              $subscriptiontypeisset = true;
            }

            if($nameisset && $surnameisset && $emailisset && $passwordisset && $subscriptiontypeisset && $expirationdateisset)
            {
              // form success
              require_once '../database/database.php'; 
              $query = $connect->prepare("INSERT INTO $db.tbl_clients SET `name`= ?, surname= ?, email= ?, `password`= ?, subscription= ?, expirationdate= ?");
              echo $password;
              $query->execute([
                $name,$surname,$email,$password,$subscriptiontype,$expirationdate
              ]);
            }
            else
            {
              // error
              echo "Something went wrong...";
            }
          }
        ?>

        <form action="" method="POST">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name here..."
              value="<?php if(isset($_POST['submit'])) { if(isset($_POST['name']) && !empty($_POST['name'])) { echo $name; } }?>" />
          </div>
          <div class="form-group">
            <label>Surname</label>
            <input type="text" class="form-control" name="surname" placeholder="Enter your surname here..."
              value="<?php if(isset($_POST['submit'])) { if(isset($_POST['surname']) && !empty($_POST['surname'])) { echo $surname; } } ?>" />
          </div>
          <div class="form-group">
            <label>Email Adress</label>
            <input type="text" class="form-control" name="email" placeholder="Enter your Email address here..."
              value="<?php if(isset($_POST['submit'])) { if(isset($_POST['email']) && !empty($_POST['email'])) { echo $email; } } ?>" />
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password"
              value="<?php if(isset($_POST['submit'])) { if(isset($_POST['password']) && !empty($_POST['password'])) { echo $password; } }?>"
              placeholder="Enter your Password here..." />
          </div>
          <div class="form-group">
            <label>Package Type</label>
            <select class="form-control" id="package" name="package">
              <option>Starter</option>
              <option>Team</option>
              <option>Premium</option>
            </select>
          </div>
          <div class="form-group">
            <label>Expiration Date</label>
            <input type="text" class="form-control" id="expirationdate" name="expirationdate" readonly
              value="<?php $yearlysubscription = time()+((60*60*24)* 366); echo date('Y-m-d H:i:s',$yearlysubscription); ?>" />
          </div>
          <button id="startsubscriptionbutton" type="submit" name="submit" value="1" class="btn btn-primary">Start
            Subscription</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>