<?php
include 'p2.php';

// 1. Get values from form
$email_phone = isset($_POST['email_phone']) ? $_POST['email_phone'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$apartment = isset($_POST['apartment']) ? $_POST['apartment'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$state = isset($_POST['state']) ? $_POST['state'] : '';
$pincode = isset($_POST['pincode']) ? $_POST['pincode'] : '';
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : 'COD';
$total_price = isset($_POST['total_price']) ? $_POST['total_price'] : '0';

// 2. Create tables if they do not exist
$sql_table = "CREATE TABLE IF NOT EXISTS checkout (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(50) NOT NULL UNIQUE,
    customer_email VARCHAR(255),
    customer_name VARCHAR(200),
    address TEXT,
    city VARCHAR(100),
    state VARCHAR(100),
    pincode VARCHAR(20),
    payment_method VARCHAR(50),
    total_amount DECIMAL(10,2),
    status VARCHAR(50) DEFAULT 'Pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($con1, $sql_table);

$sql_items_table = "CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(50) NOT NULL,
    product_name VARCHAR(255),
    product_price DECIMAL(10,2),
    product_quantity INT DEFAULT 1,
    product_image LONGBLOB,
    image_type VARCHAR(20)
)";
mysqli_query($con1, $sql_items_table);

// 3. Generate Unique Order Number
$order_number = 'ORD-' . strtoupper(uniqid());

// 4. Sanitize and Insert Order Details into 'checkout' Table
$customer_name = mysqli_real_escape_string($con1, trim($first_name . ' ' . $last_name));
$customer_email = mysqli_real_escape_string($con1, $email_phone);
$full_address = mysqli_real_escape_string($con1, trim($address . ($apartment ? ', ' . $apartment : '')));
if (!empty($country)) {
    $full_address .= ', ' . mysqli_real_escape_string($con1, $country);
}
$city_esc = mysqli_real_escape_string($con1, $city);
$state_esc = mysqli_real_escape_string($con1, $state);
$pincode_esc = mysqli_real_escape_string($con1, $pincode);
$payment_method_esc = mysqli_real_escape_string($con1, $payment_method);
$total_amount = floatval(str_replace(',', '', $total_price));

$sql_insert_order = "INSERT INTO checkout (order_number, customer_email, customer_name, address, city, state, pincode, payment_method, total_amount, status) 
                     VALUES ('$order_number', '$customer_email', '$customer_name', '$full_address', '$city_esc', '$state_esc', '$pincode_esc', '$payment_method_esc', $total_amount, 'Pending')";

$result = mysqli_query($con1, $sql_insert_order);

// 5. If order inserted successfully, insert each item from the cart into 'order_items'
if($result) {
    // Select cart items from products table
    $cart_items = mysqli_query($con, "SELECT * FROM `products`");
    $items_inserted = true;
    
    if (mysqli_num_rows($cart_items) > 0) {
        while ($item = mysqli_fetch_assoc($cart_items)) {
            $p_name = mysqli_real_escape_string($con1, $item['name']);
            $p_price = floatval(str_replace(',', '', $item['price']));
            $p_qty = intval($item['quantity']);
            $p_image = mysqli_real_escape_string($con1, $item['image']);
            
            $sql_insert_item = "INSERT INTO order_items (order_number, product_name, product_price, product_quantity, product_image) 
                                VALUES ('$order_number', '$p_name', $p_price, $p_qty, '$p_image')";
            if (!mysqli_query($con1, $sql_insert_item)) {
                $items_inserted = false;
                break;
            }
        }
    }
    
    if ($items_inserted) {
        // Clear the cart
        mysqli_query($con, "DELETE FROM products");
        echo "<script>alert('Order Placed Successfully! Your Order Number is " . $order_number . "');</script>";
        echo "<script>window.location='../frontend/home.php';</script>";
    } else {
        echo "Error saving order items: " . mysqli_error($con1);
    }
} else {
    echo "Error saving order: " . mysqli_error($con1);
}
?>