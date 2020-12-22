<?php
session_start();
require_once('../database/database.php');

if(isset($_POST['id']))
{
  $newwebsiteids = "";

  $id = htmlspecialchars($_POST['id']);
  $id = trim($id);
  if($id != "")
  {
    $query = $connect->prepare("DELETE FROM $db.tbl_websites WHERE id = ?");
    $query->execute([ $id ]);
  }

  if(isset($_POST['oldwebsitesids']))
  {
    $websitesids = htmlspecialchars($_POST['oldwebsitesids']);
    $websitesids = trim($websitesids);
    if($websitesids != "")
    {
      if(strstr($websitesids,$id))
      {
        $websitesids = explode(",",$websitesids);
        foreach($websitesids as $websiteid)
        {
          if($websiteid == $id)
            continue;
          else
            $newwebsiteids .= $websiteid.",";
        }
        $newwebsiteids = trim($newwebsiteids,",");
        $query = $connect->prepare("UPDATE $db.tbl_clients SET websites_ids = ? WHERE id = ?");
        $id = $_SESSION['id'];
        $query->execute([ $newwebsiteids, $id ]);
      }
    }
  }
}
else
  echo "Fill the blanks!!";

?>