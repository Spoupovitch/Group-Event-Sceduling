<?php
session_start();
require_once('./api/ued_api.php');
?>

<head>
    <style>
      #map {
        height: 500px;
        width: 50%;
       }
    </style>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <title>Event Details View</title>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>

<!-- Navbar -->
	<div id="navbar">
        <a href="student_main.php">
        <input type="button" name="Events" value="Main" />
        </a>
        
        <a href="index.php">
        <input type="button" name="index" value="Log Out" />
        </a>
	</div>
	
	<div class="fb-like" data-href="http://localhost/projects/ued/event_details.php" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

<div id="wrapper">
<?php
if (isset($_POST['event'])) {
    //echo $_POST["event1"];
    $e_id = $_POST["event1"];
	
}

else if($_SESSION['e_id']){
	$e_id = $_SESSION['e_id'];
}
else {
    echo "Fail.";
}
		

$_SESSION['e_id'] = $e_id;
$query =
    "SELECT *
    FROM event
    WHERE e_id = ".$e_id;
$response = @mysql_query($query);
if ($response) {

$result = @mysql_fetch_array($response);
echo '<div id="event_detail">';
echo '<h1>'. $result['name'] . '</h1>';

$query =
    "SELECT r_id
    FROM rso_event
    WHERE e_id = ". $e_id;
$response1 = @mysql_query($query);
$result1 = @mysql_fetch_array($response1);
	 
	
	 
	 $query = "SELECT u_id
    FROM private_event
    WHERE e_id = ".$e_id;
$response2 = @mysql_query($query);
$result2 = @mysql_fetch_array($response2);
	

	
	
	$query ="SELECT e_id
    FROM public_event
    WHERE e_id = $e_id";
$response3 = @mysql_query($query);
$result3 = @mysql_fetch_array($response3);

  if($result1 != null)
  {
  $query =
    "SELECT name
    FROM rso
    WHERE r_id = ". $result1['r_id'];
$response1 = @mysql_query($query);
$result1 = @mysql_fetch_array($response1);  
  echo '<p>Type - '. $result1['name'] . '<br>Category - '.$result['type']. '</p>'; 
$_SESSION['dropdown'] = "rso";   
  }
   
   
   if($result2 != null)
  {
  //echo $result2['u_id'];
  $query =
    "SELECT name
    FROM uni
    WHERE u_id = ". $result2['u_id'];
$response2 = @mysql_query($query);
$result2 = @mysql_fetch_array($response2); 
echo '<p>Type - '. $result2['name'] . '<br>Category - '.$result['type']. '</p>';
  //echo $result2['u_id']; 
$_SESSION['dropdown'] = "private";  
  }
   if($result3 != null)
  {
  //echo $result3['e_id'];
  echo '<p>Type - Public<br>Category - '.$result['type']. '</p>';
  $_SESSION['dropdown'] = "public"; 
  }
  
  if($result['status'] == 0){
  echo '<p>Status - Pending</p>';
  }
  if($result['status'] == 1){
  echo '<p>Status - Approved</p>';
  }
  
  //$result = @mysql_fetch_array($response);
    //$u_id = $info['u_id'];
    //$stu_name = $info['name'];
  
  
	
	echo '<h2>Contact info</h2>';
	echo '<p>Email - '. $result['email'] . '<br>Phone - '.$result['phone']. '</p>';
	echo '<h2>Time and location</h2>';
	echo '<p>Date - '. $result['date'] . '  <br>From - '.$result['s_time']. '-/-To - '.$result['e_time'].'</p>';
echo '</div>';
    ?>
	
	
	
	
	
	
<body>

<div id="map">
    <script>
      function initMap() {
        var uluru = {lat: <?php echo $result['lat']; ?>, lng: <?php echo $result['lon']; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClbkPjN1IH6NWByU4vnG4z3fRJlICnzC8&callback=initMap">
    </script>
	</div>
	</body>
	
	
	<?php
    echo '<div id="event_detail_2">';
	echo '<h2>Description</h2>';
	echo '<p>'.$result['description']. '</p>';
	echo '<h2>Comments and Rating</h2>';
	}

	
	
	//get comments 
        $query =
        "SELECT comment.*
        FROM comment
        WHERE e_id = ". $e_id;
        $response = @mysql_query($query);
        $rso_m_array = parse_result($response);
     
        echo '<form name="comment" method="post" action="comment_create_delete.php">';
            
            //create list as radio buttons
            if (!empty($rso_m_array)) {
                foreach ($rso_m_array as $row) {
				if($_SESSION['s_id'] == $row[4])
				{
				echo '<input type="radio" name="comment1" value="' . $row[2] . '" />';
				echo $row[0] . "&nbsp-/-&nbsp" . $row[1];
					echo '<br/>';
				}
				else
				{
                    //echo '<input type="radio" name="event1" value="' . $row[0] . '" />';
                    echo $row[0] . "&nbsp-/-&nbsp" . $row[1];
					echo '<br/>';
                }
				}
            }
            //case for no comments present in query
            else {
                echo "No comments for this event" . '<br/>';
            }
			
		echo '</form>';
	
    echo '</div>';
	
	
	
	//else
{
}
?>

<div id="comment_rate">
  <form style="margin: auto; width: 50%" method="post"  action="comment_create_delete.php">

    Comment:<br>
    <textarea name="text" id="textarea" rows="5"></textarea>
    <br>
    Rating:<br>
    <input type="number" name="rating">
    <br>

     <a href="comment_create_delete.php">
      <input type="submit" name="comment" value="Submit" />
       </a>
	   <a href="comment_create_delete.php">
      <input type="submit" name="comment" value="Delete" />
       </a>
</div>
</div><!-- END WRAPPER -->