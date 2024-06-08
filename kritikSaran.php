<?php
// Database connection
$host = 'localhost';
$db = 'celaket';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

function ambilUlasan() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM  kritikSaran");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function tambahUlasan($nama_Produk, $rating, $ulasan) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO ulasan (nama_barang, rating, ulasan) VALUES (?, ?, ?)");
    return $stmt->execute([$nama_Produk, $rating, $ulasan]);
}

function hapusUlasan($id_Ulasan) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM ulasan WHERE id_Ulasan = ?");
    return $stmt->execute([$id_Ulasan]);
}
?>
