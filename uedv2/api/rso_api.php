<?php // rso_api.php, stores the functions for manipulating the rso entity

function insert_rso($s_id, $u_id, $name){
	$query = "insert into rso (s_id, u_id, name) values (". $s_id . "," . $u_id . ",'" . $name . "')";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_rso($r_id){
	$query = "delete from rso where r_id = ". $r_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_name_rso($name){
	$query = "select * from rso where name = " . $name;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}

function select_all_rso(){
	$query = "select * from rso";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}

function select_u_id_rso($u_id){
	$query = "select * from rso where u_id = " . $u_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}

function select_s_id_rso($s_id){
	$query = "select * from rso where s_id = " . $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>