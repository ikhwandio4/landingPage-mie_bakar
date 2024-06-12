<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celaket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nama, menu, rating, ulasan FROM testimoni";
$result = $conn->query($sql);

$testimonials = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($testimonials);
?>
