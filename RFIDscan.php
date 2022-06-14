<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>


<div class="templatemo-content">
<script type="text/javascript" src="js/jquery.min.js"></script>

<div class="form-horizontal templatemo-signin-form" >
<h1>RF-ID Scan</h1>
<br><br>

<input type="hidden" id="BID" name="username" Value="<?php echo $_SESSION['Buserid']; ?>">

	 <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">RF-ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="RFKEY" name="username" placeholder="RF-ID">
            </div>
          </div>              
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
             
            </div>
          </div>
        </div>
         
		 <div class="form-group">
         <div class="col-md-12">
         <div class="col-sm-offset-2 col-sm-10">
		<div id="show" class="show"></div></div></div></div>

      </div>


<script>
$("#RFKEY").keydown(function (e) {

	if ($(e.target).attr("class")=='form-control' && e.keyCode == 13) {

var textcontent1 = $("#RFKEY").val();
var BID = $("#BID").val();


var dataString = 'Book=Book&User='+textcontent1+'&BID='+BID;
document.getElementById("show").innerHTML="";
$("#show").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Bookaction.php",
data: dataString,
cache: true,
success: function(html){
$("#show").fadeIn(400).html('');
$("#show").append(html);
 $("#RFKEY").val('');
$("#RFKEY").focus();
}  
});

	}

	});
</script>

    </div>