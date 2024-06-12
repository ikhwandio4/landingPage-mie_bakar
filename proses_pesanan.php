<?php
include 'menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    // Ambil harga menu dari database
    $stmt = $pdo->prepare("SELECT harga FROM menu WHERE id_menu = ?");
    $stmt->execute([$id_menu]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);
    $harga = $menu['harga'];

    $total_harga = $harga * $jumlah;

    // Tambahkan pesanan ke database
    tambahPesanan($id_menu, $jumlah, $total_harga);

    // Redirect ke halaman pembayaran atau konfirmasi pesanan
    header('Location: pembayaran.php');
    exit;
}