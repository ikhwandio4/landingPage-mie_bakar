<?php
// Koneksi ke database
include 'koneksi.php';
// Menerima data dari form


if (isset($_POST['nama']) && isset($_POST['harga']) && isset($_POST['deskripsi'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Validasi data
    if (empty($nama) || empty($harga) || empty($deskripsi)) {
        echo "Mohon lengkapi semua field.";
        exit;
    }

    // Pastikan harga adalah angka yang valid
    if (!is_numeric($harga)) {
        echo "Harga harus berupa angka.";
        exit;
    }

    // Query untuk menyimpan data menu ke database
    $sql = "INSERT INTO menu (nama, harga, deskripsi) VALUES ('$nama', '$harga', '$deskripsi')";
    

    if ($conn->query($sql) === TRUE) {
        echo "Data menu berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Mohon lengkapi semua field.";
}

$conn->close();
?>