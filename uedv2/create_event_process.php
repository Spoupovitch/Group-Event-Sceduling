<?php
session_start();
require_once './api/ued_api.php';

if(!empty($_POST)) {
	
	//public event
	if($_POST['type'] == 'Public')
	{
		//$date=date_create("2013-03-15 23:40:00",timezone_open("Europe/Oslo"));
		$stime = (string)($_POST["s_time"] . ":00");
		//echo $stime;
		$etime = (string)($_POST["e_time"] . ":00");
		//echo $etime;
		$date = explode('-', $_POST["date"]);
		$new_date = $date[0].'-'.$date[1].'-'.$date[2];
		//echo $new_date;
		
		//echo "<br>";
		//echo $_POST['lat'];
		//echo "<br>";
		//echo $_POST['lng'];
		
		$sql = "INSERT INTO event (phone, date, s_time, e_time, lat, lon, name, type, description, email, status) values (" . $_POST["phone"] . ",'" . $new_date . "','" . $stime  . "','" . $etime . "'," . $_POST["lat"] . "," . $_POST["lng"] . ",'" . $_POST["name"] . "','" . $_POST["category"] . "','" . $_POST["description"] . "','" . $_POST["email"] . "'," . 1 . ")";
		$result = mysql_query($sql);
		
		
		if ($result == TRUE) 
		{
          echo "New event created successfully";
		  $_SESSION['create_event_error1'] = "New event created successfully";
		 
		 $sql = "Select e_id From event Where event.name LIKE '%" . $_POST["name"] . "%'";
		$result = mysql_query($sql);
		$info = parse_result($result);
		$sql = "INSERT into public_event (e_id) values (" . $info[0][0] . ")";
		$result = mysql_query($sql);
		
		
		if ($result == TRUE) 
		{
          echo "<br>New public event created successfully";
		  $_SESSION['create_event_error2'] = "New public event created successfully";
		 }
		else
		 {
		  echo "<br>public event Failed";
		  $_SESSION['create_event_error2'] = "New public event failed";
		 }
		 
		 
		 
		 }
		else
		 {
		  echo "event Failed";
		  $_SESSION['create_event_error1'] = "New event Failed= " . mysql_error();
		  }
	  
	  
      
	}
	//private event
	elseif($_POST['type'] == 'Private')
	{
	  
	  $stime = (string)($_POST["s_time"] . ":00");
		//echo $stime;
		$etime = (string)($_POST["e_time"] . ":00");
		//echo $etime;
		$date = explode('-', $_POST["date"]);
		$new_date = $date[0].'-'.$date[1].'-'.$date[2];
		//echo $new_date;
	  
	  
	  $sql = "INSERT INTO event (phone, date, s_time, e_time, lat, lon, name, type, description, email, status) values (" . $_POST["phone"] . ",'" . $new_date . "','" . $stime  . "','" . $etime . "'," . $_POST["lat"] . "," . $_POST["lng"] . ",'" . $_POST["name"] . "','" . $_POST["category"] . "','" . $_POST["description"] . "','" . $_POST["email"] . "'," . 0 . ")";
      $result = mysql_query($sql);
	  
	  if ($result == TRUE) 
		{
          echo "New event created successfully";
		  $_SESSION['create_event_error1'] = "New event created successfully";
		 
		 
		 $sql = "Select e_id From event Where event.name LIKE '%" . $_POST["name"] . "%'";
      $result = mysql_query($sql);
	  $info = parse_result($result);
	  
	  $sql = "Select u_id From stu Where stu.s_id = " . $_SESSION['s_id'];
      $result = mysql_query($sql);
	  $info1 = parse_result($result);
	  //echo $info1[0][0];
	  
	  $sql = "INSERT into private_event (e_id, u_id) values (" . $info[0][0] . "," . $info1[0][0] . ")";
	  $result = mysql_query($sql);
		
		if ($result == TRUE) 
		{
          echo "<br>New private event created successfully";
		  $_SESSION['create_event_error2'] = "New private event created successfully";
		 }
		else
		 {
		  echo "<br>private event Failed";
		  $_SESSION['create_event_error2'] = "New private event failed";
		 }
		 
		 
		 
		 }
		else
		 {
		  echo "event Failed";
		  $_SESSION['create_event_error1'] = "New event Failed= " . mysql_error();
		  }
	  
	  
	  
	   
	}
	
	//rso event
	else
	{
		
		$stime = (string)($_POST["s_time"] . ":00");
		//echo $stime;
		$etime = (string)($_POST["e_time"] . ":00");
		//echo$etime;
		$date = explode('-', $_POST["date"]);
		$new_date = $date[0].'-'.$date[1].'-'.$date[2];
		//echo $new_date;
		
		
		$sql = "INSERT INTO event (phone, date, s_time, e_time, lat, lon, name, type, description, email, status) values (" . $_POST["phone"] . ",'" . $new_date . "','" . $stime  . "','" . $etime . "'," . $_POST["lat"] . "," . $_POST["lng"] . ",'" . $_POST["name"] . "','" . $_POST["category"] . "','" . $_POST["description"] . "','" . $_POST["email"] . "'," . 1 . ")";
      $result = mysql_query($sql);
	  
	  if ($result == TRUE) 
		{
          echo "New event created successfully";
		  $_SESSION['create_event_error1'] = "New event created successfully";
		 
		 
			$sql = "Select e_id From event Where event.name LIKE '%" . $_POST["name"] . "%'";
			$result = mysql_query($sql);
			$info = parse_result($result);
			$sql = "INSERT into rso_event (e_id, r_id) values (" . $info[0][0] . "," . $_POST["type"] . ")";
			$result = mysql_query($sql);
		
			if ($result == TRUE) 
			{	
				echo "<br>New rso event created successfully";
				$_SESSION['create_event_error2'] = "New rso event created successfully";
			}
			else
			{
				echo "<br>rso event Failed";
				$_SESSION['create_event_error2'] = "New rso event failed";
			}
		 }
		else
		 {
		  echo "event Failed";
		  $_SESSION['create_event_error1'] = "New event failed = " . mysql_error();
		  }
	  
	  
	  
	}
	
	
	header("Location: create_event.php");
}
else {
    $_SESSION['create_event_error'] = true;

header("Location: create_event.php");
}
?>