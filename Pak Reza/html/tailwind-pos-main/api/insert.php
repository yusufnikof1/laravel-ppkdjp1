<?php

// Include koneksi
require_once '../koneksi.php';
// var_dump($_POST['cart']);

// Query ambil data produk aktif

// Buat kode order
$today = 'ORD' . date('dmY');
$getdata = mysqli_query($con, "SELECT max(right(order_code,4)) + 1 as nextnumber FROM orders WHERE left(order_code, 11) = '$today'");

$checknum = mysqli_num_rows($getdata);
if ($checknum > 0) {
    $rows = mysqli_fetch_assoc($getdata);
    $nextnum = ($rows['nextnumber'] != null) ? sprintf('%04s', $rows['nextnumber']) : '0001';
} else {
    $nextnum = '0001';
}

$code = $today . $nextnum;
$tanggal_sekarang = date('Y-m-d'); // Format tanggal: 2025-04-28

// Tambahkan field order_date di insert
$query = "INSERT INTO `orders` (`order_code`, `order_amount`, `order_change`, `order_status`, `order_date`) 
VALUES ('$code', '" . $_POST['total'] . "', '" . $_POST['change'] . "', '1', '$tanggal_sekarang')";

$result = mysqli_query($con, $query);


// $getdata = mysqli_query($con, "SELECT max(right(order_code,4)) + 1 as nextnumber from orders where left(order_code, 8) = '" . date('dmY') . "' ");
// $checknum = mysqli_num_rows($getdata);
// if ($checknum > 0) { //check empty rows
//     $rows = mysqli_fetch_assoc($getdata);
//     if ($rows['nextnumber'] != null) { //check if row null
//         $nextnum = sprintf('%04s', $rows['nextnumber']);
//     } else {
//         $nextnum = '0001';
//     }
// } else {
//     $nextnum = '0001';
// }

// $code = 'ORD' . date('dmY') . $nextnum;
// $query = "INSERT INTO `orders`( `order_code`, `order_amount`, `order_change`, `order_status`) 
// VALUES ('" . $code . "','" . $_POST['total'] . "', '" . $_POST['change'] . "', '1')";

// $result = mysqli_query($con, $query);

if ($result) {
    // Ambil ID terakhir yang dimasukkan
    $last_id = mysqli_insert_id($con);

    // Ambil data produk dari request
    $cart = json_decode($_POST['cart'], true);
    $qty = 0;
    // Loop untuk memasukkan setiap item ke dalam tabel order_items
    foreach ($cart as $item) {
        $qty = $item['qty'] * $item['price'];
        $item_query = "INSERT INTO `order_details`(`order_id`, `product_id`, `qty`, `order_price`, `order_subtotal`) 
        VALUES ('" . $last_id . "', '" . $item['productId'] . "', '" . $item['qty'] . "', '" . $item['price'] . "', '" . $qty . "' )";

        $detailinsert = mysqli_query($con, $item_query);
        if ($detailinsert) {
            $update = mysqli_query($con, "UPDATE products SET quantity = quantity - '" . $item['qty'] . "' WHERE id = '" . $item['productId'] . "' ");
        }
    }

    header('location: ../user/pos-order.php?order=' . $code);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal membuat order']);
}   

// Tampilkan hasil dalam bentuk JSON