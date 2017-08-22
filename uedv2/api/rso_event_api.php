<?php // rso_event_api.php, stores the functions for manipulating the rso_event entity

function insert_rso_event($e_id, $r_id){
	$query = "insert into rso_event (e_id, r_id) values (" . $e_id . "," . $r_id .")";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_rso_event($e_id){
	$query = "delete from rso_event where e_id = ". $e_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_e_id_rso_event($e_id){
	$query = "select * from rso_event where e_id = " . $e_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}

function select_s_id_rso_event($s_id){
	$query = "select * from event E, rso_event RE, rso_m M where E.e_id = RE.e_id and RE.r_id = M.r_id and M.s_id = " . $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>