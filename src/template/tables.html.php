<ul>
    <?php foreach ($data['tables'] as $t): ?>
        <li><a href="?table=<?= urlencode($t) ?>"><?= h($t) ?></a></li>
    <?php endforeach; ?>
</ul>