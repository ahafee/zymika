<?php

/**
 * Zymika Health - Laravel Root Entry File
 * Ensures 100% compatibility with LiteSpeed and Apache Web Servers
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// If requested file exists inside public/, serve it directly or forward
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    // If it's a static file (css, js, images, etc.)
    $filePath = __DIR__ . '/public' . $uri;
    $mime = mime_content_type($filePath);
    if (str_ends_with($uri, '.css')) $mime = 'text/css';
    if (str_ends_with($uri, '.js')) $mime = 'application/javascript';
    if ($mime) header("Content-Type: $mime");
    readfile($filePath);
    exit;
}

require_once __DIR__ . '/public/index.php';

