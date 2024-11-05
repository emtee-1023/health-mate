<?php
$host = 'srv497.hstgr.io';
$db = 'u640333703_g4g';
$user = 'u640333703_g4g';
$pass = '#2Gsea^SIFpl';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
?>
