<?php
include_once __DIR__ . '/../backend/p2.php';

// Function to convert BLOB image to displayable HTML image
function displayImage($imageData, $imageType) {
    if (!empty($imageData)) {
        // Check if it's a file path (starts with uploads/, images/, etc., or is short text)
        $isPath = (strlen($imageData) < 300 && (strpos($imageData, '/') !== false || strpos($imageData, '\\') !== false || file_exists($imageData)));
        if ($isPath) {
            return htmlspecialchars($imageData);
        }
        // Convert binary data to base64 for display
        $base64 = base64_encode($imageData);
        return 'data:image/' . $imageType . ';base64,' . $base64;
    }
    // Return placeholder if no image
    return 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"%3E%3Crect width="100" height="100" fill="%23ddd"/%3E%3Ctext x="50" y="50" text-anchor="middle" dy=".3em" fill="%23999"%3ENo Image%3C/text%3E%3C/svg%3E';
}

// Get order number from URL
$order_number = isset($_GET['order']) ? trim($_GET['order']) : '';

if (empty($order_number)) {
    die('<h2>Error: No order number provided</h2><a href="view_orders.php">View All Orders</a>');
}

// Escape order number for safety
$order_number_escaped = mysqli_real_escape_string($con1, $order_number);

// Get order details
$orderQuery = "SELECT * FROM checkout WHERE order_number = '$order_number_escaped'";
$orderResult = mysqli_query($con1, $orderQuery);
$order = mysqli_fetch_assoc($orderResult);

if (!$order) {
    die('<h2>Order Not Found</h2><p>Order number: ' . htmlspecialchars($order_number) . '</p><a href="view_orders.php">View All Orders</a>');
}

// Get products in this order
$productsQuery = "SELECT * FROM order_items WHERE order_number = '$order_number_escaped'";
$productsResult = mysqli_query($con1, $productsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order #<?php echo htmlspecialchars($order['order_number']); ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: Arial, sans-serif; 
            background: #f5f5f5; 
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: #1a73e8;
            color: white;
            padding: 20px 30px;
        }
        .header h1 { margin-bottom: 5px; }
        .content { padding: 30px; }
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        .info-box h3 {
            color: #1a73e8;
            margin-bottom: 15px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
            padding: 5px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-label {
            width: 150px;
            font-weight: bold;
            color: #666;
        }
        .info-value {
            flex: 1;
            color: #333;
        }
        .product-item {
            display: flex;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            background: white;
        }
        .product-image {
            width: 120px;
            height: 120px;
            margin-right: 20px;
            flex-shrink: 0;
        }
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }
        .product-details {
            flex: 1;
        }
        .product-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }
        .product-price {
            font-size: 20px;
            color: #1a73e8;
            font-weight: bold;
            margin: 8px 0;
        }
        .product-quantity {
            color: #666;
            margin-top: 5px;
        }
        .total-section {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
            text-align: right;
        }
        .total-label {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
        .total-amount {
            font-size: 28px;
            font-weight: bold;
            color: #1a73e8;
            margin-left: 15px;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: #1a73e8;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover { background: #1557b0; }
        @media (max-width: 600px) {
            .product-item { flex-direction: column; }
            .product-image { width: 100%; height: 200px; margin-bottom: 15px; }
            .info-row { flex-direction: column; }
            .info-label { width: auto; margin-bottom: 5px; }
        }
    </style>
</head>
<body>
    <div style="max-width: 1000px; margin: 0 auto;">
        <a href="view_orders.php" class="back-btn">← Back to All Orders</a>
        <a href="home.php" class="back-btn" style="background: #666; margin-left: 10px;">🏠 Home</a>
    </div>
    
    <div class="container">
        <div class="header">
            <h1>🎉 Order Confirmation</h1>
            <p>Thank you for shopping with us!</p>
        </div>
        
        <div class="content">
            <!-- Order Information -->
            <div class="info-box">
                <h3>📋 Order Details</h3>
                <div class="info-row">
                    <div class="info-label">Order Number:</div>
                    <div class="info-value"><?php echo htmlspecialchars($order['order_number']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Order Date:</div>
                    <div class="info-value"><?php echo date('F j, Y, g:i A', strtotime($order['order_date'])); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Payment Method:</div>
                    <div class="info-value"><?php echo htmlspecialchars($order['payment_method']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Status:</div>
                    <div class="info-value" style="color: #4caf50; font-weight: bold;">✅ Confirmed</div>
                </div>
            </div>
            
            <!-- Customer Information -->
            <div class="info-box">
                <h3>👤 Customer Information</h3>
                <div class="info-row">
                    <div class="info-label">Name:</div>
                    <div class="info-value"><?php echo htmlspecialchars($order['customer_name']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value"><?php echo htmlspecialchars($order['customer_email']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Address:</div>
                    <div class="info-value"><?php echo nl2br(htmlspecialchars($order['address'])); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Location:</div>
                    <div class="info-value"><?php echo htmlspecialchars($order['city']) . ', ' . htmlspecialchars($order['state']) . ' - ' . htmlspecialchars($order['pincode']); ?></div>
                </div>
            </div>
            
            <!-- Products -->
            <h3 style="margin-bottom: 15px; color: #1a73e8;">🛍️ Products Ordered</h3>
            
            <?php if (mysqli_num_rows($productsResult) > 0): ?>
                <?php while($product = mysqli_fetch_assoc($productsResult)): ?>
                    <div class="product-item">
                        <div class="product-image">
                            <img src="<?php echo displayImage($product['product_image'], $product['image_type']); ?>" 
                                 alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                        </div>
                        <div class="product-details">
                            <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
                            <div class="product-price">₹<?php echo number_format($product['product_price'], 2); ?></div>
                            <div class="product-quantity">Quantity: <?php echo $product['product_quantity']; ?></div>
                            <div class="product-quantity" style="color: #1a73e8; margin-top: 8px;">
                                Subtotal: ₹<?php echo number_format($product['product_price'] * $product['product_quantity'], 2); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                
                <div class="total-section">
                    <span class="total-label">Total Amount:</span>
                    <span class="total-amount">₹<?php echo number_format($order['total_amount'], 2); ?></span>
                </div>
            <?php else: ?>
                <p style="text-align: center; padding: 40px; color: #666;">No products found for this order.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>