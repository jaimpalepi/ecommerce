<?php
session_start();
include('config.php');

// Validasi input ID untuk mencegah SQL Injection
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Gunakan prepared statement untuk mengambil status saat ini
    $stmt = $mysqli->prepare("SELECT status FROM orders WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($current_status);
    $stmt->fetch();
    $stmt->close();

    // Tentukan siklus status
    $statuses = ["menunggu konfirmasi", "diproses", "dikirim", "selesai"];

    // Cari status berikutnya dalam siklus
    $current_index = array_search($current_status, $statuses);
    if ($current_index === false) {
        $new_status = $statuses[0]; // Jika status tidak valid, set ke status awal
    } else {
        $new_status = $statuses[($current_index + 1) % count($statuses)];
    }

    // Update status di database
    $stmt = $mysqli->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $id);

    if ($stmt->execute()) {
        // Redirect ke halaman admin setelah berhasil mengupdate
        header("Location: admin-orders.php");
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID.";
}

$mysqli->close();
?>
