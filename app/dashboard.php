<?php
session_start();
require_once('../database/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/sweetalert2.min.css" rel="stylesheet">

  <title> Website Checker Dashboard - Matris Software </title>
</head>

<body style="background-color: #5bc0de;">
  <div id="modaladdwebsite" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add a Website</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label>Website URL</label>
              <input type="text" class="form-control" id="addwebsiteurl" name="websiteurl"
                placeholder="Enter your website's URL">
            </div>
            <button type="button" class="btn btn-primary" onclick="addWebSite()">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modaleditwebsite" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Website</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label>Website URL</label>
              <input type="text" class="form-control" id="editwebsiteurl" name="websiteurl"
                placeholder="Enter your website's URL" />
            </div>
            <input type="hidden" id="editwebsiteid" value="" />
            <button type="button" class="btn btn-primary" onclick="editWebSite()">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

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
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link " href="#top">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#howitworks">How?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#pricing">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#contact">Contact</a>
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
          <li class="nav-item active">
            <a class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="logoutdashboardbutton" style="cursor: pointer"> Logout </a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
    </nav>
  </div>

  <?php  
    $id = $_SESSION['id'];  

    if(isset($_POST['update']))
    {
      // user updated your account settings
      if(isset($_POST['email']))
      {
        $newemail = htmlspecialchars($_POST['email']);
        $newemail = trim($newemail);
        if($newemail != "")
        {
          $newemail = true;        
        }
        else  
          $newemail = false;
      }

      if(isset($_POST['password']))
      {
        $newpassword = htmlspecialchars($_POST['password']);
        $newpassword = trim($newpassword);
        if($newpassword != "")
        {
          $newpassword = true;        
        }
        else
          $newpassword = false;
      }

      if($newemail && $newpassword)
      {
        $query = $connect->prepare("SELECT id FROM $db.tbl_clients WHERE id = ?");
        $query->execute([$id]);
        $updateuser = $query->fetch(PDO::FETCH_ASSOC);
        $update = $connect->prepare("UPDATE $db.tbl_clients SET email = ?, `password` = ? WHERE id = ?");
        $update->execute([ $_POST['email'], $_POST['password'], $updateuser['id'] ]);
        $email = $_POST['email'];
      }
    }

    $query = $connect->prepare("SELECT * FROM $db.tbl_clients WHERE id = ?");
    $query->execute([$id]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="container-fluid col-md-8 border mt-4 bg-light">
    <div class="row">
      <div class="container-fluid col-md-12 ml-auto text-center mt-4">
        <span class="" style="font-size: 32px; font-weight: bolder; font-style: italic;"> Your Dashboard <br>
          -<?php echo $user['name']." ".$user['surname']; ?>- </span>
        <hr class="mt-4">
      </div>
      <div class="container-fluid col-md-12">
        <div class="row">
          <div class="container col-md-8 mt-5 mb-5">
            <span style="font-size: 22px; font-weight: bold; font-style: italic"> <u> Account Settings </u> </span>
            <br>
            <form action="" method="POST" class="mt-4 mb-1 mr-5 pr-0">
              <div class="form-group">
                <label>Email address</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                  value="<?php echo $user['email']; ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password"
                  value="<?php echo $user['password']; ?>">
              </div>
              <div class="form-group">
                <label>Subscription Type</label>
                <input type="text" class="form-control" id="subscriptiontype"
                  value="<?php echo $user['subscription']; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Expiration Date</label>
                <input type="text" class="form-control" id="expirationdate"
                  value="<?php echo $user['expirationdate']; ?>" readonly>
              </div>
              <button name="update" value="1" type="submit" class="btn btn-info">Update</button>
            </form>
          </div>
        </div>
        <hr>
      </div>
      <div class="container-fluid col-md-12">
        <div class="row">
          <div class="container col-md-8 mt-5 mb-5">
            <span style="font-size: 22px; font-weight: bold; font-style: italic"> <u> Web Sites </u> </span>
            <br>
            <?php 
              $websitecount = 0;
            ?>
            <table id="websitestable" class="table table-striped mt-4">
              <thead>
                <tr>
                  <th scope="col-2">#</th>
                  <th scope="col-7">URL</th>
                  <th scope="col-3">Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                 // else: 
                  if($user['websites_ids'] != null || $user['websites_ids'] != ""): 
                    $urls = explode(",",$user['websites_ids']);
                  foreach($urls as $url):
                    $websitecount += 1; 
                    $urlsdata = $connect->prepare("SELECT id, `url` FROM $db.tbl_websites WHERE id = ?");
                    $urlsdata->execute([ $url ]);
                    $urlsdata = $urlsdata->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                  <th scope="row"><?php echo $websitecount; ?></th>
                  <td>
                    <?php echo $urlsdata['url']; ?>
                  </td>
                  <td>
                    <i class="fas fa-edit" style="cursor: pointer;"
                      onclick="editWebsiteModal('<?php echo $urlsdata['id']; ?>','<?php echo $urlsdata['url']; ?>')">
                    </i>
                    <i class="fas fa-trash" style="cursor: pointer;"
                      onclick="deleteWebSite('<?php echo $urlsdata['id']; ?>','<?php echo $user['websites_ids']; ?>')">
                    </i>
                  </td>
                </tr>
                <?php  
                  $websitecount++; 
                  endforeach;
                  endif; 
                ?>
              </tbody>
            </table>

            <div>
              <button type="button" class="btn btn-info mt-3" onclick="addWebsiteModal()"> Add a Website </button>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="../js/sweetalert2.min.js"></script>
  <script>
  $('#logoutdashboardbutton').on('click', function() {
    $("#logoutdashboardbutton").attr("disabled", "disabled");

    $.get("logout.php", function() {
      location.href = '../index.php';
    });

    $("#logoutdashboardbutton").removeAttr("disabled");
  });

  function addWebsiteModal() {
    $('#modaladdwebsite').modal();
  }

  function editWebsiteModal(id, url) {
    $('#modaleditwebsite').modal();
    $('#editwebsiteurl').val(url);
    $('#editwebsiteid').val(id);
  }

  function addWebSite() {
    var url = $('#addwebsiteurl').val();

    $.ajax({
      url: "add_website_url.php",
      type: "POST",
      data: {
        url: url
      },
      cache: false,
      success: function(result) {
        $("#websitestable").load(window.location + " #websitestable");
      }
    });
  }

  function editWebSite() {
    var id = $('#editwebsiteid').val();
    var url = $('#editwebsiteurl').val();

    $.ajax({
      url: "edit_website_url.php",
      type: "POST",
      data: {
        id: id,
        url: url
      },
      cache: false,
      success: function(result) {
        alert(result);
        $("#websitestable").load(window.location + " #websitestable");
      }
    });
  }

  function deleteWebSite(id, oldwebsitesids) {
    $.ajax({
      url: "delete_website_url.php",
      type: "POST",
      data: {
        id: id,
        oldwebsitesids: oldwebsitesids
      },
      cache: false,
      success: function(result) {
        $("#websitestable").load(window.location + " #websitestable");
      }
    });
  }
  </script>

</body>

</html>