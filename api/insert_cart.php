<?php
include '../backend/p2.php';

if (isset($_POST['add_to_cart']) || isset($_POST['buy_now'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

    // Check if product already exists in cart
    $select_cart = mysqli_query($con, "SELECT * FROM `products` WHERE name = '$name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart';
        // Update the quantity of the existing cart item to the new quantity
        mysqli_query($con, "UPDATE `products` SET quantity = '$quantity' WHERE name = '$name'");
    } else {
        $insert_product = mysqli_query($con, "INSERT INTO `products`(name, price, image, quantity) VALUES('$name', '$price', '$image', '$quantity')");
        $message[] = 'product added to cart succesfully';
    }
    
    if (isset($_POST['buy_now'])) {
        header('Location: ../frontend/checkout.php');
    } else {
        header('Location: ../frontend/add to cart.php');
    }
}
?>

