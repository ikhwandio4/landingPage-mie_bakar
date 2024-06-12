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

function tambahUlasan($kritik, $saran) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO krtiksaran (kritik, saran) VALUES (?, ?, ?)");
    return $stmt->execute([$kritik, $saran]);
}

function hapusUlasan($id_kritiksaran) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM ulasan WHERE id_Ulasan = ?");
    return $stmt->execute([$id_kritiksaran]);
}
?>
