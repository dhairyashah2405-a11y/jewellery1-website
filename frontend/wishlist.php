<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist - Sistaraja Jewelry</title>
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
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
            width:150px;
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
            align-items: center;
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

        /* banner */
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

        /* Content Area */
        .wishlist-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            min-height: 350px;
        }

        .wishlist-title-header {
            text-align: center;
            margin-bottom: 40px;
            color: #9b4d5d;
            font-family: Georgia, serif;
            font-size: 32px;
            font-weight: normal;
        }

        /* Product Cards Grid */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .product-card {
            width: 280px;
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .product-image-container {
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fcfcfc;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .product-image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: 0.6s ease;
        }

        .product-card:hover .product-image-container img {
            transform: scale(1.08);
        }

        .product-details {
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
            -webkit-line-clamp: 2;
            overflow: hidden;
        }

        .product-price {
            display: flex;
            justify-content: center;
            align-items: baseline;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 600;
        }

        .add-to-cart-btn {
            background-color: white;
            color: #954D59;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: #f7ca00;
            color: black;
        }

        /* Wishlist Heart overlays & badges */
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

        .remove-wishlist-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 36px;
            height: 36px;
            background: #ffffff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            z-index: 10;
        }

        .remove-wishlist-btn i {
            color: #e03a3a;
            font-size: 16px;
            transition: transform 0.2s ease;
        }

        .remove-wishlist-btn:hover {
            transform: scale(1.1);
            background: #fff0f0;
            box-shadow: 0 6px 15px rgba(224, 58, 58, 0.15);
        }

        .remove-wishlist-btn:active i {
            transform: scale(0.8);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #faf7f7;
            border-radius: 15px;
            border: 1px dashed #d8b5b5;
            max-width: 600px;
            margin: 0 auto;
        }

        .empty-state i {
            font-size: 64px;
            color: #d8b5b5;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #9b4d5d;
            font-size: 22px;
            margin-bottom: 12px;
            font-family: Georgia, serif;
        }

        .empty-state p {
            color: #666;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .continue-btn {
            display: inline-block;
            background-color: #9b4d5d;
            color: white;
            text-decoration: none;
            padding: 12px 35px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .continue-btn:hover {
            background-color: #000000;
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
        }
          /* =============================================
       RESPONSIVE MOBILE VIEW CSS
       ============================================= */

    /* --- Tablet (max-width: 992px) --- */
    @media screen and (max-width: 992px) {
        header {
            padding: 15px 30px;
        }

        .product-card {
            width: calc(50% - 20px);
        }

        .left-card {
            margin-left: 20px;
            padding: 40px 20px;
        }

        .right-card {
            margin-left: 20px;
        }

        footer .row {
            gap: 25px;
        }
    }

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
        <a href="home.php"><img src="images/1.jpg" alt="Logo"></a>
    </div>
     <!-- hamburger icon -->
       <div class="hamburger" onclick="toggleMenu()">
        ☰
    </div>


    <!-- Menu -->
    <nav>
        <ul>
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
        <a href="register.php"><i class="fa-regular fa-user"></i></a>
        <a href="wishlist.php" class="header-wishlist-link">
            <i class="fa-solid fa-heart" id="wishlistIcon" style="color:#9b4d5d;"></i>
            <span class="wishlist-badge" id="wishlistBadge">0</span>
        </a>
        <a href="add to cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
</header>

<!-- banner -->
<div class="banner">
   <h2>My Wishlist</h2>
</div>

<!-- Wishlist Content -->
<div class="wishlist-container">
    <h2 class="wishlist-title-header">Your Wishlisted Treasures</h2>
    <div class="product-grid" id="wishlistGrid">
        <!-- Content will be injected dynamically -->
    </div>
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

<script>
     // hamburger
    function toggleMenu() {
    document.getElementById("menu").classList.toggle("show");
}
    document.addEventListener("DOMContentLoaded", () => {
        // =============================================
        // SEARCH INTERACTION & SUGGESTIONS LOGIC
        // =============================================
        const searchIconBtn = document.getElementById("searchIconBtn");
        const searchOverlay = document.getElementById("searchOverlay");
        const searchBackdrop = document.getElementById("searchBackdrop");
        const closeSearch = document.getElementById("closeSearch");
        const searchInput = document.getElementById("searchInput");
        const searchResultsDropdown = document.getElementById("searchResultsDropdown");

        const productsList = [
            { name: "Gold Plated Diamond Ring", price: "₹1,499", image: "images/10.jpg", category: "rings" },
            { name: "Classic Gold Bangle", price: "₹2,499", image: "images/10.jpg", category: "bracelets" },
            { name: "Diamond Stud Earrings", price: "₹3,999", image: "images/10.jpg", category: "earrings" },
            { name: "Luxury Pearl Necklace", price: "₹5,299", image: "images/10.jpg", category: "necklaces" },
            { name: "Elegant Gold Earrings", price: "₹1,299", image: "images/10.jpg", category: "earrings" },
            { name: "Silver Diamond Ring", price: "₹899", image: "images/10.jpg", category: "rings" },
            { name: "Charming Pearl Bracelet", price: "₹599", image: "images/10.jpg", category: "bracelets" },
            { name: "Vintage Gold Necklace", price: "₹2,999", image: "images/10.jpg", category: "necklaces" }
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
            searchInput.value = "";
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
                    a.href = `product detail.php?name=${encodeURIComponent(item.name)}&price=${encodeURIComponent(item.price.replace(/[^\d.]/g, ""))}&image=${encodeURIComponent(item.image)}`;
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
                if (query.length > 0) {
                    window.location.href = `product.php?search=${encodeURIComponent(query)}`;
                }
            });
        }

        searchInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                const query = searchInput.value.trim();
                if (query.length > 0) {
                    window.location.href = `product.php?search=${encodeURIComponent(query)}`;
                }
            }
        });

        // =============================================
        // WISHLIST INTERACTIVE RENDERING
        // =============================================
        const getWishlist = () => JSON.parse(localStorage.getItem("wishlist") || "[]");
        const saveWishlist = (list) => localStorage.setItem("wishlist", JSON.stringify(list));

        const updateWishlistBadges = () => {
            const list = getWishlist();
            const badge = document.getElementById("wishlistBadge");
            if (badge) {
                badge.textContent = list.length;
            }
        };

        const renderWishlist = () => {
            const list = getWishlist();
            const grid = document.getElementById("wishlistGrid");
            if (!grid) return;

            grid.innerHTML = "";

            if (list.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <i class="fa-regular fa-heart"></i>
                        <h3>Your Wishlist is Empty</h3>
                        <p>Discover beautiful jewelry and keep track of your favorite pieces here.</p>
                        <a href="product.php" class="continue-btn">Continue Shopping</a>
                    </div>
                `;
                return;
            }

            list.forEach(item => {
                const card = document.createElement("div");
                card.className = "product-card";
                
                // Determine collection / category
                const lowerName = item.name.toLowerCase();
                const lowerImage = item.image ? item.image.toLowerCase() : '';
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

                const priceVal = item.price.replace(/[^\d.]/g, '');

                // Build size select options HTML
                let sizeSelectHTML = '';
                if (sizes.length > 0) {
                    sizeSelectHTML = `<select name="size" class="card-size-select" style="
                        width: 100%;
                        padding: 8px 12px;
                        margin-bottom: 12px;
                        border: 1px solid rgba(149,77,89,0.2);
                        border-radius: 50px;
                        background: white;
                        color: #954D59;
                        font-size: 13px;
                        font-weight: 600;
                        text-align: center;
                        outline: none;
                        cursor: pointer;
                        transition: all 0.3s;
                    ">`;
                    sizes.forEach(sz => {
                        sizeSelectHTML += `<option value="${sz}" style="color: #333;">Size: ${sz}</option>`;
                    });
                    sizeSelectHTML += `</select>`;
                }

                card.innerHTML = `
                    <button class="remove-wishlist-btn" title="Remove from Wishlist">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="product-image-container">
                        <a class="detail-link" href="product detail.php?name=${encodeURIComponent(item.name)}&price=${encodeURIComponent(priceVal)}&image=${encodeURIComponent(item.image)}">
                            <img src="${item.image}" alt="${item.name}">
                        </a>
                    </div>
                    <div class="product-details">
                        <h3 class="product-title" style="cursor: pointer;">${item.name}</h3>
                        <div class="product-price">
                            <span class="currency">₹</span>
                            <span class="current-price">${item.price}</span>
                        </div>
                        <form action="insert_cart.php" method="post">
                            <input type="hidden" name="name" value="${item.name}">
                            <input type="hidden" name="price" value="${priceVal}">
                            <input type="hidden" name="image" value="${item.image}">
                            ${sizeSelectHTML}
                            <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                        </form>
                    </div>
                `;

                // Add size change event listener to update dynamic links
                const selectEl = card.querySelector('.card-size-select');
                const updateWishlistLinks = (selectedSize) => {
                    const params = new URLSearchParams();
                    params.set('name', item.name);
                    params.set('price', priceVal);
                    params.set('image', item.image);
                    if (selectedSize && selectedSize !== 'Standard') {
                        params.set('size', selectedSize);
                    }
                    const detailUrl = `product detail.php?${params.toString()}`;
                    const imgLink = card.querySelector('.detail-link');
                    if (imgLink) {
                        imgLink.href = detailUrl;
                    }
                    const titleEl = card.querySelector('.product-title');
                    if (titleEl) {
                        titleEl.onclick = () => { window.location.href = detailUrl; };
                    }
                };

                if (selectEl) {
                    selectEl.addEventListener('change', () => {
                        updateWishlistLinks(selectEl.value);
                    });
                    updateWishlistLinks(selectEl.value);
                } else {
                    updateWishlistLinks('');
                }

                // Add remove button event listener
                const removeBtn = card.querySelector(".remove-wishlist-btn");
                removeBtn.addEventListener("click", () => {
                    // Visual fade-out transition
                    card.style.opacity = "0";
                    card.style.transform = "scale(0.9) translateY(10px)";
                    card.style.transition = "all 0.4s ease";

                    setTimeout(() => {
                        let currentList = getWishlist();
                        const index = currentList.findIndex(i => i.name === item.name);
                        if (index > -1) {
                            currentList.splice(index, 1);
                            saveWishlist(currentList);
                        }
                        updateWishlistBadges();
                        renderWishlist();
                    }, 400);
                });

                grid.appendChild(card);
            });
        };

        // Initialize Page
        updateWishlistBadges();
        renderWishlist();
    });
</script>

<script>
    (function() {
        // PURE ACCORDION LOGIC: works only when screen width <= 500px.
        // Uses modern event listeners, ensures smooth toggling and auto-collapse of others.
        // We target all footer accordion headers that are within a column that has .footer-accordion-header
        const accordionHeaders = document.querySelectorAll('footer .footer-accordion-header');
        
        // Function to close all accordion bodies and reset icons (open state)
        function closeAllAccordions(exceptElement = null) {
            accordionHeaders.forEach(header => {
                const body = header.nextElementSibling;
                const iconSpan = header.querySelector('.footer-accordion-icon');
                // if exceptElement is provided and it matches this header, skip closing it
                if (exceptElement && header === exceptElement) return;
                
                if (body && body.classList.contains('open')) {
                    body.classList.remove('open');
                }
                if (iconSpan && iconSpan.classList.contains('open')) {
                    iconSpan.classList.remove('open');
                }
                if (header.classList.contains('open')) {
                    header.classList.remove('open');
                }
            });
        }
        
        // Helper to open single accordion
        function openAccordion(header) {
            const body = header.nextElementSibling;
            const iconSpan = header.querySelector('.footer-accordion-icon');
            if (body && !body.classList.contains('open')) {
                body.classList.add('open');
            }
            if (iconSpan && !iconSpan.classList.contains('open')) {
                iconSpan.classList.add('open');
            }
            if (!header.classList.contains('open')) {
                header.classList.add('open');
            }
        }
        
        // Attach click event to each header (only functional on mobile but event attached always safe)
        accordionHeaders.forEach(header => {
            header.addEventListener('click', function(e) {
                // Prevent any link inside header from bubbling if it's anchor but we want toggling anyway
                // Ensure that if h3 contains an <a>, click still toggles (we stopPropagation not needed)
                // But we also avoid conflict if clicking inner link: we still want the accordion to work? Yes, typical ux.
                // But to not break navigation: if user clicks on anchor link inside h3, we allow both accordion toggle and navigation.
                // However we check window width because on desktop (>500px) we don't want any accordion effect.
                if (window.innerWidth > 500) {
                    // On desktop, we do nothing (no collapse/expand, all visible anyway)
                    return;
                }
                
                e.stopPropagation();  // avoid weird bubbling but doesn't break link
                const body = this.nextElementSibling;
                const isCurrentlyOpen = body && body.classList.contains('open');
                
                // If current accordion is open: close it
                if (isCurrentlyOpen) {
                    const iconSpan = this.querySelector('.footer-accordion-icon');
                    if (body) body.classList.remove('open');
                    if (iconSpan) iconSpan.classList.remove('open');
                    if (this.classList.contains('open')) this.classList.remove('open');
                } 
                else {
                    // Close all other accordions first (so only one open at a time)
                    closeAllAccordions(this);
                    // Then open this one
                    openAccordion(this);
                }
            });
        });
        
        // On window resize, if screen size crosses 500px boundary, we must reset any forced inline styles? 
        // Since CSS media handles visibility, but we must sync open classes for mobile state.
        // When switching from mobile to desktop, we want all accordion bodies to be visible (CSS ensures display block)
        // But if some bodies have 'open' class leftover, it doesn't hurt, but best to reset them to avoid any max-height restrictions on desktop? 
        // Our desktop CSS overrides: .footer-accordion-body { max-height: none !important; overflow: visible !important; } So safe.
        // When switching from desktop to mobile, we need to ensure that initially all accordions are closed for a clean state.
        let previousWidth = window.innerWidth;
        
        function handleResponsiveAccordionReset() {
            const currentWidth = window.innerWidth;
            // if moving from >500 to <=500 (mobile)
            if (previousWidth > 500 && currentWidth <= 500) {
                // on entering mobile view, close all accordions so they start collapsed
                closeAllAccordions(null);
                // also ensure any open class is removed from bodies
                document.querySelectorAll('footer .footer-accordion-body').forEach(body => {
                    body.classList.remove('open');
                });
                document.querySelectorAll('footer .footer-accordion-icon').forEach(icon => {
                    icon.classList.remove('open');
                });
                document.querySelectorAll('footer .footer-accordion-header').forEach(h => {
                    h.classList.remove('open');
                });
            }
            // if moving from mobile to desktop, we don't need to modify classes
            previousWidth = currentWidth;
        }
        
        // Init on load: if initial load is mobile, make sure all accordions are collapsed.
        if (window.innerWidth <= 500) {
            closeAllAccordions(null);
            document.querySelectorAll('footer .footer-accordion-body').forEach(body => {
                body.classList.remove('open');
            });
            document.querySelectorAll('footer .footer-accordion-icon').forEach(icon => {
                icon.classList.remove('open');
            });
            document.querySelectorAll('footer .footer-accordion-header').forEach(h => {
                h.classList.remove('open');
            });
        } else {
            // On desktop, ensure any unwanted .open classes don't affect visual (desktop css ignores anyways)
            // but just to be clean remove them
            document.querySelectorAll('footer .footer-accordion-body').forEach(body => {
                body.classList.remove('open');
            });
        }
        
        window.addEventListener('resize', () => {
            handleResponsiveAccordionReset();
        });
        
        // Additionally, if any link inside accordion header is clicked, we do not want to prevent navigation.
        // But due to stopPropagation on header click, link inside h3 would still bubble? Actually click on anchor triggers both: anchor navigation and accordion toggle.
        // That's acceptable: user can navigate while toggling, but might feel weird. We can adjust: if target is anchor, we avoid toggling? Option: 
        // but better UX: Clicking on anchor text toggles panel and also follows link (maybe not ideal). To avoid double action, we can optionally check:
        // We'll improve: if target element is an <a> tag or inside anchor, we prevent accordion toggling? But on mobile space small, better keep toggle only when clicking header background.
        // To refine: stop toggling if clicked element is anchor or inside <a>?
        // Provide more polish:
        const refinedHeaderHandler = (header) => {
            header.addEventListener('click', function(e) {
                if (window.innerWidth > 500) return;
                // if the clicked element or its parent is an anchor link (href)
                let target = e.target;
                let isAnchor = target.closest('a');
                if (isAnchor && isAnchor.getAttribute('href')) {
                    // Allow navigation normally, but also we may want to avoid accordion toggling or keep? 
                    // Usually you wouldn't want both. Let's let navigation happen but not toggle so it's less intrusive.
                    // To improve, we skip toggling if anchor click. This way users can click contact link without expanding/collapsing conflict.
                    return;
                }
                e.stopPropagation();
                const body = header.nextElementSibling;
                const isCurrentlyOpen = body && body.classList.contains('open');
                
                if (isCurrentlyOpen) {
                    const iconSpan = header.querySelector('.footer-accordion-icon');
                    if (body) body.classList.remove('open');
                    if (iconSpan) iconSpan.classList.remove('open');
                    if (header.classList.contains('open')) header.classList.remove('open');
                } else {
                    closeAllAccordions(header);
                    openAccordion(header);
                }
            });
        };
        
        // Replace previous listeners: remove old then attach refined ones
        const freshHeaders = document.querySelectorAll('footer .footer-accordion-header');
        // clone events: we can remove existing listeners by replacing them (simple: remove all and reattach)
        freshHeaders.forEach(header => {
            const newHeader = header.cloneNode(true);
            header.parentNode.replaceChild(newHeader, header);
        });
        // re-query and attach refined logic
        const updatedHeaders = document.querySelectorAll('footer .footer-accordion-header');
        updatedHeaders.forEach(header => {
            refinedHeaderHandler(header);
        });
        
        // re-apply initial collapse for mobile on page after dom refresh
        if (window.innerWidth <= 500) {
            setTimeout(() => {
                document.querySelectorAll('footer .footer-accordion-body').forEach(body => {
                    body.classList.remove('open');
                });
                document.querySelectorAll('footer .footer-accordion-icon').forEach(icon => {
                    icon.classList.remove('open');
                });
                document.querySelectorAll('footer .footer-accordion-header').forEach(h => {
                    h.classList.remove('open');
                });
            }, 10);
        }
        
        // Add extra logic to ensure that when resizing from desktop to mobile, all panels start collapsed.
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 500) {
                document.querySelectorAll('footer .footer-accordion-body').forEach(body => {
                    body.classList.remove('open');
                });
                document.querySelectorAll('footer .footer-accordion-icon').forEach(icon => {
                    icon.classList.remove('open');
                });
                document.querySelectorAll('footer .footer-accordion-header').forEach(h => {
                    h.classList.remove('open');
                });
            }
        });
    })();
</script>
</body>
</html>
