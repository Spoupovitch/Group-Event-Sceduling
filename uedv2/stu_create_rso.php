<?php
session_start();
require_once './api/ued_api.php';


$s_id = $_SESSION['s_id'];
$sql = "SELECT u_id FROM stu WHERE stu.s_id = ". $_SESSION['s_id'];
$result = mysql_query($sql);
$info = parse_result($result);
$u_id = $info[0][0];



if(isset($_POST['rso_name'])) {
  
	
	
	$sql = "SELECT count(*) FROM admin WHERE s_id = ". $s_id;
	$result = mysql_query($sql);
	$info = parse_result($result);
	
	if($info[0][0] > 0)
	{
	}
	else
	{
	$sql = "INSERT INTO admin (s_id) values (" . $_SESSION['s_id'] . ")";
    $result = mysql_query($sql);
	}
	
	$sql = "INSERT INTO rso (s_id, u_id, name) values (" . $s_id . "," . $u_id . ",'" . $_POST['rso_name'] . "')";
    $result = mysql_query($sql);
	
	$sql = "SELECT r_id FROM rso WHERE rso.name LIKE '%" . $_POST['rso_name'] . "%'";
	$result = mysql_query($sql);
	$info1 = parse_result($result);
	
	$sql = "UPDATE rso SET s_id = " . $_SESSION['s_id'] . " WHERE r_id = " . $info1[0][0];
    $result = mysql_query($sql);
	
	
	$sql = "INSERT INTO rso_m (s_id, r_id) values (" . $s_id . "," . $info1[0][0] . ")";
    $result = mysql_query($sql);
	
} 
else {
    $_SESSION['create_rso_error'] = true;
}
header("Location: student_main.php");

?>