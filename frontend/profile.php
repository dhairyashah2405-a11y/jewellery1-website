<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo "<script>alert('Please login to access your profile.'); window.location='login.php';</script>";
    exit();
}

// ── Profile Image Upload ──────────────────────────────────────────
$upload_dir   = 'uploads/profile_images/';
$profile_img  = $_SESSION['profile_image'] ?? '';
$upload_error = '';
$upload_success = '';

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
    $file = $_FILES['profile_image'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        $max_size      = 3 * 1024 * 1024; // 3 MB

        if (!in_array($file['type'], $allowed_types)) {
            $upload_error = 'Only JPG, PNG, GIF or WEBP images are allowed.';
        } elseif ($file['size'] > $max_size) {
            $upload_error = 'Image must be smaller than 3 MB.';
        } else {
            // Create directory if needed
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Remove old image
            if (!empty($profile_img) && file_exists($profile_img)) {
                unlink($profile_img);
            }

            $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = $upload_dir . 'user_' . $_SESSION['username'] . '_' . time() . '.' . $ext;

            if (move_uploaded_file($file['tmp_name'], $filename)) {
                $_SESSION['profile_image'] = $filename;
                $profile_img               = $filename;
                $upload_success            = 'Profile photo updated!';
            } else {
                $upload_error = 'Upload failed. Please try again.';
            }
        }
    } else {
        $upload_error = 'No file received or upload error.';
    }
}

// Handle image removal
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_image'])) {
    if (!empty($profile_img) && file_exists($profile_img)) {
        unlink($profile_img);
    }
    unset($_SESSION['profile_image']);
    $profile_img    = '';
    $upload_success = 'Profile photo removed.';
}
// ─────────────────────────────────────────────────────────────────

$username = $_SESSION['username'] ?? '';
$first_name = $_SESSION['first_name'] ?? '';
$last_name = $_SESSION['last_name'] ?? '';
$email = $_SESSION['email'] ?? ($username . "@example.com");
$full_name = trim($first_name . ' ' . $last_name);
if (empty($full_name)) {
    $full_name = $username;
}

// Get user initials for avatar
$initials = '';
if (!empty($first_name)) $initials .= strtoupper($first_name[0]);
if (!empty($last_name)) $initials .= strtoupper($last_name[0]);
if (empty($initials)) $initials = strtoupper(substr($username, 0, min(2, strlen($username))));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Sistaraja Jewelry</title>
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Outfit', Arial, Helvetica, sans-serif;
        }

        body{
            margin:0px;
            background: linear-gradient(135deg, #fbf7f8 0%, #f5ecee 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header{
            width:100%;
            height: 100px;
            background:#f5f1f1;
            padding:20px 60px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            z-index: 100;
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
            font-weight: 500;
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

        .icons i, .icons a{
            color:#9b4d5d;
            cursor:pointer;
            font-size:15px;
            transition:0.3s;
            text-decoration: none;
        }

        .icons i:hover{
            color:#000;
        }
        
        .hamburger{
            display: none;
        }

        /* User dropdown */
        .user-dropdown-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
        }
        .user-dropdown-menu {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            background: #fff;
            border: 1px solid #e0d0d4;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
            min-width: 150px;
            z-index: 999;
            overflow: hidden;
        }
        .user-dropdown-menu a {
            display: block;
            padding: 11px 18px;
            color: #9b4d5d;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s;
        }
        .user-dropdown-menu a:hover {
            background: #f5f1f1;
            color: #000;
        }
        .user-dropdown-wrap:hover .user-dropdown-menu,
        .user-dropdown-wrap.open .user-dropdown-menu {
            display: block;
        }

        /* Profile Layout */
        .profile-wrapper {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        .profile-container {
            width: 100%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(155, 77, 93, 0.15);
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(155, 77, 93, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .profile-header-bg {
            background: linear-gradient(135deg, #9b4d5d 0%, #70323e 100%);
            height: 140px;
            position: relative;
        }

        .profile-header-bg::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40px;
            background: linear-gradient(to top, rgba(255,255,255,0.05), transparent);
        }

        .profile-content {
            padding: 0 40px 40px 40px;
            position: relative;
            text-align: center;
        }

        .avatar-container {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f7d37b 0%, #b8860b 100%);
            margin: -65px auto 15px auto;
            padding: 4px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            position: relative;
            z-index: 10;
            cursor: pointer;
        }

        .avatar-inner {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: #ffffff;
            color: #9b4d5d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            letter-spacing: 1px;
            border: 2px solid rgba(155, 77, 93, 0.05);
            overflow: hidden;
        }

        .avatar-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Camera overlay on hover */
        .avatar-overlay {
            position: absolute;
            inset: 4px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.45);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.25s ease;
            gap: 4px;
            pointer-events: none;
        }
        .avatar-container:hover .avatar-overlay {
            opacity: 1;
        }
        .avatar-overlay i {
            color: #fff;
            font-size: 22px;
        }
        .avatar-overlay span {
            color: #fff;
            font-size: 11px;
            font-weight: 500;
        }

        /* Remove image button */
        .avatar-remove-btn {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #c0392b;
            border: 2px solid #fff;
            color: #fff;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 20;
            transition: background 0.2s, transform 0.2s;
        }
        .avatar-remove-btn:hover {
            background: #96281b;
            transform: scale(1.1);
        }

        /* Toast notification */
        .toast-msg {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            background: #2c1116;
            color: #fff;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            opacity: 0;
            transition: opacity 0.4s, transform 0.4s;
            z-index: 9999;
            white-space: nowrap;
            pointer-events: none;
        }
        .toast-msg.success { background: #27ae60; }
        .toast-msg.error   { background: #c0392b; }
        .toast-msg.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        .profile-name {
            font-size: 26px;
            font-weight: 700;
            color: #2c1116;
            margin-bottom: 5px;
        }

        .profile-tag {
            font-size: 14px;
            color: #b8860b;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 25px;
            display: inline-block;
            background: rgba(247, 211, 123, 0.15);
            padding: 4px 16px;
            border-radius: 50px;
            border: 1px solid rgba(247, 211, 123, 0.3);
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 35px;
            text-align: left;
        }

        .detail-card {
            background: rgba(155, 77, 93, 0.03);
            border: 1px solid rgba(155, 77, 93, 0.05);
            padding: 18px 24px;
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-3px);
            background: rgba(155, 77, 93, 0.06);
            border-color: rgba(155, 77, 93, 0.1);
        }

        .detail-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #8c7679;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .detail-value {
            font-size: 16px;
            color: #2c1116;
            font-weight: 600;
            word-break: break-all;
        }

        /* Action Buttons */
        .actions-wrapper {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            border-top: 1px solid rgba(155, 77, 93, 0.08);
            padding-top: 30px;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f7d37b 0%, #e5bd5b 100%);
            color: #000000;
            box-shadow: 0 4px 15px rgba(247, 211, 123, 0.3);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(247, 211, 123, 0.45);
            background: linear-gradient(135deg, #ffe094 0%, #f7d37b 100%);
        }

        .btn-secondary {
            background: #ffffff;
            color: #9b4d5d;
            border: 1px solid rgba(155, 77, 93, 0.25);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            background: #fdfafb;
            border-color: #9b4d5d;
            box-shadow: 0 4px 12px rgba(155, 77, 93, 0.05);
        }

        .btn-danger {
            background: #ffffff;
            color: #e03a3a;
            border: 1px solid rgba(224, 58, 58, 0.2);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            background: #fff5f5;
            border-color: #e03a3a;
            box-shadow: 0 4px 12px rgba(224, 58, 58, 0.08);
        }

        /* Footer CSS */
        footer {
            background-color:#F5F1F0;
            color: #954D59;
            padding: 50px 20px;
            font-family: 'Outfit', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width: 100%;
        }
        footer .container {
            max-width: 1200px;
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
            background-color: #d8b5b5; 
            margin-top: 20px;
        }
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
        .footer-text{
            color:#9b6b6b;
            font-size:14px;
            text-align:center;
            margin-top: 15px;
        }
        .footer-text a{
            color:#9b6b6b;
            text-decoration:none;
            margin:0 8px;
        }
        .footer-text a:hover{
            text-decoration:underline;
        }
        .payment-icons {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .payment-icons img{
            width:45px;
            margin-left:10px;
        }

        /* Wishlist/Cart badge styles */
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

        /* Response Mobile CSS */
        @media screen and (max-width: 768px) {
            header {
                padding: 12px 18px;
                height: auto;
                position: relative;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
            }
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
            .icons {
                order: 3;
                flex: 1;
                justify-content: flex-end;
                gap: 14px;
            }
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
            }
            .details-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .profile-content {
                padding: 0 20px 30px 20px;
            }
            .btn {
                width: 100%;
                justify-content: center;
            }
            .actions-wrapper {
                flex-direction: column;
                gap: 10px;
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
</style>
</head>
<body>
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
            <ul id="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="featured.php">Featured</a></li>
            </ul>
        </nav>
        
        <!-- Icons -->
        <div class="icons">
            <i class="fa-solid fa-magnifying-glass" id="searchIconBtn"></i>
            <!-- User dropdown -->
            <div class="user-dropdown-wrap" id="userDropdownWrap">
                <i class="fa-solid fa-user" id="userIconBtn" style="cursor:pointer; border-bottom: 2px solid #9b4d5d; padding-bottom: 2px;"></i>
                <div class="user-dropdown-menu" id="userDropdownMenu">
                    <?php if (isset($_SESSION['username'])): ?>
                        <a href="profile.php"><i class="fa-regular fa-user" style="margin-right:7px;"></i>My Profile</a>
                        <a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-right:7px;"></i>Logout</a>
                    <?php else: ?>
                        <a href="login.php"><i class="fa-regular fa-user" style="margin-right:7px;"></i>Login</a>
                        <a href="register.php"><i class="fa-solid fa-user-plus" style="margin-right:7px;"></i>Register</a>
                    <?php endif; ?>
                </div>
            </div>
            <a href="wishlist.php" class="header-wishlist-link">
                <i class="fa-regular fa-heart" id="wishlistIcon"></i>
                <span class="wishlist-badge" id="wishlistBadge">0</span>
            </a>
            <a href="add to cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
        </div>
    </header>

    <!-- profile view -->
    <div class="profile-wrapper">
        <div class="profile-container">
            <div class="profile-header-bg"></div>
            <div class="profile-content">
                <!-- Upload Form (image) -->
                <form method="POST" enctype="multipart/form-data" id="uploadForm" style="display:none;">
                    <input type="file" name="profile_image" id="profileImageInput"
                           accept="image/jpeg,image/jpg,image/png,image/gif,image/webp">
                </form>

                <!-- Remove Form -->
                <form method="POST" id="removeForm" style="display:none;">
                    <input type="hidden" name="remove_image" value="1">
                </form>

                <div class="avatar-container" onclick="document.getElementById('profileImageInput').click()" title="Click to change photo">
                    <div class="avatar-inner" id="avatarInner">
                        <?php if (!empty($profile_img) && file_exists($profile_img)): ?>
                            <img src="<?php echo htmlspecialchars($profile_img); ?>?v=<?php echo time(); ?>" alt="Profile Photo" id="avatarImg">
                        <?php else: ?>
                            <span id="avatarInitials"><?php echo $initials; ?></span>
                        <?php endif; ?>
                    </div>
                    <!-- Camera hover overlay -->
                    <div class="avatar-overlay">
                        <i class="fa-solid fa-camera"></i>
                        <span>Change Photo</span>
                    </div>
                    <!-- Remove button (only shown when image exists) -->
                    <?php if (!empty($profile_img) && file_exists($profile_img)): ?>
                    <button type="button" class="avatar-remove-btn" id="removeBtn"
                            onclick="event.stopPropagation(); confirmRemove();"
                            title="Remove photo">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <?php endif; ?>
                </div>
                <h2 class="profile-name"><?php echo htmlspecialchars($full_name); ?></h2>
                <span class="profile-tag">Sistaraja Member</span>

                <div class="details-grid">
                    <div class="detail-card">
                        <div class="detail-label"><i class="fa-regular fa-user" style="margin-right: 5px;"></i> Username</div>
                        <div class="detail-value"><?php echo htmlspecialchars($username); ?></div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label"><i class="fa-regular fa-envelope" style="margin-right: 5px;"></i> Email Address</div>
                        <div class="detail-value"><?php echo htmlspecialchars($email); ?></div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label"><i class="fa-regular fa-id-card" style="margin-right: 5px;"></i> First Name</div>
                        <div class="detail-value"><?php echo htmlspecialchars($first_name ?: 'Not Provided'); ?></div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label"><i class="fa-regular fa-id-card" style="margin-right: 5px;"></i> Last Name</div>
                        <div class="detail-value"><?php echo htmlspecialchars($last_name ?: 'Not Provided'); ?></div>
                    </div>
                </div>

                <div class="actions-wrapper">
                    <a href="product.php" class="btn btn-primary"><i class="fa-solid fa-gem"></i> Shop Products</a>
                    <a href="wishlist.php" class="btn btn-secondary"><i class="fa-regular fa-heart"></i> My Wishlist</a>
                    <a href="add to cart.php" class="btn btn-secondary"><i class="fa-solid fa-bag-shopping"></i> My Cart</a>
                    <a href="logout.php" class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                </div>
            </div>
        </div>
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
                    <p><a href="#">Shipping policy</a></p>
                    <p><a href="#">Return and Refund</a></p>
                    <p><a href="#">Terms of Service</a></p>
                    <p><a href="#">Privacy Policy</a></p>
                    <p><a href="about.php">About Us</a></p>
                </div>
            </div>
                <div class="col-md-4">
                <div class="footer-accordion-header">
                    <a href="contact.php"><h3>Contact Us</h3></a>
                    <span class="footer-accordion-icon"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <div class="footer-accordion-body">
                    <div class="social-icons">
                        <p><a>+(91)9876-543-210</a></p>
                        <p><a>sistarajewelry@gmail.com</a></p>
                    </div>
                </div>
            </div>
                <div class="line"> </div>
                
                <!-- Social Icons -->
                <div class="social-icons" style="text-align: center; width: 100%; margin-top: 15px;">
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

    <!-- Toast notification -->
    <div class="toast-msg" id="toastMsg"></div>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("show");
        }

        // User icon dropdown toggle
        (function() {
            const wrap = document.getElementById("userDropdownWrap");
            const btn  = document.getElementById("userIconBtn");
            if (wrap && btn) {
                btn.addEventListener("click", function(e) {
                    e.stopPropagation();
                    wrap.classList.toggle("open");
                });
                document.addEventListener("click", function() {
                    wrap.classList.remove("open");
                });
            }
        })();
        
        // Wishlist Badge Sync from LocalStorage
        document.addEventListener("DOMContentLoaded", () => {
            const getWishlist = () => JSON.parse(localStorage.getItem("wishlist") || "[]");
            const updateWishlistBadge = () => {
                const list = getWishlist();
                const badge = document.getElementById("wishlistBadge");
                if (badge) {
                    badge.textContent = list.length;
                }
            };
            updateWishlistBadge();

            // ── Profile image upload ──────────────────────────────
            const input = document.getElementById('profileImageInput');
            if (input) {
                input.addEventListener('change', function () {
                    if (!this.files || !this.files[0]) return;

                    const file  = this.files[0];
                    const maxMB = 3 * 1024 * 1024;
                    const allowed = ['image/jpeg','image/jpg','image/png','image/gif','image/webp'];

                    if (!allowed.includes(file.type)) {
                        showToast('Only JPG, PNG, GIF or WEBP allowed.', 'error');
                        return;
                    }
                    if (file.size > maxMB) {
                        showToast('Image must be smaller than 3 MB.', 'error');
                        return;
                    }

                    // Instant preview
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const inner = document.getElementById('avatarInner');
                        inner.innerHTML = `<img src="${e.target.result}" alt="Profile Photo" id="avatarImg" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">`;

                        // Show remove button
                        let rb = document.getElementById('removeBtn');
                        if (!rb) {
                            rb = document.createElement('button');
                            rb.type      = 'button';
                            rb.id        = 'removeBtn';
                            rb.className = 'avatar-remove-btn';
                            rb.title     = 'Remove photo';
                            rb.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                            rb.onclick   = function(ev) { ev.stopPropagation(); confirmRemove(); };
                            document.querySelector('.avatar-container').appendChild(rb);
                        }
                    };
                    reader.readAsDataURL(file);

                    // Submit form
                    document.getElementById('uploadForm').submit();
                });
            }

            // Show PHP toast messages on load
            <?php if (!empty($upload_success)): ?>
            showToast(<?php echo json_encode($upload_success); ?>, 'success');
            <?php elseif (!empty($upload_error)): ?>
            showToast(<?php echo json_encode($upload_error); ?>, 'error');
            <?php endif; ?>
        });

        function confirmRemove() {
            if (confirm('Remove your profile photo?')) {
                document.getElementById('removeForm').submit();
            }
        }

        function showToast(msg, type) {
            const t = document.getElementById('toastMsg');
            t.textContent  = msg;
            t.className    = 'toast-msg ' + (type || '');
            t.classList.add('show');
            setTimeout(() => t.classList.remove('show'), 3500);
        }
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
