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
      function initMap(){
		var cord1 =[{lat:32.6709846,lng:-97.0834041},{lat:32.6722241,lng:-97.0828247},{lat:32.6726791,lng:-97.0838842}];
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: 37.090, lng: -95.712},
          mapTypeId: 'terrain'
        });
		var marker;
		cord1.map((item,itemkey)=>{
			marker = new google.maps.Marker({position: item, map: map});
		})
		map.addListener('center_changed', function() {
			// 3 seconds after the center of the map has changed, pan back to the
			// marker.
			console.log('Map Centered Changed')
		});
		map.addListener('click', function() {
			// 3 seconds after the center of the map has changed, pan back to the
			// marker.
			console.log('Map Clicked')
		});
		map.addListener('dblclick', function() {
			// 3 seconds after the center of the map has changed, pan back to the
			// marker.
			console.log('Map Double click');
		});
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW6LtSubkrd6UIgVvmYVUXOmN-8TFS-_M&callback=initMap">
    </script>
  </body>
</html>