<?php
session_start();
include('config.php');

// Validasi input ID untuk mencegah SQL Injection
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Gunakan prepared statement untuk mengambil nilai unggulan saat ini
    $stmt = $mysqli->prepare("SELECT unggulan FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($unggulan);
    $stmt->fetch();
    $stmt->close();

    // Ubah nilai unggulan (toggle 0 menjadi 1 atau 1 menjadi 0)
    $new_unggulan = ($unggulan == 1) ? 0 : 1;

    // Update nilai unggulan di database
    $stmt = $mysqli->prepare("UPDATE products SET unggulan = ? WHERE id = ?");
    $stmt->bind_param("ii", $new_unggulan, $id);

    if ($stmt->execute()) {
        // Redirect ke halaman admin setelah berhasil mengupdate
        header("Location: admin.php");
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID.";
}

$mysqli->close();
?>
