<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

if(dataString=='')
{
alert("Enter some text..");
}
else
{

$.ajax({
type: "POST",
url: "Studentvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Studentaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});

}
else
	{
	alert(html);
	}
}
});


}
return false;
});
});
</script>

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;
if(dataString=='')
{
alert("Enter some text..");
}
else
{
	$.ajax({
type: "POST",
url: "Studentvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Studentaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});

}
else
	{
	alert(html);
	}
}
});


}
return false;
});
});
</script>

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
url: "Studentaction.php",
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
url: "Studentaction.php",
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
if(confirm("Are you sure you want to Delete?")){

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
url: "Studentaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}

  }
return false;
});
});
</script>

<script type="text/javascript">
$(function() {
$("#Routechange").change(function() {

var textcontent2 = $("#Routechange").val();
var info = 'Route='+ textcontent2;

document.getElementById("Routechangeval").innerHTML="";
$.ajax({
type: "POST",
url: "Routeval.php",
data: info,
cache: true,
success: function(html){
$("#Routechangeval").append(html);
}  
});


  
return false;
});
});
</script>


<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM allstudent WHERE sid='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from allstudent where sid=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
<form  method="post" name="form" id="form" action="">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Student ID</label>
                    <input type="text" name="ucontent" size="0" maxlength="0" value="<?php echo $row['sid']; ?>" class="form-control" id="firstName" Placeholder="Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Student Name</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['sname']; ?>" class="form-control" id="lastName" Placeholder="Email">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Student Email</label>
                    <input type="text" name="ucontent2" value="<?php echo $row['semail']; ?>" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Student Password</label>
                    <input type="text" name="ucontent3"  value="<?php echo $row['spass']; ?>" class="form-control" id="lastName" Placeholder="Password">        
                  </div>
                </div>
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Student Mobile No</label>
                    <input type="text" name="ucontent4" value="<?php echo $row['smobno']; ?>" class="form-control" id="firstName" Placeholder="Mobile No">           
                  </div>
                </div>

			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>Gender : </label>
                    <input type="radio" name="ucontent5" id="inlineRadio1" value="M" checked> Male
					<input type="radio" name="ucontent5" id="inlineRadio2" value="F"> Female
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label>Route</label>
					<select type="text" name="ucontent6" class="form-control" id="Routechange" >
					<option  value="<?php echo $row['Route']; ?>"><?php echo $row['Route']; ?></option>
          
					
<?php
$select_table1 = "select RID from bus_pickup group by RID";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
?>
<option value="<?php echo $row1['RID']; ?>"><?php echo $row1['RID']; ?></option>
<?php
}
?>		
					
					</select>
					
                  </div>
                </div>   

			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                   <label>Department : </label>
                   <input type="text" name="ucontent7" class="form-control" id="Emailaddress" Placeholder="Department" value="<?php echo $row['Department']; ?>"> 
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label>Year</label>
                    <input type="text" name="ucontent8" class="form-control" id="Emailaddress" Placeholder="Year" value="<?php echo $row['Year']; ?>"> 
                  </div>
                </div>   

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>Address</label>
                    <input type="text" name="ucontent9" class="form-control" id="Emailaddress" Placeholder="Address" value="<?php echo $row['Address']; ?>">  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label>Nearest Pickup Points</label>
                    <select type="text" name="ucontent10" class="form-control" id="Routechangeval" >
					<option  value="<?php echo $row['Nearestlocality']; ?>"><?php echo $row['Nearestlocality']; ?></option>
					</select>
                  </div>
                </div>   

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>RFID No</label>
                    <input type="text" name="ucontent11" class="form-control" id="Emailaddress" Placeholder="RFID No" value="<?php echo $row['rfidnum']; ?>"> 
                  </div>
                </div>  

              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="Updatesubmit_button">Update</button>   
                </div>
              </div>
</form>
</div>
<?php
}
}
else
{
?>
<div id="cp_contact_form">
<form name="form" id="form">

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Student Name</label>
                    <input type="text" name="content" class="form-control" id="firstName" Placeholder="Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Student Email</label>
                    <input type="text" name="content1"  class="form-control" id="lastName" Placeholder="Email">        
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Student Password</label>
                    <input type="Password" name="content2" class="form-control" id="firstName" Placeholder="Password">        
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Student Mobile No</label>
                    <input type="text" name="content3"  class="form-control" id="lastName" Placeholder="Mobile No">
                  </div>
                </div>

			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>Gender : </label>
                    <input type="radio" name="content4" id="inlineRadio1" value="M" checked> Male
					<input type="radio" name="content4" id="inlineRadio2" value="F"> Female
                  </div>
                  <div class="col-md-6 margin-bottom-15">				
					<label>Route</label>
					<select type="text" name="content5" class="form-control" id="Routechange">
<?php
$select_table1 = "select RID from bus_pickup group by RID";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
?>
<option value="<?php echo $row1['RID']; ?>"><?php echo $row1['RID']; ?></option>
<?php
}
?>	
					</select>
					
                  </div>
                </div>   

			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                   <label>Department : </label>
                   <input type="text" name="content6" class="form-control" id="Emailaddress" Placeholder="Department"> 
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label>Year</label>
                    <input type="text" name="content7" class="form-control" id="Emailaddress" Placeholder="Year">  
                  </div>
                </div>   

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>Address</label>
                    <input type="text" name="content8" class="form-control" id="Emailaddress" Placeholder="Address">  
                  </div>
				     <div class="col-md-6 margin-bottom-15">
                    <label>Nearest Pickup Points</label>
                    <select type="text" name="content9" class="form-control" id="Routechangeval" >
					</select>

                  </div>
                </div>   

				<div class="row">
				     <div class="col-md-6 margin-bottom-15">
                    <label>RFID No</label>
                    <input type="text" name="content10" class="form-control" id="Emailaddress" Placeholder="RFID No">  
                  </div>
                </div>   

              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="submit_button">Save</button>   
                </div>
              </div>
</form>
</div>
<?php
}
?>


<?php
if(isset($_POST['content']))
{

$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);
$content5=mysql_real_escape_string($_POST['content5']);
$content6=mysql_real_escape_string($_POST['content6']);
$content7=mysql_real_escape_string($_POST['content7']);
$content8=mysql_real_escape_string($_POST['content8']);
$content9=mysql_real_escape_string($_POST['content9']);
$content10=mysql_real_escape_string($_POST['content10']);

$RD=date('Y-m-d');

mysql_query("insert into allstudent(sname,semail,spass,smobno,sgender,Route,Department,Year,Address,Nearestlocality,rfidnum) values ('$content','$content1','$content2','$content3','$content4','$content5','$content6','$content7','$content8','$content9','$content10')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";

}
if(isset($_POST['ucontent']))
{

$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);
$ucontent6=mysql_real_escape_string($_POST['ucontent6']);
$ucontent7=mysql_real_escape_string($_POST['ucontent7']);
$ucontent8=mysql_real_escape_string($_POST['ucontent8']);
$ucontent9=mysql_real_escape_string($_POST['ucontent9']);
$ucontent10=mysql_real_escape_string($_POST['ucontent10']);
$ucontent11=mysql_real_escape_string($_POST['ucontent11']);

mysql_query("update allstudent set sname='$ucontent1', semail='$ucontent2', spass='$ucontent3', smobno='$ucontent4', sgender='$ucontent5',Route='$ucontent6',Department='$ucontent7',Year='$ucontent8',Address='$ucontent9',Nearestlocality='$ucontent10',rfidnum='$ucontent11' where sid=$ucontent");
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">All Student Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Student ID</b></td>
<td><b>Student Name</b></td>
<td><b>Student Email</b></td>
<td><b>Student Mobile No</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP

$searchid="";
if(isset($_POST['sid']))
{
	$searchid=$_POST['sid'];
}
					$per_page = 10; 
					$select_table = "select * from allstudent where concat(sname,' ',smobno,' ',Department,' ',Year,' ',Address) like '%".$searchid."%'";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by sid limit $start,$per_page";
$fetch= mysql_query($select_table);
}

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['sid']; ?></TD>
<TD><?php echo $row['sname']; ?></TD>
<TD><?php echo $row['semail']; ?></TD>
<TD><?php echo $row['smobno']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['sid']; ?>"><button class="btn btn-sm btn-danger"> X </button></a>
<a href="#" class="Edit" id="<?php echo $row['sid']; ?>"><button class="btn btn-sm btn-primary"> Edit </button></a>
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