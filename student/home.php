<?php
 session_start();
 
  if (!isset($_SESSION["id"])) {
    header("Location: login.php");
  }
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Library - Home</title>
</head>
<body>
  <p style="color:black;text-align:center;font-size: 30px"><b>Welcome <?php echo $_SESSION["fname"]; ?></b></p>
  <form method="post" action="change_password.php">
    <input type="submit" name="change_pass" value="Change Password">
  </form>
  <form method="post" action="logout.php">
    <input type="submit" name="logout" value="Logout">
  </form>
  
</body>
</html>