<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['nama']) && isset($data['menu']) && isset($data['rating']) && isset($data['ulasan'])) {
    // Ambil data ulasan
    $nama = $data['nama'];
    $menu = $data['menu'];
    $rating = $data['rating'];
    $ulasan = $data['ulasan'];

    // Simpan ulasan ke database atau file
    // Contoh sederhana penyimpanan ke file
    $file = 'ulasan.txt';
    $ulasanData = "Nama: $nama, Menu: $menu, Rating: $rating, Ulasan: $ulasan\n";
    file_put_contents($file, $ulasanData, FILE_APPEND);

    // Kembalikan respons JSON
    echo json_encode(['status' => 'success', 'message' => 'Ulasan berhasil dikirim']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Data ulasan tidak lengkap']);
}
?>
