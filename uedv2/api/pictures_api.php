<?php // pictures_api.php, stores the functions for manipulating the pictures entity

function insert_pictures($u_id, $p_link, $name){
	$query = "insert into pictures (p_id, u_id, p_link, name) values (" . $u_id . ",'" . $p_link . "')";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_pictures($p_id){
	$query = "delete from pictures where p_id = ". $p_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_name_pictures($name){
	$query = "select * from pictures where name = " . $name;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>