<?php
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

// Proses login jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Gunakan prepared statements untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT id_users, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $user_username, $stored_password);
        $stmt->fetch();

        // Verifikasi password
        if ($password === $stored_password) {  // Tidak menggunakan hashing
            // Login berhasil, simpan informasi pengguna dalam sesi
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $user_username;

            // Redirect ke halaman dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Password salah
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // User tidak ditemukan
        header("Location: login.php?error=1");
        exit();
    }
    $stmt->close();
}

$conn->close();
?>
