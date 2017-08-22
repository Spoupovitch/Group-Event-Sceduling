<?php
session_start();
require_once './api/ued_api.php';


if( $_POST['comment'] == 'Submit')
{
    //echo $_POST["text"];
	//echo "<br>";
	//echo $_POST["rating"];
	//echo "<br>";
	//echo $_SESSION['e_id'];
	//echo "<br>";
	//echo $_SESSION["s_id"];
	
	$sql = "INSERT INTO comment (text, rating, e_id, s_id) values ('" . $_POST["text"] ."',". $_POST["rating"].",".$_SESSION['e_id'].",".$_SESSION["s_id"]. ")";
    $result = mysql_query($sql);
	
}

if($_POST['comment'] == 'Delete')
{
	//echo "in delete<br>";
	//echo $_SESSION['e_id'];
	//echo "<br>";
	
	$sql = "SELECT c_id FROM comment WHERE e_id = ".$_SESSION['e_id'] . " AND s_id = " .$_SESSION['s_id'];
    $result = mysql_query($sql);
	$result = parse_result($result);

	
	
	
	$sql = "DELETE FROM comment WHERE c_id = ".$result[0][0];
    $result = mysql_query($sql);
}
else
{
    //echo fail;
	//$_SESSION['join_rso_error'] = true;
}

$_SESSION['e_id'] = $_SESSION['e_id'];
//header("Location: student_main.php");
header("Location: event_details.php");
?>