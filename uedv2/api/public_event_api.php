<?php // public_event_api.php, stores the functions for manipulating the public_event entity

function insert_public_event($e_id){
	$query = "insert into public_event (e_id) values (" . $e_id . ")";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_public_event($e_id){
	$query = "delete from public_event where e_id = ". $e_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_e_id_public_event($e_id){
	$query = "select * from public_event where e_id = " . $e_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>