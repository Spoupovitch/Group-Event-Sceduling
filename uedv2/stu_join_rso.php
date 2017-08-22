<?php
session_start();
require_once './api/ued_api.php';

if(isset($_POST['rso_join'])) {
    insert_rso_m($_SESSION['s_id'], $_POST["rso_join"]);
}
else {
    $_SESSION['join_rso_error'] = true;
}
header("Location: student_main.php");
?>