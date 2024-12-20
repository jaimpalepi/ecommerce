<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

include 'config.php';

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

// Validate action
if (!in_array($action, ['add', 'remove', 'empty']) || !$product_id && $action !== 'empty') {
    header("location:cart.php");
    exit;
}

if ($action === 'empty') {
    unset($_SESSION['cart']);
} else {
    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT qty FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $obj = $result->fetch_object()) {
        switch ($action) {
            case "add":
                if (!isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id] = 0;
                }
                if ($_SESSION['cart'][$product_id] + 1 <= $obj->qty) {
                    $_SESSION['cart'][$product_id]++;
                }
                break;

            case "remove":
                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]--;
                    if ($_SESSION['cart'][$product_id] <= 0) {
                        unset($_SESSION['cart'][$product_id]);
                    }
                }
                break;
        }
    }
}

header("location:cart.php");
exit;
?>
