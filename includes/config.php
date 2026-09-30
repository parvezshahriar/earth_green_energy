<?php
/**
 * EarthGreenEnergy Bangladesh - Global Site Configuration & Helpers
 */

define('SITE_NAME', 'EarthGreenEnergy Bangladesh');
define('SITE_TAGLINE', 'Engineering, Procurement & Construction (EPC) Authority');
define('HOTLINE_MAIN', '+8801334-762612');
define('HOTLINE_MAIN_TEL', '+8801334762612');
define('HOTLINE_SHORT', '16789');
define('WHATSAPP_NUM', '8801334762612');
define('EMAIL_CONTACT', 'info@earthgreenenergy.com.bd');

// Navigation menu definition (DRY architecture)
$nav_menu = [
    'home' => [
        'title' => 'Home',
        'url' => 'home',
        'page_key' => 'home',
        'footer_title' => 'Home Overview'
    ],
    'about' => [
        'title' => 'About Us',
        'url' => 'about',
        'page_key' => 'about',
        'footer_title' => 'About Engineering Team'
    ],
    'solutions' => [
        'title' => 'Solutions',
        'url' => 'solutions',
        'page_key' => 'solutions',
        'footer_title' => 'Sector Solutions'
    ],
    'services' => [
        'title' => 'Services',
        'url' => 'services',
        'page_key' => 'services',
        'footer_title' => 'EPC & O&M Services'
    ],
    'work' => [
        'title' => 'Projects',
        'url' => 'work',
        'page_key' => 'work',
        'footer_title' => 'Industrial Case Studies'
    ],
    'solar-calculator' => [
        'title' => 'Solar Calculator',
        'url' => 'solar-calculator',
        'page_key' => 'solar-calculator',
        'footer_title' => 'Feasibility & ROI Calculator'
    ],
];

/**
 * Detect if current request is an AJAX / SPA fragment request
 */
function is_ajax_request() {
    return (
        (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') ||
        isset($_GET['ajax']) ||
        (!empty($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)
    );
}

/**
 * Apply Production Security Hardening Headers
 */
function apply_security_headers() {
    if (headers_sent()) return;

    // Restrict embedding in frames to SAMEORIGIN (clickjacking defense)
    header("X-Frame-Options: SAMEORIGIN");
    
    // Prevent MIME-type sniffing
    header("X-Content-Type-Options: nosniff");
    
    // Enable browser XSS filtering
    header("X-XSS-Protection: 1; mode=block");
    
    // Control referrer information sent in requests
    header("Referrer-Policy: strict-origin-when-cross-origin");
    
    // Content Security Policy (allowing Google Maps iframe embedding in frame-src)
    $csp = "default-src 'self'; "
         . "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com; "
         . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
         . "font-src 'self' https://fonts.gstatic.com data:; "
         . "img-src 'self' data: https:; "
         . "frame-src 'self' https://maps.google.com https://www.google.com; "
         . "connect-src 'self';";
         
    header("Content-Security-Policy: " . $csp);
}

/**
 * Check active page matching
 */
function is_active_page($page_key, $current_page) {
    return ($page_key === $current_page);
}

/**
 * Return CSS classes for desktop navigation links
 */
function get_nav_link_class($page_key, $current_page) {
    if (is_active_page($page_key, $current_page)) {
        return 'nav-link px-3 py-2 rounded-lg text-primary font-bold bg-primary-container/10 transition-colors';
    }
    return 'nav-link px-3 py-2 rounded-lg text-on-surface-variant hover:text-on-surface text-label-pill font-label-pill transition-colors';
}

/**
 * Return CSS classes for mobile navigation links
 */
function get_mobile_nav_link_class($page_key, $current_page) {
    if (is_active_page($page_key, $current_page)) {
        return 'mobile-nav-link block px-4 py-2.5 rounded-lg text-body-md font-bold text-primary bg-primary-container/10';
    }
    return 'mobile-nav-link block px-4 py-2.5 rounded-lg text-body-md font-medium text-on-surface-variant hover:bg-surface-container hover:text-primary';
}
