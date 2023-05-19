<?php

$servername = "localhost";
$username = "natnael";
$password = "MK025399";
$dbname = "library management";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST["firstName"];
  $last_name = $_POST["lastName"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $gender = $_POST["sex"];
  $idNumber = $_POST["idNumber"];
  $academicYear = $_POST["year"];
  $dept = $_POST["department"];

  
  $sql = "INSERT INTO student (id, firstName, lastName, sex, email, password, academicYear, department)
  VALUES ('$idNumber','$first_name', '$last_name', '$gender', '$email', '$password', '$academicYear', '$dept')";

  $statement = $conn->prepare($sql);
  $statement->execute();

  if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.html"); // Redirect to the welcome page
        exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
