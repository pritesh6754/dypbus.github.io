			<div class="templatemo-content">
          <h1>Trouble Shooting</h1>
		<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

var dataString = 'page=1';//+ textcontent2;
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');

$.ajax({
type: "POST",
url: "troubleshootingaction.php",
data: dataString,
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

