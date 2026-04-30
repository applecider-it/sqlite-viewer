<ul>
    <?php foreach ($tables as $t): ?>
        <li><a href="?table=<?= urlencode($t) ?>"><?= htmlspecialchars($t) ?></a></li>
    <?php endforeach; ?>
</ul>