<?php
// Mulai session
session_start();

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

// Set Content-Type to application/json
header('Content-Type: application/json');

// Proses form jika data dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $no_telepon = $_POST["no_telepon"];
    $tanggal = $_POST["tanggal"];
    $pukul = $_POST["pukul"];
    $jumlah_orang = $_POST["jumlah_orang"];
    $menu = $_POST["menu"];
    $meja_id = $_POST["meja_id"]; // Menggunakan nama kolom meja_id

    // Cek ketersediaan meja
    $query_check = "SELECT COUNT(*) as jumlah_reservasi FROM reservasi WHERE tanggal = '$tanggal' AND pukul = '$pukul' AND meja_id = '$meja_id'";
    $result_check = $conn->query($query_check);
    $row = $result_check->fetch_assoc();

    if ($row['jumlah_reservasi'] > 0) {
        // Meja sudah direservasi
        echo json_encode(['success' => false, 'message' => 'Maaf, meja yang dipilih sudah direservasi untuk tanggal dan waktu yang sama.']);
        header("Location: index2.php");
        exit();
    }

    // Query untuk menyimpan data ke tabel reservasi
    $stmt = $conn->prepare("INSERT INTO reservasi (nama, no_telepon, tanggal, pukul, jumlah_orang, menu, meja_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $nama, $no_telepon, $tanggal, $pukul, $jumlah_orang, $menu, $meja_id);

    if ($stmt->execute()) {
        // Return JSON success response
        echo json_encode(['success' => true]);
    } else {
        // Return JSON error response
        echo json_encode(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan reservasi.']);
        header("Location: index2.php");
    }

    $stmt->close();
}

$conn->close();
?>
