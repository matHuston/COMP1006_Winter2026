<?php

//  TODO: connect to the database 
require "includes/connect.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

//   TODO: Grab form data (no validation or sanitization for this lab)
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subscribedAt = date('Y-m-d H:i:s');

/*
  1. Write an INSERT statement with named placeholders
  2. Prepare the statement
  3. Execute the statement with an array of values
*/

$sql = "INSERT INTO subscribers (first_name, last_name, email, subscribed_at) 
            VALUES (:first_name, :last_name, :email, :subscribed_at)"; // placeholders for prepared statement

// prepare the query
$stmt = $pdo->prepare($sql);

$stmt->bindParam(":first_name", $firstName);
$stmt->bindParam(":last_name", $lastName);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":subscribed_at", $subscribedAt);

$stmt->execute();

$pdo = null; // close the connection

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <main class="container mt-4">
        <h2>Thank You for Subscribing</h2>

        <!-- TODO: Display a confirmation message -->
        <!-- Example: "Thanks, Name! You have been added to our mailing list." -->
        <p>Thanks, <?= htmlspecialchars($firstName) ?>! You have been added to our mailing list.</p>

        <p class="mt-3">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
</body>

</html>