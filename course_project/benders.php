<?php
require "includes/header.php";
require "includes/connect.php";


$sql = "SELECT * FROM benders ORDER BY team_name ASC";
$stmt = $pdo->prepare($sql);

$stmt->execute();
$benders = []; // placeholder
$benders = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- end ?php -->

<main class="container mt-4">
  <h1>Benders</h1>

  <?php if (count($benders) === 0): ?>
    <p>No benders yet.</p>
  <?php else: ?>
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Team Name</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Element</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        <!-- loop through $benders, output rows -->
        <?php foreach ($benders as $bender): ?>
          <tr>
            <td><?= htmlspecialchars($bender['id']) ?></td>
            <td><?= htmlspecialchars($bender['team_name']) ?></td>
            <td><?= htmlspecialchars($bender['first_name']) ?></td>
            <td><?= htmlspecialchars($bender['last_name']) ?></td>
            <td><?= htmlspecialchars($bender['bender_element']) ?></td>
            <td><?= htmlspecialchars($bender['email']) ?></td>
            <td><?= htmlspecialchars($bender['phone']) ?></td>
            <td><?= htmlspecialchars($bender['notes']) ?></td>
          </tr>
          <!-- end loop -->
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- end if -->
  <?php endif; ?>

  <p class="mt-3">
    <a href="index.php">Back to Bender Form</a>
  </p>
</main>

<?php require "includes/footer.php" ?>