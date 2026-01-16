<?php
declare(strict_types= 1);

//vars to hold database connection info
$host = 'localhost';
$db = "lab_one_db";
$user = "root";
$password = "";

//data source name - address of the database server, name, and charset
$dsn = "mysql:host=$host; dbname=$db; charset=utf8mb4";

//try and catch block - handle connection errors
try { //try to connect
    $pdo = new PDO($dsn, $user, $password);
    //throw exceptions on error
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //success message
    echo "<p>Good news, everyone! We have connected to {$db}!</p>";
}

//error connecting, catch and display message 
catch(PDOException $e) {
    die("To shreds, you say. Could not connect to {$db} :" . $e->getMessage());
}