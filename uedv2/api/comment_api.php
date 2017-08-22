<?php // comment_api.php, stores the functions for manipulating the comment entity

function insert_comment($e_id, $text, $rating, $s_id){
	$query = "insert into comment (e_id, text, rating, s_id) values (" . $e_id . ",'" . $text . "'," . $rating . "," . $s_id .")";
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function delete_comment($c_id){
	$query = "delete from comment C where C.c_id = ". $c_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
}

function select_e_id_s_id_comment($e_id, $s_id){
	$query = "select * from comment C where C.e_id = " . $c_id . " and C.s_id = " . $s_id;
	$result = @mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	
	return $result;
}
?>