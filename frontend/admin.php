<?php
session_start();
include_once __DIR__ . '/../backend/p2.php'; // Defines $con (cart DB) and $con1 (orders DB)
include_once __DIR__ . '/../backend/db_connect.php'; // Defines $conn (users DB)

include_once __DIR__ . '/../backend/db_error_page.php';

// Contact Form Database Connection (user1 DB)
$contact_host = getenv('CONTACT_DB_HOST') ?: getenv('DB_HOST') ?: "localhost";
$contact_user = getenv('CONTACT_DB_USER') ?: getenv('DB_USER') ?: "root";
$contact_pass = getenv('CONTACT_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: "";
$contact_name = getenv('CONTACT_DB_NAME') ?: getenv('DB_NAME') ?: "user1";

// Disable strict exception throwing to handle connection errors programmatically
mysqli_report(MYSQLI_REPORT_OFF);

// Try auto-creating database if it's missing (error 1049) or on initialization
$con_mysql = @mysqli_connect($contact_host, $contact_user, $contact_pass);
if ($con_mysql) {
    @mysqli_query($con_mysql, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($con_mysql, $contact_name) . "`");
    mysqli_close($con_mysql);
}

$con_contact = @mysqli_connect($contact_host, $contact_user, $contact_pass, $contact_name);
if (!$con_contact) {
    show_db_error_page("Contact Database (Admin)", mysqli_connect_error(), $contact_host, $contact_name);
}

// Auto-create contactid table if not exists and ensure message is TEXT type
mysqli_query($con_contact, "CREATE TABLE IF NOT EXISTS contactid(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(100) NULL,
            message TEXT NULL
        )");
@mysqli_query($con_contact, "ALTER TABLE contactid MODIFY COLUMN message TEXT");
@mysqli_query($con_contact, "ALTER TABLE contactid MODIFY COLUMN name VARCHAR(255)");
@mysqli_query($con_contact, "ALTER TABLE contactid MODIFY COLUMN email VARCHAR(255)");
@mysqli_query($con_contact, "ALTER TABLE contactid MODIFY COLUMN phone VARCHAR(100)");

// Admin Login/Logout Handlers
if (isset($_GET['logout'])) {
    unset($_SESSION['admin_logged_in']);
    header("Location: admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $login_error = "Invalid admin credentials!";
    }
}

// ----------------------------------------------------
// DATABASE AUTO-CREATION & SEEDING (SELF-INSTALLING)
// ----------------------------------------------------
$createTableSql = "CREATE TABLE IF NOT EXISTS `store_products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `original_price` DECIMAL(10,2) NULL,
    `image` VARCHAR(255) NOT NULL,
    `collection` VARCHAR(100) NOT NULL,
    `availability` VARCHAR(50) DEFAULT 'in-stock',
    `sales` INT DEFAULT 0,
    `date` DATE NOT NULL,
    `featured` TINYINT DEFAULT 0,
    `stock` INT DEFAULT 10,
    `description` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

mysqli_query($con, $createTableSql);

// Check if inventory table is empty
$countRes = mysqli_query($con, "SELECT COUNT(*) as cnt FROM `store_products`");
$countRow = mysqli_fetch_assoc($countRes);
if ($countRow['cnt'] == 0) {
    // Seed default products with correct high-quality paths
    $default_products = [
        ['Gold Plated Diamond Ring', 1499, 3099, 'ring images/1.jpg', 'rings', 'in-stock', 250, '2026-05-15', 1, 15, 'Beautiful premium gold-plated diamond engagement ring.'],
        ['Clara 925 Sterling Silver Sky Blue Heart Set', 2468, 3998, 'ring images/2.jpg', 'rings', 'in-stock', 180, '2026-05-15', 1, 10, 'A complete elegant jewelry set with 925 sterling silver chain, bracelet, and ring featuring sky blue heart crystals.'],
        ['YouBella Silver Plated Solitaire Crystal Ring', 169, 3099, 'ring images/3.jpg', 'rings', 'in-stock', 250, '2026-05-15', 0, 20, 'Stylish silver plated crystal ring suitable for daily wear.'],
        ['Classic Gold Plated Plain Wedding Band Ring', 236, 999, 'ring images/4.jpg', 'rings', 'in-stock', 120, '2026-05-15', 0, 18, 'Minimalist gold plated wedding band with a smooth polished finish.'],
        ['925 Sterling Silver Diamond Engagement Ring', 2000, 3099, 'ring images/5.jpg', 'rings', 'in-stock', 150, '2026-05-15', 1, 8, 'Classic sterling silver engagement ring adorned with sparkling CZ diamonds.'],
        ['Fashionable Silver Plated Heart Adjustable Ring', 3000, 6000, 'ring images/6.jpg', 'rings', 'in-stock', 90, '2026-05-01', 0, 12, 'Adjustable silver plated heart ring for women.'],
        ['YouBella Adjustable Heart Shaped Proposal Ring', 3000, 6000, 'ring images/7.jpg', 'rings', 'in-stock', 85, '2026-05-01', 0, 10, 'Perfect proposal ring with adjustable design and silver plating.'],
        ['Okos Rhodium Plated Solitaire Style Heart Ring', 5000, 7000, 'ring images/9.jpg', 'rings', 'in-stock', 95, '2026-05-01', 0, 5, 'Rhodium plated solitaire style adjustable heart finger ring with CZ stone.'],
        ['Fashionable Silver Plated Chain Ring', 7000, 8000, 'ring images/10.jpg', 'rings', 'in-stock', 60, '2026-05-01', 0, 14, 'Stylish chain style ring silver plated.'],
        ['Stylish Silver Plated Kada Bracelet with AD Stones', 499, 1999, 'bracelet images/1.jpg', 'bracelets', 'in-stock', 180, '2026-05-10', 0, 12, 'Elegant Kada style bracelet with sparkling American Diamond stones.'],
        ['GIVA 925 Silver Jewellery Bracelet', 1600, 1999, 'bracelet images/2.jpg', 'bracelets', 'in-stock', 140, '2026-05-10', 0, 9, 'Premium GIVA silver jewelry bracelet with warranty.'],
        ['THE MARKETVILLA Pure 925 Silver Bracelet', 2399, 4999, 'bracelet images/3.jpg', 'bracelets', 'in-stock', 110, '2026-05-10', 0, 15, 'Pure 925 sterling silver bracelet.'],
        ['SALTY Anti Tarnish Retro Bracelet', 899, 999, 'bracelet images/4.jpg', 'bracelets', 'in-stock', 220, '2026-05-10', 0, 22, 'Retro-inspired anti-tarnish everyday bracelet.'],
        ['Nilu\'s Collection Infinity Shape CZ Bracelet', 289, 1999, 'bracelet images/5.jpg', 'bracelets', 'in-stock', 185, '2026-05-10', 0, 14, 'Infinity shaped cubic zirconia diamond bracelet.'],
        ['Sterling Silver 925 Heart Charm Bracelet', 3000, 7500, 'bracelet images/6.jpg', 'bracelets', 'in-stock', 80, '2026-05-10', 0, 8, 'Heart charm adjustable everyday wear bracelet.'],
        ['Shining Diva D\'Vine Black Onyx Beads Bracelet', 299, 499, 'bracelet images/7.jpg', 'bracelets', 'in-stock', 300, '2026-05-10', 0, 30, 'Unisex beads healing yoga reiki bracelet.'],
        ['Cubic Zirconia American Diamond Bracelet', 1000, 2999, 'bracelet images/9.jpg', 'bracelets', 'in-stock', 125, '2026-05-10', 0, 11, 'Beautiful adjustable CZ/AD bracelet.'],
        ['Shining Diva Royal Blue Crystal CZ Bracelet', 499, 999, 'bracelet images/10.jpg', 'bracelets', 'in-stock', 150, '2026-05-10', 0, 25, 'Royal blue crystal silver plated bracelet.'],
        ['Diamond Stud Earrings', 3999, 7499, 'earring images/1.jpg', 'earrings', 'in-stock', 320, '2026-05-18', 1, 15, 'Premium diamond stud earrings for a classic look.'],
        ['CLARA 925 Sterling Silver Drop Earrings', 1999, 3999, 'earring images/2.jpg', 'earrings', 'in-stock', 210, '2026-05-18', 1, 10, 'Platinum-plated sterling silver drop earrings.'],
        ['HIGHSPARK 925 Silver Solitaire Stud Earrings', 599, 1199, 'earring images/3.jpg', 'earrings', 'in-stock', 310, '2026-05-18', 1, 30, 'Highspark silver solitaire studs.'],
        ['GIVA 925 Silver Nikita\'s Hollow Zircon Drop Studs', 2719, 6000, 'earring images/4.jpg', 'earrings', 'in-stock', 105, '2026-05-18', 1, 7, 'Elegant hollow zircon drop stud earrings from GIVA.'],
        ['GIVA 925 Silver Jewellery Gifts Earrings', 3999, 7499, 'earring images/5.jpg', 'earrings', 'in-stock', 130, '2026-05-18', 1, 12, 'Beautiful silver earrings set by Giva.'],
        ['I Jewels 18Kt Gold Plated Stud Earrings', 2399, 5499, 'earring images/6.jpg', 'earrings', 'in-stock', 160, '2026-05-18', 1, 18, 'Gold plated classic studs.'],
        ['Luxury Pearl Necklace', 5299, 9999, 'necklace images/10.jpg', 'necklace', 'in-stock', 110, '2026-05-05', 0, 6, 'Exquisite luxury pearl necklace for special occasions.'],
        ['Elegant Gold Drops Necklace Set', 1299, 2499, 'necklace images/2.jpg', 'necklace', 'in-stock', 140, '2026-05-12', 0, 16, 'Elegant gold drops matching any necklace.'],
        ['Silver Diamond Pendant Necklace', 899, 1799, 'necklace images/3.jpg', 'necklace', 'in-stock', 90, '2026-05-01', 0, 14, 'Silver diamond pendant necklace.'],
        ['Charming Pearl Bracelet and Necklace Set', 599, 1199, 'necklace images/4.jpg', 'necklace', 'in-stock', 210, '2026-05-14', 1, 11, 'Charming pearl bracelet.'],
        ['Vintage Gold Chain Necklace', 2999, 5999, 'necklace images/5.jpg', 'necklace', 'out-of-stock', 75, '2026-05-08', 0, 0, 'Vintage-styled gold chain necklace.']
    ];

    foreach ($default_products as $p) {
        $name = mysqli_real_escape_string($con, $p[0]);
        $price = $p[1];
        $orig_price = $p[2] ? $p[2] : 'NULL';
        $image = mysqli_real_escape_string($con, $p[3]);
        $collection = mysqli_real_escape_string($con, $p[4]);
        $avail = mysqli_real_escape_string($con, $p[5]);
        $sales = $p[6];
        $date = $p[7];
        $feat = $p[8];
        $stock = $p[9];
        $desc = mysqli_real_escape_string($con, $p[10]);

        mysqli_query($con, "INSERT INTO `store_products` (name, price, original_price, image, collection, availability, sales, date, featured, stock, description) VALUES ('$name', $price, $orig_price, '$image', '$collection', '$avail', $sales, '$date', $feat, $stock, '$desc')");
    }
}

// ----------------------------------------------------
// AJAX HANDLER ENDPOINTS
// ----------------------------------------------------
if (isset($_GET['ajax'])) {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized admin access']);
        exit();
    }

    header('Content-Type: application/json');
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action === 'get_stats') {
        // Total revenue
        $revRes = mysqli_query($con1, "SELECT SUM(total_amount) as total FROM checkout WHERE status != 'Cancelled'");
        $revRow = mysqli_fetch_assoc($revRes);
        $totalRevenue = (float)$revRow['total'];

        // Total products count
        $prodRes = mysqli_query($con, "SELECT COUNT(*) as count FROM store_products");
        $prodRow = mysqli_fetch_assoc($prodRes);
        $totalProducts = (int)$prodRow['count'];

        // Low stock count (stock < 5)
        $stockRes = mysqli_query($con, "SELECT COUNT(*) as count FROM store_products WHERE stock < 5");
        $stockRow = mysqli_fetch_assoc($stockRes);
        $lowStock = (int)$stockRow['count'];

        // Total orders count
        $orderRes = mysqli_query($con1, "SELECT COUNT(*) as count FROM checkout");
        $orderRow = mysqli_fetch_assoc($orderRes);
        $totalOrders = (int)$orderRow['count'];

        // Total contact messages count
        $contactRes = mysqli_query($con_contact, "SELECT COUNT(*) as count FROM contactid");
        $contactRow = mysqli_fetch_assoc($contactRes);
        $totalContacts = $contactRow ? (int)$contactRow['count'] : 0;

        // Category breakdown for charts
        $catRes = mysqli_query($con, "SELECT collection, SUM(price * sales) as sales_val FROM store_products GROUP BY collection");
        $categories = [];
        $sales_values = [];
        while ($r = mysqli_fetch_assoc($catRes)) {
            $categories[] = ucfirst($r['collection']);
            $sales_values[] = (float)$r['sales_val'];
        }

        echo json_encode([
            'revenue' => $totalRevenue,
            'products' => $totalProducts,
            'low_stock' => $lowStock,
            'orders' => $totalOrders,
            'contacts' => $totalContacts,
            'chart' => [
                'labels' => $categories,
                'data' => $sales_values
            ]
        ]);
        exit();
    }

    if ($action === 'get_products') {
        $res = mysqli_query($con, "SELECT * FROM store_products ORDER BY id DESC");
        $productsList = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $productsList[] = $row;
        }
        echo json_encode($productsList);
        exit();
    }

    if ($action === 'save_product') {
        $id = isset($_POST['id']) && !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        $price = (float)$_POST['price'];
        $original_price = !empty($_POST['original_price']) ? (float)$_POST['original_price'] : 'NULL';
        $stock = (int)$_POST['stock'];
        $featured = isset($_POST['featured']) ? (int)$_POST['featured'] : 0;
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $availability = $stock > 0 ? 'in-stock' : 'out-of-stock';

        // Image handler
        $image = isset($_POST['image_path']) ? trim($_POST['image_path']) : '';
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image_file']['tmp_name'];
            $fileName = $_FILES['image_file']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = 'uploads/';
            if (!file_exists($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
            $dest_path = $uploadFileDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $image = $dest_path;
            }
        }

        if (empty($image)) {
            $image = 'images/10.jpg'; // fallback
        }

        $image_escaped = mysqli_real_escape_string($con, $image);

        if ($id) {
            $query = "UPDATE store_products SET 
                        name = '$name', 
                        collection = '$category', 
                        price = $price, 
                        original_price = $original_price, 
                        stock = $stock, 
                        availability = '$availability', 
                        featured = $featured, 
                        image = '$image_escaped',
                        description = '$description' 
                      WHERE id = $id";
        } else {
            $date = date('Y-m-d');
            $query = "INSERT INTO store_products (name, collection, price, original_price, stock, availability, featured, image, description, date, sales) VALUES ('$name', '$category', $price, $original_price, $stock, '$availability', $featured, '$image_escaped', '$description', '$date', 0)";
        }

        if (mysqli_query($con, $query)) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => mysqli_error($con)]);
        }
        exit();
    }

    if ($action === 'delete_product') {
        $id = (int)$_GET['id'];
        $query = "DELETE FROM store_products WHERE id = $id";
        if (mysqli_query($con, $query)) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => mysqli_error($con)]);
        }
        exit();
    }

    if ($action === 'get_orders') {
        $res = mysqli_query($con1, "SELECT * FROM checkout ORDER BY order_date DESC");
        $ordersList = [];
        while ($order = mysqli_fetch_assoc($res)) {
            $orderNum = $order['order_number'];
            $itemQuery = "SELECT * FROM order_items WHERE order_number = '$orderNum'";
            $itemRes = mysqli_query($con1, $itemQuery);
            $items = [];
            while ($item = mysqli_fetch_assoc($itemRes)) {
                $items[] = $item;
            }
            $order['items'] = $items;
            $ordersList[] = $order;
        }
        echo json_encode($ordersList);
        exit();
    }

    if ($action === 'update_order_status') {
        $order_number = mysqli_real_escape_string($con1, $_POST['order_number']);
        $status = mysqli_real_escape_string($con1, $_POST['status']);
        $query = "UPDATE checkout SET status = '$status' WHERE order_number = '$order_number'";
        if (mysqli_query($con1, $query)) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => mysqli_error($con1)]);
        }
        exit();
    }

    if ($action === 'get_customers') {
        $res = mysqli_query($conn, "SELECT id, username, first_name, last_name, email, created_at FROM u3 ORDER BY id DESC");
        $customersList = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $email = mysqli_real_escape_string($con1, $row['email']);
            // count total spent
            $spendRes = mysqli_query($con1, "SELECT COUNT(*) as ord_count, SUM(total_amount) as spent FROM checkout WHERE customer_email = '$email'");
            $spendRow = mysqli_fetch_assoc($spendRes);
            $row['orders'] = (int)$spendRow['ord_count'];
            $row['spent'] = (float)$spendRow['spent'];
            $customersList[] = $row;
        }
        echo json_encode($customersList);
        exit();
    }

    if ($action === 'delete_customer') {
        $id = (int)$_GET['id'];
        $query = "DELETE FROM u3 WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => mysqli_error($conn)]);
        }
        exit();
    }

    if ($action === 'get_contacts') {
        $res = mysqli_query($con_contact, "SELECT * FROM contactid ORDER BY id DESC");
        $contactsList = [];
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $contactsList[] = $row;
            }
        }
        echo json_encode($contactsList);
        exit();
    }

    if ($action === 'delete_contact') {
        $id = (int)$_GET['id'];
        $query = "DELETE FROM contactid WHERE id = $id";
        if (mysqli_query($con_contact, $query)) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => mysqli_error($con_contact)]);
        }
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SISTARA Jewels | Premium Admin Panel</title>
    <!-- Google Fonts + Font Awesome Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js for analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --brand-gold: #c5a26b;
            --brand-gold-dark: #b68b40;
            --brand-burgundy: #954D59;
            --bg-neutral: #faf7f2;
            --surface-white: #ffffff;
            --text-dark: #1e1a15;
            --text-muted: #7e6952;
            --border-light: #f0e4d0;
            --border-accent: #eadbc8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: var(--bg-neutral);
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ----------------------------------------------------
           LOGIN SCREEN
           ---------------------------------------------------- */
        .login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1e1a15 0%, #3a3229 100%);
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 32px;
            width: 100%;
            max-width: 440px;
            padding: 40px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .login-logo {
            color: var(--brand-gold);
            font-size: 2.2rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #d9b382;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 35px;
        }

        .login-card label {
            display: block;
            text-align: left;
            color: #eadbc8;
            font-size: 0.9rem;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .login-input-group {
            margin-bottom: 22px;
            position: relative;
        }

        .login-input-group input {
            width: 100%;
            padding: 14px 20px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 50px;
            color: white;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s;
        }

        .login-input-group input:focus {
            border-color: var(--brand-gold);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 15px rgba(197, 162, 107, 0.2);
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--brand-gold-dark) 0%, var(--brand-gold) 100%);
            border: none;
            border-radius: 50px;
            color: #1e1a15;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 8px 20px rgba(197, 162, 107, 0.3);
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(197, 162, 107, 0.45);
        }

        .login-error {
            background: rgba(255, 82, 82, 0.15);
            border: 1px solid rgba(255, 82, 82, 0.3);
            color: #ff8a8a;
            border-radius: 12px;
            padding: 12px;
            font-size: 0.9rem;
            margin-bottom: 24px;
        }

        /* ----------------------------------------------------
           MAIN PANEL LAYOUT
           ---------------------------------------------------- */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 280px;
            background: var(--surface-white);
            border-right: 1px solid var(--border-light);
            box-shadow: 0 0 20px rgba(0,0,0,0.01);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .logo-area {
            padding: 30px 24px;
            border-bottom: 1px solid #fcf6ec;
            margin-bottom: 25px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .logo-area h2 {
            font-size: 1.8rem;
            font-weight: 600;
            background: linear-gradient(135deg, var(--brand-gold-dark) 0%, var(--brand-burgundy) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-area span {
            font-size: 0.75rem;
            color: var(--brand-gold-dark);
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .nav-links {
            flex: 1;
            padding: 0 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 20px;
            border-radius: 16px;
            font-weight: 500;
            color: var(--text-dark);
            transition: all 0.3s;
            cursor: pointer;
            font-size: 0.95rem;
            text-decoration: none;
        }

        .nav-item i {
            width: 24px;
            font-size: 1.2rem;
            color: var(--brand-gold-dark);
        }

        .nav-item.active {
            background: #fdf5e8;
            color: #9d6f38;
            box-shadow: inset 0 0 0 1px #f5e2ca;
            font-weight: 600;
        }

        .nav-item.active i {
            color: var(--brand-gold-dark);
        }

        .nav-item:hover:not(.active) {
            background: #fbf9f5;
        }

        .nav-logout {
            margin-top: auto;
            border-top: 1px solid var(--border-light);
            padding: 20px 16px;
        }

        /* MAIN CONTENT AREA */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px 40px;
            width: calc(100% - 280px);
            transition: all 0.3s ease;
        }

        /* TOP BAR */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title h1 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-dark);
            letter-spacing: -0.5px;
        }

        .page-title p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: 4px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--surface-white);
            padding: 10px 24px;
            border-radius: 50px;
            border: 1px solid var(--border-light);
            box-shadow: 0 4px 10px rgba(0,0,0,0.01);
        }

        .admin-profile i {
            color: var(--brand-gold-dark);
            font-size: 1.1rem;
        }

        .admin-profile span {
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* STATS CARDS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--surface-white);
            border-radius: 24px;
            padding: 24px;
            border: 1px solid var(--border-light);
            box-shadow: 0 8px 30px rgba(0,0,0,0.015);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-info h3 {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: 8px;
            font-weight: 600;
        }

        .stat-number {
            font-size: 2.1rem;
            font-weight: 700;
            color: var(--text-dark);
            letter-spacing: -1px;
        }

        .stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #fdf5e8;
            color: var(--brand-gold-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .stat-card:nth-child(2) .stat-icon { background: #fbf0f2; color: var(--brand-burgundy); }
        .stat-card:nth-child(3) .stat-icon { background: #eefdf5; color: #27ae60; }
        .stat-card:nth-child(4) .stat-icon { background: #f0f7fe; color: #2980b9; }

        /* SECTION CARDS */
        .section-card {
            background: var(--surface-white);
            border-radius: 24px;
            border: 1px solid var(--border-light);
            padding: 28px;
            margin-bottom: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.01);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .section-header h2 {
            font-size: 1.35rem;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-header h2 i {
            color: var(--brand-gold-dark);
        }

        /* PREMIUM BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .btn-gold {
            background: #fdf5e8;
            border: 1px solid #f2dfc5;
            color: var(--brand-gold-dark);
        }

        .btn-gold:hover {
            background: #f9eccf;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--brand-gold-dark) 0%, var(--brand-gold) 100%);
            color: #1e1a15;
            box-shadow: 0 4px 12px rgba(197, 162, 107, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(197, 162, 107, 0.35);
        }

        .btn-danger {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            color: #e53e3e;
        }

        .btn-danger:hover {
            background: #fed7d7;
        }

        /* TABLES */
        .table-responsive {
            overflow-x: auto;
            width: 100%;
            margin-top: 10px;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .admin-table th {
            padding: 14px 16px;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1.5px solid var(--border-light);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .admin-table td {
            padding: 16px;
            border-bottom: 1px solid #fbf9f5;
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .admin-table tbody tr:hover {
            background: #fafaf9;
        }

        .product-badge {
            background: #fcf4e8;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--brand-gold-dark);
            text-transform: capitalize;
        }

        .stock-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .stock-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .stock-dot.in-stock { background: #2ecc71; }
        .stock-dot.low-stock { background: #e67e22; }
        .stock-dot.out-of-stock { background: #e74c3c; }

        .table-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid var(--border-light);
            background: var(--bg-neutral);
        }

        .action-btns {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid var(--border-light);
            background: var(--surface-white);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--text-dark);
        }

        .action-btn:hover {
            background: #fdfaf6;
            color: var(--brand-gold-dark);
            border-color: #f2dfc5;
        }

        .action-btn.delete:hover {
            background: #fff5f5;
            color: #e53e3e;
            border-color: #fed7d7;
        }

        /* MODAL DIALOGS */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 26, 21, 0.4);
            backdrop-filter: blur(4px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-backdrop.active {
            display: flex;
            opacity: 1;
        }

        .modal-window {
            background: var(--surface-white);
            border-radius: 30px;
            width: 90%;
            max-width: 560px;
            padding: 35px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid var(--border-accent);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .modal-backdrop.active .modal-window {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .modal-header h3 {
            font-size: 1.45rem;
            font-weight: 600;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.3rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: color 0.2s;
        }

        .close-modal:hover {
            color: var(--text-dark);
        }

        .form-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-row .form-group {
            flex: 1;
            min-width: 180px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 18px;
            border: 1px solid #e2cfb5;
            border-radius: 16px;
            font-size: 0.95rem;
            outline: none;
            background: #fffdfc;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--brand-gold-dark);
            box-shadow: 0 0 0 3px rgba(197, 162, 107, 0.15);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        /* Order items list in orders view */
        .order-products-list {
            margin-top: 15px;
            background: #fbfaf8;
            border-radius: 16px;
            padding: 16px;
            border: 1px solid var(--border-light);
        }

        .order-product-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f5eee4;
        }

        .order-product-row:last-child {
            border-bottom: none;
        }

        .order-product-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
            }
            .sidebar .logo-area h2 span,
            .sidebar .logo-area h2 text,
            .sidebar .logo-area span,
            .sidebar .nav-item span {
                display: none;
            }
            .sidebar .logo-area {
                padding: 20px;
                align-items: center;
                margin-bottom: 15px;
            }
            .sidebar .logo-area h2 {
                font-size: 1.5rem;
            }
            .sidebar .nav-item {
                justify-content: center;
                padding: 14px;
            }
            .main-content {
                margin-left: 80px;
                width: calc(100% - 80px);
                padding: 24px;
            }
        }

        @media (max-width: 768px) {
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
            }
            .admin-profile {
                width: 100%;
                justify-content: center;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<?php if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true): ?>
    <!-- LOGIN PAGE -->
    <div class="login-wrapper">
        <div class="login-card">
            <h1 class="login-logo"><i class="fas fa-gem"></i>Sistara</h1>
            <p class="login-subtitle">Admin Control Panel</p>

            <?php if (isset($login_error)): ?>
                <div class="login-error"><?php echo $login_error; ?></div>
            <?php endif; ?>

            <form method="POST" action="admin.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="login-input-group">
                        <input type="text" id="username" name="username" required placeholder="admin" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="login-input-group">
                        <input type="password" id="password" name="password" required placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" name="login" class="login-btn">Log In</button>
            </form>
        </div>
    </div>
<?php else: ?>
    <!-- ADMIN PANEL WRAPPER -->
    <div class="admin-wrapper">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="logo-area">
                <h2><i class="fas fa-gem"></i><span>SISTARA</span></h2>
                <span>Jewels Manager</span>
            </div>
            <nav class="nav-links">
                <a href="#" class="nav-item active" data-tab="dashboard">
                    <i class="fas fa-chart-line"></i><span>Dashboard</span>
                </a>
                <a href="#" class="nav-item" data-tab="products">
                    <i class="fas fa-ring"></i><span>Products</span>
                </a>
                <a href="#" class="nav-item" data-tab="orders">
                    <i class="fas fa-shopping-bag"></i><span>Orders</span>
                </a>
                <a href="#" class="nav-item" data-tab="customers">
                    <i class="fas fa-users"></i><span>VIP Clients</span>
                </a>
                <a href="#" class="nav-item" data-tab="contacts">
                    <i class="fas fa-envelope"></i><span>Contact Messages</span>
                </a>
            </nav>
            <div class="nav-logout">
                <a href="admin.php?logout=1" class="nav-item" style="color: #e53e3e;">
                    <i class="fas fa-right-from-bracket" style="color: #e53e3e;"></i><span>Sign Out</span>
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <div id="viewContainer">
                <!-- Dynamically loaded views -->
            </div>
        </main>
    </div>

    <!-- PRODUCT MODAL -->
    <div class="modal-backdrop" id="productModal">
        <div class="modal-window">
            <div class="modal-header">
                <h3 id="modalTitle">Add New Jewel</h3>
                <button class="close-modal" onclick="closeProductModal()"><i class="fas fa-times"></i></button>
            </div>
            <form id="productForm" enctype="multipart/form-data">
                <input type="hidden" name="id" id="prodId">
                
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="name" id="prodName" class="form-control" required placeholder="e.g., Clara 925 Sterling Silver Ring">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="prodCategory" class="form-control">
                            <option value="rings">Rings</option>
                            <option value="earrings">Earrings</option>
                            <option value="bracelets">Bracelets</option>
                            <option value="necklace">Necklaces</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stock Count</label>
                        <input type="number" name="stock" id="prodStock" class="form-control" required min="0" placeholder="10">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Selling Price (₹)</label>
                        <input type="number" step="0.01" name="price" id="prodPrice" class="form-control" required placeholder="1499.00">
                    </div>
                    <div class="form-group">
                        <label>Original Price (₹ - optional)</label>
                        <input type="number" step="0.01" name="original_price" id="prodOriginalPrice" class="form-control" placeholder="2999.00">
                    </div>
                </div>

                <div class="form-group">
                    <label>Image Source Option</label>
                    <div style="display:flex; gap: 15px; margin-bottom: 10px;">
                        <label style="font-size: 0.85rem;"><input type="radio" name="img_type" value="path" checked onclick="toggleImageSource('path')"> Image Path/URL</label>
                        <label style="font-size: 0.85rem;"><input type="radio" name="img_type" value="file" onclick="toggleImageSource('file')"> Upload File</label>
                    </div>
                    <div id="imagePathGroup">
                        <input type="text" name="image_path" id="prodImagePath" class="form-control" placeholder="e.g., ring images/1.jpg">
                    </div>
                    <div id="imageFileGroup" style="display: none;">
                        <input type="file" name="image_file" id="prodImageFile" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="prodDescription" class="form-control" placeholder="Describe the jewel craftsmanship..."></textarea>
                </div>

                <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="featured" id="prodFeatured" value="1" style="width: 18px; height: 18px; cursor: pointer;">
                    <label for="prodFeatured" style="margin-bottom: 0; cursor: pointer;">Featured Product (Display on Home page)</label>
                </div>

                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 25px;">
                    <button type="button" class="btn btn-gold" onclick="closeProductModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Jewel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- CONTACT MESSAGE DETAIL MODAL -->
    <div class="modal-backdrop" id="contactModal">
        <div class="modal-window" style="max-width: 600px;">
            <div class="modal-header">
                <h3>Contact Message Details</h3>
                <button class="close-modal" onclick="closeContactModal()"><i class="fas fa-times"></i></button>
            </div>
            <div style="margin-top: 10px;">
                <div class="form-group">
                    <label>Sender Name</label>
                    <div id="contactMsgName" class="form-control" style="background:#fcf6ec; font-weight:600; border-color:#eadbc8;"></div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address</label>
                        <div id="contactMsgEmail" class="form-control" style="background:#fcf6ec; border-color:#eadbc8;"></div>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div id="contactMsgPhone" class="form-control" style="background:#fcf6ec; border-color:#eadbc8;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Message Content</label>
                    <div id="contactMsgText" class="form-control" style="background:#fffdfc; min-height: 120px; white-space: pre-wrap; line-height: 1.6; border-color:#e2cfb5; max-height: 250px; overflow-y: auto;"></div>
                </div>
            </div>
            <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 25px;">
                <button type="button" class="btn btn-gold" onclick="closeContactModal()">Close</button>
                <button type="button" id="contactModalDeleteBtn" class="btn btn-danger"><i class="fas fa-trash-can"></i> Delete</button>
            </div>
        </div>
    </div>

    <!-- JS DASHBOARD SPA -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            initNav();
            loadView('dashboard');
        });

        // SPA Navigation
        function initNav() {
            document.querySelectorAll(".nav-item").forEach(item => {
                item.addEventListener("click", (e) => {
                    const tab = item.getAttribute("data-tab");
                    if (!tab) return;
                    e.preventDefault();

                    document.querySelectorAll(".nav-item").forEach(i => i.classList.remove("active"));
                    item.classList.add("active");

                    loadView(tab);
                });
            });
        }

        // View Router
        function loadView(tab) {
            const container = document.getElementById("viewContainer");
            if (tab === 'dashboard') {
                container.innerHTML = `
                    <div class="top-bar">
                        <div class="page-title">
                            <h1>Executive Dashboard</h1>
                            <p>Overview of Lumière sales performance & analytics</p>
                        </div>
                        <div class="admin-profile">
                            <i class="fas fa-user-tie"></i>
                            <span>Jewel Director</span>
                        </div>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-info">
                                <h3>Total Revenue</h3>
                                <div class="stat-number" id="statRevenue">₹0</div>
                            </div>
                            <div class="stat-icon"><i class="fas fa-wallet"></i></div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-info">
                                <h3>Products Count</h3>
                                <div class="stat-number" id="statProducts">0</div>
                            </div>
                            <div class="stat-icon"><i class="fas fa-ring"></i></div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-info">
                                <h3>Low Stock</h3>
                                <div class="stat-number" id="statLowStock">0</div>
                            </div>
                            <div class="stat-icon"><i class="fas fa-triangle-exclamation"></i></div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-info">
                                <h3>Total Orders</h3>
                                <div class="stat-number" id="statOrders">0</div>
                            </div>
                            <div class="stat-icon"><i class="fas fa-shopping-bag"></i></div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-info">
                                <h3>New Messages</h3>
                                <div class="stat-number" id="statContacts">0</div>
                            </div>
                            <div class="stat-icon"><i class="fas fa-envelope"></i></div>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 24px; margin-bottom: 40px; flex-wrap: wrap;">
                        <div class="section-card" style="margin-bottom: 0;">
                            <div class="section-header">
                                <h2><i class="fas fa-chart-line"></i> Category Revenue Breakdown</h2>
                            </div>
                            <div style="position: relative; height: 280px; width: 100%;">
                                <canvas id="revenueChartCanvas"></canvas>
                            </div>
                        </div>
                        <div class="section-card" style="margin-bottom: 0; display: flex; flex-direction: column;">
                            <div class="section-header">
                                <h2><i class="fas fa-bolt"></i> Quick Actions</h2>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 12px; flex: 1; justify-content: center;">
                                <button class="btn btn-primary" onclick="document.querySelector(\'[data-tab=products]\').click()" style="width: 100%; justify-content: center; height: 50px;"><i class="fas fa-plus"></i> Add New Jewel</button>
                                <button class="btn btn-gold" onclick="document.querySelector(\'[data-tab=orders]\').click()" style="width: 100%; justify-content: center; height: 50px;"><i class="fas fa-boxes-packing"></i> Process Orders</button>
                                <button class="btn btn-gold" onclick="document.querySelector(\'[data-tab=contacts]\').click()" style="width: 100%; justify-content: center; height: 50px; background: #fbf0f2; border-color: #f5e2ca; color: var(--brand-burgundy);"><i class="fas fa-envelope"></i> View Messages</button>
                            </div>
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-header">
                            <h2><i class="fas fa-clock"></i> Recent Customer Orders</h2>
                            <button class="btn btn-gold" onclick="document.querySelector(\'[data-tab=orders]\').click()">View All Orders</button>
                        </div>
                        <div class="table-responsive" id="recentOrdersContainer">
                            <p style="text-align: center; padding: 20px;">Loading orders...</p>
                        </div>
                    </div>
                `;
                fetchDashboardStats();
            } else if (tab === 'products') {
                container.innerHTML = `
                    <div class="top-bar">
                        <div class="page-title">
                            <h1>Jewellery Inventory</h1>
                            <p>Manage store collections, pricing, & stock levels</p>
                        </div>
                        <button class="btn btn-primary" onclick="openProductModal()"><i class="fas fa-plus"></i> Add Product</button>
                    </div>

                    <div class="section-card">
                        <div class="section-header">
                            <h2><i class="fas fa-list"></i> Catalog Listing</h2>
                        </div>
                        <div class="table-responsive" id="productsTableContainer">
                            <p style="text-align: center; padding: 20px;">Loading products...</p>
                        </div>
                    </div>
                `;
                fetchProducts();
            } else if (tab === 'orders') {
                container.innerHTML = `
                    <div class="top-bar">
                        <div class="page-title">
                            <h1>Orders & Shipments</h1>
                            <p>Fulfill client purchases and coordinate shipping</p>
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-header">
                            <h2><i class="fas fa-boxes-stacked"></i> Sales Invoices</h2>
                        </div>
                        <div class="table-responsive" id="ordersTableContainer">
                            <p style="text-align: center; padding: 20px;">Loading invoices...</p>
                        </div>
                    </div>
                `;
                fetchOrders();
            } else if (tab === 'customers') {
                container.innerHTML = `
                    <div class="top-bar">
                        <div class="page-title">
                            <h1>VIP Clients Directory</h1>
                            <p>Registered client loyalty profiles & shopping history</p>
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-header">
                            <h2><i class="fas fa-users-viewfinder"></i> User Base</h2>
                        </div>
                        <div class="table-responsive" id="customersTableContainer">
                            <p style="text-align: center; padding: 20px;">Loading profiles...</p>
                        </div>
                    </div>
                `;
                fetchCustomers();
            } else if (tab === 'contacts') {
                container.innerHTML = `
                    <div class="top-bar">
                        <div class="page-title">
                            <h1>Contact Messages</h1>
                            <p>Read and manage messages submitted by website visitors</p>
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <h2><i class="fas fa-envelope-open-text"></i> Message Box</h2>
                            <div style="position: relative; width: 100%; max-width: 300px;">
                                <i class="fas fa-search" style="position: absolute; left: 15px; top: 12px; color: var(--brand-gold-dark);"></i>
                                <input type="text" id="contactSearchInput" placeholder="Search sender or message..." class="form-control" style="padding-left: 40px; border-radius: 50px; font-size: 0.85rem; height: 38px;">
                            </div>
                        </div>
                        <div class="table-responsive" id="contactsTableContainer">
                            <p style="text-align: center; padding: 20px;">Loading messages...</p>
                        </div>
                    </div>
                `;
                fetchContacts();
            }
        }

        // Fetch dashboard stats
        function fetchDashboardStats() {
            fetch("admin.php?ajax=1&action=get_stats")
                .then(res => res.json())
                .then(data => {
                    document.getElementById("statRevenue").innerText = "₹" + data.revenue.toLocaleString('en-IN', {minimumFractionDigits: 2});
                    document.getElementById("statProducts").innerText = data.products;
                    document.getElementById("statLowStock").innerText = data.low_stock;
                    document.getElementById("statOrders").innerText = data.orders;
                    if (document.getElementById("statContacts")) {
                        document.getElementById("statContacts").innerText = data.contacts || 0;
                    }

                    // Chart rendering
                    const ctx = document.getElementById('revenueChartCanvas').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.chart.labels,
                            datasets: [{
                                label: 'Category Gross Valuation (₹)',
                                data: data.chart.data,
                                backgroundColor: ['#b68b40', '#954D59', '#3a3229', '#c5a26b'],
                                borderRadius: 12
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: false }
                            },
                            scales: {
                                y: {
                                    grid: { color: 'rgba(0, 0, 0, 0.05)' },
                                    ticks: { color: '#7e6952' }
                                },
                                x: {
                                    grid: { display: false },
                                    ticks: { color: '#7e6952' }
                                }
                            }
                        }
                    });
                });

            // Fetch recent 4 orders
            fetch("admin.php?ajax=1&action=get_orders")
                .then(res => res.json())
                .then(orders => {
                    const container = document.getElementById("recentOrdersContainer");
                    const recent = orders.slice(0, 4);
                    if (recent.length === 0) {
                        container.innerHTML = `<p style="text-align:center; padding: 20px;">No recent orders found</p>`;
                        return;
                    }

                    let html = `<table class="admin-table">
                        <thead>
                            <tr><th>Order ID</th><th>Client</th><th>Date</th><th>Amount</th><th>Status</th></tr>
                        </thead>
                        <tbody>`;
                    recent.forEach(o => {
                        let statusColor = '#e67e22'; // Pending
                        if(o.status === 'Shipped') statusColor = '#2980b9';
                        else if(o.status === 'Delivered') statusColor = '#27ae60';
                        else if(o.status === 'Cancelled') statusColor = '#c0392b';

                        html += `<tr>
                            <td><strong>${o.order_number}</strong></td>
                            <td>${o.customer_name}</td>
                            <td>${new Date(o.order_date).toLocaleDateString('en-IN', {day: 'numeric', month: 'short', year: 'numeric'})}</td>
                            <td><strong>₹${parseFloat(o.total_amount).toLocaleString('en-IN', {minimumFractionDigits: 2})}</strong></td>
                            <td><span style="font-weight:700; color:${statusColor}">${o.status}</span></td>
                        </tr>`;
                    });
                    html += `</tbody></table>`;
                    container.innerHTML = html;
                });
        }

        // Fetch products list
        function fetchProducts() {
            fetch("admin.php?ajax=1&action=get_products")
                .then(res => res.json())
                .then(products => {
                    const container = document.getElementById("productsTableContainer");
                    if (products.length === 0) {
                        container.innerHTML = `<p style="text-align:center; padding: 20px;">No products found</p>`;
                        return;
                    }

                    let html = `<table class="admin-table">
                        <thead>
                            <tr><th>Preview</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Featured</th><th>Actions</th></tr>
                        </thead>
                        <tbody>`;
                    products.forEach(p => {
                        const original = p.original_price ? `₹${parseFloat(p.original_price).toLocaleString('en-IN')}` : '-';
                        const isFeat = p.featured == 1 ? '<i class="fas fa-check-circle" style="color:#27ae60;"></i>' : '-';
                        let stockClass = 'in-stock';
                        if (p.stock == 0) stockClass = 'out-of-stock';
                        else if (p.stock < 5) stockClass = 'low-stock';

                        html += `<tr>
                            <td><img src="${p.image}" class="table-img" onerror="this.src='images/10.jpg'"></td>
                            <td><strong>${p.name}</strong></td>
                            <td><span class="product-badge">${p.collection}</span></td>
                            <td>
                                <div><strong>₹${parseFloat(p.price).toLocaleString('en-IN')}</strong></div>
                                <div style="font-size:0.75rem; color:#a18c76;">Orig: ${original}</div>
                            </td>
                            <td>
                                <div class="stock-indicator">
                                    <span class="stock-dot ${stockClass}"></span>
                                    <span>${p.stock} units</span>
                                </div>
                            </td>
                            <td style="text-align: center;">${isFeat}</td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn" onclick="openProductModal(${p.id}, '${escapeQuote(p.name)}', '${p.collection}', ${p.price}, ${p.original_price || "''"}, ${p.stock}, ${p.featured}, '${p.image}', '${escapeQuote(p.description || "")}')" title="Edit"><i class="fas fa-pen"></i></button>
                                    <button class="action-btn delete" onclick="deleteProduct(${p.id})" title="Delete"><i class="fas fa-trash-can"></i></button>
                                </div>
                            </td>
                        </tr>`;
                    });
                    html += `</tbody></table>`;
                    container.innerHTML = html;
                });
        }

        // Fetch registered orders
        function fetchOrders() {
            fetch("admin.php?ajax=1&action=get_orders")
                .then(res => res.json())
                .then(orders => {
                    const container = document.getElementById("ordersTableContainer");
                    if (orders.length === 0) {
                        container.innerHTML = `<p style="text-align:center; padding: 20px;">No invoices found</p>`;
                        return;
                    }

                    let html = `<table class="admin-table">
                        <thead>
                            <tr><th>Order Invoice</th><th>Customer Details</th><th>Items Count</th><th>Invoice Amount</th><th>Shipment Status</th></tr>
                        </thead>
                        <tbody>`;
                    orders.forEach(o => {
                        let totalItems = o.items.reduce((s, i) => s + parseInt(i.product_quantity), 0);
                        
                        let itemsHtml = `<div class="order-products-list">`;
                        o.items.forEach(item => {
                            let imgStr = item.product_image && item.product_image.length < 300 ? item.product_image : 'images/10.jpg';
                            itemsHtml += `
                                <div class="order-product-row">
                                    <div class="order-product-info">
                                        <img src="${imgStr}" style="width:36px; height:36px; object-fit:cover; border-radius:6px;">
                                        <span style="font-size:0.85rem; font-weight:600;">${item.product_name}</span>
                                    </div>
                                    <span style="font-size:0.85rem; color:#7e6952;">Qty: ${item.product_quantity} × ₹${parseFloat(item.product_price).toLocaleString('en-IN')}</span>
                                </div>
                            `;
                        });
                        itemsHtml += `</div>`;

                        html += `<tr>
                            <td>
                                <div><strong>${o.order_number}</strong></div>
                                <div style="font-size:0.8rem; color:#958471; margin-top:2px;">📅 ${new Date(o.order_date).toLocaleString('en-IN')}</div>
                                <div style="font-size:0.8rem; color:#c5a26b; margin-top:2px;">💳 ${o.payment_method}</div>
                            </td>
                            <td>
                                <div><strong>${o.customer_name}</strong></div>
                                <div style="font-size:0.85rem; color:#7e6952;">${o.customer_email}</div>
                                <div style="font-size:0.8rem; color:#a18c76; margin-top:4px; max-width:280px; overflow:hidden; text-overflow:ellipsis;">📍 ${o.address}, ${o.city}, ${o.state} - ${o.pincode}</div>
                            </td>
                            <td>
                                <div><strong>${totalItems}</strong> items</div>
                                <span style="font-size:0.8rem; color:#954D59; cursor:pointer; text-decoration:underline;" onclick="toggleDetails('det_${o.order_number}')">View Items</span>
                            </td>
                            <td><strong>₹${parseFloat(o.total_amount).toLocaleString('en-IN', {minimumFractionDigits: 2})}</strong></td>
                            <td>
                                <select class="form-control" style="width:140px; padding: 6px 12px; border-radius:50px; font-weight:600;" onchange="updateOrderStatus('${o.order_number}', this.value)">
                                    <option value="Pending" ${o.status === 'Pending' ? 'selected' : ''}>Pending</option>
                                    <option value="Processing" ${o.status === 'Processing' ? 'selected' : ''}>Processing</option>
                                    <option value="Shipped" ${o.status === 'Shipped' ? 'selected' : ''}>Shipped</option>
                                    <option value="Delivered" ${o.status === 'Delivered' ? 'selected' : ''}>Delivered</option>
                                    <option value="Cancelled" ${o.status === 'Cancelled' ? 'selected' : ''}>Cancelled</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="det_${o.order_number}" style="display:none; background:#faf9f7;">
                            <td colspan="5" style="padding:0 24px 20px 24px;">
                                ${itemsHtml}
                            </td>
                        </tr>`;
                    });
                    html += `</tbody></table>`;
                    container.innerHTML = html;
                });
        }

        // Toggle details panel in order row
        function toggleDetails(id) {
            const el = document.getElementById(id);
            if(el.style.display === 'none') {
                el.style.display = 'table-row';
            } else {
                el.style.display = 'none';
            }
        }

        // Fetch registered customers list
        function fetchCustomers() {
            fetch("admin.php?ajax=1&action=get_customers")
                .then(res => res.json())
                .then(customers => {
                    const container = document.getElementById("customersTableContainer");
                    if (customers.length === 0) {
                        container.innerHTML = `<p style="text-align:center; padding: 20px;">No registered clients found</p>`;
                        return;
                    }

                    let html = `<table class="admin-table">
                        <thead>
                            <tr><th>VIP ID</th><th>Full Name</th><th>Username</th><th>Email Address</th><th>Orders Count</th><th>Total Spend</th><th>Registration Date</th><th>Actions</th></tr>
                        </thead>
                        <tbody>`;
                    customers.forEach(c => {
                        const name = (c.first_name || '') + ' ' + (c.last_name || '');
                        html += `<tr>
                            <td><strong>#${c.id}</strong></td>
                            <td><strong>${name.trim() ? name : 'Anonymous Client'}</strong></td>
                            <td>${c.username}</td>
                            <td>${c.email}</td>
                            <td><strong>${c.orders}</strong> invoices</td>
                            <td><strong>₹${c.spent.toLocaleString('en-IN', {minimumFractionDigits: 2})}</strong></td>
                            <td>${new Date(c.created_at).toLocaleDateString('en-IN')}</td>
                            <td>
                                <button class="action-btn delete" onclick="deleteCustomer(${c.id})" title="Delete Client"><i class="fas fa-user-xmark"></i></button>
                            </td>
                        </tr>`;
                    });
                    html += `</tbody></table>`;
                    container.innerHTML = html;
                });
        }

        // Fetch contact messages list
        let contactMessagesData = []; // Store messages data for frontend search
        function fetchContacts() {
            fetch("admin.php?ajax=1&action=get_contacts")
                .then(res => res.json())
                .then(contacts => {
                    contactMessagesData = contacts;
                    renderContactsTable(contacts);

                    // Attach search logic
                    const searchInput = document.getElementById("contactSearchInput");
                    if (searchInput) {
                        searchInput.addEventListener("input", (e) => {
                            const term = e.target.value.toLowerCase().trim();
                            if (!term) {
                                renderContactsTable(contactMessagesData);
                                return;
                            }
                            const filtered = contactMessagesData.filter(c => 
                                (c.name && c.name.toLowerCase().includes(term)) ||
                                (c.email && c.email.toLowerCase().includes(term)) ||
                                (c.phone && c.phone.toLowerCase().includes(term)) ||
                                (c.message && c.message.toLowerCase().includes(term))
                            );
                            renderContactsTable(filtered);
                        });
                    }
                });
        }

        // Render contacts list table helper
        function renderContactsTable(contacts) {
            const container = document.getElementById("contactsTableContainer");
            if (!container) return;
            
            if (contacts.length === 0) {
                container.innerHTML = `<p style="text-align:center; padding: 20px; color: var(--text-muted);">No contact messages found</p>`;
                return;
            }

            let html = `<table class="admin-table">
                <thead>
                    <tr><th>ID</th><th>Sender Name</th><th>Email</th><th>Phone</th><th>Message Snippet</th><th>Actions</th></tr>
                </thead>
                <tbody>`;
            contacts.forEach(c => {
                const snippet = c.message && c.message.length > 60 ? c.message.substring(0, 60) + "..." : (c.message || "");
                html += `<tr>
                    <td><strong>#${c.id}</strong></td>
                    <td><strong>${escapeHtml(c.name || 'Anonymous')}</strong></td>
                    <td><a href="mailto:${c.email}" style="color:var(--brand-burgundy); font-weight:500; text-decoration:none;">${c.email}</a></td>
                    <td>${c.phone || 'N/A'}</td>
                    <td><span style="color:#555; font-style:italic;">"${escapeHtml(snippet)}"</span></td>
                    <td>
                        <div class="action-btns">
                            <button class="action-btn" onclick="openContactModal(${c.id}, '${escapeQuote(c.name || '')}', '${c.email}', '${c.phone || ''}', '${escapeQuote(c.message || '')}')" title="Read Message"><i class="fas fa-envelope-open" style="color: var(--brand-gold-dark);"></i></button>
                            <button class="action-btn delete" onclick="deleteContact(${c.id})" title="Delete Message"><i class="fas fa-trash-can"></i></button>
                        </div>
                    </td>
                </tr>`;
            });
            html += `</tbody></table>`;
            container.innerHTML = html;
        }

        // Contact Modal Controllers
        function openContactModal(id, name, email, phone, message) {
            document.getElementById("contactMsgName").innerText = name || "Anonymous";
            document.getElementById("contactMsgEmail").innerText = email;
            document.getElementById("contactMsgPhone").innerText = phone || "N/A";
            document.getElementById("contactMsgText").innerText = message;
            
            const delBtn = document.getElementById("contactModalDeleteBtn");
            if (delBtn) {
                delBtn.onclick = () => {
                    deleteContact(id, true);
                };
            }

            document.getElementById("contactModal").classList.add("active");
        }

        // Close Contact Modal
        function closeContactModal() {
            document.getElementById("contactModal").classList.remove("active");
        }

        // AJAX Delete contact message
        function deleteContact(id, fromModal = false) {
            if (!confirm("Are you sure you want to permanently delete this message?")) return;
            fetch(`admin.php?ajax=1&action=delete_contact&id=${id}`)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        if (fromModal) closeContactModal();
                        
                        // If we are currently on the contacts tab, reload it
                        const activeItem = document.querySelector(".nav-item.active");
                        if (activeItem && activeItem.getAttribute("data-tab") === "contacts") {
                            fetchContacts();
                        } else if (activeItem && activeItem.getAttribute("data-tab") === "dashboard") {
                            fetchDashboardStats();
                        }
                    } else {
                        alert("Error: " + data.error);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("An error occurred while deleting the message.");
                });
        }

        // AJAX Save product
        document.getElementById("productForm").addEventListener("submit", (e) => {
            e.preventDefault();
            const form = document.getElementById("productForm");
            const formData = new FormData(form);

            fetch("admin.php?ajax=1&action=save_product", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert("Jewel saved successfully!");
                    closeProductModal();
                    fetchProducts();
                } else {
                    alert("Error: " + data.error);
                }
            })
            .catch(err => {
                console.error(err);
                alert("An error occurred while saving the product.");
            });
        });

        // AJAX Delete product
        function deleteProduct(id) {
            if (!confirm("Are you sure you want to permanently delete this jewel from catalog?")) return;
            fetch(`admin.php?ajax=1&action=delete_product&id=${id}`)
                .then(res => res.json())
                .then(data => {
                    if(data.success) {
                        fetchProducts();
                    } else {
                        alert("Error: " + data.error);
                    }
                });
        }

        // AJAX Delete customer
        function deleteCustomer(id) {
            if (!confirm("Are you sure you want to permanently delete this user account?")) return;
            fetch(`admin.php?ajax=1&action=delete_customer&id=${id}`)
                .then(res => res.json())
                .then(data => {
                    if(data.success) {
                        fetchCustomers();
                    } else {
                        alert("Error: " + data.error);
                    }
                });
        }

        // AJAX Update order status
        function updateOrderStatus(orderNum, status) {
            const formData = new FormData();
            formData.append('order_number', orderNum);
            formData.append('status', status);

            fetch("admin.php?ajax=1&action=update_order_status", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(!data.success) {
                    alert("Error: " + data.error);
                }
            });
        }

        // Product Modal Controllers
        function openProductModal(id = '', name = '', category = 'rings', price = '', originalPrice = '', stock = '10', featured = 0, image = '', description = '') {
            document.getElementById("prodId").value = id;
            document.getElementById("prodName").value = name;
            document.getElementById("prodCategory").value = category;
            document.getElementById("prodPrice").value = price;
            document.getElementById("prodOriginalPrice").value = originalPrice === 'NULL' ? '' : originalPrice;
            document.getElementById("prodStock").value = stock;
            document.getElementById("prodFeatured").checked = featured == 1;
            document.getElementById("prodImagePath").value = image;
            document.getElementById("prodDescription").value = description;
            
            // reset file select
            document.getElementById("prodImageFile").value = '';
            toggleImageSource('path');
            document.querySelector('input[name="img_type"][value="path"]').checked = true;

            document.getElementById("modalTitle").innerText = id ? "Modify Jewel Details" : "Add Exquisite Jewel";
            document.getElementById("productModal").classList.add("active");
        }

        function closeProductModal() {
            document.getElementById("productModal").classList.remove("active");
        }

        function toggleImageSource(type) {
            if (type === 'path') {
                document.getElementById("imagePathGroup").style.display = 'block';
                document.getElementById("imageFileGroup").style.display = 'none';
            } else {
                document.getElementById("imagePathGroup").style.display = 'none';
                document.getElementById("imageFileGroup").style.display = 'block';
            }
        }

        // Helper string escapes
        function escapeQuote(str) {
            return str.replace(/'/g, "\\'").replace(/"/g, '&quot;');
        }
        function escapeHtml(str) {
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }
    </script>
<?php endif; ?>
</body>
</html>