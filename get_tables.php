<?php
require_once 'tabel_tersedia.php';
header('Content-Type: application/json');

$conn = getDbConnection();
$availableTables = getAvailableTables($conn);
$conn->close();

echo json_encode(array_values($availableTables));
?>
