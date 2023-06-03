<?php
 session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted email and password
    $userOrEmail = $_POST["userOrEmail"];
    $password = $_POST["password"];

    // Database connection configuration
    $host = "localhost";
    $dbUsername = "natnael";
    $dbPassword = "MK025399";
    $dbName = "library management";

    // Create a database connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a query to retrieve user credentials from the database
    $query = "SELECT * FROM student WHERE (email = '$userOrEmail' OR username = '$userOrEmail') AND password = '$password'";
    $result = $conn->query($query);
    // Verify the user credentials
    if ($result->num_rows ==1) {
        // Authentication successful
        $_SESSION['UserName'] = $userOrEmail;
        header("Location: dashboard.html"); // Redirect to the welcome page
        exit();
    } else {
        header("Location: homepage.php?error=1");
        $_SESSION['error']= "Invalid Username/Email or Password";
        // Authentication failed
        exit();
    }

    // Close the database connection
    
    $conn->close();
}
unset($_SESSION['error']);
?>