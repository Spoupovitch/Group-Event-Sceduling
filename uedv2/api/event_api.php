<?php // event_api.php, stores the functions for manipulating the event entity

function insert_event($phone, $email, $date, $s_time, $e_time, $lat, $lon, $name, $type, $des, $status){
	$query = "insert into event (phone, email, date, s_time, e_time, lat, lon, name, type, description, status) values (". $phone . ",'" . $email . "'," . $date . "," . $s_time . "," . $e_time . "," . $lat . "," . $lon . ",'" . $name . "','" . $type . "','" . $des ."'," . $status . ")";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_event($e_id){
	$query = "delete from event where e_id = ". $e_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_name_event($name){
	$query = "select * from event where name = " . $name;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

	
	return $result;
}
?>



