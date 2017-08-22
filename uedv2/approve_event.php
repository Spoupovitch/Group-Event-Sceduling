<?php
session_start();
require_once './api/ued_api.php';

if(isset($_POST['event_approve'])) {
	$query =
        " update event set status = 1 where " . $_POST['event_approve'] . " = e_id";	
	$response = @mysql_query($query);
}
else {
    $_SESSION['approve_event_error'] = true;
}
header("Location: superAdminManage.php");
?>