<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaCustomer = $_POST['namaCustomer'];
    $tanggalPemesanan = $_POST['tanggalPemesanan'];
    $total = floatval($_POST['total']);

    // Simpan data ke dalam tabel pemesanan
    $sqlPemesanan = "INSERT INTO pemesanan (nama_pelanggan, tanggal_pesan, total_pembayaran) VALUES ('$namaCustomer', '$tanggalPemesanan', '$total')";
    if ($conn->query($sqlPemesanan) === TRUE) {
        // Ambil id_penjualan yang baru saja dibuat
        $idPenjualan = $conn->insert_id;

        // Loop untuk menyimpan data menu ke dalam tabel keranjang
        foreach ($_POST['pesanan'] as $pesanan) {
            $namaMenu = $pesanan['nama'];
            $jumlah = $pesanan['jumlah'];
            $subtotal = $pesanan['harga'] * $jumlah;

            // Simpan data ke dalam tabel keranjang
            $sqlKeranjang = "INSERT INTO keranjang (id_penjualan, nama_Menu, jumlah, subtotal) VALUES ('$idPenjualan', '$namaMenu', '$jumlah', '$subtotal')";
            $conn->query($sqlKeranjang);
        }

        echo "Pembayaran berhasil diproses dan data disimpan ke dalam database.";
    } else {
        echo "Error: " . $sqlPemesanan . "<br>" . $conn->error;
    }

    $conn->close();
}
