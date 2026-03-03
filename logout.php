<?php
require_once __DIR__ . '/functions/helpers.php';
require_once __DIR__ . '/config/database.php';

if (isset($_SESSION['user'])) {
    log_activity("User " . $_SESSION['user']['nama_user'] . " logout.");
}

session_destroy();
redirect('login.php');
?>
