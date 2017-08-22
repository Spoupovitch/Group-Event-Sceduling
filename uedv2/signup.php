<?php
session_start();
require './api/ued_api.php';
?>

<!DOCTYPE html>
<html>
<body>

<!-- Navbar -->
	<div id="navbar">
        <a href="index.php">
        <input type="button" name="" value="Login" />
        </a>
	</div>
	
<?php
  if (isset($_POST["Password"]) && isset($_POST["Name"]) && isset($_POST["University"]))
  {
    $id="";
    $uni= $_POST["University"];
    do {
      $id = rand();
      $sql = "select s_id from stu where s_id ='$id';";
      $result = mysql_query($sql); 
    } while (mysql_num_rows($result) > 0);
    $sql = "insert into stu (s_id, u_id, p_word, name) values ($id,$uni,'{$_POST['Password']}','{$_POST['Name']}');";
    $result = mysql_query($sql); 
    if ($result === TRUE) {
        echo "New record created successfully <br>";
        echo "Your User ID: $id";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
?>

<div style="margin: auto; width:80%;">
  <h1 style="text-align:center">Sign Up</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <div style="margin: auto; width:180px;">
    <!--User ID:<br>-->
    <!--<input type="text" name="User">-->
    <!--<br>-->
    Password:<br>
    <input type="password" name="Password">
    <br>
    Name:<br>
    <input type="text" name="Name">
    <br>
    University:<br>
    <select name="University">
      <?php
      $result = mysql_query("SELECT u_id, name FROM uni;");
      while ($row = mysql_fetch_assoc($result)){
        echo "<option value=\"".$row["u_id"]."\">" . $row["name"] . "</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Sign Up">
  </div>
</form>
</div>

</body>
</html>
