<?php

if(isset($_POST['id']))
{
  $id = htmlspecialchars($_POST['id']);
  $id = trim($id);
  if($id != "")
  {
    $idcheck = true;  
  }
  else
  {
    $idcheck = false;
    echo "ID can not be empty!";
  }
}

if(isset($_POST['url']))
{
  $url = htmlspecialchars($_POST['url']);
  $url = trim($url);
  if($url != "")
  {
    $urlcheck = true;  
  }
  else
  {
    $urlcheck = false;
    echo "URL can not be empty!";
  }
}

if($idcheck && $urlcheck)
{
  require_once('../database/database.php');
  $query = $connect->prepare("UPDATE $db.tbl_websites SET `url` = ? WHERE id = ?");
  $query->execute([
    $url, $id
  ]);
  echo "Edited website succcessfully";
}


?>