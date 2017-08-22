<?php
session_start();
require './api/ued_api.php';
session_unset();
?>
<?php
  if (!empty($_POST))
  {
  $username = $_POST["User"];
  $password = $_POST["Password"];
  if ($username <> "" && $password <> "")
  {
    if($_POST['submit'] === "User Login")
    {
      $sql = "SELECT s_id, p_word, u_id FROM stu WHERE s_id='$username' AND p_word='$password';";
      $result = mysql_query($sql);
      if (mysql_num_rows($result) > 0) 
      {
        $_SESSION['u_id'] = $result['u_id'];
        header("Location: student_main.php");
      }
      else if($username <> "" && $password <> "") {
        echo "user";
        echo '<p id="php" style="color: red; text-align: center">Wrong username or password</p>';
      }
    }
    else
    {
      $sql = "SELECT s_a_id, p_word FROM s_admin WHERE s_a_id='$username' AND p_word='$password';";
      $result = mysql_query($sql);
      if (mysql_num_rows($result) > 0) 
      {
        $sql = "SELECT u_id FROM uni WHERE " . $username . " = s_a_id";
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1) 
		{
			$info = @mysql_fetch_array($result);
			$_SESSION['u_id'] = $info['u_id'];
			//$_SESSION['u1_id'] = 1;
			header("Location: superAdminManage.php");
			//echo $_SESSION['u_id'];
			//echo "test";
		}
		else
		{
			header("Location: superAdmin.php");
		}
	 }
	  
      else if($username <> "" && $password <> "") {
        echo "admin";
        echo '<p id="php" style="color: red; text-align: center">Wrong username or password</p>';
      }
    }
    $_SESSION['s_id'] = $username;
  }
  }
?>

<!DOCTYPE html>
<html >
<body>


<div style="margin: auto; width:80%;">
  <h1 style="text-align:center">College Event Website</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <div style="margin: auto; width:180px;">
    User ID:<br>
    <input id="user" type="text" name="User">
    <br>
    Password:<br>
    <input if="password" type="password" name="Password">
    <br><br>
    <input name="submit" type="submit" value="Super Admin Login">
    <input name="submit" type="submit" value="User Login">
    <a href="signup.php">Sign Up</a>
  </div>
</form>
</div>
</body>
</html>
