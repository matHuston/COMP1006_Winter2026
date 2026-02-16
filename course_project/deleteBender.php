<?php

//connect to db
require 'includes/connect.php'; 

// require ID in URL, ex. update.php?id=1
$benderId = $_GET['id']; 

// create the query 
$sql = "DELETE from benders WHERE id = :id"; 

// prepare 
$stmt = $pdo->prepare($sql); 

// bind 
$stmt->bindParam(':id', $benderId);

// execute
$stmt->execute(); 

 // Redirect back to team list (prevents resubmission on refresh)
header("Location: benders.php"); 
exit; 