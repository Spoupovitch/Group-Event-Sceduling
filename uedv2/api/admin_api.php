<?php // admin_api.php, stores the functions for manipulating the admin entity

function insert_admin($s_id){
	$query = "insert into admin (s_id) values (" . $s_id . ")";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_admin($s_id){
	$query = "delete from admin where s_id = ". $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_s_id_admin($s_id){
	$query = "select * from admin where s_id = " . $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

	return $result;
}
?>