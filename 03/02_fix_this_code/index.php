<?php
// Turn on error reporting so syntax and runtime errors are visible during development
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost"; // needed ;
$dbname = "week_two";
$username = "root";
$password = "";
$dsn = "mysql:host=$host; dbname=$dbname"; //needed ;

try {
    $pdo = new PDO($dsn, $username, $password); // needed $password
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); // needed ,
    echo "Connected to database!";
} // needed } to end try block
catch (PDOException $e) { // needed ( before PDOException
    echo "Database error: " . $e->getMessage(); // needed ->getMessage() after $e
}
