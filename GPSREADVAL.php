<?php
session_start();
include("db.php");

$id= $_SESSION['BID'];

$result=mysql_query("select * From bus_data where BID=$id");
while($row=mysql_fetch_array($result))
	{	
echo $row['buslat']."#".$row['buslog']."#".$row['BID'];
	}
		
?>
