<?php require 'Student_Account.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Library - Login</title>
</head>

<body>

  <p style="color:black;text-align:center;font-size: 30px"><b>Login to your Library Account</b></p>
  <form method="post" action="login.php">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass" required><br><br>

    <input type="submit" name="submit" value="Log In">
    <p>Don't have an account? <a href="registration.php">Sign up here</a>.</p>
  </form>

  <?php
  session_start();
   $host = "localhost";
   $user = "edlawit";
   $password = "edlawit";
   $database = "student info";
   $conn = mysqli_connect($host, $user, $password, $database);

   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
  if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $row = mysqli_fetch_assoc($result);
      $_SESSION["id"] = $row["id"];
      $_SESSION["fname"] = $row["fname"];
      header("Location: home.php");
    } else {
      
      echo "<p style='color:red'>Invalid email or password</p>";
    }
    

    mysqli_close($conn);
  }
  ?>

</body>

</html>