			<div class="templatemo-content">
          <h1>Student History Details</h1>
		<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>

<div>Date: <br>
 <input type="text" id="sertex" class="form-control"  name="sertex" onkeyup="autosearch(1);" placeholder="Date"value="<?php echo date('Y-m-d'); ?>"><br>
<div>



<script type="text/javascript">
function autosearch(str)
{
var textcontent2 = '1';
var textcontent1 = $("#sertex").val();
var info = 'sid=' + textcontent1+'&page='+ textcontent2;
if(info=='')
{
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
}  
});
}
}
</script>
<hr>

<script type="text/javascript">
	$(document).ready(function(){

var textcontent2 = '1';
var textcontent1 = $("#sertex").val();
var info = 'sid=' + textcontent1+'&page='+ textcontent2;
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
}  
});
return false;

});

</script>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
</div>

