<?php
 session_start();
  require "login.php";
  require "home.php";
  
  if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
  }

 
  $host = "localhost";
  $user = "edlawit";
  $password = "edlawit";
  $database = "student info";
  $conn = mysqli_connect($host, $user, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  
  if (isset($_POST["submit"])) {
    
    $pass = $_POST["pass"];
    $newpass = $_POST["newpass"];
    $confpass = $_POST["confpass"];

   
    $email = $_SESSION["email"];
    $sql = "SELECT password FROM students WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $curpass = $row["pass"];

      if ($pass == $curpass) {
      
        if ($newpass == $confpass) {
          // Update password
          $sql = "UPDATE students SET password='$newpass' WHERE id='$email'";
          if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green'>Password updated successfully!</p>";
          } else {
            echo "<p style='color:red'>Error updating password: " . mysqli_error($conn) . "</p>";
          }
        } else {
          echo "<p style='color:red'>New password and confirm password do not match!</p>";
        }
      } else {
        echo "<p style='color:red'>Incorrect old password!</p>";
      }
    } else {
      echo "<p style='color:red'>Error getting current password!</p>";
    }

    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Library - Change Password</title>
</head>
<body>
  <p style="color:black;text-align:center;font-size: 30px"><b>Change Your Password</b></p>
  <form method="post" action="changepass.php">
    <label for="pass">Old Password:</label>
    <input type="password" id="pass" name="pass" required><br><br>
    <label for="newpass">New Password:</label>
    <input type="password" id="newpass" name="newpass" required><br><br>
    <label for="confpass">Confirm New Password:</label>
    <input type="password" id="confpass" name="confpass" required><br><br>
    <input type="submit" name="submit" value="Update Password">
  </form>
  <br>
  <a href="home.php">Back to Home Page</a>
</body>
</html>
