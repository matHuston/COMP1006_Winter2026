<?php
/*
 * Admin update page
 * - Uses GET ?id= to know which order to edit
 * - Loads that order and echoes values into the form
 * - On POST, updates the row using PDO + bindParam
 */

require "includes/header.php";
require "includes/connect.php";

//    require ID in URL, ex. update.php?id=1
if (!isset($_GET['id'])) {
  die("No Bender ID provided.");
}

// grab primary key ID from URL
$benderId = $_GET['id'];

   // If form is submitted, UPDATE the row

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // sanitize and trim input data
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
    if ($firstName === null || $firstName === '' || empty($firstName)) {
        $errors[] = "First Name is required.";
    }

    if ($lastName === null || $lastName === '' || empty($lastName)) {
        $errors[] = "Last Name is required.";
    }

    if ($benderElement === null || $benderElement === '' || empty($benderElement)) {
        $errors[] = "Must choose player's element.";
    }

    // telephone with regex format check
    if ($phone === null || $phone === '' || empty($phone)) {
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
    if ($email === null || $email === '' || empty($email)) {
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

    $sql = "UPDATE benders
            SET first_name = :first_name,
                last_name = :last_name,
                phone = :phone,
                bender_element = :bender_element,
                team_name = :team_name,
                phone = :phone,
                email = :email,
                notes = :notes
            WHERE bender_id = :bender_id";

    $stmt = $pdo->prepare($sql);

    // match named placeholders to user data/actual data, param is the placeholder name, var is the value we want to insert into the database, in this case the sanitized and validated user input from the player information form 
    $stmt->bindParam(":first_name", $firstName);
    $stmt->bindParam(":last_name", $lastName);
    $stmt->bindParam(":bender_element", $benderElement);
    $stmt->bindParam(":team_name", $teamName);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":notes", $notes);

    $stmt->execute();

    // Redirect back to team list (prevents resubmission on refresh)
    header("Location: benders.php");
    exit;
}

/* -------------------------------------------
   STEP 3: Load existing order data (to echo in the form)
-------------------------------------------- */
$sql = "SELECT * FROM pro_bending WHERE bender_id = :bender_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':bender_id', $benderId);
$stmt->execute();

$player = $stmt->fetch();
if (!$player) {
  die("Chosen Bender not found.");
}
?>

<main class="container mt-4">
  <h2>Update Bender #<?= htmlspecialchars($player['bender_id']); ?></h2>

  <?php if (!empty($error)): ?>
    <p class="text-danger"><?= htmlspecialchars($error); ?></p>
  <?php endif; ?>

  <!--
    This form is pre-filled using the player data pulled from the database.
    The admin can edit the values and submit to update the row.
  -->

  <form method="post">

    <h4 class="mt-3">Bender Info</h4>

    <label class="form-label">First Name</label>
    <input
    type="text"
    name="first_name"
    class="form-control mb-3"
    value="<?= htmlspecialchars($player['first_name']); ?>"
    required
    >

    <label class="form-label">Last Name</label>
    <input
    type="text"
    name="last_name"
    class="form-control mb-3"
    value="<?= htmlspecialchars($player['last_name']); ?>"
    required
    >

    <!-- element drop down menu -->
    <label for="bender_element" class="form-label">Bender Element</label>
    <select 
    id="bender_element" 
    name="bender_element" 
    class="form-select mb-3"
    value="<?= htmlspecialchars($player['bender_element']); ?>"
    required
    >
    <option value="elements">Select an Element</option>
    <option value="water">Water</option>
    <option value="earth">Earth</option>
    <option value="fire">Fire</option>
    </select>

    <!-- team name -->
    <label for="team_name" class="form-label">Team Name</label>
    <input 
    type="text" 
    id="team_name" 
    name="team_name" 
    class="form-control mb-3"
    value="<?= htmlspecialchars($player['team_name']); ?>"
    required
    >

    <label class="form-label">Telephone Number</label>
    <input
    type="text"
    name="phone"
    class="form-control mb-3"
    value="<?= htmlspecialchars($player['phone']); ?>"
    >

    <label class="form-label">Email</label>
    <input
    type="email"
    name="email"
    class="form-control mb-4"
    value="<?= htmlspecialchars($player['email']); ?>"
    required
    >

    <button class="btn btn-primary">Save Changes</button>
    <a href="orders.php" class="btn btn-secondary">Cancel</a>

  </form>
</main>

<?php require "includes/footer.php"; ?>
