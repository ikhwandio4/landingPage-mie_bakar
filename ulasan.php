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
    $stmt = $pdo->query("SELECT * FROM  testimoni");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function tambahUlasan($nama, $menu,$rating ,$ulasan) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO testimoni (nama, menu ,rating, ulasan) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$nama,$menu ,$rating, $ulasan]);
}

function hapusUlasan($id_testimoni) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM testimoni WHERE id_testimoni = ?");
    return $stmt->execute([$id_testimoni]);
}
?>
