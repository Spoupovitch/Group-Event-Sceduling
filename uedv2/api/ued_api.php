<?php // ued_api.php, store all the api files for the database
	
	// copy this into any php code that needs access to the database api, change the path as necessary
	//require_once (dirname(__FILE__) . '/api/ued_api.php');
	
	require_once 'login.php';
	require_once 'common_api.php';
	require_once 's_admin_api.php';
	require_once 'uni_api.php';
	require_once 'stu_api.php';
	require_once 'admin_api.php';
	require_once 'rso_api.php';
	require_once 'rso_m_api.php';
	require_once 'comment_api.php';
	require_once 'event_api.php';
	require_once 'rso_event_api.php';
	require_once 'private_event_api.php';
	require_once 'public_event_api.php';
	require_once 'pictures_api.php';
	
	
	
//connect to mysql
$db_server = @mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

//select database
mysql_select_db($db_database)
or die("Unable to select database: " . mysql_error());

/*
**************   list of API commands  ********
********** common
print_all($temp) 													//pass result of selection query/ prints the result
IMPORTANT MUST USE AFTER EACH SELECT ACTION ** parse_result($temp) //pass result of select query // returns an array 

********** university
insert_uni($s_a_id, $name, $des, $lat, $lon)	//insert an university into the table
delete_uni($u_id)								//delete an university from the table
select_name_uni($name)							//select an university from by name //returns a query, must pass to parse function


********** s_admin
insert_s_admin($s_a_id, $name, $p_word) //insert a super admin into the table
delete_s_admin($s_a_id) 				//delete a super admin from the table
select_s_a_id_s_admin($s_a_id) 			//select a super admin from the table //returns a query, must pass to parse function
select_all_s_admin() 					//select the entire table //returns a query, must pass to parse function

********** rso
insert_rso($s_id, $u_id, $name) 		//insert a rso into the table
delete_rso($r_id) 						//delete a rso from the table
select_name_rso($name) 					//select a rso by name//returns a query, must pass to parse function
select_all_rso() 						//select the entire table //returns a query, must pass to parse function
select_u_id_rso($u_id) 					//select a rso by u_id //returns a query, must pass to parse function
select_s_id_rso($s_id) 					//select a rso by s_id //returns a query, must pass to parse function

********** admin
insert_admin($s_id)			//insert an admin into the table
delete_admin($s_id)			//delete an admin from the table
select_s_id_admin($s_id)	//select an admin by s_id //returns a query, must pass to parse function

********** comment
insert_comment($e_id, $text, $rating, $s_id)	//insert a comment into the table
delete_comment($c_id)							//delete a comment from the table
select_e_id_s_id_comment($e_id, $s_id)			//select a comment by e_id, s_id //returns a query, must pass to parse function

********** event
insert_event($phone, $email, $date, $s_time, $e_time, $lat, $lon, $name, $type, $des)	//insert an event into the table
delete_event($e_id)																				//delete an event from the table
select_name_event($e_id)																		//select an event by name //returns a query, must pass to parse function

********** pictures
insert_pictures($u_id, $p_link, $name)	//insert a picture into the table
delete_pictures($p_id)					//delete a picture from the table
select_name_pictures($name)				//select a picture by name //returns a query, must pass to parse function

********** private event
insert_private_event($e_id, $u_id)	//insert a private event into the table
delete_private_event($e_id)			//delete a private event from the table
select_e_id_private_event($e_id)	//select a private event by e_id //returns a query, must pass to parse function

********** public event
insert_public_event($e_id)		//insert a public event into the table
delete_public_event($e_id)		//delete a public event from the table
select_e_id_public_event($e_id)	//select a public event by e_id //returns a query, must pass to parse function

********** rso event
insert_rso_event($e_id, $r_id)	//insert a rso event into the table
delete_rso_event($e_id)			//delete a rso event from the table
select_e_id_rso_event($e_id)	//select a rso event by e_id //returns a query, must pass to parse function
select_s_id_rso_event($s_id)	//select a rso event by s_id //returns a query, must pass to parse function

********** rso member
insert_rso_m($s_id, $r_id)	//insert a rso member into the table
delete_rso_m($s_id)			//delete a rso member from the table
select_s_id_rso_m($s_id)	//select a rso member by e_id //returns a query, must pass to parse function

********** student
insert_stu($s_id, $u_id , $p_word, $name)	//insert a student into the table
delete_stu($s_id)							//delete a student member from the table
delete_stu($s_id)							//select a student member by e_id //returns a query, must pass to parse function
*/
?>