<?php 
$host = "localhost"; //hostname
$db = "bitumi"; //database name
$user = "root"; //username
$password = ""; //password

//points to the database mysql serve (driver), database name, username and password
$dsn = "mysql:host=$host;dbname=$db";

//try to connect, if connected echo a yay!
try {
   $pdo = new PDO ($dsn, $user, $password); 
   //set the error mode to exception so that we can catch any errors that occur during the connection process
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
//what happens if there is an error connecting 
// die() is a function that stops the script and outputs a message
// $e is the exception object that contains information about the error that occurred
// $e->getMessage() is a method that returns the error message associated with the exception
// DO NOT SHOW EXCEPTION MESSAGES TO USERS IN PRODUCTION CODE, THIS IS FOR DEVELOPMENT PURPOSES ONLY
catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}
