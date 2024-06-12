<?php
include 'koneksi.php';
include 'menu.php';

header('Content-Type: application/json');

// Get the number of available seats
$sql = "SELECT available_seats FROM reservations_info";
$result = $conn->query($sql);

$available_seats = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $available_seats = $row['available_seats'];
}

$jumlah_orang = intval($_POST['jumlah_orang']);
if ($jumlah_orang <= $available_seats) {
    // Proceed with the reservation
    $stmt = $conn->prepare("INSERT INTO reservasi (nama, no_telepon, tanggal, pukul, jumlah_orang, menu) VALUES (?, ?, ?, ?, ?, ?)");
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $tanggal = $_POST['tanggal'];
    $pukul = $_POST['pukul'];
    $jumlah_orang = $_POST['jumlah_orang'];
    $menu = $_POST['menu'];
    $stmt->bind_param("ssssss", $nama, $no_telepon, $tanggal, $pukul, $jumlah_orang, $menu);

    if ($stmt->execute()) {
        // Update the available seats
        $new_available_seats = $available_seats - $jumlah_orang;
        $update_sql = "UPDATE reservations_info SET available_seats = $new_available_seats";
        $conn->query($update_sql);

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save reservation: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Not enough available seats']);
}

$conn->close();
?>