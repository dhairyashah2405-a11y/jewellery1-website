<?php
session_start();
include_once __DIR__ . '/../backend/p2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Design</title>

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
        /*video*/
        
    .video-section{
      width:100%;
      height:100vh;
      position:relative;
      overflow:hidden;
    }

    .video-section video{
      width:100%;
      height:100%;
      object-fit:cover;
    }

    /* Play / Pause Button */
    .play-btn{
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%, -50%);
      width:80px;
      height:80px;
      background:rgba(255,255,255,0.7);
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      cursor:pointer;
      transition:0.3s;
      border:none;
    }

    .play-btn:hover{
      background:white;
      transform:translate(-50%, -50%) scale(1.1 );
    }

    /* Play Icon */
    .play-btn.play::before{
      content:'';
      border-left:22px solid #b86b7a;
      border-top:14px solid transparent;
      border-bottom:14px solid transparent;
      margin-left:5px;
    }

    /* Pause Icon */
    .play-btn.pause::before{
      content:'❚❚ ';
      color:#b86b7a;
      font-size:28px;
      font-weight:bold;
    }

/* Bottom Text Bar */
.bottom-bar{
    width:100%;
    background:#7d1f35;
    color:white;
    padding:8px 0;
    overflow:hidden;
    display: flex;
    align-items: center;
}

.ticker-wrapper {
    display: flex;
    white-space: nowrap;
    animation: marquee-scroll 20s linear infinite;
}

@keyframes marquee-scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.bottom-bar span{
    margin:0 20px;
    font-size:14px;
    letter-spacing:1px;
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
    /* testimoniAL */
    .testimonial-container {
        max-width: 1200px;
        margin: 40px auto;
        position: relative;
        padding: 0 50px;
    }

    .testimonial-slider {
        width: 100%;
    }

    .testimonial-slider .slick-slide {
        padding: 0 10px;
    }

    /* Testimonial card — scoped so it doesn't affect gallery .card */
    .testimonial-slider .card {
        background: #ece8e8;
        padding: 30px;
        display: flex !important;
        align-items: flex-start;
        gap: 20px;
        margin: 0;
    }

    .testimonial-slider .card img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }

    .testimonial-slider .content {
        flex: 1;
    }

    .testimonial-slider .stars {
        color: black;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .testimonial-slider .content p {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .testimonial-slider .content h4 {
        color: #111;
        font-size: 16px;
    }
 /* subscribe */
     .line{
        width: 100%;
        height: 2px;
        background-color: #d8b5b5; /* line color */
        margin-top: 20px;
    }
/* Instagram Section */
.instagram-section {
    width: 100%;
    padding: 60px 40px;
    background: linear-gradient(rgba(90,0,50,0.8), rgba(90,0,50,0.8)),
                url("bg.jpg") center/cover no-repeat;
    position: relative;
    overflow: hidden;
}

.slider-container {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    padding: 0 50px;
}

/* Slick Slider Customization */
.instagram-slider .slick-slide {
    padding: 10px;
}

.instagram-slider img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: 0.4s;
    display: block;
}

.instagram-slider img:hover {
    transform: scale(1.05);
    cursor: pointer;
}

/* Custom Arrows */
.arrow {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255,255,255,0.25);
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
    background: #fff;
    color: #7a1b52;
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
    /* SECTION */
.trending-section{
    width:100%;
    min-height:100vh;
    background:
    linear-gradient(rgba(107,0,37,0.85), rgba(107,0,37,0.85)),
    url('https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=1200&auto=format&fit=crop');
    padding:80px 40px;
    position:relative;
    overflow:hidden;
}

/* GOLD BORDER */
.trending-section::before,
.trending-section::after{
    content:"";
    position:absolute;
    top:20px;
    bottom:20px;
    width:6px;
    background:linear-gradient(to bottom,#f7d774,#b8860b,#f7d774);
}

.trending-section::before{
    left:25px;
}

.trending-section::after{
    right:25px;
}

/* Product Card CSS */
.product-container{
    display:flex;
    justify-content:center;
    gap:30px;
    flex-wrap:wrap;
    max-width: 1300px;
    margin: 0 auto;
}

.product-card{
    width:280px;
    background:#ffffff;
    border-radius:15px;
    overflow:hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    display: flex;
    flex-direction: column;
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

/* BUTTON */
.btn-box{
    text-align:center;
    margin-top:60px;
    width: 100%;
}

.view-btn{
    background:white;
    color:#9a5665;
    padding:14px 45px;
    text-decoration:none;
    font-size:18px;
    display:inline-block;
    transition:0.3s;
    border-radius: 5px;
    font-weight: 600;
}

.view-btn:hover{
    background:#f3d37b;
    color:black;
    transform: scale(1.05);
}
/* video gallery */
  .gallery{
    display:flex;
    align-items: center;
    justify-content:center;
    }

    .card{
      position:relative;
      overflow:hidden;
      background:#eee;
    }

    .card video{
      width:100%;
      height:100%;
      object-fit:cover;
      display:block;
    }

    /* LEFT CARD */
    .left-card{
      background:#f3f3f3;
      padding:61px;
      padding-left: 35px;
      display:flex;
      flex-direction:column;
      margin-left: 60px;
      justify-content:space-between;
      max-width:400px;
      width: 100%;
      height: 520px;
    }

    .left-card h1{
      color:#9b5c67;
      text-align: center;
      justify-content: center;
      align-items: center;
      font-size:56px;
      line-height:1;
      font-weight:500;
    }

    .left-card .hand-img{
      width:100%;
      height:100%;
      background-image: url("https://images.unsplash.com/photo-1617038220319-276d3cfab638?q=80&w=800");
      background-size: cover;
      background-position: center;
    }

    .shop-btn{
      background:#9b5c67;
      color:white;
      text-decoration:none;
      padding:14px 38px;
      font-size:18px;
      margin-top:25px;
      align-self:center;
    }

    /* MIDDLE COLUMN */
    .middle{
      display:flex;
      flex-direction:column;
      justify-content:center;
      align-items:center;
      gap:18px;
      
    }

    .small-card{
      height:198px;
      padding: 0px;
       margin-left: 38px;
    }

    /* RIGHT CARD */
    .right-card{
      padding:0px;
      display:flex;
      margin-left: 60px;
      justify-content:space-between;
      max-width:400px;
      width: 100%;
      height:520px;
    }

    /* TEXT */
    .label{
      position:absolute;
      right:20px;
      bottom:18px;
      color:white;
      font-size:28px;
      font-weight:500;
    }

    /* PLAY BUTTON */
    .play-btn{
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%, -50%);
      width:58px;
      height:58px;
      border-radius:50%;
      background:#f7dfdb;
      display:flex;
      justify-content:center;
      align-items:center;
      cursor:pointer;
    }

    .play-btn::before{
      content:'';
      border-left:14px solid #9b5c67;
      border-top:9px solid transparent;
      border-bottom:9px solid transparent;
      margin-left:4px;
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
            gap:0px;
        }

        .bottom-bar span {
            font-size: 12px;
            margin: 0 10px;
            gap:2px;
        }

        /* ---- NEW ARRIVALS HEADING ---- */
        body > h1,
        h1[style*="New Arrivals"],
        h1[style*="text-align: center"] {
            font-size: 22px;
            margin-top: 18px;
            margin-bottom: 12px;
        }

        /* ---- PRODUCT CARDS (New Arrivals & Trending) ---- */
        .product-container {
            gap: 12px;
            padding: 0 12px;
        }

        .product-card {
            width: calc(50% - 10px);
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

        /* ---- VIDEO GALLERY ---- */
        .gallery {
            flex-direction: column;
            align-items: center;
            gap: 14px;
            padding: 0 12px;
        }

        .left-card {
            width: 100%;
            max-width: 100%;
            margin-left: 0;
            padding: 30px 20px;
            height: auto;
        }

        .left-card h1 {
            font-size: 32px;
        }

        .left-card .hand-img {
            height: 200px;
        }

        .shop-btn {
            width: 100%;
            text-align: center;
            padding: 12px 20px;
            font-size: 15px;
        }

        .middle {
            width: 100%;
            flex-direction: row;
            gap: 12px;
        }

        .small-card {
            height: 170px;
            flex: 1;
            margin-left: 0;
            padding: 0px !important;
        }

        .right-card {
            width: 100%;
            max-width: 100%;
            margin-left: 0;
            height: 220px;
            padding:0px !important;
        }

        .label {
            font-size: 20px;
        }

        /* ---- TRENDING SECTION ---- */
        .trending-section {
            padding: 0px;
            min-height: 500px;
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

        /* ---- TESTIMONIAL ---- */
        .testimonial-container {
            padding: 0 36px;
            margin: 20px auto;
        }

        .testimonial-slider .card {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .testimonial-slider .card img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .testimonial-slider .content p {
            font-size: 13px;
        }

        /* ---- INSTAGRAM SECTION ---- */
        .instagram-section {
            padding: 30px 12px;
        }

        .slider-container {
            padding: 0 36px;
        }

        .instagram-slider img {
            height: 160px;
        }

        .arrow {
            width: 34px;
            height: 34px;
            font-size: 16px;
        }

        .arrow.left { left: -4px; }
        .arrow.right { right: -4px; }

        /* ---- SUBSCRIBE SECTION ---- */
        .subscribe {
            padding: 0 16px;
        }

        .subscribe h3 {
            font-size: 18px !important;
        }

        .subscribe p {
            font-size: 13px !important;
        }

        .subscribe form {
            max-width: 100% !important;
        }

        .subscribe input[type="email"] {
            font-size: 14px;
        }

        .subscribe button[type="submit"] {
            width: 100% !important;
            margin-left: 0 !important;
            font-size: 15px;
        }

        /* ---- FOOTER ---- */
        footer {
            padding: 30px 16px;
            margin-top: 30px;
        }

        /* Logo column — centered, no accordion */
        footer .col-md-4:first-child {
            text-align: center;
            padding: 20px 0 10px;
            border-bottom: 1px solid #e0c8c8;
            min-width: unset;
            width: 100%;
        }

        footer img[alt="Logo"] {
            width: 130px !important;
            height: 130px !important;
        }

        /* Accordion columns */
        footer .row {
            flex-direction: column;
            gap: 0;
        }

        footer .col-md-4:not(:first-child) {
            min-width: unset;
            width: 100%;
            border-bottom: 1px solid #e0c8c8;
        }

        /* Accordion header row */
        footer .footer-accordion-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            padding: 16px 6px;
            user-select: none;
        }

        footer .footer-accordion-header h3 {
            margin-bottom: 0;
            padding-bottom: 0;
            font-size: 16px;
            color: #954D59;
        }

        footer .footer-accordion-header h3::after {
            display: none;
        }

        footer .footer-accordion-header h3 a {
            color: #954D59;
            text-decoration: none;
        }

        /* Chevron icon */
        footer .footer-accordion-icon {
            font-size: 22px;
            color: #954D59;
            transition: transform 0.35s ease;
            line-height: 1;
            flex-shrink: 0;
        }

        footer .footer-accordion-icon.open {
            transform: rotate(180deg);
        }

        /* Accordion body — collapsed by default */
        footer .footer-accordion-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.3s ease;
            padding: 0 6px;
            text-align: left;
        }

        footer .footer-accordion-body.open {
            max-height: 500px;
            padding: 4px 6px 18px;
        }

        .social-icons {
            justify-content: center;
        }

        .social-icons a {
            font-size: 20px;
            margin: 0 10px;
        }

        .payment-icons img {
            width: 36px;
            margin-left: 6px;
        }

        .footer-text {
            font-size: 12px;
            margin-top: 10px;
            line-height: 1.8;
        }

        footer .line {
            margin-top: 14px;
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

    /* =============================================
       CART DRAWER CSS
       ============================================= */
    .cart-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.35);
        backdrop-filter: blur(2px);
        z-index: 1100;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.35s ease;
    }
    .cart-backdrop.active {
        opacity: 1;
        pointer-events: auto;
    }

    .cart-drawer {
        position: fixed;
        top: 0;
        right: -480px;
        width: 440px;
        max-width: 100vw;
        height: 100vh;
        background: #faf8f5;
        z-index: 1200;
        display: flex;
        flex-direction: column;
        transition: right 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: -8px 0 40px rgba(0,0,0,0.12);
    }
    .cart-drawer.open {
        right: 0;
    }

    /* Header */
    .cart-drawer-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 22px 28px 16px;
    }
    .cart-drawer-title {
        font-size: 20px;
        font-weight: 500;
        color: #222;
        letter-spacing: 0.3px;
    }
    .cart-drawer-close {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #555;
        transition: color 0.2s;
        line-height: 1;
        padding: 4px;
    }
    .cart-drawer-close:hover { color: #000; }

    /* Column labels */
    .cart-col-labels {
        display: flex;
        justify-content: space-between;
        padding: 0 28px 10px;
        font-size: 11px;
        letter-spacing: 1.2px;
        color: #888;
        font-weight: 600;
    }
    .cart-divider {
        height: 1px;
        background: #e5e0da;
        margin: 0 28px;
    }

    /* Items list */
    .cart-items-list {
        flex: 1;
        overflow-y: auto;
        padding: 8px 0;
    }

    /* Single cart item */
    .cart-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 18px 28px;
        border-bottom: 1px solid #ede9e3;
        position: relative;
    }
    .cart-item-img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 4px;
        flex-shrink: 0;
        background: #eee;
    }
    .cart-item-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .cart-item-name {
        font-size: 15px;
        font-weight: 500;
        color: #222;
        line-height: 1.3;
    }
    .cart-item-unit-price {
        font-size: 13px;
        color: #777;
    }
    .cart-item-controls {
        display: flex;
        align-items: center;
        gap: 0;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: fit-content;
        overflow: hidden;
    }
    .cart-qty-btn {
        background: none;
        border: none;
        width: 34px;
        height: 34px;
        font-size: 18px;
        cursor: pointer;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }
    .cart-qty-btn:hover { background: #f0ebe3; }
    .cart-qty-display {
        width: 40px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        color: #222;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Right side of item: total + action buttons */
    .cart-item-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
        flex-shrink: 0;
    }
    .cart-item-total {
        font-size: 14px;
        font-weight: 600;
        color: #222;
        white-space: nowrap;
    }
    .cart-item-actions {
        display: flex;
        gap: 10px;
    }
    .cart-item-delete, .cart-item-wish {
        background: none;
        border: none;
        cursor: pointer;
        color: #888;
        font-size: 15px;
        transition: color 0.2s;
        padding: 2px;
    }
    .cart-item-delete:hover { color: #c0392b; }
    .cart-item-wish:hover { color: #9b4d5d; }
    .cart-item-wish-label {
        font-size: 10px;
        color: #888;
        text-align: center;
        line-height: 1.1;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2px;
        transition: color 0.2s;
    }
    .cart-item-wish-label:hover { color: #9b4d5d; }

    /* Empty state */
    .cart-empty {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: #aaa;
        font-size: 15px;
    }
    .cart-continue-btn {
        margin-top: 10px;
        background: #222;
        color: #fff;
        padding: 12px 28px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: background 0.2s;
    }
    .cart-continue-btn:hover { background: #9b4d5d; }

    /* Footer */
    .cart-drawer-footer {
        padding: 14px 28px 28px;
        border-top: 1px solid #e5e0da;
        background: #faf8f5;
    }
    .cart-progress-bar-wrap {
        width: 100%;
        height: 6px;
        background: #e5e0da;
        border-radius: 3px;
        margin-bottom: 16px;
        overflow: hidden;
    }
    .cart-progress-bar {
        height: 100%;
        background: #333;
        border-radius: 3px;
        width: 70%;
        transition: width 0.4s;
    }
    .cart-total-row {
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        font-weight: 600;
        color: #222;
        margin-bottom: 6px;
    }
    .cart-tax-note {
        font-size: 12px;
        color: #888;
        margin-bottom: 16px;
    }
    .cart-checkout-btn {
        display: block;
        width: 100%;
        background: #111;
        color: #fff;
        text-align: center;
        text-decoration: none;
        padding: 16px;
        font-size: 16px;
        border-radius: 4px;
        transition: background 0.2s;
        letter-spacing: 0.3px;
    }
    .cart-checkout-btn:hover { background: #9b4d5d; }

    @media screen and (max-width: 480px) {
        .cart-drawer { width: 100vw; }
        .cart-item { padding: 14px 16px; }
        .cart-drawer-header { padding: 18px 16px 12px; }
        .cart-col-labels, .cart-divider { margin: 0 16px; }
        .cart-drawer-footer { padding: 12px 16px 24px; }
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

<!-- =============================================
     CART DRAWER
     ============================================= -->
<div class="cart-backdrop" id="cartBackdrop"></div>
<div class="cart-drawer" id="cartDrawer">
    <!-- Header -->
    <div class="cart-drawer-header">
        <span class="cart-drawer-title">Your cart</span>
        <button class="cart-drawer-close" id="cartDrawerClose" aria-label="Close cart">&#x2715;</button>
    </div>

    <!-- Column Labels -->
    <div class="cart-col-labels">
        <span>PRODUCT</span>
        <span>TOTAL</span>
    </div>
    <div class="cart-divider"></div>

    <!-- Items List -->
    <div class="cart-items-list" id="cartItemsList">
        <!-- Items injected by JS -->
    </div>

    <!-- Empty State -->
    <div class="cart-empty" id="cartEmpty" style="display:none;">
        <i class="fa-solid fa-bag-shopping" style="font-size:40px;color:#ccc;margin-bottom:12px;"></i>
        <p>Your cart is empty</p>
        <a href="shop.php" class="cart-continue-btn">Continue shopping</a>
    </div>

    <!-- Footer -->
    <div class="cart-drawer-footer" id="cartFooter">
        <div class="cart-progress-bar-wrap">
            <div class="cart-progress-bar" id="cartProgressBar"></div>
        </div>
        <div class="cart-total-row">
            <span>Estimated total</span>
            <span id="cartTotalPrice">Rs. 0.00</span>
        </div>
        <p class="cart-tax-note">Taxes, discounts and shipping calculated at checkout.</p>
        <a href="checkout.php" class="cart-checkout-btn">Check out</a>
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
        <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'profile.php' : 'login.php'; ?>">
            <i class="fa-regular fa-user"></i>
        </a>
        <a href="wishlist.php" class="header-wishlist-link">
            <i class="fa-regular fa-heart" id="wishlistIcon"></i>
            <span class="wishlist-badge" id="wishlistBadge">0</span>
        </a>
        <a href="#" class="header-cart-link" id="cartIconBtn" style="position:relative;text-decoration:none;">
            <i class="fa-solid fa-bag-shopping" style="color:#9b4d5d;font-size:15px;"></i>
            <span class="cart-badge" id="cartBadge" style="position:absolute;top:-7px;right:-7px;background:#9b4d5d;color:#fff;font-size:10px;font-weight:700;width:16px;height:16px;border-radius:50%;display:flex;align-items:center;justify-content:center;border:1px solid #fff;box-shadow:0 2px 5px rgba(0,0,0,0.1);">0</span>
        </a>
    </div>
</header>
<!-- video -->
  <section class="video-section">

    <!-- Video -->
    <video id="myVideo" autoplay muted loop>
      <source src="images/3.mp4" type="video/mp4">
    </video>

    <!-- Play Pause Button -->
    <button class="play-btn pause" id="playBtn"></button>
        </section>

    <div class="bottom-bar">
        <div class="ticker-wrapper" id="bottomTicker">
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
            <span>WATER PROOF</span> |
            <span>SKIN SAFE</span> |
        </div>
    </div>
    <!-- new arrival section -->
    <h1 style="text-align: center;margin-bottom: 20px; margin-top: 8px;">New Arrivals</h1>
        <div class="product-container">
            <?php
            $res_new = mysqli_query($con, "SELECT * FROM store_products ORDER BY date DESC, id DESC LIMIT 4");
            while ($p = mysqli_fetch_assoc($res_new)) {
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
    <br><br><br>
    <!-- video of jewelley -->
      <div class="gallery">

    <!-- LEFT -->
    <div class="card left-card">
      <h1>Sophisticated<br>Simple</h1>
<img src="images/hand.jpg" class="hand-img">

      <a href="shop.php" class="shop-btn">SHOP NOW</a>
    </div>

    <!-- MIDDLE -->
    <div class="middle">

      <div class="card small-card">
        <video src="images/11.mp4" autoplay muted loop></video>

        <div class="play-btn"></div>

        <div class="label">Bracelets</div>
      </div>

      <div class="card small-card">
        <video src="images/12.mp4" autoplay muted loop></video>

        <div class="play-btn"></div>

        <div class="label">Rings</div>
      </div>

    </div>

    <!-- RIGHT -->
    <div class="card right-card">
     <video src="images/13.mp4" autoplay muted loop></video>

      <div class="play-btn"></div>

      <div class="label">Earrings</div>
    </div>

  </div>
  <br><br>

    <!-- top trending -->
    <section class="trending-section">
        <h1 style="text-align: center; color:white; margin-bottom: 40px; font-size: 36px; letter-spacing: 2px;">TOP TRENDING</h1>
        
        <div class="product-container">
            <?php
            $res_trend = mysqli_query($con, "SELECT * FROM store_products ORDER BY sales DESC, id DESC LIMIT 4");
            while ($p = mysqli_fetch_assoc($res_trend)) {
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

            <!-- VIEW ALL BUTTON -->
            <div class="btn-box">
                <a href="shop.php" class="view-btn">VIEW ALL</a>
            </div>
        </div>
    </section>
    <!-- testimonial -->
  <h1 style="text-align: center; color:#954D59; margin-top:10px; margin-bottom:-24px">Testimonial</h1>
 <div class="testimonial-container">
     <button class="arrow left testimonial-prev"><i class="fa-solid fa-chevron-left"></i></button>

     <div class="testimonial-slider">
        <!-- Card 1 -->
        <div class="card">
            <img src="images/8.jpg" alt="User">
            <div class="content">
                <div class="stars">
                    ★ ★ ★ ★ ★
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur. <br>
                    Luctus in ornare interdum laoreet morbi <br>
                    ultricies. Vel feugiat est cursus tincidunt <br>
                    purus. Congue dui tempus quisque tristique. <br>
                    Sit senectus ultrices urna eu.
                </p>
                <h4>Liza Moretti</h4>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <img src="images/8.jpg" alt="User">
            <div class="content">
                <div class="stars">
                    ★ ★ ★ ★ ★
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur. <br>
                    Luctus in ornare interdum laoreet morbi <br>
                    ultricies. Vel feugiat est cursus tincidunt <br>
                    purus. Congue dui tempus quisque tristique. <br>
                    Sit senectus ultrices urna eu. <br>
                </p>
                <h4>Liza Moretti</h4>
            </div>
        </div>
    </div>
    
    <button class="arrow right testimonial-next"><i class="fa-solid fa-chevron-right"></i></button>
 </div><!-- end testimonial-container -->
    <!-- Our instagram -->
     <div class="instagram-section">
     <h1 style="text-align: center; color:white;margin-bottom:10px">Our Instagram</h1>
     <p style = "text-align:center; color:white; margin-bottom:15px;">@sistarajewelry</p>
      <div class="slider-container">
        <!-- Left Arrow -->
        <button class="arrow left instagram-prev"><i class="fa-solid fa-chevron-left"></i></button>

        <div class="instagram-slider">
            <div><img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?q=80&w=600&auto=format&fit=crop" alt=""></div>
            <div><img src="https://images.unsplash.com/photo-1588444837495-c6cfeb53f32d?q=80&w=600&auto=format&fit=crop" alt=""></div>
            <div><img src="https://images.unsplash.com/photo-1622434641406-a158123450f9?q=80&w=600&auto=format&fit=crop" alt=""></div>
            <div><img src="images/9.jpg" alt=""></div>
            <div><img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=80&w=600&auto=format&fit=crop" alt=""></div>
            <div><img src="https://images.unsplash.com/photo-1573408301185-9146fe634ad0?q=80&w=600&auto=format&fit=crop" alt=""></div>
            <div><img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?q=80&w=600&auto=format&fit=crop" alt=""></div>
            <div><img src="https://images.unsplash.com/photo-1589128777073-263566ae5e4d?q=80&w=600&auto=format&fit=crop" alt=""></div>
            <!-- More images for second slide -->
                   </div>

        <!-- Right Arrow -->
        <button class="arrow right instagram-next"><i class="fa-solid fa-chevron-right"></i></button>
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

            <div class="payment-icons">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 80 50'%3E%3Crect width='80' height='50' fill='%231a1f71'/%3E%3Ctext x='10' y='30' fill='white' font-size='12'%3EVISA%3C/text%3E%3C/svg%3E" alt="Visa">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 80 50'%3E%3Crect width='80' height='50' fill='%23ff5f00'/%3E%3Ctext x='8' y='30' fill='white' font-size='12'%3EMastercard%3C/text%3E%3C/svg%3E" alt="Mastercard">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 80 50'%3E%3Crect width='80' height='50' fill='%23007cba'/%3E%3Ctext x='12' y='30' fill='white' font-size='12'%3EPayPal%3C/text%3E%3C/svg%3E" alt="PayPal">
            </div>
        </div>
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
            slidesToScroll:3,
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
                        slidesToShow: 2
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
                        slidesToShow: 2
                    }
                }
            ]
        });

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
    });

    // =============================================
    // CART DRAWER LOGIC
    // =============================================
    (function() {
        const cartIconBtn   = document.getElementById("cartIconBtn");
        const cartDrawer    = document.getElementById("cartDrawer");
        const cartBackdrop  = document.getElementById("cartBackdrop");
        const cartClose     = document.getElementById("cartDrawerClose");
        const cartItemsList = document.getElementById("cartItemsList");
        const cartEmpty     = document.getElementById("cartEmpty");
        const cartFooter    = document.getElementById("cartFooter");
        const cartBadge     = document.getElementById("cartBadge");
        const cartTotal     = document.getElementById("cartTotalPrice");
        const cartProgress  = document.getElementById("cartProgressBar");

        // ---- Storage helpers ----
        const getCart = () => JSON.parse(localStorage.getItem("cart") || "[]");
        const syncCartWithDB = () => {
            const cart = getCart();
            fetch('sync_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(cart)
            })
            .then(res => res.json())
            .then(data => console.log('DB cart synced:', data))
            .catch(err => console.error('DB cart sync error:', err));
        };
        const saveCart = (c) => {
            localStorage.setItem("cart", JSON.stringify(c));
            syncCartWithDB();
        };

        // ---- Open / Close ----
        const openCart = (e) => {
            if (e) e.preventDefault();
            cartDrawer.classList.add("open");
            cartBackdrop.classList.add("active");
            document.body.style.overflow = "hidden";
            renderCart();
        };
        const closeCart = () => {
            cartDrawer.classList.remove("open");
            cartBackdrop.classList.remove("active");
            document.body.style.overflow = "";
        };

        if (cartIconBtn) cartIconBtn.addEventListener("click", openCart);
        if (cartClose)   cartClose.addEventListener("click", closeCart);
        if (cartBackdrop) cartBackdrop.addEventListener("click", closeCart);

        // ---- Render ----
        const formatPrice = (num) => "Rs. " + parseFloat(num).toFixed(2);

        const renderCart = () => {
            const cart = getCart();
            cartItemsList.innerHTML = "";

            if (cart.length === 0) {
                cartEmpty.style.display = "flex";
                cartFooter.style.display = "none";
                cartBadge.textContent = "0";
                return;
            }

            cartEmpty.style.display = "none";
            cartFooter.style.display = "block";

            let total = 0;
            let count = 0;

            cart.forEach((item, idx) => {
                const itemTotal = parseFloat(item.price.replace(/,/g,"")) * item.qty;
                total += itemTotal;
                count += item.qty;

                const div = document.createElement("div");
                div.className = "cart-item";
                div.innerHTML = `
                    <img class="cart-item-img" src="${item.image}" alt="${item.name}" onerror="this.style.background='#ddd';this.src='';">
                    <div class="cart-item-info">
                        <span class="cart-item-name">${item.name}</span>
                        ${item.size && item.size !== 'Standard' ? `<span class="cart-item-size" style="font-size: 12px; color: #954D59; font-weight: 600; display: block; margin-top: 2px;">Size: ${item.size}</span>` : ''}
                        <span class="cart-item-unit-price">Rs. ${parseFloat(item.price.replace(/,/g,"")).toFixed(2)}</span>
                        <div class="cart-item-controls">
                            <button class="cart-qty-btn" data-idx="${idx}" data-action="dec">&#8722;</button>
                            <span class="cart-qty-display">${item.qty}</span>
                            <button class="cart-qty-btn" data-idx="${idx}" data-action="inc">&#43;</button>
                        </div>
                    </div>
                    <div class="cart-item-right">
                        <span class="cart-item-total">${formatPrice(itemTotal)}</span>
                        <div class="cart-item-actions">
                            <button class="cart-item-delete" data-idx="${idx}" title="Remove"><i class="fa-regular fa-trash-can"></i></button>
                            <div class="cart-item-wish-label" data-name="${item.name}" data-price="${item.price}" data-image="${item.image}">
                                <i class="fa-regular fa-heart" style="font-size:15px;"></i>
                                <span>ADD TO<br>WISHLIST</span>
                            </div>
                        </div>
                    </div>
                `;
                cartItemsList.appendChild(div);
            });

            cartBadge.textContent = count;
            cartTotal.textContent = formatPrice(total);
            // progress bar: e.g. based on total vs free shipping threshold
            const threshold = 5000;
            cartProgress.style.width = Math.min((total / threshold) * 100, 100) + "%";
        };

        // ---- Event delegation for qty & delete ----
        cartItemsList.addEventListener("click", (e) => {
            const qtyBtn = e.target.closest(".cart-qty-btn");
            const delBtn = e.target.closest(".cart-item-delete");
            const wishEl = e.target.closest(".cart-item-wish-label");

            if (qtyBtn) {
                const idx = parseInt(qtyBtn.dataset.idx);
                const action = qtyBtn.dataset.action;
                const cart = getCart();
                if (action === "inc") {
                    cart[idx].qty += 1;
                } else {
                    cart[idx].qty -= 1;
                    if (cart[idx].qty <= 0) cart.splice(idx, 1);
                }
                saveCart(cart);
                renderCart();
            }

            if (delBtn) {
                const idx = parseInt(delBtn.dataset.idx);
                const cart = getCart();
                cart.splice(idx, 1);
                saveCart(cart);
                renderCart();
            }

            if (wishEl) {
                // Move to wishlist
                const name  = wishEl.dataset.name;
                const price = wishEl.dataset.price;
                const image = wishEl.dataset.image;
                const wl = JSON.parse(localStorage.getItem("wishlist") || "[]");
                if (!wl.find(w => w.name === name)) {
                    wl.push({ name, price, image });
                    localStorage.setItem("wishlist", JSON.stringify(wl));
                    const badge = document.getElementById("wishlistBadge");
                    if (badge) badge.textContent = wl.length;
                }
                // Notify user
                wishEl.querySelector("span").textContent = "ADDED!";
                setTimeout(() => { wishEl.querySelector("span").innerHTML = "ADD TO<br>WISHLIST"; }, 1500);
            }
        });

        // ---- Add to Cart: intercept all add-to-cart forms ----
        document.querySelectorAll("form[action='insert_cart.php']").forEach(form => {
            form.addEventListener("submit", (e) => {
                e.preventDefault();
                const name  = form.querySelector("[name='name']").value;
                const price = form.querySelector("[name='price']").value;
                const image = form.querySelector("[name='image']").value;
                const sizeEl = form.querySelector("[name='size']");
                const size = sizeEl ? sizeEl.value : 'Standard';

                const cart = getCart();
                const existing = cart.find(i => i.name === name && (i.size === size || (!i.size && size === 'Standard')));
                if (existing) {
                    existing.qty += 1;
                } else {
                    cart.push({ name, price, image, qty: 1, size: size });
                }
                saveCart(cart);

                // Update badge without opening drawer
                const total = cart.reduce((s, i) => s + i.qty, 0);
                cartBadge.textContent = total;

                // Open drawer
                openCart();
            });
        });

        // ---- Init badge on page load ----
        const initCart = () => {
            const cart = getCart();
            const total = cart.reduce((s, i) => s + i.qty, 0);
            cartBadge.textContent = total;
            syncCartWithDB();
        };
        initCart();

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

            // Determine collection / category
            let collection = card.getAttribute('data-collection');
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

                // Also make title clickable link
                titleEl.style.cursor = 'pointer';
                titleEl.onclick = () => { window.location.href = detailUrl; };
            }

            // Initial link update
            updateLinks(selectEl ? selectEl.value : '');
        }); 
    })();
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
</script></body>
</html>