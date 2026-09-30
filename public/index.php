<?php
/**
 * EarthGreenEnergy Bangladesh - Front Controller & Hybrid Router
 * Handles direct browser page hits, AJAX SPA fragment requests, and static asset serving.
 */

// Load global configuration and helper functions
require_once __DIR__ . '/../includes/config.php';

// 1. Resolve requested URI and decode URL encoding (e.g. spaces %20 in asset names)
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
$path = urldecode(trim($uri, '/'));

// Extract script directory path if running in subfolders
$scriptDir = trim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
if (!empty($scriptDir) && strpos($path, $scriptDir) === 0) {
    $path = trim(substr($path, strlen($scriptDir)), '/');
}

// 2. Handle Static Assets (CSS, JS, Images, Fonts)
if (!empty($path)) {
    // Check inside public/ folder or public/assets
    $assetPath = __DIR__ . '/' . $path;
    if (file_exists($assetPath) && !is_dir($assetPath)) {
        $ext = strtolower(pathinfo($assetPath, PATHINFO_EXTENSION));
        $mimeTypes = [
            'css'   => 'text/css; charset=UTF-8',
            'js'    => 'application/javascript; charset=UTF-8',
            'webp'  => 'image/webp',
            'png'   => 'image/png',
            'jpg'   => 'image/jpeg',
            'jpeg'  => 'image/jpeg',
            'jfif'  => 'image/jpeg',
            'gif'   => 'image/gif',
            'svg'   => 'image/svg+xml',
            'woff'  => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf'   => 'font/ttf',
            'eot'   => 'application/vnd.ms-fontobject',
            'ico'   => 'image/x-icon',
            'json'  => 'application/json'
        ];
        if (isset($mimeTypes[$ext])) {
            header('Content-Type: ' . $mimeTypes[$ext]);
        }
        header('Cache-Control: public, max-age=86400');
        header('Content-Length: ' . filesize($assetPath));
        readfile($assetPath);
        exit;
    }
}

// 3. Apply Production Security Hardening Headers for HTML / AJAX Responses
apply_security_headers();

// Remove trailing .php extension if present
$page = strtolower($_GET['page'] ?? $path);
$page = preg_replace('/\.php$/', '', $page);

// Route Table Mapping
$routes = [
    ''                 => 'home',
    'index'            => 'home',
    'home'             => 'home',
    'about'            => 'about',
    'solution'         => 'solutions',
    'solutions'        => 'solutions',
    'service'          => 'services',
    'services'         => 'services',
    'projects'         => 'work',
    'work'             => 'work',
    'solar-calculator' => 'solar-calculator',
    'contact'          => 'contact',
    'agro-solutions'   => 'agro-solutions',
];

$route_key = $routes[$page] ?? '404';
$page_file = __DIR__ . '/../pages/' . $route_key . '.php';

if (!file_exists($page_file)) {
    http_response_code(404);
    $route_key = '404';
    $page_file = __DIR__ . '/../pages/404.php';
}

// Global page state variables
$active_page = $route_key;
$page_title_map = [
    'home'             => 'Home Overview - EarthGreenEnergy Bangladesh',
    'about'            => 'About Engineering Team - EarthGreenEnergy Bangladesh',
    'solutions'        => 'Sector Solutions - EarthGreenEnergy Bangladesh',
    'services'         => 'EPC & O&M Services - EarthGreenEnergy Bangladesh',
    'work'             => 'Industrial Case Studies & Projects - EarthGreenEnergy Bangladesh',
    'solar-calculator' => 'Solar ROI & Feasibility Calculator - EarthGreenEnergy Bangladesh',
    'contact'          => 'Contact Us & Corporate HQ - EarthGreenEnergy Bangladesh',
    'agro-solutions'   => 'Agro Product Solutions - EarthGreenEnergy Bangladesh',
    '404'              => '404 Page Not Found - EarthGreenEnergy Bangladesh'
];
$page_title = $page_title_map[$route_key] ?? SITE_NAME;

// 4. Render Output: Hybrid AJAX vs Standard Load
if (is_ajax_request()) {
    header("Content-Type: text/html; charset=UTF-8");
    // AJAX Fragment response: Return title tag + content fragment only
    echo '<title>' . htmlspecialchars($page_title) . '</title>' . "\n";
    require $page_file;
} else {
    header("Content-Type: text/html; charset=UTF-8");
    // Full Document response: Wrap with components
    require_once __DIR__ . '/../components/head.php';
    require_once __DIR__ . '/../components/header.php';
    require $page_file;
    require_once __DIR__ . '/../components/floating-whatsapp.php';
    require_once __DIR__ . '/../components/footer.php';
}
