<?php
include_once __DIR__ . '/p2.php';

// Dynamically check and add size column to products table if it doesn't exist
$checkSizeCol = mysqli_query($con, "SHOW COLUMNS FROM `products` LIKE 'size'");
if (mysqli_num_rows($checkSizeCol) == 0) {
    mysqli_query($con, "ALTER TABLE `products` ADD COLUMN `size` VARCHAR(50) NULL AFTER `quantity`");
}

if (isset($_POST['add_to_cart']) || isset($_POST['buy_now'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $image = mysqli_real_escape_string($con, $_POST['image']);
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    $size = isset($_POST['size']) ? mysqli_real_escape_string($con, $_POST['size']) : 'Standard';

    // Check if product already exists in cart with same name and size
    $select_cart = mysqli_query($con, "SELECT * FROM `products` WHERE name = '$name' AND (size = '$size' OR (size IS NULL AND '$size' = 'Standard'))");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart';
        // Increment the quantity of the existing cart item
        mysqli_query($con, "UPDATE `products` SET quantity = quantity + $quantity WHERE name = '$name' AND (size = '$size' OR (size IS NULL AND '$size' = 'Standard'))");
    } else {
        $insert_product = mysqli_query($con, "INSERT INTO `products`(name, price, image, quantity, size) VALUES('$name', '$price', '$image', '$quantity', '$size')");
        $message[] = 'product added to cart successfully';
    }
    
    if (isset($_POST['buy_now'])) {
        header('location:checkout.php');
    } else {
        header('location:add to cart.php');
    }
}
?>

