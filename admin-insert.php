<?php

include 'config.php';

$product_code = $_POST["code"];
$product_name = $_POST["name"];
$product_desc = $_POST["desc"];
$image = upload(); 
$qty = $_POST["qty"];
$price = $_POST["price"];

if ($mysqli->query("INSERT INTO products (product_code, product_name, product_desc, product_img_name, qty, price) 
                    VALUES ('$product_code', '$product_name', '$product_desc', '$image', $qty, $price)")) {
    echo 'Data inserted successfully!';
    echo '<br/>';
} else {
    echo "Error: " . $mysqli->error;
}


function upload() {
    $filename = $_FILES['img']['name'];
    $ekstensi = explode('.', $filename);
    $ekstensi = strtolower(end($ekstensi));
    $tmp = $_FILES['img']['tmp_name'];
    $namafile = uniqid();
    $namafile .= '.';
    $namafile .= $ekstensi;

    if (move_uploaded_file($tmp, 'images/products/' . $namafile)) {
        return $namafile; 
    } else {
        die('File upload failed!');
    }
}

header("Location: admin.php");
exit();

?>
