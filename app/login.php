<?php
session_start();

if(!isset($_POST['email']) || empty($_POST['email']))
{
  echo false;
  exit;
}

if(!isset($_POST['password']) || empty($_POST['password']))
{
  echo false;
  exit;
}

require_once('../database/database.php');

$query = $connect->prepare("SELECT id, email,`password` FROM $db.tbl_clients WHERE email=?");
$query->execute([
  $_POST['email']
]);
$data = $query->fetch(PDO::FETCH_ASSOC);
if($data['password'] == $_POST['password'])
{
  $_SESSION['id'] = $data['id'];
  //$_SESSION['email'] = $_POST['email'];
  //$_SESSION['password'] = $_POST['password'];
  echo true;
}


?>