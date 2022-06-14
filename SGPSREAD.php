<?php
include("db.php");

$a= $_GET["idstr"];
$b= $_GET["latitudestr"];
$c= $_GET["longitudestr"];
$e= date('d-M-Y');


#$result=mysql_query("select * From userdb where Uid='$id'");
#while($row=mysql_fetch_array($result))
#	{	
#	}

$lat1="";
$log1="";
$lat2="";
$log2="";
$lat1=$b-0.005;
$lat2=$b+0.005;
$log1=$c-0.005;
$log2=$c+0.005;
	
$result=mysql_query("select * From bus_data where buslat>=$lat1 and buslat<=$lat2 and buslog>=$log1 and buslog<=$log2");
while($row=mysql_fetch_array($result))
	{	
echo "Saved#Near";
	}
?>