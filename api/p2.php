<?php
require_once __DIR__ . '/env_loader.php';

$con=mysqli_connect(getenv('DB_HOST') ?: "localhost", getenv('DB_USER') ?: "root", getenv('DB_PASSWORD') ?: "", getenv('DB_NAME_CART') ?: "addtocart");
$con1=mysqli_connect(getenv('DB_HOST') ?: "localhost", getenv('DB_USER') ?: "root", getenv('DB_PASSWORD') ?: "", getenv('DB_NAME_ORDERS') ?: "orders");


if($con)
{
// echo "Succesfull";
}
else{
    die('Connection failed');
}
?>