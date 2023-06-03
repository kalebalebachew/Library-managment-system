<?php

$servername = "localhost";
$username = "natnael";
$password = "MK025399";
$dbname = "library management";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn === false) {
  die("Connection failed: " . mysqli_connect_error());
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
  $userName = $_POST["username"];

  
  $sql = "INSERT INTO student VALUES ('$idNumber','$first_name', '$last_name', '$gender', '$email', '$password', '$academicYear', '$dept', '$userName')";

  if (mysqli_query($conn, $sql)) {
    echo "registered successfully";
  }else{
    echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
  }
}
mysqli_close($conn);
?> 