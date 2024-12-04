<?php
// Define the project root directory
define('PROJECT_ROOT', dirname(__DIR__));

// Database configuration
$host = 'localhost';
$dbname = 'task_manager';
$user = 'root'; // Adjust as needed
$password = ''; // Adjust as needed

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
