<?php
session_start();
require_once './api/ued_api.php';
?>

<!doctype html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css">
	<title>View Events</title>
</head>
<body>
    <div id="cover"></div>
    
	<!-- Navbar -->
	<div id="navbar">
        <a href="student_main.php">
        <input type="button" name="home" value="Main" />
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
    }
    //echo $_POST['event_search_dropdown'];
	
	
	$selection = $_POST['event_search_dropdown'];
	
    $s_id = $_SESSION['s_id'];
	
    $result = select_s_id_stu($s_id);
    $info = @mysql_fetch_array($result);
    $u_id = $info['u_id'];
    $stu_name = $info['name'];
    ?>
    <br/>
    
    <div id="wrapper">
    <!-- private event -->
	<?php
    if ($selection == "private"){
	
	echo '<div id="view_events">';
        echo '<h3>Private Events</h3>';
        
        //prompt for RSO leave failure
        if (isset($_SESSION['event_error'])) {
            unset($_SESSION['event_error']);
            echo '<span color="red">' . "Failed to leave RSO." . '</span>';
        }
        //get private events for your university 
        $query =
        "SELECT event.*
        FROM event, private_event
        WHERE $u_id = private_event.u_id
        AND event.e_id = private_event.e_id";
        $response = @mysql_query($query);
        $rso_m_array = parse_result($response);
        
        
        echo '<form name="event" method="post" action="event_details.php">';
            
            //create list as radio buttons
            if (!empty($rso_m_array)) {
                foreach ($rso_m_array as $row) {
				$status = ($row[11] == 0) ? 'pending' : 'approved';
                    echo '<input type="radio" name="event1" value="' . $row[0] . '" />';
                    echo $row[7] . "&nbsp-/-&nbsp" . $row[2] . "&nbsp-/-&nbsp" . $status;
					echo '<br/>';
                }
            }
            //case for no RSOs present in query
            else {
                echo "No events for your University" . '<br/>';
            }
            
            echo '<br/>';
            echo '<a href="event_details.php">';
            echo '<input type="submit" name="event" value="Details" />';
            echo '</a>';
        echo '</form>';
    echo '</div>';
	}
	?>
	
	
        <!-- public event -->
	<?php
    if ($selection == "public"){
	
	echo '<div id="view_events">';
        echo '<h3>Public Events</h3>';
        //prompt for RSO leave failure
        if (isset($_SESSION['event_error'])) {
            unset($_SESSION['event_error']);
            echo '<span color="red">' . "Failed to leave RSO." . '</span>';
        }
        //get public events 
        $query =
        "SELECT event.*
        FROM event, public_event
        WHERE event.e_id = public_event.e_id";
        $response = @mysql_query($query);
        $rso_m_array = parse_result($response);
        
        
        echo'<form name="event" method="post" action="event_details.php">';
            
            //create list as radio buttons
            if (!empty($rso_m_array)) {
                foreach ($rso_m_array as $row) {
				$status = ($row[11] == 0) ? 'pending' : 'approved';
                    echo '<input type="radio" name="event1" value="' . $row[0] . '" />';
                    echo $row[7] . "&nbsp-/-&nbsp" . $row[2] . "&nbsp-/-&nbsp" . $status;
					echo '<br/>';
                }
            }
            //case for no RSOs present in query
            else {
                echo "No public events!" . '<br/>';
            }
            
            echo '<br/>';
            echo '<a href="event_details.php">';
            echo '<input type="submit" name="event" value="Details" />';
            echo '</a>';
        echo '</form>';
    echo '</div>';
	}
	?>
	
	<!-- rso event -->
	<?php
    if ($selection == "rso"){
	
	echo '<div id="view_events">';
        echo '<h3>RSO Events</h3>';
        //prompt for RSO leave failure
        if (isset($_SESSION['event_error'])) {
            unset($_SESSION['event_error']);
            echo '<span color="red">' . "Failed to leave RSO." . '</span>';
        }
        //get rso events 
        $query =
        "SELECT event.*
        FROM event, rso_event, rso_m
        WHERE $s_id = rso_m.s_id
		AND rso_event.r_id = rso_m.r_id
        AND event.e_id = rso_event.e_id";
        $response = @mysql_query($query);
        $rso_m_array = parse_result($response);
        
        
        echo '<form name="event" method="post" action="event_details.php">';
            
            //create list as radio buttons
            if (!empty($rso_m_array)) {
                foreach ($rso_m_array as $row) {
					$status = ($row[11] == 0) ? 'pending' : 'approved';
                    echo '<input type="radio" name="event1" value="' . $row[0] . '" />';
                    echo $row[7] . "&nbsp-/-&nbsp" . $row[2] . "&nbsp-/-&nbsp" . $status;
					echo '<br/>';
                }
            }
            //case for no RSO events present in query
            else {
                echo "No events for your RSOs!" . '<br/>';
            }
            
            echo '<br/>';
            echo '<a href="event_details.php">';
            echo '<input type="submit" name="event" value="Details" />';
            echo '</a>';
        echo '</form>';
    echo '</div>';
	}
	?>
    </div><!-- END WRAPPER -->
</body>
</html>