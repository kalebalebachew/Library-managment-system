<?php

$servename = "localhost";
$username = "kaleb";
$password = "kaleb@1234";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $gender = $_POST["gender"];

  
  $sql = "INSERT INTO admin (first_name, last_name, email, password, gender)
  VALUES ('$first_name', '$last_name', '$email', '$password', '$gender')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
