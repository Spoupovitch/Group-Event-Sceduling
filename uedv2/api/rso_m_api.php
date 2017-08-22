<?php // rso_m_api.php, stores the functions for manipulating the rso_m entity

function insert_rso_m($s_id, $r_id){
	$query = "insert into rso_m (s_id, r_id) values (" . $s_id . "," . $r_id .")";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_s_id_r_id_rso_m($s_id, $r_id){
	$query =
        "DELETE FROM rso_m
        WHERE s_id = $s_id
        AND r_id = $r_id";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_rso_m($s_id){
	$query = "delete from rso_m where s_id = ". $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_s_id_rso_m($s_id){
	$query = "select * from rso_m where s_id = " . $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>