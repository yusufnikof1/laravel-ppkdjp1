<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Include koneksi
require_once '../koneksi.php';

// Query ambil data produk aktif
$query = "SELECT * FROM products";

$result = mysqli_query($con, $query);

$products = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products['id'] = $row['id'];
        $products['name'] = $row['product_name'];
        $products['price'] = $row['product_price'];
        $products['image'] = $row['product_photo'];
        $products['option'] = null;
    }
}

// Tampilkan hasil dalam bentuk JSON
echo json_encode($products);
