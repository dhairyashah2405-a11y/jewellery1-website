<?php
session_start();
include_once __DIR__ . '/../backend/p2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
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
        .hamburger{
            display: none;
        }
        /* subscribe */
     .line{
        width: 100%;
        height: 2px;
        background-color: #d8b5b5; /* line color */
        margin-top: 20px;
    }
    /* ---- TRENDING SECTION ---- */
        .trending-section {
            padding: 40px 12px;
            min-height: unset;
        }

        .trending-section::before,
        .trending-section::after {
            width: 3px;
            top: 10px;
            bottom: 10px;
        }

        .trending-section::before { left: 10px; }
        .trending-section::after  { right: 10px; }

        .btn-box {
            margin-top: 30px;
        }

        .view-btn {
            font-size: 15px;
            padding: 12px 30px;
        }
        
    /* ---- PRODUCT CARDS (Desktop & Hover Effects) ---- */
    .product-container{
        display:flex;
        justify-content:center;
        gap:30px;
        flex-wrap:wrap;
        max-width: 1300px;
        margin: 0 auto;
        padding: 0;
    }

    .product-card{
        width:280px;
        background:#ffffff;
        border-radius:15px;
        overflow:hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        text-align: center;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .product-card:hover{
        transform:translateY(-12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
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
        -webkit-line-clamp: 2;
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

    /* ---- FILTERABLE SHOP LAYOUT ---- */
    .shop-page-container {
        display: flex;
        max-width: 1350px;
        margin: 40px auto;
        padding: 0 30px;
        gap: 40px;
        align-items: flex-start;
    }

    /* Sidebar Styling */
    .filter-sidebar {
        width: 300px;
        flex-shrink: 0;
        background: #ffffff;
        border: 1px solid #e8dede;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    }

    .filter-group {
        border-bottom: 1px solid #e8dede;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .filter-group:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .filter-title {
        font-size: 18px;
        font-weight: 600;
        color: #9b4d5d;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        user-select: none;
        margin-bottom: 15px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .filter-title i {
        font-size: 14px;
        transition: transform 0.3s ease;
    }

    .filter-content {
        transition: max-height 0.3s ease, opacity 0.3s ease;
        overflow: hidden;
    }

    .filter-content ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .filter-content li {
        margin-bottom: 12px;
    }

    .filter-content li:last-child {
        margin-bottom: 0;
    }

    .filter-content label {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 15px;
        color: #555;
        cursor: pointer;
        transition: color 0.2s;
    }

    .filter-content label:hover {
        color: #9b4d5d;
    }

    .filter-content input[type="checkbox"] {
        appearance: none;
        width: 18px;
        height: 18px;
        border: 2px solid #ccc;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        transition: all 0.2s;
        position: relative;
    }

    .filter-content input[type="checkbox"]:checked {
        background-color: #9b4d5d;
        border-color: #9b4d5d;
    }

    .filter-content input[type="checkbox"]:checked::after {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: white;
        font-size: 11px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .filter-content .count {
        color: #999;
        font-size: 13px;
    }

    .price-range-label {
        font-size: 15px;
        color: #555;
        margin-top: 15px;
    }

    .price-value {
        color: #9b4d5d;
        font-weight: 600;
    }

    /* Custom styled range slider */
    input[type="range"] {
        -webkit-appearance: none;
        width: 100%;
        height: 6px;
        background: #e8dede;
        border-radius: 3px;
        outline: none;
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #9b4d5d;
        cursor: pointer;
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: 0.1s;
    }

    input[type="range"]::-webkit-slider-thumb:hover {
        transform: scale(1.2);
    }

    /* Right Content Main Section */
    .shop-main-content {
        flex-grow: 1;
    }

    /* Shop Toolbar */
    .shop-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        border-bottom: 1px solid #e8dede;
        padding-bottom: 15px;
    }

    .product-count {
        font-size: 15px;
        color: #666;
    }

    .sort-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sort-container label {
        font-size: 14px;
        color: #666;
    }

    .sort-container select {
        padding: 8px 30px 8px 15px;
        font-size: 14px;
        color: #333;
        border: 1px solid #e8dede;
        border-radius: 8px;
        background-color: #fff;
        cursor: pointer;
        outline: none;
        transition: 0.2s;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1.5 3.5h9z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
    }

    .sort-container select:hover {
        border-color: #9b4d5d;
    }

    /* Mobile overrides */
    @media screen and (max-width: 768px) {
        .shop-page-container {
            flex-direction: column;
            padding: 0 15px;
            gap: 20px;
            margin: 20px auto;
        }

        .filter-sidebar {
            width: 100%;
            padding: 15px;
        }

        .product-container {
            gap: 12px;
            padding: 0;
            justify-content: space-between;
        }

        .product-card {
            width: calc(50% - 6px);
            border-radius: 10px;
        }

        .product-image-container {
            height: 170px;
            padding: 12px;
        }

        .product-details {
            padding: 14px 10px;
        }

        .product-title {
            font-size: 13px;
            min-height: unset;
        }

        .current-price {
            font-size: 18px;
        }

        .original-price {
            font-size: 12px;
        }

        .add-to-cart-btn {
            font-size: 12px;
            padding: 10px 14px;
            letter-spacing: 0;
        }
    }

          /* Footer CSS */
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

    @media(max-width:500px){
        .footer-container{
            flex-direction:column;
            gap:15px;
            text-align:center;
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

    /* Styled Search Results Summary Banner inside product grid toolbar */
    .search-summary-banner {
        width: 100%;
        background: #fdfafb;
        border: 1px solid #e8dede;
        border-radius: 12px;
        padding: 15px 25px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
    }

    .search-summary-text {
        font-size: 16px;
        color: #333;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .search-summary-text span {
        color: #9b4d5d;
        font-weight: 600;
    }

    .clear-search-btn {
        background: #9b4d5d;
        color: #ffffff;
        border: none;
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .clear-search-btn:hover {
        background: #000000;
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
        .search-summary-banner {
            padding: 12px 18px;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }
        .clear-search-btn {
            width: 100%;
            justify-content: center;
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
        <a href="register.php"><i class="fa-regular fa-user"></i></a>
        <a href="wishlist.php" class="header-wishlist-link">
            <i class="fa-regular fa-heart" id="wishlistIcon"></i>
            <span class="wishlist-badge" id="wishlistBadge">0</span>
        </a>
        <a href="add to cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
</header>
<!-- Shop Layout Wrapper -->
<div class="shop-page-container">
    <!-- Left Sidebar: Filters -->
    <aside class="filter-sidebar">
        <!-- Collection Accordion -->
        <div class="filter-group">
            <h3 class="filter-title" onclick="toggleFilterGroup(this)">Collection <i class="fa-solid fa-chevron-up"></i></h3>
            <div class="filter-content" style="max-height: 500px;">
                <ul>
                    <li><label><input type="checkbox" class="filter-checkbox" data-filter="collection" value="earrings" checked> Earrings <span class="count">(0)</span></label></li>
                    <li><label><input type="checkbox" class="filter-checkbox" data-filter="collection" value="necklace" checked> Necklace <span class="count">(0)</span></label></li>
                    <li><label><input type="checkbox" class="filter-checkbox" data-filter="collection" value="rings" checked> Rings <span class="count">(0)</span></label></li>
                    <li><label><input type="checkbox" class="filter-checkbox" data-filter="collection" value="bracelets" checked> Bracelets <span class="count">(0)</span></label></li>
                </ul>
            </div>
        </div>

        <!-- Availability Accordion -->
        <div class="filter-group">
            <h3 class="filter-title" onclick="toggleFilterGroup(this)">Availability <i class="fa-solid fa-chevron-up"></i></h3>
            <div class="filter-content" style="max-height: 500px;">
                <ul>
                    <li><label><input type="checkbox" class="filter-checkbox" data-filter="availability" value="in-stock" checked> In stock <span class="count">(0)</span></label></li>
                    <li><label><input type="checkbox" class="filter-checkbox" data-filter="availability" value="out-of-stock" checked> Out of stock <span class="count">(0)</span></label></li>
                </ul>
            </div>
        </div>

        <!-- Price Accordion -->
        <div class="filter-group">
            <h3 class="filter-title" onclick="toggleFilterGroup(this)">Price <i class="fa-solid fa-chevron-up"></i></h3>
            <div class="filter-content" style="max-height: 500px;">
                <input type="range" id="priceRange" min="0" max="6000" step="100" value="6000" oninput="updatePriceLabel(this.value)">
                <div class="price-range-label">Price: <span class="price-value">₹0.00 - ₹6,000.00</span></div>
            </div>
        </div>
    </aside>

    <!-- Right Main Shop Section -->
    <main class="shop-main-content">
        <!-- Top Toolbar -->
        <div class="shop-toolbar">
            <span class="product-count" id="productCount">8 products</span>
            <div class="sort-container">
                <label for="sortDropdown">Sort by:</label>
                <select id="sortDropdown" onchange="applySortingFiltering()">
                    <option value="featured">Featured</option>
                    <option value="best-selling" selected>Best selling</option>
                    <option value="alpha-asc">Alphabetically, A-Z</option>
                    <option value="alpha-desc">Alphabetically, Z-A</option>
                    <option value="price-asc">Price, low to high</option>
                    <option value="price-desc">Price, high to low</option>
                    <option value="date-asc">Date, old to new</option>
                    <option value="date-desc">Date, new to old</option>
                </select>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="product-container" id="productGrid">
            <?php
            $res = mysqli_query($con, "SELECT * FROM store_products ORDER BY id DESC");
            while ($p = mysqli_fetch_assoc($res)) {
                $featured_str = $p['featured'] ? 'true' : 'false';
                $formatted_price = number_format($p['price']);
                $orig_price_html = '';
                if (!empty($p['original_price']) && $p['original_price'] > 0) {
                    $orig_price_html = '<span class="original-price">₹' . number_format($p['original_price']) . '</span>';
                }
                
                $is_out_of_stock = ($p['availability'] === 'out-of-stock' || $p['stock'] <= 0);
                $btn_html = '';
                if ($is_out_of_stock) {
                    $btn_html = '<button type="submit" name="add_to_cart" class="add-to-cart-btn" disabled style="background-color: #ccc; cursor: not-allowed; color: #666;">Out of Stock</button>';
                } else {
                    $btn_html = '<button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>';
                }
                ?>
                <div class="product-card" data-collection="<?php echo htmlspecialchars($p['collection']); ?>" data-availability="<?php echo htmlspecialchars($p['availability']); ?>" data-price="<?php echo htmlspecialchars($p['price']); ?>" data-sales="<?php echo htmlspecialchars($p['sales']); ?>" data-date="<?php echo htmlspecialchars($p['date']); ?>" data-featured="<?php echo $featured_str; ?>">
                    <div class="product-image-container">
                        <a href="product detail.php"><img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>"></a>
                    </div>
                    <div class="product-details">
                        <h3 class="product-title"><?php echo htmlspecialchars($p['name']); ?></h3>
                        <div class="product-price">
                            <span class="currency">₹</span>
                            <span class="current-price"><?php echo htmlspecialchars($formatted_price); ?></span>
                            <?php echo $orig_price_html; ?>
                        </div>
                        <form action="insert_cart.php" method="post">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($p['name']); ?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($p['price']); ?>">
                            <input type="hidden" name="image" value="<?php echo htmlspecialchars($p['image']); ?>">
                            <?php echo $btn_html; ?>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </main>
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
  <script>
    // Hamburger Menu Toggle
    function toggleMenu() {
        document.getElementById("menu").classList.toggle("show");
    }

    // Sidebar Accordion Toggle
    function toggleFilterGroup(element) {
        const content = element.nextElementSibling;
        const icon = element.querySelector("i");
        
        if (content.style.maxHeight === "0px" || content.style.maxHeight === "") {
            content.style.maxHeight = "500px";
            content.style.opacity = "1";
            icon.style.transform = "rotate(0deg)";
        } else {
            content.style.maxHeight = "0px";
            content.style.opacity = "0";
            icon.style.transform = "rotate(180deg)";
        }
    }

    // Price Label Update
    function updatePriceLabel(value) {
        const formatted = parseFloat(value).toLocaleString('en-IN', {
            maximumFractionDigits: 2,
            minimumFractionDigits: 2
        });
        document.querySelector('.price-value').textContent = `₹0.00 - ₹${formatted}`;
        applySortingFiltering();
    }

    // Main Filtering & Sorting Logic
    function applySortingFiltering() {
        const productGrid = document.getElementById("productGrid");
        const cards = Array.from(productGrid.querySelectorAll(".product-card"));
        
        // 1. Gather Filter Values
        const selectedCollections = Array.from(document.querySelectorAll('.filter-checkbox[data-filter="collection"]:checked')).map(cb => cb.value);
        const selectedAvailability = Array.from(document.querySelectorAll('.filter-checkbox[data-filter="availability"]:checked')).map(cb => cb.value);
        const maxPrice = parseFloat(document.getElementById("priceRange").value);
        const searchInput = document.getElementById("searchInput");
        const searchQuery = searchInput ? searchInput.value.trim().toLowerCase() : "";
        
        let visibleCount = 0;

        // 2. Perform Filtering on all cards
        cards.forEach(card => {
            const col = card.dataset.collection;
            const stock = card.dataset.availability;
            const price = parseFloat(card.dataset.price);
            const title = card.querySelector(".product-title").textContent.toLowerCase();

            const matchesCollection = selectedCollections.includes(col);
            const matchesAvailability = selectedAvailability.includes(stock);
            const matchesPrice = price <= maxPrice;
            const matchesSearch = searchQuery === "" || title.includes(searchQuery) || col.toLowerCase().includes(searchQuery);

            if (matchesCollection && matchesAvailability && matchesPrice && matchesSearch) {
                card.style.display = "flex";
                visibleCount++;
            } else {
                card.style.display = "none";
            }
        });

        // Update active products count label
        document.getElementById("productCount").textContent = `${visibleCount} ${visibleCount === 1 ? 'product' : 'products'}`;

        // 3. Perform Sorting
        const sortValue = document.getElementById("sortDropdown").value;

        cards.sort((a, b) => {
            if (sortValue === "featured") {
                const featA = a.dataset.featured === "true" ? 1 : 0;
                const featB = b.dataset.featured === "true" ? 1 : 0;
                return featB - featA; // Featured first
            }
            if (sortValue === "best-selling") {
                const salesA = parseInt(a.dataset.sales) || 0;
                const salesB = parseInt(b.dataset.sales) || 0;
                return salesB - salesA; // High to low sales
            }
            if (sortValue === "alpha-asc") {
                const titleA = a.querySelector(".product-title").textContent.trim().toLowerCase();
                const titleB = b.querySelector(".product-title").textContent.trim().toLowerCase();
                return titleA.localeCompare(titleB);
            }
            if (sortValue === "alpha-desc") {
                const titleA = a.querySelector(".product-title").textContent.trim().toLowerCase();
                const titleB = b.querySelector(".product-title").textContent.trim().toLowerCase();
                return titleB.localeCompare(titleA);
            }
            if (sortValue === "price-asc") {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                return priceA - priceB;
            }
            if (sortValue === "price-desc") {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                return priceB - priceA;
            }
            if (sortValue === "date-asc") {
                const dateA = new Date(a.dataset.date);
                const dateB = new Date(b.dataset.date);
                return dateA - dateB;
            }
            if (sortValue === "date-desc") {
                const dateA = new Date(a.dataset.date);
                const dateB = new Date(b.dataset.date);
                return dateB - dateA;
            }
            return 0;
        });

        // Re-append sorted cards to the DOM grid container
        cards.forEach(card => productGrid.appendChild(card));
    }

    // Dynamic Filter Count Calculator
    function calculateDynamicFilterCounts() {
        const cards = document.querySelectorAll('.product-card');
        const counts = {
            collection: { earrings: 0, necklace: 0, rings: 0, bracelets: 0 },
            availability: { 'in-stock': 0, 'out-of-stock': 0 }
        };

        cards.forEach(card => {
            const col = card.dataset.collection;
            const stock = card.dataset.availability;
            if (counts.collection[col] !== undefined) counts.collection[col]++;
            if (counts.availability[stock] !== undefined) counts.availability[stock]++;
        });

        // Update checkbox labels count strings
        for (const key in counts.collection) {
            const labelSpan = document.querySelector(`.filter-checkbox[data-filter="collection"][value="${key}"] ~ .count`);
            if (labelSpan) labelSpan.textContent = `(${counts.collection[key]})`;
        }
        for (const key in counts.availability) {
            const labelSpan = document.querySelector(`.filter-checkbox[data-filter="availability"][value="${key}"] ~ .count`);
            if (labelSpan) labelSpan.textContent = `(${counts.availability[key]})`;
        }
    }

    // Initial setup on DOM Content Loaded
    document.addEventListener("DOMContentLoaded", () => {
        // Register change listeners for all checkboxes
        document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', applySortingFiltering);
        });

        // Calculate and render counts
        calculateDynamicFilterCounts();
        
        // Execute initial filtering and sorting
        applySortingFiltering();

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
            echo implode(",\n            ", $js_items);
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

        // Search Input interaction for dynamic suggestions
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

        // Click search icon inside search input to submit search
        const innerSearchIcon = searchOverlay.querySelector(".search-icon-inside");
        if (innerSearchIcon) {
            innerSearchIcon.style.cursor = "pointer";
            innerSearchIcon.addEventListener("click", () => {
                const query = searchInput.value.trim();
                executeSearch(query);
            });
        }

        // Submit search on Enter key
        searchInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                const query = searchInput.value.trim();
                executeSearch(query);
            }
        });

        function executeSearch(query) {
            closeSearchOverlay();
            if (query.length > 0) {
                const url = new URL(window.location);
                url.searchParams.set("search", query);
                window.history.pushState({}, '', url);
                
                showSearchSummary(query);
                applySortingFiltering();
            }
        }

        function showSearchSummary(term) {
            const mainContent = document.querySelector(".shop-main-content");
            const productGrid = document.getElementById("productGrid");
            
            const existing = document.querySelector(".search-summary-banner");
            if (existing) existing.remove();

            if (!term) return;

            const banner = document.createElement("div");
            banner.className = "search-summary-banner";
            banner.innerHTML = `
                <div class="search-summary-text">
                    Search results for: <span>"${escapeHTML(term)}"</span>
                </div>
                <button class="clear-search-btn" id="clearSearchBtn">
                    <i class="fa-solid fa-xmark"></i> Clear Search
                </button>
            `;
            
            mainContent.insertBefore(banner, productGrid);

            document.getElementById("clearSearchBtn").addEventListener("click", () => {
                searchInput.value = "";
                const url = new URL(window.location);
                url.searchParams.delete("search");
                window.history.pushState({}, '', url);
                
                banner.remove();
                applySortingFiltering();
            });
        }

        function escapeHTML(str) {
            return str.replace(/[&<>'"]/g, 
                tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag)
            );
        }

        // Parse search query from URL on load
        const queryParams = new URLSearchParams(window.location.search);
        const urlSearchQuery = queryParams.get("search");
        if (urlSearchQuery) {
            searchInput.value = urlSearchQuery;
            showSearchSummary(urlSearchQuery);
            applySortingFiltering();
        }

        // =============================================
        // WISHLIST DYNAMIC INTERACTION LOGIC
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

        const toggleWishlist = (name, price, image, btn) => {
            let list = getWishlist();
            const index = list.findIndex(item => item.name === name);
            const icon = btn.querySelector("i");

            if (index > -1) {
                // Remove from wishlist
                list.splice(index, 1);
                btn.classList.remove("active");
                if (icon) {
                    icon.className = "fa-regular fa-heart";
                }
            } else {
                // Add to wishlist
                list.push({ name, price, image });
                btn.classList.add("active");
                if (icon) {
                    icon.className = "fa-solid fa-heart";
                }
            }

            saveWishlist(list);
            updateWishlistBadges();
        };

        // Initialize header badges
        updateWishlistBadges();

        // Dynamically inject wishlist heart icons on all product cards
        const productCards = document.querySelectorAll(".product-card");
        const list = getWishlist();

        productCards.forEach(card => {
            const imageContainer = card.querySelector(".product-image-container");
            if (!imageContainer) return;

            // Find image alt or title to use as product name
            const img = imageContainer.querySelector("img");
            if (!img) return;

            // Use the descriptive img alt as the title to solve Wamp's duplicate title bug
            const titleEl = card.querySelector(".product-title");
            const rawTitle = titleEl ? titleEl.textContent.trim() : "";
            const name = rawTitle ? rawTitle : (img.alt ? img.alt : "");

            // Extract price and clean it
            const price = card.getAttribute("data-price") || "";
            
            // Extract image source
            const image = img.getAttribute("src") || "";

            // Check if already in wishlist
            const isInWish = list.some(item => item.name === name);

            // Create and append the button
            const btn = document.createElement("button");
            btn.className = `wishlist-btn ${isInWish ? "active" : ""}`;
            btn.setAttribute("type", "button");
            btn.innerHTML = `<i class="${isInWish ? "fa-solid fa-heart" : "fa-regular fa-heart"}"></i>`;
            
            // Add click listener
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                toggleWishlist(name, price, image, btn);
            });

            imageContainer.appendChild(btn);
        });

        // Rewrite detail page links dynamically with parameters and inject size dropdown
        document.querySelectorAll('.product-card').forEach(card => {
            const titleEl = card.querySelector('.product-title');
            const imgEl = card.querySelector('.product-image-container img');
            const priceEl = card.querySelector('.current-price');
            const form = card.querySelector('form[action="insert_cart.php"]');
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
            const collection = card.getAttribute('data-collection') || 'rings';

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
                    background: white;
                    color: #954D59;
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
                    form.insertBefore(selectEl, btn);
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
                const imgLink = card.querySelector('a[href*="product detail"]');
                if (imgLink) {
                    imgLink.href = detailUrl;
                }

                // Also make title clickable link
                titleEl.style.cursor = 'pointer';
                titleEl.onclick = () => { window.location.href = detailUrl; };
            }

            // Initial link update
            updateLinks(selectEl ? selectEl.value : '');
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