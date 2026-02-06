<?php
require "includes/connect.php";

// check that request method is POST so that we only process form submissions
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

// sanitize and trim input data, trim deletes whitespace from beginning and end of string, filter_sanitize_special_chars escapes any special characters that could be used for attacks
$firstName = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS));
$lastName = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS));
$benderElement = trim(filter_input(INPUT_POST, 'bender_element', FILTER_SANITIZE_SPECIAL_CHARS));
$teamName = trim(filter_input(INPUT_POST, 'team_name', FILTER_SANITIZE_SPECIAL_CHARS));
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$notes = trim(filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_SPECIAL_CHARS));

// validate input data and collect errors into an array
$errors = [];

// required fields
if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is required.";
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is required.";
}

if ($benderElement === null || $benderElement === '') {
    $errors[] = "Must choose player's element.";
}

// telephone with regex format check
if ($phone === null || $phone === '') {
    $errors[] = "Phone number is required.";
} elseif (
    !filter_var($phone, FILTER_VALIDATE_REGEXP, [
        'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
        // this regex allows digits, spaces, parentheses, plus and hyphens
    ])
) {
    $errors[] = "Phone number format is invalid.";
}

// email with format check
if ($email === null || $email === '') {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email address.";
}


// if any errors, show them and stop the script before inserting to the DB
if (!empty($errors)) { // if errors array is not empty
    require "includes/header.php";
    echo "<div class='alert alert-danger'>";
    echo "<h2>Please fix the following:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        // htmlspecialchars() prevents any unexpected HTML from being rendered in the error messages, good security practice to prevent attacks if any of the error messages contain user input
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "</div>";

    require "includes/footer.php";
    exit; // stop script execution if any errors
}

// sql query to insert a player into the database using named placeholders to safely insert user data without risking SQL injection
$sql = "INSERT INTO benders (first_name, last_name, team_name, email, phone, bender_element, notes) 
            VALUES (:first_name, :last_name, :team_name, :email, :phone, :bender_element, :notes)"; // placeholders for prepared statement

// prepare the query
$stmt = $pdo->prepare($sql);

// match named placeholders to user data/actual data, param is the placeholder name, var is the value we want to insert into the database, in this case the sanitized and validated user input from the player information form 
$stmt->bindParam(":first_name", $firstName);
$stmt->bindParam(":last_name", $lastName);
$stmt->bindParam(":bender_element", $benderElement);
$stmt->bindParam(":team_name", $teamName);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":phone", $phone);
$stmt->bindParam(":notes", $notes);

// execute the query/prepared statement
$stmt->execute();
// closing the connection is optional, but best practice
$pdo = null;

?>
<? require "includes/header.php"; ?>
<div class="alert alert-success">
    <h1>Player <?= htmlspecialchars($firstName) ?> <?= htmlspecialchars($lastName) ?> added successfully!</h1>
    <p>
        Contact information for <?= htmlspecialchars($firstName) ?>:
        <strong><?= htmlspecialchars($email) ?>, or <?= htmlspecialchars($phone) ?></strong>.
    </p>
</div>

<?php require "includes/footer.php"; ?>