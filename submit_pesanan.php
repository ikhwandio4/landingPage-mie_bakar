<?php
include 'koneksi.php';

// Menerima data POST
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaCustomer = $data['namaCustomer'];
    $tanggalPemesanan = $data['tanggalPemesanan'];
    $total = floatval($data['total']);
    $pesanan = $data['pesanan'];
    $metodePembayaran = $data['metodePembayaran']; // Mengambil metodePembayaran dari data

    // Simpan data ke dalam tabel pemesanan
    $sqlPemesanan = "INSERT INTO pemesanan (nama_pelanggan, tanggal_pesan, total_pembayaran, metode_pembayaran) 
                     VALUES ('$namaCustomer', '$tanggalPemesanan', '$total', '$metodePembayaran')";
    
    if ($conn->query($sqlPemesanan) === TRUE) {
        // Ambil id_penjualan yang baru saja dibuat
        $idPenjualan = $conn->insert_id;

        // Loop untuk menyimpan data menu ke dalam tabel keranjang
        foreach ($pesanan as $menu) {
            $namaMenu = $menu['nama'];
            $jumlah = $menu['jumlah'];
            $harga = $menu['harga'];
            $subtotal = $harga * $jumlah;

            // Simpan data ke dalam tabel keranjang
            $sqlKeranjang = "INSERT INTO keranjang (id_pemesanan, nama_menu, jumlah, subtotal) 
                             VALUES ('$idPenjualan', '$namaMenu', '$jumlah', '$subtotal')";
            $conn->query($sqlKeranjang);
        }

        echo "Pembayaran berhasil diproses dan data disimpan ke dalam database.";
    } else {
        echo "Error: " . $sqlPemesanan . "<br>" . $conn->error;
    }

    $conn->close();
}
?>