<?php
global $sqlHistory;
?>
<div class="trace">
    SQL

    <?php foreach ($sqlHistory as $row): ?>
        <div><?= h($row['sql']) ?>: <?= h(json_encode($row['params'])) ?></div>
    <?php endforeach; ?>
</div>