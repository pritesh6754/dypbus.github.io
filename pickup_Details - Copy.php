
        <div class="templatemo-content">

          <h1>Pickup Point Details</h1>
		<hr>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTdxOIiUh1ehTRUyaSYKBBkHSYPDYB22I&callback=initMap"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 

<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
</div>

    <div class="row templatemo-form-buttons">

        <script>
            var map;
            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    center: new google.maps.LatLng(16.6972161, 74.2825023),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('map_canvas'),
                    mapOptions
                );
                google.maps.event.addListener(map, 'click', function(event) {

                });
            }

			
function newLocation(newLat,newLng) {
	map.setCenter({
		lat : newLat,
		lng : newLng
	});

            function mapDivClicked (event) {
                var target = document.getElementById('map_canvas'),
                    posx = event.pageX - target.offsetLeft,
                    posy = event.pageY - target.offsetTop,
                    bounds = map.getBounds(),
                    neLatlng = bounds.getNorthEast(),
                    swLatlng = bounds.getSouthWest(),
                    startLat = neLatlng.lat(),
                    endLng = neLatlng.lng(),
                    endLat = swLatlng.lat(),
                    startLng = swLatlng.lng();

                document.getElementById('lat').value = startLat + ((posy/350) * (endLat - startLat));
                document.getElementById('lng').value = startLng + ((posx/500) * (endLng - startLng));
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


        <div id="map_canvas" onclick="mapDivClicked(event);" style="height: 350px; width: 100%;"></div>


							</div>