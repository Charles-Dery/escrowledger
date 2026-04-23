<?php
// Database Configuration
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
define('DB_NAME', getenv('DB_NAME'));


// URL Configuration
define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', 'https://escrowledger-1.onrender.com');
define('BASE_URL', 'https://escrowledger-1.onrender.com/');
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
