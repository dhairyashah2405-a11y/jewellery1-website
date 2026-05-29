<?php
include_once __DIR__ . '/p2.php';

/*
    SIMPLE VERSION - Download & Save JPG/PNG Images to Database
*/

// Function to get value from POST safely
function getPostValue($name) {
    return isset($_POST[$name]) ? $_POST[$name] : "";
}

// ============================================
// SIMPLE IMAGE DOWNLOAD FUNCTION
// ============================================
function downloadImage($imageUrl) {
    // Remove extra spaces
    $imageUrl = trim($imageUrl);
    
    // Return null if empty
    if ($imageUrl == "") {
        return null;
    }
    
    // Check if it's a valid URL
    if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
        // Try local file path
        if (file_exists($imageUrl)) {
            $imageData = @file_get_contents($imageUrl);
            if ($imageData !== false) {
                return $imageData;
            }
        }
        return null;
    }
    
    // Get file extension (jpg, jpeg, png)
    $extension = strtolower(pathinfo($imageUrl, PATHINFO_EXTENSION));
    
    // ONLY allow jpg, jpeg, png
    $allowed = ['jpg', 'jpeg', 'png'];
    if (!in_array($extension, $allowed)) {
        return null;  // Not allowed format
    }
    
    // Download the image using cURL if available, else file_get_contents
    $imageData = null;
    
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $imageUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $imageData = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode != 200) {
            $imageData = null;
        }
    } else {
        $imageData = @file_get_contents($imageUrl);
        if ($imageData === false) {
            $imageData = null;
        }
    }
    
    return $imageData;
}

// ============================================
// DROP AND RECREATE TABLES (to fix column issue)
// ============================================

// Create checkout table with correct columns
$createCheckout = "CREATE TABLE IF NOT EXISTS checkout (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(50) NOT NULL,
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

if (!mysqli_query($con1, $createCheckout)) {
    die("Error creating checkout table: " . mysqli_error($con1));
}

// Dynamically check and add status column to checkout table if it doesn't exist
$checkStatusCol = mysqli_query($con1, "SHOW COLUMNS FROM `checkout` LIKE 'status'");
if (mysqli_num_rows($checkStatusCol) == 0) {
    mysqli_query($con1, "ALTER TABLE `checkout` ADD COLUMN `status` VARCHAR(50) DEFAULT 'Pending' AFTER `total_amount`");
}

// Create order items table
$createItems = "CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(50) NOT NULL,
    product_name VARCHAR(255),
    product_price DECIMAL(10,2),
    product_quantity INT DEFAULT 1,
    product_image LONGBLOB,
    image_type VARCHAR(20)
)";

if (!mysqli_query($con1, $createItems)) {
    die("Error creating order_items table: " . mysqli_error($con1));
}

// ============================================
// GET FORM DATA
// ============================================

$customer_email = getPostValue("email_phone");
$first_name = getPostValue("first_name");
$last_name = getPostValue("last_name");
$customer_name = trim($first_name . " " . $last_name);
$address = getPostValue("address");
$apartment = getPostValue("apartment");
$full_address = $address;
if ($apartment) {
    $full_address .= ", " . $apartment;
}
$city = getPostValue("city");
$state = getPostValue("state");
$pincode = getPostValue("pincode");
$payment_method = getPostValue("payment_method");
$total_amount = getPostValue("total_price");

// Get product details from hidden fields
$product_names = explode(", ", getPostValue("product_name"));
$product_prices = explode(", ", getPostValue("product_price"));
$product_images = explode(", ", getPostValue("product_image"));
$product_quantities = explode(", ", getPostValue("product_quantity"));

// Debug: Print received data
error_log("Customer Email: " . $customer_email);
error_log("Customer Name: " . $customer_name);
error_log("Total Amount: " . $total_amount);
error_log("Products Count: " . count($product_names));

// ============================================
// GENERATE UNIQUE ORDER NUMBER
// ============================================
$order_number = "ORD" . date("YmdHis") . rand(10, 99);

// ============================================
// SAVE ORDER TO DATABASE
// ============================================

// Escape special characters to prevent SQL injection
$order_number_escaped = mysqli_real_escape_string($con1, $order_number);
$customer_email_escaped = mysqli_real_escape_string($con1, $customer_email);
$customer_name_escaped = mysqli_real_escape_string($con1, $customer_name);
$full_address_escaped = mysqli_real_escape_string($con1, $full_address);
$city_escaped = mysqli_real_escape_string($con1, $city);
$state_escaped = mysqli_real_escape_string($con1, $state);
$pincode_escaped = mysqli_real_escape_string($con1, $pincode);
$payment_method_escaped = mysqli_real_escape_string($con1, $payment_method);
$total_amount_escaped = mysqli_real_escape_string($con1, $total_amount);

// Insert order details
$orderQuery = "INSERT INTO checkout (
    order_number, 
    customer_email, 
    customer_name, 
    address, 
    city, 
    state, 
    pincode, 
    payment_method, 
    total_amount
) VALUES (
    '$order_number_escaped', 
    '$customer_email_escaped', 
    '$customer_name_escaped', 
    '$full_address_escaped', 
    '$city_escaped', 
    '$state_escaped', 
    '$pincode_escaped', 
    '$payment_method_escaped', 
    '$total_amount_escaped'
)";

if (mysqli_query($con1, $orderQuery)) {
    
    $allProductsSaved = true;
    $productsSavedCount = 0;
    
    // ============================================
    // SAVE EACH PRODUCT WITH IMAGE
    // ============================================
    for ($i = 0; $i < count($product_names); $i++) {
        
        $productName = isset($product_names[$i]) ? trim($product_names[$i]) : "";
        $productPrice = isset($product_prices[$i]) ? trim($product_prices[$i]) : "0";
        $productImageUrl = isset($product_images[$i]) ? trim($product_images[$i]) : "";
        $productQuantity = isset($product_quantities[$i]) ? (int)trim($product_quantities[$i]) : 1;
        
        // Skip empty products
        if ($productName == "") continue;
        
        // Remove any currency symbols or commas from price
        $productPrice = preg_replace('/[^0-9.]/', '', $productPrice);
        if ($productPrice == "") $productPrice = "0";
        
        // ============================================
        // DOWNLOAD AND SAVE THE IMAGE TO SERVER FILESYSTEM
        // ============================================
        // Get image extension from path
        $extension = strtolower(pathinfo($productImageUrl, PATHINFO_EXTENSION));
        if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
            $extension = 'jpg'; // default
        }
        
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $destFileName = 'order_' . $order_number . '_' . $i . '.' . $extension;
        $destFilePath = $uploadDir . $destFileName;
        
        $fileSaved = false;
        
        // Copy local file or download remote file
        if (!filter_var($productImageUrl, FILTER_VALIDATE_URL)) {
            // Local file path
            if (file_exists($productImageUrl)) {
                if (copy($productImageUrl, $destFilePath)) {
                    $fileSaved = true;
                }
            }
        } else {
            // Remote URL
            $imageData = downloadImage($productImageUrl);
            if ($imageData !== null) {
                if (file_put_contents($destFilePath, $imageData) !== false) {
                    $fileSaved = true;
                }
            }
        }
        
        // Escape text data
        $productName_escaped = mysqli_real_escape_string($con1, $productName);
        $productPrice_escaped = mysqli_real_escape_string($con1, $productPrice);
        $imageType_escaped = mysqli_real_escape_string($con1, $extension);
        
        // Prepare product query
        if ($fileSaved) {
            // If image saved to server filesystem, save the path to DB
            $dbPath_escaped = mysqli_real_escape_string($con1, $destFilePath);
            
            $productQuery = "INSERT INTO order_items (
                order_number, 
                product_name, 
                product_price, 
                product_quantity, 
                product_image, 
                image_type
            ) VALUES (
                '$order_number_escaped', 
                '$productName_escaped', 
                '$productPrice_escaped', 
                $productQuantity, 
                '$dbPath_escaped', 
                '$imageType_escaped'
            )";
        } else {
            // If image save failed, save without image path
            $productQuery = "INSERT INTO order_items (
                order_number, 
                product_name, 
                product_price, 
                product_quantity, 
                product_image, 
                image_type
            ) VALUES (
                '$order_number_escaped', 
                '$productName_escaped', 
                '$productPrice_escaped', 
                $productQuantity, 
                NULL, 
                '$imageType_escaped'
            )";
        }
        
        // Execute product query
        if (mysqli_query($con1, $productQuery)) {
            $productsSavedCount++;
        } else {
            $allProductsSaved = false;
            error_log("Error saving product: " . mysqli_error($con1));
            echo "Error saving product: " . mysqli_error($con1) . "<br>";
        }
    }
    
    // ============================================
    // IF ALL SAVED SUCCESSFULLY
    // ============================================
    if ($allProductsSaved && $productsSavedCount > 0) {
        // Clear the cart
        mysqli_query($con, "DELETE FROM products");
        
        // Success message and redirect
        echo "<script>
            alert('✅ Order Placed Successfully!\\nOrder Number: $order_number\\nProducts Saved: $productsSavedCount');
            window.location = 'home.php';
        </script>";
        exit();
    } else if ($productsSavedCount == 0) {
        echo "<script>
            alert('⚠️ No products found in cart!');
            window.history.back();
        </script>";
    } else {
        echo "<script>
            alert('⚠️ Some products could not be saved. Order number: $order_number');
            window.location = 'home.php';
        </script>";
    }
    
} else {
    echo "Error saving order: " . mysqli_error($con1) . "<br>";
    echo "<script>
        alert('Error placing order: " . addslashes(mysqli_error($con1)) . "');
        window.history.back();
    </script>";
}

// Close connections
mysqli_close($con);
mysqli_close($con1);
?>