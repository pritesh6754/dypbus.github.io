<?php
include('db.php');

if(isset($_POST['Book']))
{
$ucontent=mysql_real_escape_string($_POST['User']);
$ucontent1=mysql_real_escape_string($_POST['BID']);

$nm="";
$mobval="";
$select_table = "select * from allstudent where rfidnum='$ucontent'";
$fetch= mysql_query($select_table);
while($row=mysql_fetch_array($fetch))
	{	
		$ucontent=$row['sid'];
		$nm=$row['sname'];
		$mobval=$row['smobno'];
	}

if($nm!="")
{
$Rdate=date('Y-m-d');
$select_table = "select * from busstudent where bid ='$ucontent1' and sid ='$ucontent' and bdatetime like '%".$Rdate."%'";
$fetch= mysql_query($select_table);
if(mysql_num_rows($fetch)>=1)
{
	$Rdateus=date('Y-m-d h:i:s');
	//echo "Hi $nm, You allready in Bus";
	
while($row=mysql_fetch_array($fetch))
	{	
		$bsid=$row['bsid'];
		$select_table = "update busstudent SET bdatetimeout='$Rdateus' where bsid='$bsid'";
		mysql_query($select_table);	
		echo "<font style='color:#0000FF;'>Hi $nm, Your Now Out</font><br><br><br>";
	}
}
else{
$select_table = "insert into busstudent(bid,sid) value('$ucontent1','$ucontent')";
mysql_query($select_table);	
echo "<font style='color:#0000FF;'>Hi $nm, Your Enter In Bus</font><br><br><br>";
}

}
else
{
echo "Plz enter valid user RF ID";
}

}
?>

