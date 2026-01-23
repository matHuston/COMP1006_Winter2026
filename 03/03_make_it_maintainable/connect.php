<?php
// connect.php is shared to index.php
declare(strict_types=1);

// vars for connection
$host = 'localhost';
$db = "php_maintainable_db";
$user = "root";
$password = "";

// data source name - address of db, db name, charset
$dsn = "mysql:host=$host; dbname=$db; charset=utf8mb4";

// connection try and catch blocks
try {
    $pdo = new PDO($dsn, $user, $password);
    // set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "🍓Connection successful!";
} catch (PDOException $e) {
    echo "💀Connection failed: " . $e->getMessage();
}
// end try and catch
