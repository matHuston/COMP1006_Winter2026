<?php
/*
 * Admin delete page
 * - Uses GET ?id= to know which order to delete
 * - On POST, deletes the row using PDO + bindParam
 */
require "includes/header.php";
require 'includes/connect.php'; 

// require ID in URL, ex. update.php?id=1
if (!isset($_GET['id'])) {
  die("No Bender ID provided.");
}
// grab primary key ID from URL
$benderId = $_GET['id']; 

// If form is submitted, DELETE the row

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}

/* -------------------------------------------
   Load existing player data (to echo)
-------------------------------------------- */
$sql = "SELECT * FROM benders WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $benderId);
$stmt->execute();

$player = $stmt->fetch();
if (!$player) {
  die("Chosen Bender not found.");
}
?>

<main class="container mt-4">
  <h2>Delete Bender #<?= htmlspecialchars($player['id']); ?> ?</h2>
  <hr>
  
  <?php if (!empty($error)): ?>
    <p class="text-danger"><?= htmlspecialchars($error); ?></p>

  <?php endif; ?>
    
    <form method="post">
        <p>Are you sure you want to delete 
        <strong>
            <?= htmlspecialchars($player['first_name'] . " " . $player['last_name']); ?>
        </strong> 
        from the 
        <strong>
            <?= htmlspecialchars($player['team_name']); ?>
        </strong> 
         ?
        </p>
        <p>They will be permanently removed from the database.</p>
        <p>Continue?</p>
        <br>
         <button class="btn btn-danger">Delete Bender</button>
            <a href="benders.php" class="btn btn-secondary">Cancel</a>
    </form>

</main>

<?php require "includes/footer.php"; ?>