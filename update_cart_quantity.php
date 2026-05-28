<?php
include 'p2.php';

if (isset($_POST['update_quantity'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    
    $update_query = mysqli_query($con, "UPDATE `products` SET quantity = '$quantity' WHERE id = '$id'") or die('query failed');
    
    if ($update_query) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
