<?php
<<<<<<< HEAD
/**
 * orders.php
 * ------------------------------------------------------------
 * Admin view: list all orders and provide an Update button.
 * Clicking Update sends the order's customer_id to update.php via the URL.
 */

require "includes/header.php";
require "includes/connect.php";

// Get all orders (newest first)
$sql = "SELECT * FROM orders1 ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll();
?>

<main class="mt-4">
  <h2>Orders (Admin)</h2>

  <?php if (empty($orders)): ?>
    <p>No orders yet.</p>
  <?php else: ?>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead>
          <tr>
            <th>Order #</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Email</th>

            <!-- Product columns (each product has its own DB column) -->
            <th>Chaos Croissant</th>
            <th>Existential Éclair</th>
            <th>Procrastination Cookie</th>

            <th>Total Items</th>
            <th>Created</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($orders as $order): ?>

            <?php
              // Total items (sum of all product quantity columns)
              $total =
                (int)$order['chaos_croissant'] +
                (int)$order['existential_eclair'] +
                (int)$order['procrastination_cookie'];
            ?>

            <tr>
              <td><?= htmlspecialchars($order['customer_id']); ?></td>

              <td>
                <?= htmlspecialchars($order['first_name']); ?>
                <?= htmlspecialchars($order['last_name']); ?>
              </td>

              <td><?= htmlspecialchars($order['phone']); ?></td>
              <td><?= htmlspecialchars($order['address']); ?></td>
              <td><?= htmlspecialchars($order['email']); ?></td>

              <td><?= (int)$order['chaos_croissant']; ?></td>
              <td><?= (int)$order['existential_eclair']; ?></td>
              <td><?= (int)$order['procrastination_cookie']; ?></td>

              <td><strong><?= $total; ?></strong></td>
              <td><?= htmlspecialchars($order['created_at']); ?></td>

              <td>
                <!-- Sends the ID to update.php -->
                <a
                  class="btn btn-sm btn-warning"
                  href="update.php?id=<?= urlencode($order['customer_id']); ?>"
                >
                  Update
                </a>
              </td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  <?php endif; ?>

  <p class="mt-3">
    <a class="btn btn-secondary" href="index.php">Back to Order Form</a>
=======
require "includes/header.php";
require "includes/connect.php"; // connect to db 

//create query 
$sql = "SELECT * FROM orders1 ORDER BY created_at DESC"; 

//prepare
$stmt = $pdo->prepare($sql);  

//execute 
$stmt->execute(); 

//retrieve all rows returned by a SQL query at once
$orders = $stmt->fetchAll(); 
?>

<main class="mt-4">
  <h2>Orders</h2>

  <?php if (count($orders) === 0): ?>
    <p>No orders yet.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($orders as $order): ?>

        <?php
          // Calculate total items
          $total = $order['chaos_croissant'] + $order['existential_eclair'] + $order['procrastination_cookie']
        
        ?>

        <li class="mb-3">
          <strong>Order #<?php echo htmlspecialchars($order['customer_id']); ?></strong><br>

          <?php echo htmlspecialchars($order['first_name']); ?>
          <?php echo htmlspecialchars($order['last_name']); ?>
          (<?php echo htmlspecialchars($order['email']); ?>)<br>

          <strong>Items Ordered:</strong>
          <ul>
            <?php if ($order['chaos_croissant'] > 0): ?>
              <li>Chaos Croissant: <?php echo $order['chaos_croissant']; ?></li>
            <?php endif; ?>

            <?php if ($order['existential_eclair'] > 0): ?>
              <li>Existential Éclair: <?php echo $order['existential_eclair']; ?></li>
            <?php endif; ?>

            <?php if ($order['procrastination_cookie'] > 0): ?>
              <li>Procrastination Cookie: <?php echo $order['procrastination_cookie']; ?></li>
            <?php endif; ?>
          </ul>

          <strong>Total Items:</strong> <?php echo $total; ?>
        </li>
        <hr>

      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <p class="mt-3">
    <a href="index.php">Back to Order Form</a>
>>>>>>> 2a3f1822ae44ea7e7d8e61fff41c63040b919caf
  </p>
</main>

<?php require "includes/footer.php"; ?>
