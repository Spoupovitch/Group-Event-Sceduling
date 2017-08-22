<?php // stu_api.php, stores the functions for manipulating the stu entity

function insert_stu($s_id, $u_id , $p_word, $name){
	$query = "insert into stu (s_id, u_id, p_word, name) values (" . $s_id . "," . $u_id . ",'" . $p_word . "','" . $name . "')";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_stu($s_id){
	$query = "delete from stu where s_id = ". $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_s_id_stu($s_id){
	$query = "select * from stu where s_id = " . $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	return $result;
}
?>