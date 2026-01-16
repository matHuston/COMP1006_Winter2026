<?php
declare(strict_types= 1);

//vars to hold database connection info
$host = 'localhost';
$db = "week_two";
$user = "root";
$password = "";

//data source name - set address of the database server, name, and charset
$dsn = "mysql:host=$host; dbname=$db; charset=utf8mb4";

//try and catch block to handle connection errors
try { //try to connect
    $pdo = new PDO($dsn, $user, $password);
    //throw exceptions on error
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo success message
    echo "<p>Hack the planet! {$db} </p>";
}

//if there is an error connecting, catch and display message 
catch(PDOException $e) {
    die("Could not hack the planet {$db} :" . $e->getMessage());
}