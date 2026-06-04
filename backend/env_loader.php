<?php
/**
 * Simple helper to load environment variables from .env file into PHP's getenv(), $_ENV, and $_SERVER.
 */
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        // Ignore comments
        if ($line === '' || strpos($line, '#') === 0) {
            continue;
        }

        // Split by the first '=' character
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $name = trim($parts[0]);
            $value = trim($parts[1]);

            // Remove surrounding quotes if any
            if (preg_match('/^([\'"])(.*)\1$/', $value, $matches)) {
                $value = $matches[2];
            }

            // Put the environment variable if not already set (or overwrite if empty/standard)
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}
?>
