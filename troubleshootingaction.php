<?php
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
url: "troubleshootingaction.php",
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
url: "troubleshootingaction.php",
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
url: "troubleshootingaction.php",
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
$delete = "DELETE FROM trouble WHERE TID='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from bus_data where BID=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
</div>
<?php
}
}

?>

<div class="table-responsive">
<h4 class="margin-bottom-15">Trouble Shooting</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Bus ID</b></td>
<td><b>Driver Name</b></td>
<td><b>Driver Contact</b></td>
<td><b>Bus No</b></td>
<td><b>Bus Route</b></td>
<td><b>Trouble</b></td>
<td><b>Date</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP

$select_table = "select * from trouble,bus_data where trouble.BID=bus_data.BID";
$select_table =$select_table." order by Tdatetime desc";
$fetch= mysql_query($select_table);

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['BID']; ?></TD>
<TD><?php echo $row['DriverNam']; ?></TD>
<TD><?php echo $row['DriverCno']; ?></TD>
<TD><?php echo $row['Bussno']; ?></TD>
<TD><?php echo $row['Route']; ?></TD>
<TD><?php echo $row['Message']; ?></TD>
<TD><?php echo $row['Tdatetime']; ?></TD>
<TD><a href="Main.php?page=7&bid=<?php echo $row['BID']; ?>" id="<?php echo $row['BID']; ?>">[ Track ]</a>
<a href="#" class="ABCD" id="<?php echo $row['TID']; ?>">[ X ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 	
</div>