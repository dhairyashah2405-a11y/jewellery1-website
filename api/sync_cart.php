<?php
include '../backend/p2.php';

// Set response header to JSON
header('Content-Type: application/json');

// Get the raw POST data
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

if (is_array($data)) {
    // 1. Clear existing items in products table
    $clearQuery = mysqli_query($con, "DELETE FROM `products`");
    if (!$clearQuery) {
        echo json_encode(['success' => false, 'message' => 'Failed to clear cart: ' . mysqli_error($con)]);
        exit;
    }

    // 2. Insert new items
    $success = true;
    foreach ($data as $item) {
        $name = mysqli_real_escape_string($con, $item['name']);
        // Price might contain currency symbols or commas, clean it up
        $price = mysqli_real_escape_string($con, str_replace(['₹', 'Rs.', ',', ' '], '', $item['price']));
        $image = mysqli_real_escape_string($con, $item['image']);
        $qty = intval($item['qty']);

        $insertQuery = mysqli_query($con, "INSERT INTO `products` (name, price, image, quantity) VALUES ('$name', '$price', '$image', '$qty')");
        if (!$insertQuery) {
            $success = false;
            $errorMsg = mysqli_error($con);
            break;
        }
    }

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save items: ' . $errorMsg]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid cart data received']);
}
?>
