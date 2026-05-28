<?php
// Get product details from URL parameters with defaults
$product_name = isset($_GET['name']) ? $_GET['name'] : 'ENGAGEMENT RING (GOLD)';
$product_price = isset($_GET['price']) ? $_GET['price'] : '60.00';
$product_image = isset($_GET['image']) ? $_GET['image'] : 'images/10.jpg';
$product_size = isset($_GET['size']) ? $_GET['size'] : '';

// Format price to ensure it has ₹ and correct format
$product_price_clean = str_replace(['₹', ',', ' '], '', $product_price);
$product_price_formatted = number_format((float)$product_price_clean, 2);

// Determine category and sizes based on name or image
$category = 'Rings';
$sizes = ['6', '7', '8', '9', '10'];

$lower_name = strtolower($product_name);
$lower_image = strtolower($product_image);

if (strpos($lower_name, 'bracelet') !== false || strpos($lower_name, 'bangle') !== false || strpos($lower_image, 'bracelet') !== false) {
    $category = 'Bracelet';
    $sizes = ['2.4', '2.6', '2.8'];
} elseif (strpos($lower_name, 'earring') !== false || strpos($lower_image, 'earring') !== false) {
    $category = 'Earrings';
    $sizes = ['Standard'];
} elseif (strpos($lower_name, 'necklace') !== false || strpos($lower_image, 'necklace') !== false) {
    $category = 'Necklace';
    $sizes = ['18 inches', '20 inches', '22 inches'];
} elseif (strpos($lower_name, 'ring') !== false || strpos($lower_image, 'ring') !== false) {
    $category = 'Rings';
    $sizes = ['6', '7', '8', '9', '10'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product detail Page</title>
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
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

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
        .hamburger{
            display: none;
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
    @media(max-width:500px){
        .footer-container{
            flex-direction:column;
            gap:15px;
            text-align:center;
        }
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
    /* Description */

/* Description Tabs */
.tabs-container {
    max-width: 1300px;
    margin: 50px auto;
    padding: 0 20px;
}

.tabs-nav {
    display: flex;
    justify-content: center;
    gap: 50px;
    border-bottom: 2px solid #eee;
    margin-bottom: 30px;
}

.tab-item {
    font-size: 18px;
    font-weight: 600;
    color: #888;
    padding: 15px 0;
    cursor: pointer;
    position: relative;
    transition: 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.tab-item:hover {
    color: #000;
}

.tab-item.active {
    color: #954D59;
}

.tab-item.active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: #954D59;
}

.tab-content {
    display: none;
    line-height: 1.8;
    color: #555;
    animation: fadeIn 0.5s ease;
}

.tab-content.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
/* Related Product Slider */
.slider-container {
    max-width: 1300px;
    margin: 0 auto;
    position: relative;
    padding: 0 50px;
}

.product-container {
    display: block; /* Change from flex to block for Slick */
    margin: 0 auto;
}

.product-card {
    margin: 10px; /* Add margin for spacing between slides */
    background:#ffffff;
    border-radius:15px;
    overflow:hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    display: flex;
    flex-direction: column;
}

/* Custom Arrows */
.arrow {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #954d59; /* Matching brand color */
    color: #fff;
    border: none;
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.3s ease;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
}

.arrow:hover {
    background: #7a1b52;
    color: #fff;
}

.arrow.left {
    left: -10px;
}

.arrow.right {
    right: -10px;
}

/* Remove default slick arrows */
.slick-prev, .slick-next {
    display: none !important;
}

.product-card:hover{
    transform:translateY(-12px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.product-image-container {
    height:260px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#fcfcfc;
    padding: 20px;
    position: relative;
    overflow: hidden;
}

.product-image-container img{
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: 0.6s ease;
}

.product-card:hover .product-image-container img {
    transform: scale(1.1);
}

.product-details{
    background: #954D59;
    color: white;
    padding: 25px 20px;
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-title {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 12px;
    color: white;
    line-height: 1.4;
    min-height: 48px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-price {
    display: flex;
    justify-content: center;
    align-items: baseline;
    gap: 10px;
    margin-bottom: 20px;
}

.current-price {
    font-size: 24px;
    font-weight: 700;
}

.currency {
    font-size: 16px;
    margin-right: 2px;
}

.original-price {
    font-size: 14px;
    text-decoration: line-through;
    opacity: 0.6;
}

.add-to-cart-btn {
    background: #f7d37b;
    color: #000;
    border: none;
    padding: 12px 20px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 15px;
    width: 100%;
    cursor: pointer;
    transition: 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.add-to-cart-btn:hover {
    background: white;
    transform: scale(1.05);
}

/* Wishlist overlay button on product cards */
 .header-wishlist-link {
        position: relative;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .wishlist-badge {
        position: absolute;
        top: -7px;
        right: -7px;
        background-color: #9b4d5d;
        color: #ffffff;
        font-size: 10px;
        font-weight: 700;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ffffff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
.product-image-container {
    position: relative;
}

.card-wishlist-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #fff;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 16px;
    color: #954D59;
    box-shadow: 0 2px 8px rgba(0,0,0,0.18);
    transition: all 0.25s ease;
    z-index: 5;
    opacity: 0;
    transform: scale(0.85);
}

.product-card:hover .card-wishlist-btn {
    opacity: 1;
    transform: scale(1);
}

.card-wishlist-btn:hover {
    background: #954D59;
    color: #fff;
    transform: scale(1.12) !important;
}

.card-wishlist-btn.wishlisted {
    opacity: 1;
    color: #954D59;
    background: #fff5f6;
}

.card-wishlist-btn.wishlisted i {
    font-weight: 900;
}
/* Main Product Section Redesign */
.main-product-wrapper {
    max-width: 1300px;
    margin: 40px auto;
    padding: 0 20px;
}

.breadcrumb {
    font-size: 14px;
    color: #666;
    margin-bottom: 30px;
    font-weight: 500;
}

.main-product-container {
    display: flex;
    gap: 50px;
    align-items: flex-start;
}

/* Gallery Styling */
.product-gallery {
    display: flex;
    gap: 20px;
    flex: 1.2;
}

.thumbnail-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.thumbnail-list img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    background: #fdf8f7;
    cursor: pointer;
    border: 1px solid transparent;
    transition: 0.3s;
}

.thumbnail-list img.active,
.thumbnail-list img:hover {
    border: 1px solid #954D59;
}

.main-image-display {
    flex: 1;
    background: #fdf8f7;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 600px;
    border-radius: 4px;
}

.main-image-display img {
    max-width: 90%;
    max-height: 500px;
    object-fit: contain;
}

/* Details Styling */
.main-product-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.main-product-details h1 {
    font-size: 32px;
    font-weight: 600;
    color: #000;
    margin: 0;
    text-transform: uppercase;
}

.main-product-details .price {
    font-size: 24px;
    color: #ff6b6b;
    font-weight: 600;
}

.main-product-details hr {
    border: none;
    border-top: 1px solid #eee;
    margin: 10px 0;
}

.sales-urgency {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #333;
    font-size: 15px;
}

.stock-status {
    color: #27ae60;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 16px;
}

.product-desc {
    color: #777;
    line-height: 1.6;
    font-size: 15px;
}

.option-title {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
    color: #000;
}

.color-swatches {
    display: flex;
    gap: 12px;
}

.swatch {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    cursor: pointer;
    border: 1px solid #ddd;
    padding: 2px;
    background-clip: content-box;
    transition: 0.2s;
}

.swatch:hover, .swatch.active {
    border-color: #000;
}

.swatch.gold { background-color: #d4af37; }
.swatch.silver { background-color: #c0c0c0; }

.size-guide {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #000;
    text-decoration: none;
    font-weight: 500;
    margin-top: 5px;
}

.purchase-actions {
    display: flex;
    gap: 15px;
    margin-top: 10px;
}

.quantity-selector {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    height: 50px;
}

.quantity-selector button {
    background: none;
    border: none;
    width: 40px;
    height: 100%;
    cursor: pointer;
    font-size: 18px;
    color: #333;
}

.quantity-selector input {
    width: 50px;
    height: 100%;
    border: none;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
    outline: none;
}

.add-to-cart-btn-main {
    flex: 1;
    background: #000;
    color: #fff;
    border: none;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
    height: 50px;
}

.add-to-cart-btn-main:hover {
    background: #333;
}

.wishlist-btn {
    width: 50px;
    height: 50px;
    border: 1px solid #ddd;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 18px;
    transition: 0.3s;
}

.wishlist-btn:hover {
    background: #f9f9f9;
}

.terms-agreement {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    color: #666;
    margin-top: 10px;
}

.terms-agreement input {
    width: 16px;
    height: 16px;
    cursor: pointer;
}

.buy-now-btn {
    width: 100%;
    height: 55px;
    background: #fff;
    color: #000;
    border: 1px solid #000;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 10px;
}

.buy-now-btn:hover {
    background: #000;
    color: #fff;
}

.social-actions {
    display: flex;
    gap: 25px;
    border-top: 1px solid #eee;
    padding-top: 20px;
    margin-top: 10px;
}

.social-actions a {
    text-decoration: none;
    color: #333;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
}

.shipping-info-box {
    border: 1px solid #eee;
    padding: 20px;
    display: flex;
    gap: 15px;
    align-items: flex-start;
    margin-top: 10px;
}

.shipping-info-box i {
    font-size: 24px;
    color: #333;
}

.shipping-text {
    font-size: 14px;
    color: #666;
    line-height: 1.5;
}

.shipping-text span {
    font-weight: 700;
    color: #000;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .main-product-container {
        flex-direction: column;
    }
    .product-gallery {
        width: 100%;
    }
    .main-product-details {
        width: 100%;
    }
}

@media (max-width: 600px) {
    .product-gallery {
        flex-direction: column-reverse;
    }
    .thumbnail-list {
        flex-direction: row;
        justify-content: center;
    }
    .thumbnail-list img {
        width: 60px;
        height: 60px;
    }
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
    }

    /* ===== Footer Accordion — Mobile View (max-width: 500px) ===== */
    @media (max-width: 500px) {
        footer .row {
            flex-direction: column;
            gap: 0;
        }
        footer .col-md-4:first-child {
            text-align: center;
            padding: 20px 0 10px;
            border-bottom: 1px solid #e0c8c8;
            margin-bottom: 15px;
        }
        footer .col-md-4:not(:first-child) {
            margin-bottom: 15px;
            min-width: unset;
        }
        footer .footer-accordion-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            padding: 16px 20px;
            background-color: #eeeeee; /* Light gray background when collapsed */
            user-select: none;
            transition: background-color 0.2s ease;
        }
        footer .footer-accordion-header.open {
            background-color: #cccccc; /* Darker gray background when expanded */
        }
        footer .footer-accordion-header h3 {
            margin-bottom: 0;
            padding-bottom: 0;
            font-size: 16px;
            color: #333333; /* Dark color for readability */
        }
        footer .footer-accordion-header h3::after {
            display: none;
        }
        footer .footer-accordion-header h3 a {
            color: #333333;
            text-decoration: none;
        }
        footer .footer-accordion-icon {
            font-size: 18px;
            color: #333333;
            line-height: 1;
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: monospace, sans-serif;
            font-weight: bold;
        }
        footer .footer-accordion-icon * {
            display: none !important;
        }
        footer .footer-accordion-icon::before {
            content: "+";
        }
        footer .footer-accordion-icon.open::before {
            content: "\2212"; /* minus sign − */
        }
        footer .footer-accordion-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), padding 0.3s ease;
            padding: 0 20px;
            background-color: #ffffff; /* White background for expanded content */
        }
        footer .footer-accordion-body.open {
            max-height: 400px;
            padding: 15px 20px;
            border-bottom: 1px solid #dddddd;
            border-left: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }
    }
    @media (min-width: 501px) {
        footer .footer-accordion-icon {
            display: none !important;
        }
        footer .footer-accordion-body {
            max-height: none !important;
            overflow: visible !important;
            padding: 0 !important;
            background-color: transparent !important;
        }
        footer .footer-accordion-header {
            display: block;
            cursor: default;
            padding: 0 !important;
            background-color: transparent !important;
            border-bottom: none !important;
        }
        footer .footer-accordion-header h3 {
            display: block;
        }
    }
</style>
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
        <a href="register.php"><i class="fa-regular fa-user"></i></a>
        <a href="wishlist.php" class="header-wishlist-link">
            <i class="fa-regular fa-heart" id="wishlistIcon"></i>
            <span class="wishlist-badge" id="wishlistBadge">0</span>
        </a>
        <a href="add to cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
</header>
<!-- main product -->
<div class="main-product-wrapper">
    <div class="breadcrumb">
     home/ <?php echo htmlspecialchars($category); ?> / <?php echo htmlspecialchars($product_name); ?>
    </div>

    <div class="main-product-container">
        <!-- left side: Gallery -->
        <div class="product-gallery">
            <div class="thumbnail-list">
                <img src="<?php echo htmlspecialchars($product_image); ?>" alt="Thumbnail 1" class="active">
                <img src="<?php echo htmlspecialchars($product_image); ?>" alt="Thumbnail 2">
                <img src="<?php echo htmlspecialchars($product_image); ?>" alt="Thumbnail 3">
            </div>
            <div class="main-image-display">
                <img src="<?php echo htmlspecialchars($product_image); ?>" alt="Main Product Image" id="main-product-img">
            </div>
        </div>

        <!-- RIGHT SIDE: Details -->
        <div class="main-product-details">
            <h1 id="product-title"><?php echo htmlspecialchars($product_name); ?></h1>
            <div class="price">₹<?php echo htmlspecialchars(number_format((float)$product_price_clean, 2)); ?></div>

            <hr>

            <div class="sales-urgency">
                <i class="fa-solid fa-fire" style="color: #ff6b6b;"></i>
                <span>46 sold in last 10 hours</span>
            </div>

            <div class="stock-status">
                <i class="fa-regular fa-circle-check"></i>
                <span>In stock</span>
            </div>

            <p class="product-desc">
                Experience the fine craftsmanship and elegance of our signature <?php echo htmlspecialchars(strtolower($category)); ?> collection. Each piece is meticulously designed to offer a timeless appeal and unmatched luxury, perfect for any special occasion.
            </p>

            <div class="product-options">
                <div class="option-title">COLOR : GOLD</div>
                <div class="color-swatches">
                    <?php
                    $gold_img = $product_image;
                    $silver_img = $product_image;
                    if ($product_image === 'images/10.jpg') {
                        $silver_img = 'images/15.jpg';
                    }
                    ?>
                    <div class="swatch gold active" alt="<?php echo htmlspecialchars($product_name); ?> (GOLD)" data-image="<?php echo htmlspecialchars($gold_img); ?>"></div>
                    <div class="swatch silver" alt="<?php echo htmlspecialchars($product_name); ?> (SILVER)" data-image="<?php echo htmlspecialchars($silver_img); ?>"></div>
                </div>
            </div>

            <a href="#" class="size-guide">
                <i class="fa-solid fa-ruler-horizontal"></i>
                Size Guide
            </a>

            <form action="insert_cart.php" method="post">
                <input type="hidden" name="name" id="product-name" value="<?php echo htmlspecialchars($product_name); ?>">
                <input type="hidden" name="price" value="<?php echo htmlspecialchars($product_price_clean); ?>">
                <input type="hidden" name="image" value="<?php echo htmlspecialchars($product_image); ?>">
                <input type="hidden" name="color" id="selected-color" value="GOLD">
                
                <!-- Dynamic Size Dropdown -->
                <div class="product-options" style="margin-top: 15px; margin-bottom: 20px;">
                    <div class="option-title" style="margin-bottom: 8px;">SELECT SIZE</div>
                    <div class="size-selector">
                        <select name="size" id="selected-size" style="padding: 10px 15px; border: 1px solid #ccc; background: white; font-size: 15px; border-radius: 4px; min-width: 140px; font-weight: 500; cursor: pointer; color: #333;">
                            <?php foreach ($sizes as $sz): ?>
                                <option value="<?php echo htmlspecialchars($sz); ?>" <?php if ($product_size === $sz) echo 'selected'; ?>><?php echo htmlspecialchars($sz); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="purchase-actions">
                    <div class="quantity-selector">
                        <button type="button" class="minus">-</button>
                        <input type="text" name="quantity" value="1" readonly>
                        <button type="button" class="plus">+</button>
                    </div>
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                    <button type="button" class="wishlist-btn">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>

                <div class="terms-agreement">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree with the <b>terms and conditions</b></label>
                </div>

                <button type="submit" name="buy_now" class="buy-now-btn">Buy It Now</button>
            </form>

            <div class="social-actions">
                <a href="#"><i class="fa-solid fa-shuffle"></i> Compare</a>
                <a href="#"><i class="fa-regular fa-circle-question"></i> Question</a>
                <a href="#"><i class="fa-regular fa-circle-question"></i> Question</a>
                <a href="#"><i class="fa-solid fa-share-nodes"></i> Share</a>
            </div>

            <div class="shipping-info-box">
                <i class="fa-solid fa-truck-fast"></i>
                <div class="shipping-text">
                    Order in the next <span>9 hours 30 minutes</span> to get it between<br>
                    <span>Tuesday, Jun 3</span> and <span>Saturday, Jun 7</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Description Tabs Section -->
<div class="tabs-container">
    <div class="tabs-nav">
        <div class="tab-item active" data-tab="description">Description</div>
        <div class="tab-item" data-tab="review">Review</div>
        <div class="tab-item" data-tab="shipping">Shipping</div>
        <div class="tab-item" data-tab="return">Return</div>
    </div>

    <div class="tabs-content">
        <div id="description" class="tab-content active">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quaerat sed illo vel ad. Impedit possimus officiis atque commodi asperiores? Doloremque cumque rerum corporis expedita sit nobis assumenda, et natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus. Quisquam, voluptatibus.</p>
            <p>Aliquam quisque nulla diam quis purus risus integer ultrices. Mollis lacus semper ultricies pellentesque adipiscing ipsum et. Nullam accumsan nunc elementum consectetur id tincidunt elementum.</p>
        </div>
        
        <div id="review" class="tab-content">
            <h3>Customer Reviews</h3>
            <p>No reviews yet. Be the first to review this product!</p>
        </div>
        
        <div id="shipping" class="tab-content">
            <h3>Shipping Information</h3>
            <p>We offer free shipping on all orders over ₹5000. For international orders, shipping charges will be calculated at checkout.</p>
            <ul>
                <li>Standard Shipping: 5-7 business days</li>
                <li>Express Shipping: 2-3 business days</li>
            </ul>
        </div>
        
        <div id="return" class="tab-content">
            <h3>Returns & Exchanges</h3>
            <p>If you're not completely satisfied with your purchase, you can return it within 30 days for a full refund or exchange.</p>
            <p>Items must be in their original condition and packaging.</p>
        </div>
    </div>
</div>
<br><br>
<!-- Related Product -->
 <h1 style="text-align: center; color:#954d59">Related Product</h1> <br><br>
 <div class="slider-container">
     <button class="arrow left related-prev"><i class="fa-solid fa-chevron-left"></i></button>
     
     <div class="product-container related-slider">
            <!-- Card 1 -->
            <div class="product-card">
                <form action="insert_cart.php" method="post">
                    <div class="product-image-container">
                        <a href="product detail.php?name=Gold%20Plated%20Diamond%20Ring&price=1499&image=ring%20images%2F1.jpg">
                            <img src="ring images/1.jpg" alt="Gold Plated Diamond Ring">
                        </a>
                        <input type="hidden" name="image" value="ring images/1.jpg">
                        <button type="button" class="card-wishlist-btn" data-product="Gold Plated Diamond Ring" onclick="toggleWishlist(this)" title="Add to Wishlist">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    <div class="product-details">
                        <h3 class="product-title"><a href="product detail.php?name=Gold%20Plated%20Diamond%20Ring&price=1499&image=ring%20images%2F1.jpg" style="color: white; text-decoration: none;">Gold Plated Diamond Ring</a></h3>
                        <input type="hidden" name="name" value="Gold Plated Diamond Ring">
                        <div class="product-price">
                            <span class="currency">₹</span>
                            <span class="current-price">1,499</span>
                            <input type="hidden" name="price" value="1499">
                            <span class="original-price">₹3,099</span>
                        </div>
                        <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </form>
            </div>

            <!-- Card 2 -->
            <div class="product-card">
                <form action="insert_cart.php" method="post">
                    <div class="product-image-container">
                        <a href="product detail.php?name=Classic%20Gold%20Bangle&price=2499&image=bracelet%20images%2F1.jpg">
                            <img src="bracelet images/1.jpg" alt="Classic Gold Bangle">
                        </a>
                        <input type="hidden" name="image" value="bracelet images/1.jpg">
                        <button type="button" class="card-wishlist-btn" data-product="Classic Gold Bangle" onclick="toggleWishlist(this)" title="Add to Wishlist">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    <div class="product-details">
                        <h3 class="product-title"><a href="product detail.php?name=Classic%20Gold%20Bangle&price=2499&image=bracelet%20images%2F1.jpg" style="color: white; text-decoration: none;">Classic Gold Bangle</a></h3>
                        <input type="hidden" name="name" value="Classic Gold Bangle">
                        <div class="product-price">
                            <span class="currency">₹</span>
                            <span class="current-price">2,499</span>
                            <input type="hidden" name="price" value="2499">
                            <span class="original-price">₹4,999</span>
                        </div>
                        <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </form>
            </div>

            <!-- Card 3 -->
            <div class="product-card">
                <form action="insert_cart.php" method="post">
                    <div class="product-image-container">
                        <a href="product detail.php?name=Diamond%20Stud%20Earrings&price=3999&image=earring%20images%2F1.jpg">
                            <img src="earring images/1.jpg" alt="Diamond Stud Earrings">
                        </a>
                        <input type="hidden" name="image" value="earring images/1.jpg">
                        <button type="button" class="card-wishlist-btn" data-product="Diamond Stud Earrings" onclick="toggleWishlist(this)" title="Add to Wishlist">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    <div class="product-details">
                        <h3 class="product-title"><a href="product detail.php?name=Diamond%20Stud%20Earrings&price=3999&image=earring%20images%2F1.jpg" style="color: white; text-decoration: none;">Diamond Stud Earrings</a></h3>
                        <input type="hidden" name="name" value="Diamond Stud Earrings">
                        <div class="product-price">
                            <span class="currency">₹</span>
                            <span class="current-price">3,999</span>
                            <input type="hidden" name="price" value="3999">
                            <span class="original-price">₹7,499</span>
                        </div>
                        <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </form>
            </div>

            <!-- Card 4 -->
            <div class="product-card">
                <form action="insert_cart.php" method="post">
                    <div class="product-image-container">
                        <a href="product detail.php?name=Luxury%20Pearl%20Necklace&price=5299&image=images%2F10.jpg">
                            <img src="images/10.jpg" alt="Luxury Pearl Necklace">
                        </a>
                        <input type="hidden" name="image" value="images/10.jpg">
                        <button type="button" class="card-wishlist-btn" data-product="Luxury Pearl Necklace" onclick="toggleWishlist(this)" title="Add to Wishlist">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    <div class="product-details">
                        <h3 class="product-title"><a href="product detail.php?name=Luxury%20Pearl%20Necklace&price=5299&image=images%2F10.jpg" style="color: white; text-decoration: none;">Luxury Pearl Necklace</a></h3>
                        <input type="hidden" name="name" value="Luxury Pearl Necklace">
                        <div class="product-price">
                            <span class="currency">₹</span>
                            <span class="current-price">5,299</span>
                            <input type="hidden" name="price" value="5299">
                            <span class="original-price">₹9,999</span>
                        </div>
                        <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </form>
            </div>
    </div>

    <button class="arrow right related-next"><i class="fa-solid fa-chevron-right"></i></button>
 </div>
    <br><br><br>

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
            <div class="col-md-4">
                <div class="footer-accordion-header">
                    <h3>Quick links</h3>
                    <span class="footer-accordion-icon"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <div class="footer-accordion-body">
                    <p><i style="width: 20px;"></i><a href="#">Shipping policy</a></p>
                <p><i style="width: 20px;"></i><a href="#">Return and Refund</a></p>
                <p><i style="width: 20px;"></i><a href="#">Terms of Service</a></p>
                <p><i style="width: 20px;"></i><a href="#">Privacy Policy</a></p>
                <p><i style="width: 20px;"></i><a href="about.php">About Us</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-accordion-header">
                    <a href="contact.php"><h3>Contact Us</h3></a>
                    <span class="footer-accordion-icon"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <div class="footer-accordion-body">
                    <div class="social-icons">
                    <p><i  style="width: 20px;"></i><a>+(91)9876-543-210</a></p>
                    <p><i  style="width: 20px;"></i><a>sistarajewelry@gmail.com</a></p>
                </div>
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
        // Dynamically inject size selectors and rewrite detail links for related products
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll('.related-slider .product-card').forEach(card => {
                const titleEl = card.querySelector('.product-title a');
                const imgEl = card.querySelector('.product-image-container img');
                const priceEl = card.querySelector('.current-price');
                const form = card.querySelector('form');
                if (!titleEl || !imgEl) return;

                const name = titleEl ? titleEl.textContent.trim() : (imgEl.alt ? imgEl.alt.trim() : '');
                const image = imgEl.getAttribute('src');
                const price = priceEl ? priceEl.textContent.trim().replace(/[^\d.]/g, '') : '';

                // Dynamically update form hidden inputs to match correct values
                if (form) {
                    const inputName = form.querySelector('input[name="name"]');
                    const inputPrice = form.querySelector('input[name="price"]');
                    const inputImage = form.querySelector('input[name="image"]');
                    if (inputName) inputName.value = name;
                    if (inputPrice) inputPrice.value = price;
                    if (inputImage) inputImage.value = image;
                }

                // Determine collection / category
                const lowerName = name.toLowerCase();
                const lowerImage = image ? image.toLowerCase() : '';
                let collection = 'rings';
                if (lowerName.includes('ring') || lowerImage.includes('ring')) {
                    collection = 'rings';
                } else if (lowerName.includes('earring') || lowerImage.includes('earring')) {
                    collection = 'earrings';
                } else if (lowerName.includes('necklace') || lowerImage.includes('necklace')) {
                    collection = 'necklace';
                } else if (lowerName.includes('bracelet') || lowerName.includes('bangle') || lowerImage.includes('bracelet') || lowerImage.includes('bangle')) {
                    collection = 'bracelets';
                }

                // Determine size options
                let sizes = ['6', '7', '8', '9', '10'];
                if (collection === 'bracelets') {
                    sizes = ['2.4', '2.6', '2.8'];
                } else if (collection === 'earrings') {
                    sizes = ['Standard'];
                } else if (collection === 'necklace') {
                    sizes = ['18 inches', '20 inches', '22 inches'];
                }

                // Create selector dropdown
                let selectEl = null;
                if (form) {
                    selectEl = document.createElement('select');
                    selectEl.name = 'size';
                    selectEl.className = 'card-size-select';
                    selectEl.style.cssText = `
                        width: 100%;
                        padding: 8px 12px;
                        margin-bottom: 12px;
                        border: 1px solid rgba(255,255,255,0.4);
                        border-radius: 50px;
                        background: transparent;
                        color: white;
                        font-size: 13px;
                        font-weight: 600;
                        text-align: center;
                        outline: none;
                        cursor: pointer;
                        transition: all 0.3s;
                    `;
                    sizes.forEach(sz => {
                        const opt = document.createElement('option');
                        opt.value = sz;
                        opt.textContent = `Size: ${sz}`;
                        opt.style.color = '#333';
                        selectEl.appendChild(opt);
                    });
                    
                    const btn = form.querySelector('.add-to-cart-btn');
                    if (btn) {
                        form.querySelector('.product-details').insertBefore(selectEl, btn);
                    }

                    // Update detail links when size changes
                    selectEl.addEventListener('change', () => {
                        updateLinks(selectEl.value);
                    });
                }

                function updateLinks(selectedSize) {
                    const params = new URLSearchParams();
                    params.set('name', name);
                    params.set('price', price);
                    params.set('image', image);
                    if (selectedSize && selectedSize !== 'Standard') {
                        params.set('size', selectedSize);
                    }

                    const detailUrl = `product detail.php?${params.toString()}`;

                    // Update image anchor link
                    const imgLink = card.querySelector('.product-image-container a');
                    if (imgLink) {
                        imgLink.href = detailUrl;
                    }

                    // Update title anchor link
                    if (titleEl) {
                        titleEl.href = detailUrl;
                    }
                }

                // Initial link update
                updateLinks(selectEl ? selectEl.value : '');
            });
        });

        // Quantity Selector logic
        const minusBtn = document.querySelector('.minus');
        const plusBtn = document.querySelector('.plus');
        const qtyInput = document.querySelector('.quantity-selector input');

        minusBtn.addEventListener('click', () => {
            let val = parseInt(qtyInput.value);
            if (val > 1) qtyInput.value = val - 1;
        });

        plusBtn.addEventListener('click', () => {
            let val = parseInt(qtyInput.value);
            qtyInput.value = val + 1;
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
                document.getElementById('selected-color').value = color;

                // Update product name based on selected color dynamically
                const baseName = <?php echo json_encode($product_name); ?>;
                const cleanName = baseName.replace(/\s*\((gold|silver)\)/gi, "");
                const productName = `${cleanName} (${color})`;
                document.getElementById('product-title').textContent = productName;
                document.getElementById('product-name').value = productName;

                // Update main product image and cart image based on selected color
                const selectedImage = swatch.getAttribute('data-image');
                document.getElementById('main-product-img').src = selectedImage;
                document.querySelector('input[name="image"]').value = selectedImage;
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

    // Slick Slider Initialization
    $(document).ready(function(){
        // Related Product Slider
        $('.related-slider').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: $('.related-prev'),
            nextArrow: $('.related-next'),
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        arrows: true
                    }
                }
            ]
        });

        $('.instagram-slider').slick({
            infinite: true,
            slidesToShow:3,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.arrow.left'),
            nextArrow: $('.arrow.right'),
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
  
    // ── Wishlist logic ──────────────────────────────────────────
    function toggleWishlist(btn) {
        const product = btn.getAttribute('data-product');
        const icon = btn.querySelector('i');
        const wishlist = JSON.parse(localStorage.getItem('wishlist') || '{}');

        if (wishlist[product]) {
            // Remove from wishlist
            delete wishlist[product];
            btn.classList.remove('wishlisted');
            icon.className = 'fa-regular fa-heart';
            showWishlistToast(product, false);
        } else {
            // Add to wishlist
            wishlist[product] = true;
            btn.classList.add('wishlisted');
            icon.className = 'fa-solid fa-heart';
            showWishlistToast(product, true);
        }
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
    }

    function showWishlistToast(name, added) {
        let toast = document.getElementById('wishlist-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'wishlist-toast';
            toast.style.cssText = `
                position:fixed; bottom:28px; left:50%; transform:translateX(-50%);
                background:#954D59; color:#fff; padding:12px 24px; border-radius:30px;
                font-size:14px; font-weight:600; z-index:9999; box-shadow:0 4px 16px rgba(0,0,0,0.2);
                transition:opacity 0.3s; white-space:nowrap;
            `;
            document.body.appendChild(toast);
        }
        toast.textContent = added
            ? `❤️ "${name}" added to wishlist`
            : `🤍 "${name}" removed from wishlist`;
        toast.style.opacity = '1';
        clearTimeout(toast._timer);
        toast._timer = setTimeout(() => { toast.style.opacity = '0'; }, 2500);
    }

    // Wire up the main product wishlist button
    const mainWishlistBtn = document.querySelector('.purchase-actions .wishlist-btn');
    if (mainWishlistBtn) {
        mainWishlistBtn.setAttribute('data-product', <?php echo json_encode($product_name); ?>);
        mainWishlistBtn.setAttribute('onclick', 'toggleWishlist(this)');
        mainWishlistBtn.addEventListener('click', function() { toggleWishlist(this); });
    }

    // Restore wishlist state on page load
    (function restoreWishlist() {
        const wishlist = JSON.parse(localStorage.getItem('wishlist') || '{}');

        // Related product cards
        document.querySelectorAll('.card-wishlist-btn').forEach(btn => {
            const product = btn.getAttribute('data-product');
            if (wishlist[product]) {
                btn.classList.add('wishlisted');
                btn.querySelector('i').className = 'fa-solid fa-heart';
            }
        });

        // Main product
        if (mainWishlistBtn && wishlist[<?php echo json_encode($product_name); ?>]) {
            mainWishlistBtn.classList.add('wishlisted');
            const icon = mainWishlistBtn.querySelector('i');
            if (icon) icon.className = 'fa-solid fa-heart';
        }
    })();
    // ─────────────────────────────────────────────────────────────

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