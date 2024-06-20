<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celaket";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan meja yang tersedia
$sql = "SELECT meja FROM reservasi WHERE tanggal = CURDATE() AND pukul >= CURTIME()";
$result = $conn->query($sql);

$available_tables = array();

// Mengecualikan meja yang sudah direservasi dari daftar
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $available_tables[] = $row["meja"];
    }
}

// Membuat array dengan meja yang tersedia
$available_tables_array = array_diff(range(1, 8), $available_tables);

// Mengembalikan hasil dalam format JSON
echo json_encode($available_tables_array);

$conn->close();
?>