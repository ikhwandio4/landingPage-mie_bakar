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

function hapuskritiksaran($id_kritiksaran) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM kritiksaran WHERE id_kritiksaran = ?");
    return $stmt->execute([$id_kritiksaran]);
}
// Handle delete request
if (isset($_GET['hapus'])) {
    $id_kritiksaran = $_GET['hapus'];
    if (hapuskritiksaran($id_kritiksaran)) {
        echo "Ulasan berhasil dihapus.";
    } else {
        echo "Gagal menghapus ulasan.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_kritiksaran = $_POST['id_kritiksaran'];
    $kritik = $_POST['kritik'];
    $saran = $_POST['saran'];

    if (tambahUlasan($nama_Produk, $rating, $ulasan)) {
        echo "Ulasan berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan ulasan.";
    }
}
?>
