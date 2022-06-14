			<div class="templatemo-content">
			<div class="row">
            <div class="col-md-12 margin-bottom-15">

<?php

$id=$_SESSION['SRoute'];

$result=mysql_query("select * From bus_data where Route='$id'");
while($row=mysql_fetch_array($result))
	{
$_SESSION['BID'] = $row['BID'];			
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTdxOIiUh1ehTRUyaSYKBBkHSYPDYB22I&callback=initMap"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="jquery.min.js"></script>



<input id="uval" type="hidden" value="<?php echo $id;?>" >
<input id="LAT" type="hidden" value="<?php echo $row['buslat'];?>" >
<input id="LAG" type="hidden" value="<?php echo $row['buslog'];?>" >


<script type="text/javascript">
var geocoder = new google.maps.Geocoder();
var abcd = parseFloat(0.000001);
var latnew="";
var lagnew="";
var spdnew="";

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  document.getElementById('info').innerHTML = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {
var cityCircle=new google.maps.Circle();
  var latLng = new google.maps.LatLng($("#LAT").val(),  $("#LAG").val());
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 15,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });


  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });


cityCircle.setMap(null);
      cityCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.2,
      strokeWeight: 1,
      fillColor: '#FF0000',
      fillOpacity: 0.12,
      map: map,
      center: latLng,
      radius: 400
    });


var y=setInterval(function() {

$.ajax({
type: "POST",
url: "GPSREADVAL.php",
cache: true,
success: function(html){
var str = html;
var res = str.split("#");
latnew=res[0];
lagnew=res[1];
spdnew=res[2];
//document.getElementById('speedval').innerHTML = spdnew;
latLng = new google.maps.LatLng(latnew,lagnew);
//alert(html);

cityCircle.setMap(null);

      cityCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.2,
      strokeWeight: 1,
      fillColor: '#FF0000',
      fillOpacity: 0.12,
      map: map,
      center: latLng,
      radius: 10
    });



marker.setPosition(latLng);
updateMarkerPosition(latLng);
}  
});

}, 1000);

/*
$.ajax({
type: "POST",
url: "GPSREADVAL.php",
cache: true,
success: function(html){
//alert(html);
var str = html;
var resplace = str.split("@");
var arrayLength = resplace.length;

}  
});
*/

}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);

</script>




<script type="text/javascript">

window.jQuery(function(){

var y=setInterval(function() {
	var dataString="NearData=User";
			$.ajax({
			type: "POST",
			url: "PARKGPSREADVAL.php",
			data: dataString,
			cache: true,
			success: function(html){
				//alert(html);
			///$("#NearestParking").fadeIn(400).html('');
			//$("#NearestParking").append(html);
			}
			});
 
 }, 2000);



});
</script>

<style>
  #mapCanvas {
    width: 100%;
    height: 300px;
  }
</style>

</div></div>

			<div class="row">
            <div class="col-md-12 margin-bottom-15">


  <div id="mapCanvas"></div>
  <hr>
 
<fieldset>
<legend><b>Bus Location</b></legend>
  <div id="infoPanel">
    <b>Marker status:</b>
    <div id="markerStatus"><i></i></div>
    <b>Current position:</b>
    <div id="info"></div>
    <b>Closest matching address:</b>
    <div id="address"></div>
  </div>
</fieldset>

</div></div>

<div class="table-responsive">
<h4 class="margin-bottom-15">History Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Student ID</b></td>
<td><b>Student Name</b></td>
<td><b>Student Email</b></td>
<td><b>Student Mobile No</b></td>
<td><b>Route</b></td>
<td><b>Location</b></td>
<td><b>DateTime</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP

$searchid=date('Y-m-d');
 
$select_table = "select * from busstudent,allstudent where busstudent.sid=allstudent.sid and bdatetime like '%".$searchid."%' and allstudent.Route='$id' order by bsid";
$fetch= mysql_query($select_table);

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['sid']; ?></TD>
<TD><?php echo $row['sname']; ?></TD>
<TD><?php echo $row['semail']; ?></TD>
<TD><?php echo $row['smobno']; ?></TD>
<TD><?php echo $row['Route']; ?></TD>
<TD><?php echo $row['Nearestlocality']; ?></TD>
<TD><?php echo $row['bdatetime']; ?></TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              
			
</div>

<?php 
		}
?>
</div>