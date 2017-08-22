<?php // uni_api.php, stores the functions for manipulating the uni entity

function insert_uni($s_a_id, $name, $des, $lat, $lon){
	$query = "insert into uni (s_a_id, description, lat, lon, name) values (".$s_a_id. ",'" . $des. "'," . $lat . "," . $lon . ",'" . $name . "')";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_uni($u_id){
	$query = "delete from uni where u_id = ". $u_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_name_uni($name){
	$query = "select * from uni where name = " . $name;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>