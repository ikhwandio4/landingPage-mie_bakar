<?php
// Koneksi ke database
include 'koneksi.php';

// Menerima data dari form
if (isset($_POST['nama']) && isset($_POST['no_telepon']) && isset($_POST['tanggal']) && isset($_POST['pukul']) && isset($_POST['jumlah_orang']) && isset($_POST['menu'])) {
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $tanggal = $_POST['tanggal'];
    $pukul = $_POST['pukul'];
    $jumlah_orang = $_POST['jumlah_orang'];
    $menu = $_POST['menu'];

    // Validasi data
    if (empty($nama) || empty($no_telepon) || empty($tanggal) || empty($pukul) || empty($jumlah_orang) || empty($menu)) {
        echo "Mohon lengkapi semua field.";
        exit;
    }

    // Pastikan tanggal adalah nilai yang valid
    if (!strtotime($tanggal)) {
        echo "Format tanggal tidak valid.";
        exit;
    }

    // Query untuk menyimpan data reservasi ke database
    $sql = "INSERT INTO reservasi (nama, no_telepon, tanggal, pukul, jumlah_orang, menu) 
            VALUES ('$nama', '$no_telepon', '$tanggal', '$pukul', '$jumlah_orang', '$menu')";

    if ($conn->query($sql) === TRUE) {
        echo "Data reservasi berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Mohon lengkapi semua field.";
}

$conn->close();
?>