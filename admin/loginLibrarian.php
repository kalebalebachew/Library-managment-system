<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted email and password
    $email = $_POST["email"];
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
    $query = "SELECT * FROM librarian WHERE email = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("s", $email);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    // Verify the user credentials
    if (($row["email"] == $email || $row["username"] == $username) && $row["password"] == $password) {
        // Authentication successful
        header("Location: librarianDashboard.html"); // Redirect to the welcome page
        exit();
    } else {
        // Authentication failed
        $error = "Invalid email or password. Please try again.";
    }

    // Close the database connection
    $statement->close();
    $conn->close();
}
?>