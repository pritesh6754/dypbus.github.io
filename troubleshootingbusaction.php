<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

if(isset($_POST['content']))
{
$message=$_POST['content'];
$Buserid=$_SESSION['Buserid'];

mysql_query("insert into trouble(BID,Message) values ('$Buserid','$message')");
echo "<font style='color:#0000FF;'>Request Post</font><br><br><br>";
}
?>