<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");

$d= $_GET["Bussno"];
$e= $_GET["pass"];
$result=mysql_query("select * From bus_data where Bussno='$d' and pass ='$e'");

while($row=mysql_fetch_array($result))
	{	
$_SESSION['userid'] = $row['BID'];
$_SESSION['username']= $row['DriverNam'];
	}
		
if($_SESSION['userid']!="" and $_SESSION['username']!="")
	{
	echo "Saved#".$_SESSION['userid'];
	}
	else
	{
	echo "Login Fail Plz Check User Name and Password";
	}
?>