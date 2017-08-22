<?php
session_start();
require './api/ued_api.php';
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
  <title>Super Admin</title>

</head>

<body>
<?php
  $user = $_SESSION['s_id'];
  //echo $user;
  if(isset($_GET["name"]) && isset($_GET["text"]) && isset($_GET["lat"]) && isset($_GET["lng"]))
  {
    //echo $_GET["text"];
	
	$sql="INSERT INTO uni (s_a_id, description, lat, lon, name) 
      VALUES (". $user . ",'" . $_GET["text"] . "'," . $_GET["lat"] . "," . $_GET["lng"] . ",'" . $_GET["name"] . "')";
    $result = mysql_query($sql); 
    if ($result == TRUE) {
          //echo $_GET["picture"];
		  echo "New record created successfully";
		  
		  
		  
		  $sql = "SELECT u_id FROM uni WHERE " . $user . " = s_a_id";
		$result = mysql_query($sql);
		$info = @mysql_fetch_array($result);
		  $_SESSION['u_id'] = $info['u_id'];	  
		  
		  //echo $info['u_id'];
		  //echo $_GET["picture"];
		  //echo $_GET["name"];
		  $sql="INSERT INTO pictures (u_id, p_link, name) 
      VALUES (". $info['u_id'] . ",'" . $_GET["picture"] . "','" . $_GET["name"] . "')";
    $result = mysql_query($sql);
		  
		  //echo $_GET["picture"];
		  header("Location: superAdminManage.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
?>
<div style="margin: auto; width: 400px;">
  <h1 align=center>University Registration</h1>
  <form style="margin: auto; width: 50%"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    Name:<br>
    <input type="text" name="name">
    <br>
    Description:<br>
    <textarea name="text" id="textarea" rows="5"></textarea>
    <br>
    Picture:<br>
    <input type="file" name="picture">
    <br>
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
</div>

</body>
</html>
