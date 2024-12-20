<?php
session_start();
include('config.php');

// Validasi input ID untuk mencegah SQL Injection
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Gunakan prepared statement untuk query
    $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect ke halaman admin setelah berhasil menghapus
        header("Location: admin-account.php");
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID.";
}

$mysqli->close();
?>
