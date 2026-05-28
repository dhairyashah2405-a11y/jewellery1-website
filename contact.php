<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
     <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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

    /* =============================================
       WISHLIST SYSTEM CSS
       ============================================= */
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

    /* Wishlist button overlay on product cards */
    .product-image-container {
        position: relative;
    }

    .wishlist-btn {
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

    .wishlist-btn i {
        color: #9b4d5d;
        font-size: 16px;
        transition: transform 0.2s ease, color 0.2s ease;
    }

    .wishlist-btn:hover {
        transform: scale(1.1);
        background: #fdfafb;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
    }

    .wishlist-btn:active i {
        transform: scale(0.8);
    }

    .wishlist-btn.active i {
        color: #e03a3a;
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
            <i class="fa-regular fa-heart" id="wishlistIcon"></i>
            <span class="wishlist-badge" id="wishlistBadge">0</span>
        </a>
        <a href="add to cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
</header>
<!-- banner -->
 <div class="banner">
           <h2>Contact Us</h2>
        </div>
<!-- content form -->
 <h2 style="text-align:center; margin-bottom:20px; margin-top:30px">Contact details</h2>
 <form action="p1.php" method="post" style="max-width:500px; margin:0 auto;">
    <input type="text" id="name" name="name" placeholder="Your name" pattern="[A-Z a-z]+" title="Only letters are allowed" required style="width:100%; padding:12px; margin-bottom:20px; border:1px solid #ccc;">
    <input type="email" id="email" name="email" placeholder="Your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email address" required style="width:100%; padding:12px; margin-bottom:20px; border:1px solid #ccc;">
    <input type="tel" id="phone" name="phone" placeholder="Your phone no" pattern="[0-9]{10}" title="Phone number must be 10 digits" required style="width:100%; padding:12px; margin-bottom:20px; border:1px solid #ccc;">
    <textarea id="message" name="message" placeholder="Your message" rows="4" required style="width:100%; padding:12px; margin-bottom:20px; border:1px solid #ccc;"></textarea>
    <button type="submit" style="width:20%;margin-left: 160px; padding:12px; background-color:#954D59; color:white; border:none; cursor:pointer;">Send</button>
</form>
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
    // =============================================
    // SEARCH INTERACTION & LIVE SUGGESTION LOGIC
    // =============================================
    document.addEventListener("DOMContentLoaded", () => {
        const searchIconBtn = document.getElementById("searchIconBtn");
        const searchOverlay = document.getElementById("searchOverlay");
        const searchBackdrop = document.getElementById("searchBackdrop");
        const closeSearch = document.getElementById("closeSearch");
        const searchInput = document.getElementById("searchInput");
        const searchResultsDropdown = document.getElementById("searchResultsDropdown");

        // The list of all products in the store
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
            document.body.style.overflow = "hidden"; // Stop background scroll
        };

        const closeSearchOverlay = () => {
            searchOverlay.classList.remove("active");
            searchBackdrop.classList.remove("active");
            searchResultsDropdown.classList.remove("active");
            searchInput.value = "";
            document.body.style.overflow = ""; // Re-enable scroll
        };

        // Open/Close triggers
        if (searchIconBtn) searchIconBtn.addEventListener("click", openSearchOverlay);
        if (closeSearch) closeSearch.addEventListener("click", closeSearchOverlay);
        if (searchBackdrop) searchBackdrop.addEventListener("click", closeSearchOverlay);

        // Escape key to close
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && searchOverlay.classList.contains("active")) {
                closeSearchOverlay();
            }
        });

        // Search Input Keyup event for dynamic suggestions
        searchInput.addEventListener("input", () => {
            const query = searchInput.value.trim().toLowerCase();
            if (query.length < 1) {
                searchResultsDropdown.classList.remove("active");
                searchResultsDropdown.innerHTML = "";
                return;
            }

            // Filter products matching query
            const matches = productsList.filter(p => 
                p.name.toLowerCase().includes(query) || 
                p.category.toLowerCase().includes(query)
            );

            // Populate results
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

        // Click search icon inside search input to submit search
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

        // Submit search on Enter key
        searchInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                const query = searchInput.value.trim();
                if (query.length > 0) {
                    window.location.href = `product.php?search=${encodeURIComponent(query)}`;
                }
            }
        });

        // =============================================
        // WISHLIST DYNAMIC BADGE LOGIC
        // =============================================
        const getWishlist = () => JSON.parse(localStorage.getItem("wishlist") || "[]");
        const updateWishlistBadges = () => {
            const list = getWishlist();
            const badge = document.getElementById("wishlistBadge");
            if (badge) {
                badge.textContent = list.length;
            }
        };
        updateWishlistBadges();

        window.addEventListener("storage", (e) => {
            if (e.key === "wishlist") {
                updateWishlistBadges();
            }
        });
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