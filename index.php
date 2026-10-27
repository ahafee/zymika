<?php

/**
 * Zymika Health - Laravel Root Entry File
 * Ensures 100% compatibility with LiteSpeed and Apache Web Servers
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// Serve static assets if requested directly
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';
