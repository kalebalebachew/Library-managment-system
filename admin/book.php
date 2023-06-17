<?php
// Connect to the database
$conn = new mysqli('localhost', 'natnael', 'MK025399', 'library management');

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch data from the database
$query = "SELECT * FROM your_table";
$result = $conn->query($query);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the data as an associative array
    $data = $result->fetch_all(MYSQLI_ASSOC);
}

// Close the database connection
$conn->close();
?>
<?php
// Encode the data as JSON
$dataJson = json_encode($data);

// Pass the JSON data to JavaScript
echo `<script src ="book.js" >var data = $dataJson;</script>`;
?>


