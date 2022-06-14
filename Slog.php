<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");

$d= $_GET["email"];
$e= $_GET["pass"];
$result=mysql_query("select * From allstudent where semail='$d' and spass ='$e'");

while($row=mysql_fetch_array($result))
	{	
$_SESSION['userid'] = $row['sid'];
$_SESSION['username']= $row['sname'];
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