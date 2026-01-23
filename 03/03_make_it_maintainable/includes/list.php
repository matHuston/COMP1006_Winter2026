<?php
// list.php is shared to index.php

// populate "items" array
$items = ["Home", "About", "Contact"];
?>
<!-- end ?php -->

<!-- builds out list with "items" array -->
<ul>
    <?php foreach ($items as $item): ?>
        <li><?= $item ?></li>
    <?php endforeach; ?>
</ul>
<!-- end list -->