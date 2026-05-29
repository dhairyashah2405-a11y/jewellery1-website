<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /*header CSS*/
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
    /* content */
    .container{
    width:90%;
    margin:50px auto;
}

.row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:40px;
    gap:40px;
}

.text-box{
    width:40%;
}

.text-box h1{
    font-size:48px;
    color:#111;
    margin-bottom:20px;
    line-height:1.2;
}

.text-box p{
    font-size:14px;
    color:#444;
    line-height:1.8;
    margin-bottom:25px;
    width:80%;
}

.btn{
    display:inline-block;
    padding:12px 35px;
    border:1px solid #000;
    text-decoration:none;
    color:#000;
    font-size:14px;
    transition:0.3s;
}

.btn:hover{
    background:black;
    color:white;
}

.image-box{
    width:60%;
}

.image-box img{
    width:100%;
    height:auto;
    display:block;
}

@media(max-width:768px){

    .row{
        flex-direction:column;
    }

    .text-box,
    .image-box{
        width:100%;
    }

    .text-box h1{
        font-size:36px;
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
        .hamburger{
        display:none;
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
     /* testimoniAL */
     .testimonial-slider{
    width:90%;
    margin:40px auto;
}
.testimonial-slider .card {
    margin: 0 10px;
}
    .card{
    background:#ece8e8;
    padding:30px;
    flex:1;
    display:flex;
    align-items:flex-start;
    gap:20px;
}

.card img{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
}

.content{
    flex:1;
}

.stars{
    color:black;
    font-size:18px;
    margin-bottom:10px;
}

.content p{
    color:#666;
    font-size:14px;
    line-height:1.6;
    margin-bottom:15px;
}

.content h4{
    color:#111;
    font-size:16px;
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

<!-- banner -->
 <div class="banner">
           <h2>About Us</h2>
        </div>
<!-- content -->
 <div class="container">

    <!-- First Row -->
    <div class="row">

        <div class="text-box">
            <h1>Enhancing Your Style</h1>

            <p>
                Together with you, enhance your temperament —
                turn your luxurious beauty with impressive designs.
            </p>

            <a href="#" class="btn">Shop Now</a>
        </div>

        <div class="image-box">
            <img src="images/7.jpg" alt="Jewellery Model">
        </div>

    </div>

    <!-- Second Row -->
    <div class="row">

        <div class="image-box">
            <img src="images/7.jpg" alt="Jewellery Model">
        </div>

        <div class="text-box">
            <h1>Ensemble with Earrings</h1>

            <p>
                Genuine gold and silver jewellery for young people,
                elegant design, diverse designs help you perfect and
                transform your daily style.
            </p>

            <a href="#" class="btn">Shop Now</a>
        </div>

    </div>
</div>
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