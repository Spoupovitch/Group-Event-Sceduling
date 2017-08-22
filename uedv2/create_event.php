<?php
session_start();
require_once './api/ued_api.php';

if(isset($_SESSION['create_event_error1']))
{
echo $_SESSION['create_event_error1'];
unset($_SESSION['create_event_error1']);
}
echo "<br>";
if(isset($_SESSION['create_event_error2']))
{
echo $_SESSION['create_event_error2'];
unset($_SESSION['create_event_error2']);
}


?>

<!DOCTYPE html>
<html >
<head>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).on("keypress", ":input:not(textarea):not([type=submit])", function(event) {
          if (event.which == 13) {
            event.preventDefault();
        }
    });
  </script>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="stylesheet.css">
	<title>Create Event</title>

</head>
<body>

<!-- Navbar -->
	<div id="navbar">
        <a href="student_main.php">
        <input type="button" name="" value="Student Main" />
        </a>
		
		<a href="index.php">
        <input type="button" name="" value="Log Out" />
        </a>
	</div>
	<br/>
<div id="wrapper">
  <h1 style="text-align:center">Create Event</h1>
  
  <div id="left_container">
  <form method="post" action="create_event_process.php"> 
    Name:<br>
    <input type="text" name="name">
    <br>
    Type:
    <select name="type">
	  <?php
	  $s_id = $_SESSION['s_id'];
	  $query =
        "SELECT rso.*
        FROM rso
        WHERE " . $s_id . " = rso.s_id AND rso.num_m > 4";
        $response = @mysql_query($query);
        $rso_m_array = parse_result($response);
	  
	  echo '<option value="Public">PUBLIC</option>';
      echo '<option value="Private">PRIVATE</option>';
	  if (!empty($rso_m_array)) {
                foreach ($rso_m_array as $row) {
                    echo '<option value="' . $row[0] . '" />';
                    echo $row[4];
                    echo '<br/>';
                }
            }
	  
	  ?>
    </select>
    <br>
    Phone:<br>
    <input type="tel" name="phone">
    <br>
    Date:<br>
    <input type="date" name="date">
    <br>
    Start Time:<br>
    <input type="time" name="s_time">
    <br>
    End Time:<br>
    <input type="time" name="e_time">
    <br>
    Email:<br>
    <input type="email" name="email">
    <br>
	Category:<br>
    <input type="category" name="category">
    <br>
    Description:
    <textarea name="description" id="textarea" rows="5"></textarea>
    <br>
    </div><!-- END LEFT CONTAINER -->
    
    <div id="right_container">
	Location:<br>
    <input id="pac-input" type="text" name="location" placeholder="">
    <!--<input id="pac-input" class="controls" type="text" placeholder="Search Box">-->
    <div style="width:300px; height:300px" id="map"></div>
    <input type="submit" />
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 28.602352, lng: -81.200511},
          zoom: 13,
          mapTypeId: 'roadmap',
          disableDefaultUI: true
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
          document.getElementById('lat').value = searchBox.getBounds().getCenter().lat();
          document.getElementById('lng').value = searchBox.getBounds().getCenter().lng();
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          document.getElementById('lat').value = searchBox.getBounds().getCenter().lat();
          document.getElementById('lng').value = searchBox.getBounds().getCenter().lng();
    
          if (places.length == 0) {
            return;
          }
          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClbkPjN1IH6NWByU4vnG4z3fRJlICnzC8&libraries=places&callback=initAutocomplete"
         async defer></script>
         
    <input type="hidden" id="lat" name="lat" />
    <input type="hidden" id="lng" name="lng" />  
  </form>
  </div><!-- END LEFT CONTAINER -->
    </div><!-- END WRAPPER -->
</body>
</html>
