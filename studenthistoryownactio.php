<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "studenthistoryaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "studenthistoryownactio.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "studenthistoryownactio.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM busstudent WHERE bsid='$id'";
mysql_query( $delete);
}
?>


<div class="table-responsive">
<h4 class="margin-bottom-15">History Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Student ID</b></td>
<td><b>Student Name</b></td>
<td><b>Route</b></td>
<td><b>Location</b></td>
<td><b>DateTime</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP

$searchid="";
if(isset($_POST['sid']))
{
	$searchid=$_POST['sid'];
}

$sid=$_SESSION['Suserid'];


					$per_page = 10; 
					$select_table = "select * from busstudent,allstudent where busstudent.sid=allstudent.sid and bdatetime like '%".$searchid."%' and busstudent.sid='$sid'";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by bsid limit $start,$per_page";
$fetch= mysql_query($select_table);
}

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['sid']; ?></TD>
<TD><?php echo $row['sname']; ?></TD>
<TD><?php echo $row['Route']; ?></TD>
<TD><?php echo $row['Nearestlocality']; ?></TD>
<TD><?php echo $row['bdatetime']; ?></TD>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 
			
</div>