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

function ambilMenu() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM menu");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function menu($pdo) {
    $stmt = $pdo->query("SELECT id, nama FROM menu");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function tambahMenu($nama, $harga, $deskripsi, $image) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO menu (nama, harga, deskripsi, image) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$nama, $harga, $deskripsi, $image]);
}

function hapusMenu($id_menu) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM menu WHERE id_menu = ?");
    return $stmt->execute([$id_menu]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $uploadFileDir = './uploaded_files/';
        // Check if directory exists, if not, create it
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $image = $newFileName;
            tambahMenu($name, $price, $description, $image);
        } else {
            echo 'There was some error moving the file to upload directory.';
        }
    } else {
        $image = null;
        tambahMenu($name, $price, $description, $image);
    }
}
?>