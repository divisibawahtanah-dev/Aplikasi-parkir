<?php
$hostname = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';
$database = getenv('DB_NAME') ?: 'ukk_parkir';
$port = getenv('DB_PORT') ?: '3306';

$conn = mysqli_init();

// Aiven usually requires SSL by default for MySQL
// If DB_SSL is set to 'true', we enable it
if (getenv('DB_SSL') === 'true') {
    mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
    $conn_status = mysqli_real_connect($conn, $hostname, $username, $password, $database, (int)$port, NULL, MYSQLI_CLIENT_SSL);
}
else {
    $conn_status = mysqli_real_connect($conn, $hostname, $username, $password, $database, (int)$port);
}

if (!$conn_status) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>


