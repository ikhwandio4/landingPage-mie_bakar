<?php
include 'koneksi.php';

// Menerima data POST
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaCustomer = $data['namaCustomer'];
    $tanggalPemesanan = $data['tanggalPemesanan'];
    $total = floatval($data['total']);
    $pesanan = $data['pesanan'];
    $metodePembayaran = $data['metodePembayaran'];

    // Sanitasi input untuk mencegah injeksi SQL
    $namaCustomer = $conn->real_escape_string($namaCustomer);
    $tanggalPemesanan = $conn->real_escape_string($tanggalPemesanan);
    $total = $conn->real_escape_string($total);
    $metodePembayaran = $conn->real_escape_string($metodePembayaran);

    // Simpan data ke dalam tabel pemesanan
    $sqlPemesanan = "INSERT INTO pemesanan (nama_pelanggan, tanggal_pesan, total_pembayaran, metode_pembayaran)
                     VALUES ('$namaCustomer', '$tanggalPemesanan', '$total', '$metodePembayaran')";

    if ($conn->query($sqlPemesanan) === TRUE) {
        // Ambil id_penjualan yang baru saja dibuat
        $idPenjualan = $conn->insert_id;

        // Loop untuk menyimpan data menu ke dalam tabel keranjang
        foreach ($pesanan as $menu) {
            $namaMenu = $conn->real_escape_string($menu['nama']);
            $jumlah = $conn->real_escape_string($menu['jumlah']);
            $harga = $conn->real_escape_string($menu['harga']);
            $subtotal = $harga * $jumlah;

            // Simpan data ke dalam tabel keranjang
            $sqlKeranjang = "INSERT INTO keranjang (id_pemesanan, nama_menu, jumlah, subtotal)
                             VALUES ('$idPenjualan', '$namaMenu', '$jumlah', '$subtotal')";
            $conn->query($sqlKeranjang);
        }

        // Respons sukses
        $response = array(
            'status' => 'success',
            'message' => 'Pembayaran berhasil diproses dan data disimpan ke dalam database.'
        );
        echo json_encode($response);
    } else {
        // Respons gagal
        $response = array(
            'status' => 'error',
            'message' => 'Error: ' . $sqlPemesanan . '<br>' . $conn->error
        );
        echo json_encode($response);
    }

    // Setelah pemesanan berhasil disimpan
$_SESSION['customer_name'] = $namaCustomer; // Simpan nama pelanggan dalam sesi
// Atau
setcookie('customer_name', $namaCustomer, time() + (86400 * 30), "/"); // Simpan nama pelanggan dalam cookie

    $conn->close();
}
?>