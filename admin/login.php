<?php

session_start();

$server = "localhost";
$username = "kaleb";
$password = "kaleb@1234";
$dbname = "kaleb";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION["user_id"] = $row["id"];
    $_SESSION["user_email"] = $row["email"];
    header("Location: dashboard.html");
    exit();
  } else {
    $error_message = "Invalid email or password";
  }
}

$conn->close();

?>

