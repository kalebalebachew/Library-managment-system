<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $servername = "localhost";
    $username = "natnael";
    $password = "MK025399";
    $dbname = "library management";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    if ($count > 0) {
        echo "exists";
    } else {
        echo "available";
    }
}

?>