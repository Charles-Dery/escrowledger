<?php
// Database Configuration
define('DB_HOST', 'localhost:8889');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'real_estate_ms');

// URL Configuration
define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', 'http://localhost:8888/real-estate-ms');
define('SITENAME', 'Real Estate MS');

// Helper functions for session and flash messages
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirect($page) {
    header('location: ' . URLROOT . '/' . $page);
    exit();
}

function flash($name = '', $message = '', $class = 'alert alert-success') {
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}
