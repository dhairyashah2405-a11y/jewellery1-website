<?php
include_once __DIR__ . '/../backend/p2.php';

// Get all orders
$ordersQuery = "SELECT * FROM checkout ORDER BY order_date DESC";
$ordersResult = mysqli_query($con1, $ordersQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .order-card { background: white; margin-bottom: 30px; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .order-header { border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 15px; display: flex; justify-content: space-between; }
        .order-number { font-size: 18px; font-weight: bold; color: #1a73e8; }
        .order-date { color: #666; }
        .customer-info { background: #f9f9f9; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .products-table { width: 100%; border-collapse: collapse; }
        .products-table th, .products-table td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        .products-table th { background: #f0f0f0; }
        .product-image { width: 60px; height: 60px; object-fit: cover; border-radius: 4px; }
        .total { font-size: 18px; font-weight: bold; text-align: right; margin-top: 15px; padding-top: 15px; border-top: 2px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📦 All Orders</h1>
        <a href="home.php" style="display: inline-block; margin: 20px 0; padding: 10px 20px; background: #1a73e8; color: white; text-decoration: none; border-radius: 5px;">← Back to Home</a>
        
        <?php if (mysqli_num_rows($ordersResult) > 0): ?>
            <?php while($order = mysqli_fetch_assoc($ordersResult)): ?>
                <?php 
                    // Get products for this order
                    $orderNumber = $order['order_number'];
                    $productsQuery = "SELECT * FROM order_items WHERE order_number = '$orderNumber'";
                    $productsResult = mysqli_query($con1, $productsQuery);
                ?>
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <span class="order-number">Order #: <?php echo $order['order_number']; ?></span>
                        </div>
                        <div class="order-date">📅 <?php echo date('d M Y, h:i A', strtotime($order['order_date'])); ?></div>
                    </div>
                    
                    <div class="customer-info">
                        <strong>👤 Customer:</strong> <?php echo htmlspecialchars($order['customer_name']); ?><br>
                        <strong>📧 Email:</strong> <?php echo htmlspecialchars($order['customer_email']); ?><br>
                        <strong>📍 Address:</strong> <?php echo htmlspecialchars($order['address']) . ", " . htmlspecialchars($order['city']) . ", " . htmlspecialchars($order['state']) . " - " . htmlspecialchars($order['pincode']); ?><br>
                        <strong>💳 Payment:</strong> <?php echo htmlspecialchars($order['payment_method']); ?>
                    </div>
                    
                    <table class="products-table">
                        <thead>
                            <tr><th>Image</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>
                        </thead>
                        <tbody>
                            <?php while($product = mysqli_fetch_assoc($productsResult)): ?>
                                <tr>
                                    <td>
                                        <?php if ($product['product_image']): ?>
                                            <?php 
                                            $imgSrc = '';
                                            $isPath = (strlen($product['product_image']) < 300 && (strpos($product['product_image'], '/') !== false || strpos($product['product_image'], '\\') !== false || file_exists($product['product_image'])));
                                            if ($isPath) {
                                                $imgSrc = htmlspecialchars($product['product_image']);
                                            } else {
                                                $imgSrc = 'data:image/' . $product['image_type'] . ';base64,' . base64_encode($product['product_image']);
                                            }
                                            ?>
                                            <img src="<?php echo $imgSrc; ?>" class="product-image" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                                        <?php else: ?>
                                            <div style="width:60px;height:60px;background:#ddd;display:flex;align-items:center;justify-content:center;">No img</div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                                    <td>₹<?php echo number_format($product['product_price'], 2); ?></td>
                                    <td><?php echo $product['product_quantity']; ?></td>
                                    <td>₹<?php echo number_format($product['product_price'] * $product['product_quantity'], 2); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <div class="total">
                        Total Amount: <span style="color: #1a73e8; font-size: 22px;">₹<?php echo number_format($order['total_amount'], 2); ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div style="text-align: center; padding: 50px; background: white; border-radius: 8px;">
                <h2>No orders found!</h2>
                <p>Start shopping to see orders here.</p>
                <a href="home.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background: #1a73e8; color: white; text-decoration: none; border-radius: 5px;">Continue Shopping</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>