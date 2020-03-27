<?php
include("conf/belgocv.inc.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Circles</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  <?php
        $country="Algeria";
      	$field='SELECT school.`num`,school.`ecole_uk`,school.`lat`,school.`long`,school.`ville_uk`,pays.`pays_uk`';
		$where='pays.`pays_uk`';
		
		$sql =" $field FROM `ecole` as school LEFT JOIN pays on school.num_pays=pays.num_pays where $where='$country' AND niveau=2 order by ecole_uk ASC ";
		
		mysql_query('SET CHARACTER SET utf8');
		$get_address_sql = mysql_query($sql);
		$get_address_res['data'][] = '';
		while($res= mysql_fetch_assoc($get_address_sql)){
			$res['ecole_uk']='School name not visible in demo mode.';
			$get_address_res['data'][]=$res ;
		//	echo json_encode($get_address_res);
		}
		$count=mysql_num_rows($get_address_sql);
		$get_address_res['push']=ceil($count*15/60);
		$get_address_res['dataCount']=ceil($count*60/60);
		
		echo json_encode($get_address_res);
		
  
  
  
  ?>
  
    <div id="map"></div>
    <script>
      // This example creates circles on the map, representing populations in North
      // America.

      // First, create an object containing LatLng and population for each city.
      var citymap = {
        chicago: {
          center: {lat: 41.878, lng: -87.629},
          population: 2714856
        },
        newyork: {
          center: {lat: 40.714, lng: -74.005},
          population: 8405837
        },
        losangeles: {
          center: {lat: 34.052, lng: -118.243},
          population: 3857799
        },
        vancouver: {
          center: {lat: 49.25, lng: -123.1},
          population: 603502
        }
      };
	  var main_circle=null
	  var mousemove_handler=null
      function initMap(){
		var cord1 =[{lat:32.6709846,lng:-97.0834041},{lat:32.6722241,lng:-97.0828247},{lat:32.6726791,lng:-97.0838842}];
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: 37.090, lng: -95.712},
          mapTypeId: 'terrain',
		  draggable: true,
		  draggableCursor:'pointer'
        });
		var marker;
		cord1.map((item,itemkey)=>{
			marker = new google.maps.Marker({position: item, map: map});
		})
		google.maps.event.addListener(map, 'mouseup', function(e) {            
			if(mousemove_handler) google.maps.event.removeListener(mousemove_handler);
			map.setOptions({draggable:true, draggableCursor:''}); //allow map dragging after the circle was already created 
			if(main_circle) main_circle.setOptions({clickable:true});
		});
		map.addListener('click', function(e) {
			let lat = e.latLng.lat();
			let longi = e.latLng.lng();
			var static_position = new google.maps.LatLng(lat,longi);
			var radius = google.maps.geometry.spherical.computeDistanceBetween(static_position, e.latLng)
			if(main_circle){
				main_circle.setMap(null)
			}
			main_circle = createCircle(static_position, radius); //create circle with center in our static position and our radius
			/*mousemove_handler = map.addListener('mousemove', function(mousemove_event) { //if after mousedown user starts dragging mouse, let's update the radius of the new circle
				var new_radius = google.maps.geometry.spherical.computeDistanceBetween(static_position, mousemove_event.latLng);
				console.log(new_radius);
				main_circle.setOptions({radius:new_radius}); 
			});*/
			// 3 seconds after the center of the map has changed, pan back to the
			// marker.
			console.log('Map Double click');
		});
		function createCircle(center, radius) {

			var circle = new google.maps.Circle({
				fillColor: '#ffffff',
				fillOpacity: .6,
				strokeWeight: 1,
				strokeColor: '#ff0000',
				draggable: true,
				editable: true,
				map: map,
				center: center,
				radius: radius,
				//clickable:false,
				geodesic: true
			});

			google.maps.event.addListener(circle, 'radius_changed', function (e) {
				console.log(circle.getCenter().lat())
				console.log(circle.getCenter().lng())
				console.log('circle radius changed');
			});
			google.maps.event.addListener(circle, 'center_changed', function (event) {
				if(circle.getCenter().toString() !== center.toString()) circle.setCenter(center);
			});
			
			return circle;
		}
		/*Overlay implementation and draw circle*/
        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        /*for (var city in citymap) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(2714856) * 100
          });
        }*/
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW6LtSubkrd6UIgVvmYVUXOmN-8TFS-_M&callback=initMap&libraries=geometry">
    </script>
  </body>
</html>