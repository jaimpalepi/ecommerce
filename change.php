<?php
session_start();
include('config.php');

// Validasi input ID untuk mencegah SQL Injection
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Gunakan prepared statement untuk mengambil nilai type saat ini
    $stmt = $mysqli->prepare("SELECT type FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($type);
    $stmt->fetch();
    $stmt->close();

    // Ubah nilai type (toggle antara "seller" dan "user")
    $new_type = ($type === "seller") ? "user" : "seller";

    // Update nilai type di database
    $stmt = $mysqli->prepare("UPDATE users SET type = ? WHERE id = ?");
    $stmt->bind_param("si", $new_type, $id);

    if ($stmt->execute()) {
        // Redirect ke halaman admin setelah berhasil mengupdate
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
