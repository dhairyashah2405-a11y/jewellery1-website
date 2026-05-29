<?php
include_once __DIR__ . '/../backend/p2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout-My Store</title>   
    <!-- font awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a73e8;
            --border-color: #d1d1d1;
            --text-color: #333;
            --bg-gray: #fafafa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #fff;
            color: var(--text-color);
        }

        header {
            width: 100%;
            background: white;
            padding: 15px 40px;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 24px;
            font-weight: 600;
            color: #000;
            text-decoration: none;
        }

        .cart-icon {
            font-size: 22px;
            color: var(--primary-color);
            cursor: pointer;
        }

        .checkout-container {
            display: flex;
            min-height: calc(100vh - 60px);
            max-width: 1200px;
            margin: 0 auto;
        }

        .left-section {
            flex: 1.2;
            padding: 40px 60px 40px 0;
            border-right: 1px solid #eee;
        }

        .right-section {
            flex: 0.8;
            background-color: var(--bg-gray);
            padding: 8px 5px 47px 11px;
        }

        section {
            margin-bottom: 35px;
        }

        h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            color: #333;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus, select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        .row {
            display: flex;
            gap: 12px;
        }

        .row .form-group {
            flex: 1;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            margin-top: 10px;
        }

        .checkbox-group input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        /* Order Summary Styles */
        .order-summary {
            max-width: 450px;
        }

        .product-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-image-wrapper {
            position: relative;
            width: 64px;
            height: 64px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 4px;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 4px;
        }

        .quantity-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #666;
            color: #fff;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 600;
        }

        .product-name {
            font-size: 14px;
            font-weight: 500;
        }

        .product-price {
            font-size: 14px;
            font-weight: 500;
        }

        .summary-divider {
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
            color: #666;
        }

        .summary-line.total {
            color: #000;
            font-size: 20px;
            font-weight: 600;
            margin-top: 20px;
        }

        .total-currency {
            font-size: 12px;
            color: #666;
            font-weight: normal;
            margin-right: 5px;
        }

        .help-icon {
            font-size: 14px;
            color: #999;
            margin-left: 5px;
            cursor: help;
        }

        .place-order-btn {
            width: 100%;
            padding: 16px;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .place-order-btn:hover {
            background: #333;
        }

        @media (max-width: 900px) {
            .checkout-container {
                flex-direction: column-reverse;
            }

            .left-section, .right-section {
                padding: 30px 20px;
                flex: none;
                width: 100%;
            }

            .left-section {
                border-right: none;
            }

            .order-summary {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="home.php" style="text-decoration: none;"><div class="logo">My Store</div></a>
            <div class="cart-icon">
                <i class="fa-solid fa-bag-shopping"></i>
            </div>
        </div>
    </header>

    <form action="p3.php" method="POST">
    <div class="checkout-container">
        <div class="left-section">
            <section>
                <h2>Contact</h2>
                <div class="form-group">
                    <input type="text" name="email_phone" placeholder="Email or mobile phone number" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="news">
                    <label for="news">Email me with news and offers</label>
                </div>
            </section>

            <section>
                <h2>Delivery</h2>
                <div class="form-group">
                    <select name="country">
                        <option>India</option>
                        <option>USA</option>
                        <option>Canada</option>
                        <option>UK</option>
                    </select>
                </div>

                <div class="row">
                    <div class="form-group">
                        <input type="text" name="first_name" placeholder="First name (optional)">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" placeholder="Last name" required>
                    </div>
                </div>

                <div class="form-group" style="position: relative;">
                    <input type="text" name="address" placeholder="Address" required>
                    <i class="fa-solid fa-magnifying-glass" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #666;"></i>
                </div>

                <div class="form-group">
                    <input type="text" name="apartment" placeholder="Apartment, suite, etc. (optional)">
                </div>

                <div class="row">
                    <div class="form-group">
                        <input type="text" name="city" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <select name="state">
                            <option>Gujarat</option>
                            <option>Maharashtra</option>
                            <option>Delhi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pincode" placeholder="PIN code" required>
                    </div>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="save-info">
                    <label for="save-info">Save this information for next time</label>
                </div>
            </section>

            <section>
                <h2>Payment Method</h2>
                <div class="payment-method" style="display: flex; gap: 15px; margin-top: 15px;">
                    <label style="display: flex; align-items: center; gap: 4px; padding: 12px 20px; border: 1px solid #ddd; border-radius: 6px; cursor: pointer;">
                        <input type="radio" name="payment_method" value="COD" checked> Cash on Delivery
                    </label>
                    <label style="display: flex; align-items: center; gap: 4px; padding: 12px 20px; border: 1px solid #ddd; border-radius: 6px; cursor: pointer;">
                        <input type="radio" name="payment_method" value="Card"> Credit/Debit card
                    </label>
                </div>
            </section>

            <button type="submit" name="place_order" class="place-order-btn">
                Complete order
            </button>
        </div>

        <div class="right-section">
            <div class="order-summary">
                <?php
                $select_cart = mysqli_query($con, "SELECT * FROM `products`") or die('query failed');
                $subtotal = 0;
                
                // Initialize arrays to store product data
                $product_names = array();
                $product_prices = array();
                $product_images = array();
                $product_quantities = array();

                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        // Remove commas from price if any
                        $clean_price = str_replace(',', '', $fetch_cart['price']);
                        $item_total = $clean_price * $fetch_cart['quantity'];
                        $subtotal += $item_total;
                        
                        // Add each product to arrays (include size if present)
                        $size_suffix = !empty($fetch_cart['size']) ? " (" . $fetch_cart['size'] . ")" : "";
                        $product_names[] = $fetch_cart['name'] . $size_suffix;
                        
                        $product_prices[] = $fetch_cart['price'];
                        $product_images[] = $fetch_cart['image'];
                        $product_quantities[] = $fetch_cart['quantity'];
                ?>
                <div class="product-item">
                    <div class="product-info">
                        <div class="product-image-wrapper">
                            <img src="<?php echo htmlspecialchars($fetch_cart['image']); ?>" alt="<?php echo htmlspecialchars($fetch_cart['name']); ?>">
                            <span class="quantity-badge"><?php echo htmlspecialchars($fetch_cart['quantity']); ?></span>
                        </div>
                        <div style="display: flex; flex-direction: column;">
                            <span class="product-name"><?php echo htmlspecialchars($fetch_cart['name']); ?></span>
                            <?php if (!empty($fetch_cart['size'])): ?>
                                <span class="product-size" style="font-size: 12px; color: #666;">Size: <?php echo htmlspecialchars($fetch_cart['size']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <span class="product-price">₹<?php echo number_format($clean_price, 2); ?></span>
                </div>
                <?php
                    }
                } else {
                    echo "<p style='text-align:center; padding: 20px;'>Your cart is empty</p>";
                }
                
                // Convert arrays to comma-separated strings for hidden inputs
                $product_name_str = implode(", ", $product_names);
                $product_price_str = implode(", ", $product_prices);
                $product_image_str = implode(", ", $product_images);
                $product_quantity_str = implode(", ", $product_quantities);
                
                $shipping = 0; // Can be dynamic if needed
                $taxes = $subtotal * 0.18; // 18% GST for example
                $total = $subtotal + $shipping + $taxes;
                ?>
                
                <!-- Send all products as hidden fields -->
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product_name_str); ?>">
                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product_price_str); ?>">
                <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product_image_str); ?>">
                <input type="hidden" name="product_quantity" value="<?php echo htmlspecialchars($product_quantity_str); ?>">

                <div class="summary-divider"></div>

                <div class="summary-line">
                    <span>Subtotal</span>
                    <span>₹<?php echo number_format($subtotal, 2); ?></span>
                </div>
                <div class="summary-line">
                    <span>Shipping</span>
                    <span><?php echo ($shipping > 0) ? "₹" . number_format($shipping, 2) : "Calculated at next step"; ?></span>
                </div>
                <div class="summary-line">
                    <span>Estimated taxes <i class="fa-solid fa-circle-question help-icon"></i></span>
                    <span>₹<?php echo number_format($taxes, 2); ?></span>
                </div>

                <div class="summary-line total">
                    <span>Total</span>
                    <span><span class="total-currency">INR</span> ₹<?php echo number_format($total, 2); ?></span>            
                    <input type="hidden" name="total_price" value="<?php echo $total; ?>">
                </div>
            </div>
        </div>
    </div>
    </form>

</body>
</html>