<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan sanitasi data input
    $kritik = isset($_POST['kritik']) ? htmlspecialchars($_POST['kritik']) : '';
    $saran = isset($_POST['saran']) ? htmlspecialchars($_POST['saran']) : '';

    // Koneksi ke database
    include 'koneksi.php';

    // Query untuk menyimpan data kritik dan saran ke database
    $sql = "INSERT INTO kritiksaran (kritik, saran) VALUES ('$kritik', '$saran')";

    if ($conn->query($sql) === TRUE) {
        echo "Data kritik dan saran berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>