<?php

use App\Services\Core\App;
?>
<div class="trace">
    SQL

    <?php foreach (App::$data['sqlHistory'] as $row): ?>
        <div><?= h($row['sql']) ?>: <?= h(json_encode($row['params'])) ?></div>
    <?php endforeach; ?>
</div>