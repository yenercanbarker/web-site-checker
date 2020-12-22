<?php
session_start();
require_once('../database/database.php');

$id = "21";
$id = $_SESSION['id'];
if(isset($_POST['url']))
{
  $url = htmlspecialchars($_POST['url']);
  $url = trim($url);
  if($url != "")
  {
    $query = $connect->prepare("INSERT INTO $db.tbl_websites SET `url`= ?, email_id = ?");
    $query->execute([ 
      $url, $id
    ]);
    if($query)
    {
      $lastid = $connect->lastInsertId();
      $query = $connect->prepare("SELECT websites_ids FROM $db.tbl_clients WHERE id = ?");
      $query->execute([ $id ]); 
      $data = $query->fetch(PDO::FETCH_ASSOC);
      $currentwebsites = $data['websites_ids'];
      if($currentwebsites == null)
        $newwebsites = $lastid;
      else
        $newwebsites = $currentwebsites.",".$lastid;
      $query = $connect->prepare("UPDATE $db.tbl_clients SET websites_ids = ? WHERE id = ?");
      $query->execute([ $newwebsites, $id ]);
      echo "Website Added Successfully...";
    }
  }
}
else
  echo "Please Fill the Blanks...";

?>