<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 28800,
    'domain' => '127.0.0.1',
    'path' => '/',
    'secure' => false,
    'httponly' => true
]);

session_start();

session_regenerate_id(true);

if (!isset($_SESSION['last_regen'])) {
    session_regenerate_id(true);
    $_SESSION['last_regen'] = time();
} else {
    $interval = 60 * 480;
    if (time() - $_SESSION['last_regen'] >= $interval) {
        session_regenerate_id(true);
        $_SESSION['last_regen'] = time();
    }
}
