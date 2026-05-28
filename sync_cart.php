<?php
include 'p2.php';

// Decode the JSON cart payload
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (is_array($data)) {
    // 1. Clear the current database cart
    mysqli_query($con, "DELETE FROM `products`") or die('query failed');

    // 2. Insert each item from the JSON cart
    foreach ($data as $item) {
        $name = mysqli_real_escape_string($con, $item['name']);
        $price = mysqli_real_escape_string($con, str_replace(',', '', $item['price']));
        $image = mysqli_real_escape_string($con, $item['image']);
        $qty = (int)$item['qty'];
        $size = isset($item['size']) ? mysqli_real_escape_string($con, $item['size']) : 'Standard';

        mysqli_query($con, "INSERT INTO `products` (name, price, image, quantity, size) VALUES ('$name', '$price', '$image', '$qty', '$size')") or die('insert failed');
    }
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid cart data"]);
}
?>
