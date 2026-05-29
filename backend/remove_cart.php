<?php
include_once __DIR__ . '/p2.php';

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM `products` WHERE id = '$remove_id'");
    header('location:add to cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($con, "DELETE FROM `products`") or die('query failed');
    header('location:add to cart.php');
}
?>
