<?php
session_start();
include_once __DIR__ . '/../backend/p2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        .hamburger{
            display: none;
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
    /* ---- PRODUCT CARDS (Desktop & Hover Effects) ---- */
    .product-container{
        display:flex;
        justify-content:center;
        gap:30px;
        flex-wrap:wrap;
        max-width: 1300px;
        margin: 0 auto;
        padding: 20px;
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
        gap: 10px;
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

    /* =============================================
       FEATURED PRODUCT IMAGE SLIDER
       ============================================= */
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Jost:wght@300;400;500&display=swap');

    .featured-section {
        padding: 60px 40px 80px;
        background: linear-gradient(160deg, #fdf8f5 0%, #f5eee9 50%, #fdf0f3 100%);
        position: relative;
        overflow: hidden;
    }

    .featured-section::before {
        content: '';
        position: absolute;
        top: -80px;
        right: -80px;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(149,77,89,0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    .featured-section::after {
        content: '';
        position: absolute;
        bottom: -60px;
        left: -60px;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(247,211,123,0.15) 0%, transparent 70%);
        pointer-events: none;
    }

    .featured-header {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .featured-header .eyebrow {
        font-family: 'Jost', sans-serif;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #954D59;
        margin-bottom: 12px;
        display: block;
    }

    .featured-header h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(36px, 5vw, 58px);
        font-weight: 400;
        color: #2c1a1f;
        line-height: 1.1;
        margin: 0 0 18px;
    }

    .featured-header h2 em {
        font-style: italic;
        color: #954D59;
    }

    .featured-header .divider {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-top: 6px;
    }

    .featured-header .divider span {
        display: block;
        width: 60px;
        height: 1px;
        background: linear-gradient(to right, transparent, #954D59);
    }

    .featured-header .divider span:last-child {
        background: linear-gradient(to left, transparent, #954D59);
    }

    .featured-header .divider i {
        color: #f7d37b;
        font-size: 12px;
    }

    /* Slider Wrapper */
    .product-slider-wrapper {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Slick override for product slider */
    .product-slider .slick-track {
        display: flex;
        align-items: stretch;
    }

    .product-slider .slick-slide {
        padding: 15px 15px 30px;
        height: auto;
    }

    .product-slider .slick-slide > div {
        height: 100%;
    }

    /* Product Slide Card */
    .ps-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(149,77,89,0.08);
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275),
                    box-shadow 0.4s ease;
        display: flex !important;
        flex-direction: column;
        height: 100%;
        cursor: pointer;
        border: 1px solid rgba(149,77,89,0.07);
    }

    .ps-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(149,77,89,0.18);
    }

    /* Image Area */
    .ps-image-wrap {
        position: relative;
        height: 300px;
        background: #fdf8f6;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ps-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .ps-card:hover .ps-image-wrap img {
        transform: scale(1.08);
    }

    /* Badge */
    .ps-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: #954D59;
        color: #fff;
        font-family: 'Jost', sans-serif;
        font-size: 10px;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 5px 12px;
        border-radius: 20px;
        z-index: 2;
    }

    .ps-badge.sale {
        background: #f7d37b;
        color: #2c1a1f;
    }

    /* Quick wishlist on slider card */
    .ps-wish {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 38px;
        height: 38px;
        background: rgba(255,255,255,0.92);
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 3px 12px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        z-index: 2;
    }

    .ps-wish i { color: #954D59; font-size: 15px; transition: transform 0.2s ease; }
    .ps-wish:hover { transform: scale(1.12); }
    .ps-wish:hover i { transform: scale(1.15); }
    .ps-wish.active i { color: #e03a3a; }

    /* Quick-view overlay */
    .ps-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 0;
        background: linear-gradient(to top, rgba(149,77,89,0.92) 0%, transparent 100%);
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 18px;
        transition: height 0.35s ease;
        overflow: hidden;
    }

    .ps-card:hover .ps-overlay { height: 80px; }

    .ps-quick-view {
        font-family: 'Jost', sans-serif;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #fff;
        background: transparent;
        border: 1px solid rgba(255,255,255,0.6);
        padding: 8px 22px;
        border-radius: 30px;
        cursor: pointer;
        transition: background 0.2s ease;
        opacity: 0;
        transform: translateY(8px);
        transition: all 0.3s ease 0.05s;
    }

    .ps-card:hover .ps-quick-view {
        opacity: 1;
        transform: translateY(0);
    }

    .ps-quick-view:hover { background: rgba(255,255,255,0.15); }

    /* Info Area */
    .ps-info {
        padding: 22px 22px 24px;
        display: flex;
        flex-direction: column;
        flex: 1;
        background: #fff;
    }

    .ps-category {
        font-family: 'Jost', sans-serif;
        font-size: 10px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #b8828f;
        margin-bottom: 6px;
    }

    .ps-name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 20px;
        font-weight: 600;
        color: #2c1a1f;
        line-height: 1.3;
        margin-bottom: 14px;
        display: -webkit-box;
        -webkit-box-orient: vertical;   
        overflow: hidden;
    }

    .ps-price-row {
        display: flex;
        align-items: baseline;
        gap: 10px;
        margin-bottom: 18px;
        margin-top: auto;
    }

    .ps-price {
        font-family: 'Jost', sans-serif;
        font-size: 22px;
        font-weight: 500;
        color: #954D59;
    }

    .ps-price-orig {
        font-family: 'Jost', sans-serif;
        font-size: 14px;
        color: #b8828f;
        text-decoration: line-through;
    }

    .ps-discount {
        font-family: 'Jost', sans-serif;
        font-size: 11px;
        font-weight: 500;
        color: #2c8c3e;
        background: #eaf7ed;
        padding: 2px 8px;
        border-radius: 10px;
    }

    .ps-cart-btn {
        width: 100%;
        background: #954D59;
        color: #fff;
        border: none;
        padding: 13px 20px;
        border-radius: 50px;
        font-family: 'Jost', sans-serif;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .ps-cart-btn::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 60%);
        pointer-events: none;
    }

    .ps-cart-btn:hover {
        background: #7a3a47;
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(149,77,89,0.3);
    }

    .ps-cart-btn:active { transform: translateY(0); }
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


    /* Custom Slider Arrows */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 48px;
        height: 48px;
        background: #fff;
        border: 1.5px solid rgba(149,77,89,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        color: #954D59;
        font-size: 14px;
    }

    .slider-arrow:hover {
        background: #954D59;
        color: #fff;
        border-color: #954D59;
        box-shadow: 0 6px 20px rgba(149,77,89,0.35);
    }

    .slider-arrow.prev-arrow { left: -24px; }
    .slider-arrow.next-arrow { right: -24px; }

    /* Dot Navigation */
    .product-slider .slick-dots {
        bottom: -35px;
    }

    .product-slider .slick-dots li button:before {
        font-size: 8px;
        color: #954D59;
        opacity: 0.3;
        transition: all 0.3s ease;
    }

    .product-slider .slick-dots li.slick-active button:before {
        opacity: 1;
        color: #954D59;
        font-size: 10px;
    }

    /* Slide counter */
    .slider-counter {
        text-align: center;
        margin-top: 20px;
        font-family: 'Jost', sans-serif;
        font-size: 12px;
        letter-spacing: 2px;
        color: #b8828f;
    }

    .slider-counter span { color: #954D59; font-weight: 500; }

    @media (max-width: 768px) {
        .featured-section { padding: 40px 20px 60px; }
        .slider-arrow.prev-arrow { left: -10px; }
        .slider-arrow.next-arrow { right: -10px; }
        .slider-arrow { width: 38px; height: 38px; font-size: 12px; }
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
        <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'profile.php' : 'login.php'; ?>">
            <i class="fa-regular fa-user"></i>
        </a>
        <a href="wishlist.php" class="header-wishlist-link">
            <i class="fa-regular fa-heart" id="wishlistIcon"></i>
            <span class="wishlist-badge" id="wishlistBadge">0</span>
        </a>
        <a href="add to cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
</header>
<!-- =============================================
     FEATURED PRODUCT SLIDER SECTION
     ============================================= -->
<section class="featured-section">

    <!-- Section Header -->
    <div class="featured-header">
        <span class="eyebrow">Handpicked for You</span>
        <h2>Our <em>Featured</em> Collection</h2>
        <div class="divider">
            <span></span>
            <i class="fa-solid fa-gem"></i>
            <span></span>
        </div>
    </div>

    <!-- Slider -->
    <div class="product-slider-wrapper">

        <!-- Prev Arrow -->
        <button class="slider-arrow prev-arrow" id="featuredPrev" aria-label="Previous">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <div class="product-slider">
            <?php
            $res = mysqli_query($con, "SELECT * FROM store_products WHERE featured = 1 ORDER BY id DESC");
            while ($p = mysqli_fetch_assoc($res)) {
                $formatted_price = number_format($p['price']);
                
                $discount_html = '';
                $orig_price_html = '';
                if (!empty($p['original_price']) && $p['original_price'] > $p['price']) {
                    $discount_pct = round((($p['original_price'] - $p['price']) / $p['original_price']) * 100);
                    $discount_html = '<span class="ps-discount">' . $discount_pct . '% off</span>';
                    $orig_price_html = '<span class="ps-price-orig original-price">₹' . number_format($p['original_price']) . '</span>';
                }
                
                $is_out_of_stock = ($p['availability'] === 'out-of-stock' || $p['stock'] <= 0);
                $btn_html = '';
                if ($is_out_of_stock) {
                    $btn_html = '<button type="submit" name="add_to_cart" class="ps-cart-btn add-to-cart-btn" disabled style="background-color: #ccc; cursor: not-allowed; color: #666;">Out of Stock</button>';
                } else {
                    $btn_html = '<button type="submit" name="add_to_cart" class="ps-cart-btn add-to-cart-btn">Add to Cart</button>';
                }
                ?>
                <div>
                    <div class="ps-card product-card" data-collection="<?php echo htmlspecialchars($p['collection']); ?>" data-availability="<?php echo htmlspecialchars($p['availability']); ?>" data-price="<?php echo htmlspecialchars($p['price']); ?>" data-sales="<?php echo htmlspecialchars($p['sales']); ?>" data-date="<?php echo htmlspecialchars($p['date']); ?>" data-featured="true">
                        <div class="ps-image-wrap product-image-container">
                            <span class="ps-badge sale">Featured</span>
                            <a href="product detail.php">
                                <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
                            </a>
                            <button class="ps-wish wishlist-btn" type="button" aria-label="Add to wishlist">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                            <div class="ps-overlay">
                                <button class="ps-quick-view" onclick="window.location='product detail.php'">Quick View</button>
                            </div>
                        </div>
                        <div class="ps-info product-details">
                            <p class="ps-category"><?php echo htmlspecialchars(ucfirst($p['collection'])); ?></p>
                            <h3 class="ps-name product-title"><?php echo htmlspecialchars($p['name']); ?></h3>
                            <div class="ps-price-row product-price">
                                <span class="ps-price current-price">₹<?php echo htmlspecialchars($formatted_price); ?></span>
                                <?php echo $orig_price_html; ?>
                                <?php echo $discount_html; ?>
                            </div>
                            <form action="insert_cart.php" method="post">
                                <input type="hidden" name="name" value="<?php echo htmlspecialchars($p['name']); ?>">
                                <input type="hidden" name="price" value="<?php echo htmlspecialchars($p['price']); ?>">
                                <input type="hidden" name="image" value="<?php echo htmlspecialchars($p['image']); ?>">
                                <?php echo $btn_html; ?>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div><!-- end .product-slider -->

        <!-- Next Arrow -->
        <button class="slider-arrow next-arrow" id="featuredNext" aria-label="Next">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

    </div><!-- end .product-slider-wrapper -->

    <!-- Slide Counter -->
    <div class="slider-counter" id="sliderCounter">
        <span id="currentSlide">1</span> / <span id="totalSlides">5</span>
    </div>

</section>
    
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
        // Instagram Slider
        $('.instagram-slider').slick({
            infinite: true,
            slidesToShow:3,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.instagram-prev'),
            nextArrow: $('.instagram-next'),
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
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3
                    }
                }
            ]
        });

        // Featured Product Slider
        var $featuredSlider = $('.product-slider');
        $featuredSlider.slick({
            infinite: true,
            slidesToShow: 3,    
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3500,
            speed: 600,
            cssEase: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
            prevArrow: $('#featuredPrev'),
            nextArrow: $('#featuredNext'),
            dots: true,
            appendDots: $featuredSlider.parent().parent().find('.slider-counter'),
            customPaging: function() { return ''; },
            responsive: [
                { breakpoint: 1100, settings: { slidesToShow: 2 } },
                { breakpoint: 700, settings: { slidesToShow: 1 } }
            ]
        });

        // Update counter
        function updateCounter() {
            var curr = $featuredSlider.slick('slickCurrentSlide') + 1;
            var total = $featuredSlider.slick('getSlick').slideCount;
            $('#currentSlide').text(curr);
            $('#totalSlides').text(total);
        }
        updateCounter();
        $featuredSlider.on('afterChange', updateCounter);

        // Testimonial Slider
        $('.testimonial-slider').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: $('.testimonial-prev'),
            nextArrow: $('.testimonial-next'),
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true
                    }
                }
            ]
        });
    });

    // Seamless Bottom Bar Ticker
    const ticker = document.getElementById('bottomTicker');
    if (ticker) {
        ticker.innerHTML += ticker.innerHTML; // Clone content for seamless loop
    }

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
            const priceEl = card.querySelector(".current-price");
            const price = priceEl ? priceEl.textContent.trim().replace("₹", "").replace(",", "") : "";
            
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
        document.querySelectorAll('.product-card, .ps-card').forEach(card => {
            const titleEl = card.querySelector('.product-title, .ps-name');
            const imgEl = card.querySelector('.product-image-container img, .ps-image-wrap img');
            const priceEl = card.querySelector('.current-price, .ps-price');
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

            // Determine collection / category
            let collection = card.getAttribute('data-collection');
            if (!collection) {
                const categoryEl = card.querySelector('.ps-category');
                if (categoryEl) {
                    collection = categoryEl.textContent.trim().toLowerCase();
                }
            }
            if (!collection) {
                const lowerName = name.toLowerCase();
                const lowerImage = image ? image.toLowerCase() : '';
                if (lowerName.includes('ring') || lowerImage.includes('ring')) {
                    collection = 'rings';
                } else if (lowerName.includes('earring') || lowerImage.includes('earring')) {
                    collection = 'earrings';
                } else if (lowerName.includes('necklace') || lowerImage.includes('necklace')) {
                    collection = 'necklace';
                } else if (lowerName.includes('bracelet') || lowerName.includes('bangle') || lowerImage.includes('bracelet') || lowerImage.includes('bangle')) {
                    collection = 'bracelets';
                } else {
                    collection = 'rings'; // default fallback
                }
            }

            // Determine size options
            let sizes = ['6', '7', '8', '9', '10'];
            if (collection === 'bracelets' || collection === 'bracelet') {
                sizes = ['2.4', '2.6', '2.8'];
            } else if (collection === 'earrings' || collection === 'earring') {
                sizes = ['Standard'];
            } else if (collection === 'necklace' || collection === 'necklaces') {
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

                // Update quick view button onclick
                const qvBtn = card.querySelector('.ps-quick-view');
                if (qvBtn) {
                    qvBtn.setAttribute('onclick', `window.location='${detailUrl}'`);
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