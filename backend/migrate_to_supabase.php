<?php
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/env_loader.php';
include 'p2.php'; // Defines $con (cart DB connecting to MySQL)

$supabase_url = getenv('NEXT_PUBLIC_SUPABASE_URL') ?: 'https://cxueyxqfsceuszteltol.supabase.co';
$supabase_key = getenv('NEXT_PUBLIC_SUPABASE_ANON_KEY') ?: 'sb_publishable_jUTioCpd4rLaQxPEBDY0ow_8qJdOSr3';

echo "<h2>Starting Supabase Product Migration...</h2>";

// 1. Fetch products from local MySQL database
$query = "SELECT * FROM store_products";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error fetching products from MySQL: " . mysqli_error($con));
}

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Format products for Supabase
    $products[] = [
        'name' => $row['name'],
        'price' => (float)$row['price'],
        'original_price' => isset($row['original_price']) ? (float)$row['original_price'] : null,
        'image' => $row['image'],
        'collection' => $row['collection'],
        'availability' => $row['availability'],
        'sales' => (int)$row['sales'],
        'featured' => (bool)$row['featured'],
        'stock' => isset($row['stock']) ? (int)$row['stock'] : 10,
        'description' => isset($row['description']) ? $row['description'] : ''
    ];
}

$total_products = count($products);
echo "Found " . $total_products . " products in local MySQL database.<br>";

if ($total_products === 0) {
    echo "No products found to migrate. Please seed your local WAMP database first.<br>";
    exit();
}

// 2. Push products to Supabase REST API via cURL
$url = rtrim($supabase_url, '/') . '/rest/v1/store_products';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($products));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . $supabase_key,
    'Authorization: Bearer ' . $supabase_key,
    'Content-Type: application/json',
    'Prefer: resolution=merge-duplicates'
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

if ($curl_error) {
    echo "<h3 style='color:red;'>cURL Error: " . $curl_error . "</h3>";
} else if ($http_code >= 200 && $http_code < 300) {
    echo "<h3 style='color:green;'>Migration Successful!</h3>";
    echo "Successfully migrated " . $total_products . " products to your Supabase cloud database!<br>";
    echo "Refresh your website at Vercel to see the products live.";
} else {
    echo "<h3 style='color:red;'>Failed to migrate products. Supabase API responded with Code " . $http_code . "</h3>";
    echo "Response: <pre>" . htmlspecialchars($response) . "</pre>";
    echo "<strong>Note:</strong> Make sure you have created the <code>store_products</code> table in your Supabase SQL Editor first.";
}
?>
