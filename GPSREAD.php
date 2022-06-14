<?php
include("db.php");

$a= $_GET["idstr"];
$b= $_GET["latitudestr"];
$c= $_GET["longitudestr"];
$e= date('d-M-Y');

mysql_query("UPDATE bus_data set buslat='$b',buslog='$c',timeonposition='$Rdateus' WHERE BID='$a'");
echo "Saved";

?>