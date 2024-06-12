<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cart = $_POST['cart'];

  // Connect to the database
  $conn = new mysqli('host', 'username', 'password', 'database');

  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Insert order into the database
  foreach ($cart as $item) {
    $sql = "INSERT INTO orders (menu_id, quantity) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $item['id'], $item['quantity']);
    $stmt->execute();
  }

  $conn->close();
  echo 'Order placed successfully';
} else {
  echo 'Invalid request method';
}
?>
