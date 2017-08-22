<?php
session_start();
require_once './api/ued_api.php';
?>

<!doctype html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css">
	<title>Student Home Page</title>
</head>
<body>
    <div id="cover"></div>
    
	<!-- Navbar -->
	<div id="navbar">
        <a href="student_main.php">
        <input type="button" name="home" value="Home" />
        </a>
        
        <a href="index.php">
        <input type="button" name="" value="Log Out" />
        </a>
	</div>
    
    <?php
    if (!isset($_SESSION['s_id'])) {
        echo '<div class="error_msg">' .
            "You are not logged in, this page will not function properly." .
            '</div>';
        exit();
    }
    $s_id = $_SESSION['s_id'];
    
    $result = select_s_id_stu($s_id);
    $info = @mysql_fetch_array($result);
    $u_id = $info['u_id'];
    $stu_name = $info['name'];
    ?>
    
    <!-- student info -->
    <div id="student_info">
        <p>Logged in as: <?php echo $stu_name; ?></p>
    </div>
    
    <div id="wrapper">
    <div id="rso_container">
    <!-- leave rso -->
    <div id="leave_rso">
        <h3>Leave an RSO</h3>
        <?php
        //prompt for RSO leave failure
        if (isset($_SESSION['leave_rso_error'])) {
            unset($_SESSION['leave_rso_error']);
            echo '<span color="red">' . "Failed to leave RSO." . '</span>';
        }
        //get RSOs of which student is member 
        $query =
        "SELECT rso.*
        FROM rso, rso_m
        WHERE $u_id = rso.u_id
        AND rso.r_id = rso_m.r_id
        AND $s_id = rso_m.s_id";
        $response = @mysql_query($query);
        $rso_m_array = parse_result($response);
        ?>
        
        <form name="leave_rso_radio" method="post" action="stu_leave_rso.php">
            <?php
            //create list as radio buttons
            if (!empty($rso_m_array)) {
                foreach ($rso_m_array as $row) {
                    echo '<input type="radio" name="rso_leave" value="' . $row[0] . '" />';
                    echo $row[4] . " - [" . $row[3] . "]";
                    echo '<br/>';
                }
            }
            //case for no RSOs present in query
            else {
                echo "You are not a member of any RSOs!" . '<br/>';
            }
            ?>
            <br/>
            <a href="stu_leave_rso.php">
            <input type="submit" name="leave" value="Defect" />
            </a>
        </form>
    </div>
    
    <!-- join rso -->
    <div id="join_rso">
        <h3>Join an RSO</h3>
        <?php
        //prompt for RSO join failure
        if (isset($_SESSION['join_rso_error'])) {
            unset($_SESSION['join_rso_error']);
            echo '<span color="red">' . "Failed to join RSO." . '</span>';
        }
        //TODO: select RSOs of which student is not member
        $query =
        "SELECT rso.*
        FROM rso
        WHERE " . $u_id . " = rso.u_id AND rso.r_id NOT IN (SELECT r_id
		FROM rso_m
		WHERE " . $s_id . " = rso_m.s_id)";
		
		$response = @mysql_query($query);
        $rso_array = parse_result($response);
        ?>
        
        <form name="join_rso_radio" method="post" action="stu_join_rso.php">
            <?php
            //create list as radio buttons
            if (!empty($rso_array)) {
                foreach ($rso_array as $row) {
                    echo '<input type="radio" name="rso_join" value="' . $row[0] . '" />';
                    echo $row[4] . " - [" . $row[3] . "]";
                    echo '<br/>';
                }
            }
            //student is member of all RSOs/ none present at university
            else {
                echo "There are no RSOs for you to join." . '<br/>';
            }
            ?>
            <br/>
            <a href="stu_join_rso.php">
            <input type="submit" name="join" value="Join Up!"/>
            </a>
        </form>
	</div>
        
	<!-- create rso -->
    <div id="create_rso">
        <h3>Create an RSO</h3>
        <?php
        //prompt for RSO creation failure
        if (isset($_SESSION['create_rso_error'])) {
            unset($_SESSION['create_rso_error']);
            echo '<span color="red">' . "Failed to create RSO." . '</span>';
        }
        ?>
        
        <form name="create_rso" method="post" action="stu_create_rso.php">
            <!-- get name for new rso -->
            RSO Name: <input type="text" name="rso_name" />
            <br/><br/>
            <a href="stu_create_rso.php">
            <input type="submit" value="Create RSO" />
            </a>
        </form>
    </div>
    </div><!-- END RSO CONTAINER-->
    
    <div id="event_container">
    <!-- view events -->
    <div id="view_event_type">
        <h3>View events by: </h3>
        <form name="view_events" method="post" action="stu_view_events.php">
            <select name="event_search_dropdown">
                <option value="default">select</option>
                <option value="rso">RSO</option>
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
            <a href="stu_view_events.php">
            <input type="submit" name="submit" value="Submit" />
            </a>
        </form>
    </div>
    
    <!-- create event -->
    <div id="create_event">
        <h3>Schedule an Event</h3>
        <a href="create_event.php">Click here</a> to go to event creation page!
    </div>
    </div><!-- END EVENT CONTAINER -->
    </div><!-- END WRAPPER -->
    
	<!-- Map -->
	<!-- maps API key: AIzaSyCTtqRQs2G2A736S0AHvY5X53wfEw6P4Jo -->
    <!--
    <div id="map">
	<h3>Map Demo</h3>
    <script>
      function initMap() {
        var start = {lat: 28.6019, lng: -81.2005};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: start
        });
        var marker = new google.maps.Marker({
          position: start,
          map: map
        });
      }
    </script>
    </div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=|xxx|&callback=initMap">
    </script>
    -->
</body>
</html>