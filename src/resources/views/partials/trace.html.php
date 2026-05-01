<?php
global $app;
?>
<div class="trace">
    SQL

    <?php foreach ($app['sqlHistory'] as $row): ?>
        <div><?= h($row['sql']) ?>: <?= h(json_encode($row['params'])) ?></div>
    <?php endforeach; ?>
</div>