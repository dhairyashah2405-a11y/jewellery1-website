<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistara - Add to Cart</title>
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <!-- jQuery and Slick JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style>
     *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            margin:0px;
            background:white;
            min-height: 95px;
        }

        header{
            width:100%;
            height: 100px;
            background:#f5f1f1;
            padding:20px 60px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        /* Logo */
        .logo img{
            width:100px;
        }

        /* Menu */
        nav ul{
            display:flex;
            list-style:none;
            gap:35px;
        }

        nav ul li a{
            text-decoration:none;
            color:#9b4d5d;
            font-size:14px;
            transition:0.3s;
        }

        nav ul li a:hover{
            color:#000;
        }

        /* Icons */
        .icons{
            display:flex;
            gap:18px;
        }

        .icons i{
            color:#9b4d5d;
            cursor:pointer;
            font-size:15px;
            transition:0.3s;
        }

        .icons i:hover{
            color:#000;
        }
         /*banner*/
          .banner{
        width:100%;
        height:180px;
        background-image:url('images/6.png'); /* add your image */
        background-size:cover;
        background-position:center;
        position:relative;
    }

    .banner h2{
        position:absolute;
        top:40px;
        left:90px;
        color:#9b5c5c;
        font-size:32px;
        font-family:Georgia, serif;
        font-weight:normal;
    }
    /* subscribe */
     .line{
        width: 100%;
        height: 2px;
        background-color: #d8b5b5; /* line color */
        margin-top: 20px;
    }
         /* footer CSS */
        footer {
            background-color:#F5F1F0;
            color: #954D59;
            padding: 50px 20px;
            margin-top: 50px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        footer .container {
            max-width: 100%;
            margin: 0 auto;
        }
        footer .row {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: space-between;
        }
        footer .col-md-4 {
            flex: 1;
            min-width: 250px;
        }
        footer h3 {
           color: #954D59;
            margin-bottom: 25px;
            font-size: 22px;
            font-weight: 500;
            position: relative;
            padding-bottom: 10px;
        }
        footer h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: #f7ca00;
        }
        footer ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        footer li {
            margin-bottom: 12px;
        }
        footer a {
            color: #954D59;
            text-decoration: none;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        footer a:hover {
            color: #f78000e3;
        }
        footer p {
            color: #954D59;
            line-height: 1.6;
            margin: 8px 0;
        }
       footer .line{
        width: 100%;
        height: 2px;
        background-color: #d8b5b5; /* line color */
        margin-top: 20px;
    }
    /* Social Icons */
    .social-icons a{
        color:#9b6b6b;
        margin-right:15px;
        font-size:18px;
        transition:0.3s;
        text-decoration:none;
    }

    .social-icons a:hover{
        color:#000;
    }

    /* Center Text */
    .footer-text{
        color:#9b6b6b;
        font-size:14px;
        text-align:center;
    }

    .footer-text a{
        color:#9b6b6b;
        text-decoration:none;
        margin:0 8px;
    }

    .footer-text a:hover{
        text-decoration:underline;
    }

    /* Payment Icons */
    .payment-icons img{
        width:45px;
        margin-left:10px;
    }
    .hamburger{
        display:none;
    }
/* Button Group Styles */
.btn-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #eee;
}

.btn-group a {
    text-decoration: none;
}

.keep-shopping {
    background: #fff;
    color: #954D59;
    border: 2px solid #954D59;
    padding: 12px 30px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 15px;
}

.keep-shopping:hover {
    background: #954D59;
    color: #fff;
}

.checkout {
    background: #954D59;
    color: #fff;
    border: none;
    padding: 14px 45px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
    box-shadow: 0 4px 12px rgba(149, 77, 89, 0.15);
}

.checkout:hover {
    background: #7d3f4a;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(149, 77, 89, 0.25);
}

/* Cart Table Styles */
.cart-page table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.cart-page th {
    text-align: left;
    padding: 15px;
    background-color: #954D59;
    color: white;
    font-weight: 600;
}

.cart-page td {
    padding: 20px 15px;
    border-bottom: 1px solid #eee;
}

.cart-info {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;
}

.cart-info img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
}

.cart-info div p {
    margin-bottom: 5px;
    font-weight: 600;
}

.cart-info div small {
    color: #888;
    display: block;
    margin-bottom: 10px;
}

.cart-info div a {
    color: #ff523b;
    font-size: 13px;
    text-decoration: none;
}

.cart-page input {
    width: 50px;
    height: 35px;
    padding: 5px;
    text-align: center;
    border: 1px solid #ddd;
}

.subtotal-td {
    font-weight: 600;
    color: #954D59;
    font-size: 18px;
}

.total-price {
    display: flex;
    justify-content: flex-end;
    margin-top: 30px;
}

.total-price table {
    border-top: 3px solid #954D59;
    width: 100%;
    max-width: 400px;
}

.total-price td:last-child {
    text-align: right;
    font-weight: 700;
    font-size: 20px;
    color: #954D59;
}

.quantity-selector {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    height: 40px;
    width: fit-content;
}

.quantity-selector button {
    background: none;
    border: none;
    width: 35px;
    height: 100%;
    cursor: pointer;
    font-size: 18px;
    color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
}

.quantity-selector input {
    width: 40px;
    height: 100%;
    border: none;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
    outline: none;
    background: transparent;
}



    /* MOBILE VIEW */
/* --- Mobile (max-width: 768px) --- */
    @media screen and (max-width: 768px) {

        /* ---- HEADER ---- */
        header {
            padding: 12px 18px;
            height: auto;
            position: relative;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        /* Hamburger icon — LEFT (order 1) */
        .hamburger {
            display: flex;
            align-items: center;
            font-size: 26px;
            cursor: pointer;
            color: #9b4d5d;
            order: 1;
            flex: 1;
            justify-content: flex-start;
        }

        /* Logo — CENTER (order 2) */
        .logo {
            order: 2;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            width: 70px;
        }

        /* Icons — RIGHT (order 3) */
        .icons {
            display: flex;
            gap: 14px;
            order: 3;
            flex: 1;
            justify-content: flex-end;
            align-items: center;
        }

        .icons i {
            font-size: 18px;
}
 /* Nav menu — full width below header row (order 4) */
        nav {
            order: 4;
            width: 100%;
            flex-basis: 100%;
        }

        nav ul {
            display: none;
            flex-direction: column;
            gap: 0;
            background: #f5f1f1;
            padding: 10px 0;
            margin-top: 8px;
            border-top: 1px solid #e0d0d4;
        }

        nav ul.show {
            display: flex;
        }

        nav ul li {
            border-bottom: 1px solid #e8dede;
        }

        nav ul li a {
            display: block;
            padding: 12px 20px;
            font-size: 15px;
            color: #9b4d5d;
        }

        /* ---- VIDEO SECTION ---- */
        .video-section {
            width: 100%;
            height: 55vw;
            min-height: 220px;
        }

        .play-btn {
            width: 55px;
            height: 55px;
        }

        /* ---- BOTTOM BAR ---- */
        .bottom-bar {
            padding: 6px 0;
        }

        .bottom-bar span {
            font-size: 12px;
            margin: 0 10px;
        }

        /* ---- NEW ARRIVALS HEADING ---- */
        body > h1,
        h1[style*="New Arrivals"],
        h1[style*="text-align: center"] {
            font-size: 22px;
            margin-top: 18px;
            margin-bottom: 12px;
        }

        .slider-container {
            padding: 0 36px;
        }

        .arrow {
            width: 34px;
            height: 34px;
            font-size: 16px;
        }

        .arrow.left { left: -4px; }
        .arrow.right { right: -4px; }

        /* Mobile Button Adjustments */
        .btn-group {
            flex-direction: column-reverse;
            gap: 15px;
            padding-top: 20px;
        }

        .btn-group a, 
        .checkout, 
        .keep-shopping {
            width: 100%;
            text-align: center;
        }
    }
    

    
    /* =============================================
       SEARCH OVERLAY & LIVE RESULTS CSS
       ============================================= */
    .search-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(4px);
        z-index: 998;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .search-backdrop.active {
        opacity: 1;
        pointer-events: auto;
    }

    .search-overlay {
        position: fixed;
        top: -120px;
        left: 0;
        width: 100%;
        height: 90px;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        z-index: 999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        padding: 0 40px;
    }

    .search-overlay.active {
        top: 0;
    }

    .search-container {
        width: 100%;
        max-width: 800px;
        display: flex;
        align-items: center;
        position: relative;
        gap: 15px;
    }

    .search-input-wrapper {
        flex: 1;
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-input-wrapper i.search-icon-inside {
        position: absolute;
        left: 20px;
        color: #9b4d5d;
        font-size: 18px;
    }

    .search-input-wrapper input {
        width: 100%;
        padding: 14px 50px 14px 55px;
        border: 2px solid #e8dede;
        border-radius: 50px;
        font-size: 16px;
        outline: none;
        transition: all 0.3s ease;
        background-color: #fcfcfc;
        color: #333;
    }

    .search-input-wrapper input:focus {
        border-color: #9b4d5d;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(155, 77, 93, 0.15);
    }

    .search-input-wrapper .close-search-btn {
        position: absolute;
        right: 20px;
        color: #9b4d5d;
        cursor: pointer;
        font-size: 18px;
        transition: color 0.2s;
    }

    .search-input-wrapper .close-search-btn:hover {
        color: #000000;
    }

    .search-results-dropdown {
        position: absolute;
        top: 105%;
        left: 0;
        width: 100%;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        border: 1px solid #e8dede;
        max-height: 400px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        padding: 8px 0;
    }

    .search-results-dropdown.active {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .search-result-item {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        gap: 15px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.2s ease;
        border-bottom: 1px solid #f9f6f6;
    }

    .search-result-item:last-child {
        border-bottom: none;
    }

    .search-result-item:hover {
        background-color: #fdfafb;
    }

    .search-result-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #e8dede;
    }

    .search-result-info {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .search-result-title {
        font-size: 15px;
        font-weight: 600;
        color: #9b4d5d;
        margin-bottom: 4px;
    }

    .search-result-price {
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }

    .search-result-no-results {
        padding: 20px;
        text-align: center;
        color: #888;
        font-size: 15px;
    }

    @media screen and (max-width: 768px) {
        .search-overlay {
            height: 80px;
            padding: 0 15px;
        }
        .search-input-wrapper input {
            padding: 12px 45px 12px 45px;
            font-size: 14px;
        }
        .search-input-wrapper i.search-icon-inside {
            left: 15px;
            font-size: 16px;
        }
        .search-input-wrapper .close-search-btn {
            right: 15px;
            font-size: 16px;
        }
    }
    </style>
</head>
<body>   
<!-- Search Overlay Components -->
<div class="search-backdrop" id="searchBackdrop"></div>
<div class="search-overlay" id="searchOverlay">
    <div class="search-container">
        <div class="search-input-wrapper">
            <i class="fa-solid fa-magnifying-glass search-icon-inside"></i>
            <input type="text" id="searchInput" placeholder="Search for products (ring, bangle, earrings, necklace)..." autocomplete="off">
            <i class="fa-solid fa-xmark close-search-btn" id="closeSearch"></i>
        </div>
        <div class="search-results-dropdown" id="searchResultsDropdown"></div>
    </div>
</div>
<header>

    <!-- Logo -->
    <div class="logo">
        <!-- Replace logo.png with your image -->
        <a href="home.php"><img src="images/1.jpg" alt="Logo"></a>
       </div>
       <!-- hamburger icon -->
       <div class="hamburger" onclick="toggleMenu()">
        ☰
    </div>

    <!-- Menu -->
    <nav>
       
        <ul id="menu">
            <li><a href="home.php"><b>Home</b></a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="featured.php">Featured</a></li>
        </ul>
    </nav>
 <!-- Icons -->
    <div class="icons">
        <i class="fa-solid fa-magnifying-glass" id="searchIconBtn"></i>
        <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'profile.php' : 'login.php'; ?>"><i class="fa-regular fa-user"></i></a>
        <a href="wishlist.php" class="header-wishlist-link">
            <i class="fa-regular fa-heart" id="wishlistIcon"></i>
            <span class="wishlist-badge" id="wishlistBadge">0</span>
        </a>
        <a href="add to cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
</header>
<h1 style="text-align:center; margin-top:20px; margin-bottom:20px;">Your cart</h1>
<div class="line"> </div>
<div class="container">

    <div class="cart-page">

        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php 
            include '../backend/p2.php';
            $select_cart = mysqli_query($con, "SELECT * FROM `products`") or die('query failed: ' . mysqli_error($con));
            $grand_total = 0;
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo $fetch_cart['image']; ?>" alt="">
                        <div>
                            <p><?php echo $fetch_cart['name']; ?></p>
                            <small>Price: ₹<span class="unit-price"><?php echo $fetch_cart['price']; ?></span></small>
                            <a href="../api/remove_cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="quantity-selector" data-id="<?php echo $fetch_cart['id']; ?>" data-price="<?php echo str_replace(',', '', $fetch_cart['price']); ?>">
                        <button type="button" class="minus">-</button>
                        <input type="text" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" readonly>
                        <button type="button" class="plus">+</button>
                    </div>
                </td>
                <td class="subtotal-td">₹<span class="subtotal-val"><?php 
                    $clean_price = str_replace(',', '', $fetch_cart['price']);
                    echo $sub_total = ($clean_price * $fetch_cart['quantity']); 
                ?></span></td>
            </tr>
            <?php
                $grand_total += $sub_total;
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center; padding: 50px;'>Your cart is empty</td></tr>";
            }
            ?>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Total</td>
                    <td class="grand-total-val">₹<?php echo $grand_total; ?></td>
                </tr>
            </table>
        </div>

            

        <!-- Buttons -->
        <div class="btn-group">
           <a href="home.php"><button class="keep-shopping">Keep Shopping</button></a>
            <a href="checkout.php"><button class="checkout">Checkout</button></a>
        </div>
    </div>
</div>
<!-- subscribe  -->
<div class="line"> </div>
 <div class="subscribe">
    <h3 style = "text-align:center; margin-bottom:20px; margin-top:30px">Subscribe to our newsletter</h3>
    <p style = "text-align:center; margin-bottom:20px; margin-top:5px">Subscribe to our latest newspaper to get news about special discounts and upcoming sales</p>
    <form action="../backend/p1.php" method="post" style="max-width:500px; margin:0 auto;">
        <input type="email" id="email" name="email" placeholder="Your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email address" required style="width:100%; padding:12px; margin-bottom:20px; border:1px solid #ccc;">
        <button type="submit" style="width:20%;margin-left: 160px; padding:12px; background-color:#954D59; color:white; border:none; cursor:pointer;">Subscribe</button>
    </form>
 </div>
    <!-- footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="images/1.jpg" alt="Logo" style="width: 200px; height: 200px; border-radius: 100%;">
            </div>
            <div class="col-md-4">
                <h3>Quick links</h3>
                <p><i style="width: 20px;"></i><a href="#">Shipping policy</a></p>
                <p><i style="width: 20px;"></i><a href="#">Return and Refund</a></p>
                <p><i style="width: 20px;"></i><a href="#">Terms of Service</a></p>
                <p><i style="width: 20px;"></i><a href="#">Privacy Policy</a></p>
                <p><i style="width: 20px;"></i><a href="about.php">About Us</a></p>
            </div>
            <div class="col-md-4">
                <a href="contact.php"><h3>Contact Us</h3></a>
                <div class="social-icons">
                    <p><i  style="width: 20px;"></i><a>+(91)9876-543-210</a></p>
                    <p><i  style="width: 20px;"></i><a>sistarajewelry@gmail.com</a></p>
                </div>
            </div>
            <div class="line"> </div>
              <!-- Social Icons -->
        <div class="social-icons">
            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.twitter.com/"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.whatsapp.com/"><i class="fa-brands fa-whatsapp"></i></a>
        </div>

        <!-- Footer Text -->
        <div class="footer-text">
            © 2025, Sistaraja Jewelry Powered by Shopify
            &nbsp; • &nbsp;
            <a href="#">Refund Policy</a>
            •
            <a href="#">Privacy Policy</a>
            •
            <a href="#">Terms of Service</a>
        </div>

        <!-- Payment Icons -->
        <div class="payment-icons">
            <img src="images/5.jpg" alt="Visa">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal">
        </div>

        </div>
    </div>
</footer>
<script>
        // Quantity Selector logic for multiple items
        const selectors = document.querySelectorAll('.quantity-selector');
        const grandTotalDisplay = document.querySelector('.grand-total-val');

        function updateTotals() {
            let grandTotal = 0;
            selectors.forEach(selector => {
                const price = parseFloat(selector.getAttribute('data-price'));
                const qty = parseInt(selector.querySelector('input').value);
                const subtotal = price * qty;
                
                // Update row subtotal
                const row = selector.closest('tr');
                const subtotalDisplay = row.querySelector('.subtotal-val');
                subtotalDisplay.textContent = subtotal.toLocaleString('en-IN');
                
                grandTotal += subtotal;
            });
            
            // Update grand total
            grandTotalDisplay.textContent = '₹' + grandTotal.toLocaleString('en-IN');
        }

        function updateQuantityDB(id, qty) {
            const formData = new FormData();
            formData.append('update_quantity', true);
            formData.append('id', id);
            formData.append('quantity', qty);

            fetch('update_cart_quantity.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log('Update status:', data);
            })
            .catch(error => {
                console.error('Error updating quantity:', error);
            });
        }

        selectors.forEach(selector => {
            const minusBtn = selector.querySelector('.minus');
            const plusBtn = selector.querySelector('.plus');
            const qtyInput = selector.querySelector('input');
            const id = selector.getAttribute('data-id');

            minusBtn.addEventListener('click', () => {
                let val = parseInt(qtyInput.value);
                if (val > 1) {
                    qtyInput.value = val - 1;
                    updateTotals();
                    updateQuantityDB(id, qtyInput.value);
                }
            });

            plusBtn.addEventListener('click', () => {
                let val = parseInt(qtyInput.value);
                qtyInput.value = val + 1;
                updateTotals();
                updateQuantityDB(id, qtyInput.value);
            });
        });

        // Thumbnail switching logic
        const thumbnails = document.querySelectorAll('.thumbnail-list img');
        const mainImg = document.getElementById('main-product-img');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                // Remove active class from all
                thumbnails.forEach(t => t.classList.remove('active'));
                // Add to clicked
                thumb.classList.add('active');
                // Change main image source
                mainImg.src = thumb.src;
            });
        });

        // Color swatch selection
        const swatches = document.querySelectorAll('.swatch');
        const colorTitle = document.querySelector('.option-title');

        swatches.forEach(swatch => {
            swatch.addEventListener('click', () => {
                swatches.forEach(s => s.classList.remove('active'));
                swatch.classList.add('active');
                
                const color = swatch.classList.contains('gold') ? 'GOLD' : 'SILVER';
                colorTitle.textContent = `COLOR : ${color}`;
            });
        });

        // Tab switching logic
        const tabItems = document.querySelectorAll('.tab-item');
        const tabContents = document.querySelectorAll('.tab-content');

        tabItems.forEach(item => {
            item.addEventListener('click', () => {
                const tabId = item.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabItems.forEach(t => t.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // Add active class to current tab and content
                item.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });
    // hamburger
    function toggleMenu() {
    document.getElementById("menu").classList.toggle("show");
}
    // video play/pause logic for all video sections
    document.querySelectorAll('.video-section, .card').forEach(container => {
      const v = container.querySelector('video');
      const b = container.querySelector('.play-btn');
      if (!v || !b) return;

      const updateBtn = () => {
        if (v.paused) {
          b.style.display = "flex";
          b.classList.remove("pause");
          b.classList.add("play");
        } else {
          b.style.display = "none";
          b.classList.remove("play");
          b.classList.add("pause");
        }
      };

      const toggle = () => {
        if (v.paused) v.play();
        else v.pause();
        updateBtn();
      };

      v.addEventListener("click", toggle);
      b.addEventListener("click", toggle);

      v.addEventListener('play', updateBtn);
      v.addEventListener('pause', updateBtn);
      v.addEventListener('playing', updateBtn);

      // Initial check
      updateBtn();
    });
    
      // Initialize wishlist badge
      const getWishlist = () => JSON.parse(localStorage.getItem("wishlist") || "[]");
      const updateWishlistBadges = () => {
          const list = getWishlist();
          const badge = document.getElementById("wishlistBadge");
          if (badge) {
              badge.textContent = list.length;
          }
      };
      updateWishlistBadges();

      // =============================================
      // SEARCH OVERLAY & LIVE SUGGESTIONS
      // =============================================
      const searchIconBtn = document.getElementById("searchIconBtn");
      const searchOverlay = document.getElementById("searchOverlay");
      const searchBackdrop = document.getElementById("searchBackdrop");
      const closeSearch = document.getElementById("closeSearch");
      const searchInput = document.getElementById("searchInput");
      const searchResultsDropdown = document.getElementById("searchResultsDropdown");

      const productsList = [
          <?php
          $res_js = mysqli_query($con, "SELECT name, price, image, collection FROM store_products");
          $js_items = [];
          while ($p_js = mysqli_fetch_assoc($res_js)) {
              $js_items[] = '{ name: ' . json_encode($p_js['name']) . ', price: ' . json_encode('₹' . number_format($p_js['price'])) . ', image: ' . json_encode($p_js['image']) . ', category: ' . json_encode($p_js['collection']) . ' }';
          }
          echo implode(",\n          ", $js_items);
          ?>
      ];

      const openSearchOverlay = () => {
          searchOverlay.classList.add("active");
          searchBackdrop.classList.add("active");
          setTimeout(() => searchInput.focus(), 100);
          document.body.style.overflow = "hidden";
      };

      const closeSearchOverlay = () => {
          searchOverlay.classList.remove("active");
          searchBackdrop.classList.remove("active");
          searchResultsDropdown.classList.remove("active");
          document.body.style.overflow = "";
      };

      if (searchIconBtn) searchIconBtn.addEventListener("click", openSearchOverlay);
      if (closeSearch) closeSearch.addEventListener("click", closeSearchOverlay);
      if (searchBackdrop) searchBackdrop.addEventListener("click", closeSearchOverlay);

      document.addEventListener("keydown", (e) => {
          if (e.key === "Escape" && searchOverlay.classList.contains("active")) {
              closeSearchOverlay();
          }
      });

      searchInput.addEventListener("input", () => {
          const query = searchInput.value.trim().toLowerCase();
          if (query.length < 1) {
              searchResultsDropdown.classList.remove("active");
              searchResultsDropdown.innerHTML = "";
              return;
          }

          const matches = productsList.filter(p => 
              p.name.toLowerCase().includes(query) || 
              p.category.toLowerCase().includes(query)
          );

          searchResultsDropdown.innerHTML = "";
          if (matches.length > 0) {
              matches.forEach(item => {
                  const a = document.createElement("a");
                  a.href = `product detail.php?name=${encodeURIComponent(item.name)}`;
                  a.className = "search-result-item";
                  a.innerHTML = `
                      <img src="${item.image}" alt="${item.name}">
                      <div class="search-result-info">
                          <span class="search-result-title">${item.name}</span>
                          <span class="search-result-price">${item.price}</span>
                      </div>
                  `;
                  searchResultsDropdown.appendChild(a);
              });
          } else {
              const div = document.createElement("div");
              div.className = "search-result-no-results";
              div.textContent = `No products found for "${searchInput.value}"`;
              searchResultsDropdown.appendChild(div);
          }
          searchResultsDropdown.classList.add("active");
      });

      const innerSearchIcon = searchOverlay.querySelector(".search-icon-inside");
      if (innerSearchIcon) {
          innerSearchIcon.style.cursor = "pointer";
          innerSearchIcon.addEventListener("click", () => {
              const query = searchInput.value.trim();
              executeSearch(query);
          });
      }

      searchInput.addEventListener("keypress", (e) => {
          if (e.key === "Enter") {
              const query = searchInput.value.trim();
              executeSearch(query);
          }
      });

      function executeSearch(query) {
          closeSearchOverlay();
          if (query.length > 0) {
              window.location.href = `product.php?search=${encodeURIComponent(query)}`;
          }
      }
    </script>
    
</body>
</html>