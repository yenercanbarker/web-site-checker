<?php

$dbusername="root";  // your username to login database
$dbpassword="";   // your password to login database
$hostname = "localhost";  
$db = "websitechecker"; // your database name

$connect = new PDO("mysql:hostname=$hostname;db=$db;charset=utf8;",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION))

?>