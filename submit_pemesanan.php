<?php
// Pastikan terhubung ke database sebelumnya
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $namaPelanggan = $_POST["nama-pembeli"];
    $tanggalPesan = date("Y-m-d"); // Gunakan tanggal saat ini
    $totalPembayaran = $_POST["total-harga"];

    // Lakukan pengecekan dan validasi data jika diperlukan

    // Siapkan query SQL untuk menyimpan data pemesanan
    $sql = "INSERT INTO pemesanan (nama_pelanggan, tanggal_pesan, total_pembayaran) VALUES (?, ?, ?)";

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $namaPelanggan, $tanggalPesan, $totalPembayaran);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika penyimpanan berhasil, tambahkan pesan sukses atau tindakan lanjutan jika diperlukan
        echo "Pemesanan berhasil disimpan.";
    } else {
        // Jika terjadi kesalahan saat menyimpan data, berikan pesan error atau tindakan lanjutan jika diperlukan
        echo "Terjadi kesalahan saat menyimpan data pemesanan.";
    }

    // Tutup statement dan koneksi ke database
    $stmt->close();
    $conn->close();
}
?>
