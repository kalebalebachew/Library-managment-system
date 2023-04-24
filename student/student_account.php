<?php

$host = "localhost";
$user = "edlawit";
$password = "edlawit";
$database = "student info";
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["fname"]);

    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["dept"])) {
    $websiteErr = "Department is required!";
  } else {
    $website = test_input($_POST["dept"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
if (!function_exists('test_input')) {
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}



if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $password = $_POST['pass'];

  $sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";

  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0) {
    header("Location: home.php");
  } else {
    echo "<p style='color:red'>Invalid email or password</p>";
  }
}

if (isset($_POST['submit'])) {
  $Id = isset($_POST['studId']) ? $_POST['studId'] : '';
  $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
  $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
  $age = isset($_POST['age']) ? $_POST['age'] : '';
  $dept = isset($_POST['dept']) ? $_POST['dept'] : '';
  $year = isset($_POST['year']) ? $_POST['year'] : '';
  $academic = isset($_POST['academy']) ? $_POST['academy'] : '';
  $pass = isset($_POST['pass']) ? $_POST['pass'] : '';


$sql = "INSERT INTO students (Id, first_name,last_name, email,gender,age, department,attending_year,academic_year,password) VALUES ('$Id', '$fname', '$lname','$email','$gender','$age','$dept','$year','$academic','$pass')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location: home.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
  mysqli_close($conn);

?>
