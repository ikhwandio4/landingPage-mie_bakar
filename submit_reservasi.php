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

// Proses form jika data dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $no_telepon = $_POST["no_telepon"];
    $tanggal = $_POST["tanggal"];
    $pukul = $_POST["pukul"];
    $jumlah_orang = $_POST["jumlah_orang"];
    $menu = $_POST["menu"];
    $meja = $_POST["meja"];

    // Query untuk menyimpan data ke tabel reservasi
    $stmt = $conn->prepare("INSERT INTO reservasi (nama, no_telepon, tanggal, pukul, jumlah_orang, menu, meja) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $nama, $no_telepon, $tanggal, $pukul, $jumlah_orang, $menu, $meja);

    if ($stmt->execute()) {
        // Redirect ke halaman sukses atau tampilan pesan sukses
        header("Location: index2.php.php");
        exit();
    } else {
        // Redirect ke halaman error atau tampilkan pesan error
        header("Location: error.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
