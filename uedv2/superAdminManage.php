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
  <title>Super Admin Manager</title>

</head>

<body>

    <!-- Navbar -->
	<div id="navbar">        
        <a href="index.php">
        <input type="button" name="" value="Log Out" />
        </a>
	</div>
	
	
	<!-- approve Event -->
    <div id="join_rso">
        <h3>Approve Event</h3>
        <?php
        //prompt for RSO join failure
        //TODO: select unapproved events
		//$university = 1;
		
		$query =
        "SELECT event.*
        FROM event, private_event
        WHERE  " . $_SESSION['u_id'] . " = private_event.u_id AND event.status = 0";	
		
		$response = @mysql_query($query);
        $rso_array = parse_result($response);
        ?>
       
        <form name="Events" method="post" action="approve_event.php">
            <?php
            //create list as radio buttons
            if (!empty($rso_array)) {
                foreach ($rso_array as $row) {
                    echo '<input type="radio" name="event_approve" value="' . $row[0] . '" />';
                    echo $row[7];
                    echo '<br/>';
                }
            }
            //all events have been approved
            else {
                echo "There are no Events for you to approve." . '<br/>';
            }
            ?>
            <br/>
            <a href="approve_event.php">
            <input type="submit" name="approve" value="Approve Event!"/>
            </a>
        </form>
	</div>
	
	
</body>
</html>
