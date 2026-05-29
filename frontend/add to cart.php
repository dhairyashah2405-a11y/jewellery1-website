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
            height: 130px;
            background:#f5f1f1;
            padding:20px 60px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        /* Logo */
        .logo img{
            width:130px;
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



    /* Remove Button */
.remove-btn {
    background: none;
    border: none;
    color: #ff523b;
    font-size: 13px;
    cursor: pointer;
    padding: 0;
    text-decoration: underline;
    font-family: inherit;
    transition: color 0.2s;
}
.remove-btn:hover {
    color: #c0392b;
}

/* Remove Confirmation Modal */
.modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}
.modal-overlay.active {
    display: flex;
}
.modal-box {
    background: #fff;
    border-radius: 12px;
    padding: 36px 32px 28px;
    max-width: 380px;
    width: 90%;
    text-align: center;
    box-shadow: 0 12px 40px rgba(0,0,0,0.18);
    animation: popIn 0.25s ease;
}
@keyframes popIn {
    from { transform: scale(0.85); opacity: 0; }
    to   { transform: scale(1);    opacity: 1; }
}
.modal-box .modal-icon {
    width: 60px;
    height: 60px;
    background: #fff0f0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
}
.modal-box .modal-icon i {
    font-size: 26px;
    color: #954D59;
}
.modal-box h3 {
    font-size: 20px;
    color: #222;
    margin-bottom: 8px;
}
.modal-box p {
    font-size: 14px;
    color: #777;
    margin-bottom: 26px;
    line-height: 1.5;
}
.modal-box p span {
    font-weight: 700;
    color: #954D59;
}
.modal-actions {
    display: flex;
    gap: 14px;
    justify-content: center;
}
.modal-cancel {
    flex: 1;
    padding: 11px 0;
    background: #f5f1f1;
    color: #954D59;
    border: 2px solid #954D59;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s;
}
.modal-cancel:hover {
    background: #f0e8e8;
}
.modal-confirm {
    flex: 1;
    padding: 11px 0;
    background: #954D59;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s;
}
.modal-confirm:hover {
    background: #7d3f4a;
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
    

        /* ========= FOOTER STYLES (full desktop + mobile accordion) ========= */
        footer {
            background-color: #F5F1F0;
            color: #954D59;
            padding: 50px 20px;
            margin-top: 50px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width: 100%;
        }

        footer .container {
            max-width: 1280px;
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

        footer .line {
            width: 100%;
            height: 2px;
            background-color: #d8b5b5;
            margin-top: 30px;
            margin-bottom: 25px;
        }

        /* Social Icons */
        .social-icons {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin: 20px 0 15px;
        }
        .social-icons a {
            color: #9b6b6b;
            font-size: 20px;
            transition: 0.3s;
            text-decoration: none;
        }
        .social-icons a:hover {
            color: #000;
        }

        /* Footer Text */
        .footer-text {
            color: #9b6b6b;
            font-size: 14px;
            text-align: center;
            margin: 20px 0 15px;
        }
        .footer-text a {
            color: #9b6b6b;
            text-decoration: none;
            margin: 0 6px;
        }
        .footer-text a:hover {
            text-decoration: underline;
        }

        /* Payment Icons */
        .payment-icons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .payment-icons img {
            width: 45px;
            background: white;
            border-radius: 8px;
            padding: 4px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        /* ========= ACCORDION STYLES (Mobile only below 500px) ========= */
        /* For screens BELOW or EQUAL to 500px — accordion active */
        @media (max-width: 500px) {
            footer .row {
                flex-direction: column;
                gap: 0;
            }
            /* Logo column remains static without accordion (brand column) */
            footer .col-md-4:first-child {
                text-align: center;
                padding: 20px 0 15px;
                border-bottom: 1px solid #e0c8c8;
                margin-bottom: 8px;
            }
            /* Every other column becomes accordion wrapper */
            footer .col-md-4:not(:first-child) {
                border-bottom: 1px solid #e0c8c8;
                margin: 0;
                padding: 0;
            }
            /* Accordion Header (clickable area) */
            footer .footer-accordion-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                cursor: pointer;
                padding: 18px 8px 14px 8px;
                background-color: transparent;
                user-select: none;
                transition: background 0.2s ease;
            }
            footer .footer-accordion-header:hover {
                background-color: rgba(149, 77, 89, 0.05);
            }
            /* Remove the default ::after pseudo-element from h3 inside accordion */
            footer .footer-accordion-header h3 {
                margin-bottom: 0;
                padding-bottom: 0;
                font-size: 18px;
                font-weight: 600;
                color: #954D59;
            }
            footer .footer-accordion-header h3::after {
                display: none;
            }
            footer .footer-accordion-header h3 a {
                color: #954D59;
                text-decoration: none;
            }
            /* Chevron / icon (Font Awesome chevron) */
            footer .footer-accordion-icon {
                font-size: 18px;
                color: #954D59;
                transition: transform 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
                line-height: 1;
                font-weight: bold;
            }
            footer .footer-accordion-icon.open {
                transform: rotate(180deg);
            }
            /* Accordion body — hidden by default */
            footer .footer-accordion-body {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s ease-out, padding 0.25s ease;
                padding: 0 8px;
                background-color: #ffffff;
                border-radius: 0 0 12px 12px;
            }
            footer .footer-accordion-body.open {
                max-height: 400px;      /* enough for content */
                padding: 8px 8px 22px 8px;
                border-bottom: none;
            }
            /* Extra spacing for links inside body */
            footer .footer-accordion-body p {
                margin: 14px 0;
            }
            footer .footer-accordion-body .social-icons {
                margin-top: 12px;
                margin-bottom: 0;
                justify-content: flex-start;
            }
            /* Contact block spacing */
            footer .footer-accordion-body p i {
                width: 24px;
            }
            /* Line adjustments inside footer for mobile */
            footer .line {
                margin-top: 25px;
                margin-bottom: 20px;
            }
            .payment-icons {
                justify-content: center;
            }
        }

        /* For desktop (>= 501px) hide accordion icons and ensure normal layout */
        @media (min-width: 501px) {
            footer .footer-accordion-icon {
                display: none !important;
            }
            footer .footer-accordion-body {
                max-height: none !important;
                overflow: visible !important;
                padding: 0 !important;
                background-color: transparent !important;
                display: block !important;
            }
            footer .footer-accordion-header {
                display: block;
                cursor: default;
                padding: 0 !important;
                background: transparent !important;
            }
            footer .footer-accordion-header h3 {
                margin-bottom: 25px;
                padding-bottom: 10px;
            }
            footer .footer-accordion-header h3::after {
                display: block;
            }
        }</style>
</head>
<body>   
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
        <i class="fa-solid fa-magnifying-glass"></i>
        <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'profile.php' : 'login.php'; ?>">
            <i class="fa-regular fa-user"></i>
        </a>
        <i class="fa-regular fa-heart"></i>
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
            include_once __DIR__ . '/../backend/p2.php';
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
                            <p><?php echo htmlspecialchars($fetch_cart['name']); ?></p>
                            <?php if (!empty($fetch_cart['size'])): ?>
                                <small>Size: <span style="font-weight: 600; color: #954D59;"><?php echo htmlspecialchars($fetch_cart['size']); ?></span></small><br>
                            <?php endif; ?>
                            <small>Price: ₹<span class="unit-price"><?php echo $fetch_cart['price']; ?></span></small>
                            <br>
                            <button class="remove-btn" onclick="openRemoveModal(<?php echo $fetch_cart['id']; ?>, '<?php echo addslashes(htmlspecialchars($fetch_cart['name'])); ?>')">Remove</button>
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
    <form action="p1.php" method="post" style="max-width:500px; margin:0 auto;">
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
            
            <!-- ACCORDION COLUMN 1: Quick links -->
            <div class="col-md-4">
                <div class="footer-accordion-header">
                    <h3>Quick links</h3>
                    <span class="footer-accordion-icon"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <div class="footer-accordion-body">
                    <p><a href="#">Shipping policy</a></p>
                    <p><a href="#">Return and Refund</a></p>
                    <p><a href="#">Terms of Service</a></p>
                    <p><a href="#">Privacy Policy</a></p>
                    <p><a href="about.php">About Us</a></p>
                </div>
            </div>

            <!-- ACCORDION COLUMN 2: Contact Us + Social (dynamic) -->
            <div class="col-md-4">
                <div class="footer-accordion-header">
                    <h3><a href="contact.php">Contact Us</a></h3>
                    <span class="footer-accordion-icon"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <div class="footer-accordion-body">
                    <p><i class="fa-solid fa-phone" style="width: 28px;"></i> <a href="tel:+919876543210">+(91) 9876-543-210</a></p>
                    <p><i class="fa-regular fa-envelope" style="width: 28px;"></i> <a href="mailto:sistarajewelry@gmail.com">sistarajewelry@gmail.com</a></p>
                    <div class="social-icons" style="margin-top: 20px;">
                        <a href="https://www.instagram.com/" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.facebook.com/" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.twitter.com/" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.whatsapp.com/" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Divider line -->
            <div class="line"></div>

            <!-- Bottom section: social + footer text + payment (no accordion, stays global) -->
            <div class="social-icons" style="justify-content: center; margin: 5px 0 10px;">
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.twitter.com/"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.whatsapp.com/"><i class="fa-brands fa-whatsapp"></i></a>
            </div>

            <div class="footer-text">
                © 2025, Sistaraja Jewelry Powered by Shopify
                &nbsp; • &nbsp;
                <a href="#">Refund Policy</a> •
                <a href="#">Privacy Policy</a> •
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
<!-- Remove Item Confirmation Modal -->
<div class="modal-overlay" id="remove-modal">
    <div class="modal-box">
        <div class="modal-icon">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        <h3>Remove Item?</h3>
        <p>Are you sure you want to remove <span id="modal-product-name"></span> from your cart?</p>
        <div class="modal-actions">
            <button class="modal-cancel" onclick="closeRemoveModal()">Keep It</button>
            <button class="modal-confirm" onclick="confirmRemove()">Yes, Remove</button>
        </div>
    </div>
</div>

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
    // Remove item modal
    let removeItemId = null;

    function openRemoveModal(id, name) {
        removeItemId = id;
        document.getElementById('modal-product-name').textContent = name;
        document.getElementById('remove-modal').classList.add('active');
    }

    function closeRemoveModal() {
        removeItemId = null;
        document.getElementById('remove-modal').classList.remove('active');
    }

    function confirmRemove() {
        if (removeItemId !== null) {
            window.location.href = 'remove_cart.php?remove=' + removeItemId;
        }
    }

    // Close modal when clicking outside the box
    document.getElementById('remove-modal').addEventListener('click', function(e) {
        if (e.target === this) closeRemoveModal();
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
    </script>
    

<script>
    /* Footer accordion – mobile only */
    (function () {
        document.querySelectorAll('.footer-accordion-header').forEach(function (header) {
            header.addEventListener('click', function () {
                if (window.innerWidth > 500) return;
                var body = header.nextElementSibling;
                var icon = header.querySelector('.footer-accordion-icon');
                var isOpen = body.classList.contains('open');
                
                // Close all other open accordions
                document.querySelectorAll('.footer-accordion-header').forEach(function (h) { h.classList.remove('open'); });
                document.querySelectorAll('.footer-accordion-body').forEach(function (b) { b.classList.remove('open'); });
                document.querySelectorAll('.footer-accordion-icon').forEach(function (i) { i.classList.remove('open'); });
                
                if (!isOpen) {
                    header.classList.add('open');
                    body.classList.add('open');
                    if (icon) icon.classList.add('open');
                }
            });
        });
    })();
</script>
</body>
</html>