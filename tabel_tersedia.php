<?php
// Koneksi ke database
function getDbConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "celaket";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}

// Fungsi untuk mendapatkan meja yang tersedia
function getAvailableTables($conn) {
    $allTables = range(1, 8); // Semua meja dari 1 sampai 8
    $reservedTables = [];

    $query = "SELECT DISTINCT meja FROM reservasi";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reservedTables[] = $row['meja'];
        }
    }

    return array_diff($allTables, $reservedTables);
}

// Fungsi untuk mengambil daftar menu
function ambilMenu($conn) {
    $menus = [];
    $query = "SELECT nama FROM menu";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $menus[] = $row;
        }
    }

    return $menus;
}
?>