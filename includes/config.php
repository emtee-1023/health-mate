<?php
$host = '127.0.0.1';
$db = 'inlaqkew_health_mate';
$user = 'inlaqkew_root';
$pass = '@IH&pS%l6v+Z';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create the PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Catch any errors during connection
    echo 'Connection failed: ' . $e->getMessage();
}
