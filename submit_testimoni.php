<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $menu = $_POST['menu'];
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];

    // Buat query untuk memasukkan data
    $sql = "INSERT INTO testimoni (nama, menu, rating, ulasan) VALUES ('$nama', '$menu', '$rating', '$ulasan')";

    if ($conn->query($sql) === TRUE) {
        echo "Ulasan berhasil dikirim!";
        header("Location: index2.php"); // Redirect ke halaman index.php
        exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>
