			<div class="templatemo-content">
          <h1>Trouble Shooting</h1>
		<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>



<div id="container">


<div id="cp_contact_form">
<form name="form" id="form">
<div class="col-md-6 margin-bottom-15">
<label for="author">Message:*</label>
<input Type="text" name="content" id="content" class="form-control">
</div>
					
<div class="col-md-6 margin-bottom-15">
<input type="button" value="Post" name="submit" class="submit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;"></div>
</form>
</div>


<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page=1';

document.getElementById("show").innerHTML="";
$("#show").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');

$.ajax({
type: "POST",
url: "troubleshootingbusaction.php",
data: dataString,
cache: true,
success: function(html){
$("#show").fadeIn(400).html('');
$("#show").append(html);
}  
});

return false;
});
});
</script>

<hr><br><br>


<div id="show" class="show"></div>

</div>

</div>

