<?php
/**
 * Router.php - InfinityFree Fallback Router
 * 
 * Used by: php -S localhost:8000 router.php (for local testing)
 * Backup for InfinityFree if .htaccess doesn't handle routing properly.
 * 
 * Instructions:
 * - Upload this file to the root (same level as public/)
 * - If your InfinityFree hosting doesn't support .htaccess properly,
 *   rename or copy this file as needed per hosting config.
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Serve existing files from public/ directly
$publicPath = __DIR__ . '/public' . $uri;
if ($uri !== '/' && file_exists($publicPath)) {
    return false;
}

// Route everything else through Laravel's front controller
require __DIR__ . '/public/index.php';

