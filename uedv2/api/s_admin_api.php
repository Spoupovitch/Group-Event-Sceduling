<?php // s_admin_api.php, stores the functions for manipulating the s_admin entity

function insert_s_admin($s_a_id, $name, $p_word){
	$query = "insert into s_admin (s_a_id, name, p_word) values (" . $s_a_id . ",'" . $name . "','" . $p_word . "')";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_s_admin($s_a_id){
	$query = "delete from s_admin where s_a_id = ". $s_a_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_s_a_id_s_admin($s_a_id){
	$query = "select * from s_admin where s_a_id = " . $s_a_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
		
	return $result;
}

function select_all_s_admin(){
	$query = "select * from s_admin";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>


