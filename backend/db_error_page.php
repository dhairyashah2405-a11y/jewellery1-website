<?php
// Custom .env loader to load configuration from root directory if it exists
$env_path = __DIR__ . '/../.env';
if (file_exists($env_path)) {
    $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (strpos($line, '#') === 0 || empty($line)) {
            continue;
        }
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            $value = trim($value, "\"'");
            if (!getenv($name) && !isset($_ENV[$name]) && !isset($_SERVER[$name])) {
                putenv("{$name}={$value}");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

if (!function_exists('show_db_error_page')) {
    function show_db_error_page($db_title, $error_msg, $host, $dbname) {
        // Set HTTP status code to 500 (Internal Server Error)
        http_response_code(500);
        
        $is_vercel = getenv('VERCEL') || (isset($_SERVER['VERCEL']) && $_SERVER['VERCEL']) || (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'vercel.app') !== false) || (isset($_SERVER['PWD']) && strpos($_SERVER['PWD'], '/var/task') !== false);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Database Connection Issue | SISTARA Jewels</title>
            <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 20px;
                }

                .error-card {
                    background: var(--surface-white);
                    border: 1px solid var(--border-light);
                    border-radius: 24px;
                    width: 100%;
                    max-width: 600px;
                    padding: 40px;
                    box-shadow: 0 15px 35px rgba(30, 26, 21, 0.05);
                    text-align: center;
                    animation: fadeIn 0.6s ease-out;
                }

                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }

                .error-icon {
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    background: #fff5f5;
                    border: 1.5px dashed #feb2b2;
                    color: #e53e3e;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 2.2rem;
                    margin: 0 auto 24px;
                }

                .brand-title {
                    font-size: 1.6rem;
                    font-weight: 600;
                    background: linear-gradient(135deg, var(--brand-gold-dark) 0%, var(--brand-burgundy) 100%);
                    -webkit-background-clip: text;
                    background-clip: text;
                    color: transparent;
                    letter-spacing: 0.5px;
                    margin-bottom: 6px;
                }

                .error-title {
                    font-size: 1.25rem;
                    color: var(--text-dark);
                    font-weight: 500;
                    margin-bottom: 20px;
                }

                .info-box {
                    background: #fbf9f5;
                    border: 1px solid var(--border-light);
                    border-radius: 16px;
                    padding: 18px;
                    text-align: left;
                    margin-bottom: 24px;
                    font-size: 0.9rem;
                }

                .info-line {
                    margin-bottom: 8px;
                    display: flex;
                    justify-content: space-between;
                }

                .info-line:last-child {
                    margin-bottom: 0;
                }

                .info-label {
                    color: var(--text-muted);
                    font-weight: 500;
                }

                .info-value {
                    font-family: monospace;
                    font-weight: 600;
                    color: var(--text-dark);
                    background: #f0e4d0;
                    padding: 2px 6px;
                    border-radius: 4px;
                }

                .error-details {
                    margin-top: 10px;
                    padding-top: 10px;
                    border-top: 1px solid var(--border-light);
                    color: #c53030;
                    font-size: 0.85rem;
                    word-break: break-all;
                }

                .instructions {
                    text-align: left;
                    margin-bottom: 30px;
                }

                .instructions h3 {
                    font-size: 1rem;
                    font-weight: 600;
                    color: var(--text-dark);
                    margin-bottom: 12px;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                }

                .instructions h3 i {
                    color: var(--brand-gold-dark);
                }

                .step-list {
                    list-style: none;
                }

                .step-item {
                    position: relative;
                    padding-left: 28px;
                    margin-bottom: 12px;
                    font-size: 0.9rem;
                    line-height: 1.5;
                    color: var(--text-muted);
                }

                .step-item:last-child {
                    margin-bottom: 0;
                }

                .step-item::before {
                    content: "\f00c";
                    font-family: "Font Awesome 6 Free";
                    font-weight: 900;
                    position: absolute;
                    left: 2px;
                    top: 2px;
                    color: var(--brand-gold);
                    font-size: 0.85rem;
                }

                .btn-container {
                    display: flex;
                    gap: 12px;
                    justify-content: center;
                }

                .btn {
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    padding: 12px 28px;
                    border-radius: 50px;
                    font-size: 0.9rem;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s;
                    text-decoration: none;
                    border: none;
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

                .btn-secondary {
                    background: #fdf5e8;
                    border: 1px solid #f2dfc5;
                    color: var(--brand-gold-dark);
                }

                .btn-secondary:hover {
                    background: #f9eccf;
                }
            </style>
        </head>
        <body>
            <div class="error-card">
                <div class="error-icon">
                    <i class="fa-solid fa-database"></i>
                </div>
                <h1 class="brand-title">SISTARA JEWELS</h1>
                <h2 class="error-title">Database Connection Issue</h2>
                
                <div class="info-box">
                    <div class="info-line">
                        <span class="info-label">Failed Connection:</span>
                        <span class="info-value"><?php echo htmlspecialchars($db_title); ?></span>
                    </div>
                    <div class="info-line">
                        <span class="info-label">Database Host:</span>
                        <span class="info-value"><?php echo htmlspecialchars($host); ?></span>
                    </div>
                    <div class="info-line">
                        <span class="info-label">Database Name:</span>
                        <span class="info-value"><?php echo htmlspecialchars($dbname); ?></span>
                    </div>
                    <div class="error-details">
                        <strong>Error Details:</strong> <?php echo htmlspecialchars($error_msg); ?>
                    </div>
                </div>

                <div class="instructions">
                    <?php if ($is_vercel): ?>
                        <h3><i class="fa-solid fa-circle-info"></i> How to resolve on Vercel / Production:</h3>
                        <ul class="step-list">
                            <li class="step-item">
                                <strong>Configure Environment Variables:</strong> Set the required environment variables in your Vercel Project Dashboard under <strong>Settings &gt; Environment Variables</strong>.
                            </li>
                            <li class="step-item">
                                <strong>Keys to set:</strong> <code>DB_HOST</code>, <code>DB_USER</code>, <code>DB_PASSWORD</code>, <code>DB_NAME</code>, etc., matching your cloud database credentials.
                            </li>
                            <li class="step-item">
                                <strong>Redeploy:</strong> After updating the environment variables, trigger a redeployment in Vercel to apply the changes.
                            </li>
                        </ul>
                    <?php else: ?>
                        <h3><i class="fa-solid fa-circle-info"></i> How to resolve on Localhost:</h3>
                        <ul class="step-list">
                            <li class="step-item">
                                <strong>Start WAMP / XAMPP:</strong> Make sure your local server dashboard is running and active (the icon should be green).
                            </li>
                            <li class="step-item">
                                <strong>Check MySQL Service:</strong> Ensure the MySQL database service is started and listening on port 3306.
                            </li>
                            <li class="step-item">
                                <strong>Automatic Database Creation:</strong> This system will automatically create the databases if they don't exist, as long as the MySQL user has <code>CREATE DATABASE</code> permissions.
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="btn-container">
                    <button class="btn btn-primary" onclick="window.location.reload();">
                        <i class="fa-solid fa-rotate-right"></i> Retry Connection
                    </button>
                    <a href="https://github.com" target="_blank" class="btn btn-secondary">
                        <i class="fa-brands fa-github"></i> Visit GitHub
                    </a>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
}
?>
