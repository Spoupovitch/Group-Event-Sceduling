<?php // private_event_api.php, stores the functions for manipulating the private_event entity

function insert_private_event($e_id, $u_id){
	$query = "insert into private_event (e_id, u_id) values (" . $e_id . "," . $u_id .")";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_private_event($e_id){
	$query = "delete from private_event where e_id = ". $e_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_e_id_private_event($e_id){
	$query = "select * from private_event where e_id = " . $e_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>