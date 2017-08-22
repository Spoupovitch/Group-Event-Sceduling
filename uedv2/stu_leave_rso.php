<?php
session_start();
require_once './api/ued_api.php';
//$temp = $_SESSION['s_id'];
if(isset($_POST['rso_leave'])) {
    delete_s_id_r_id_rso_m($_SESSION['s_id'], $_POST["rso_leave"]);
	//echo $_SESSION['s_id'] . "<br>";
	//check if last member left
	$sql = "select num_m from rso where rso.r_id = ". $_POST["rso_leave"];
    $result = mysql_query($sql);
	$info = parse_result($result);
	//echo $info[0][0];
	
	//select new admin
	if($info[0][0] > 0){
	$sql = "select s_id from rso_m where rso_m.r_id = ". $_POST["rso_leave"];
    $result = mysql_query($sql);
	$info = parse_result($result);
	//echo $_POST["rso_leave"] . "<br>";
	//print_all($info);
	//echo $info[0][0];
	$sql = "INSERT INTO admin (s_id) values (" . $info[0][0] . ")";
    $result = mysql_query($sql);
	$sql = "UPDATE rso SET s_id = " . $info[0][0] . " WHERE r_id = " . $_POST["rso_leave"];
    $result = mysql_query($sql);
	//echo "in here";
	//echo $_SESSION['s_id'] . "<br>";
	}
	
	
	
	//remove rso from list
	else
	{
	$sql = "DELETE FROM rso WHERE rso.r_id = " . $_POST["rso_leave"];
    $result = mysql_query($sql);
	//echo "in here 2";
	}
	
	
//check if current user is 
//at least an admin of one rso, if not remove from admin list
$sql = "SELECT count(*) FROM rso WHERE s_id = ". $_SESSION['s_id'];
$result = mysql_query($sql);
$info = parse_result($result);
//print_all($info);
//echo $_SESSION['s_id'] . "test";
if($info[0][0] < 1)
{
$sql = "DELETE FROM admin WHERE admin.s_id = " . $_SESSION['s_id'];
$result = mysql_query($sql);
}
	
	
}
else {
    $_SESSION['leave_rso_error'] = true;
}


header("Location: student_main.php");
?>