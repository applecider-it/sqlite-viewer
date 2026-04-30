<h2>Table: <?= htmlspecialchars($table) ?></h2>

<table border="1" cellpadding="5">
    <tr>
        <?php foreach ($columns as $col): ?>
            <th><?= htmlspecialchars($col) ?></th>
        <?php endforeach; ?>
    </tr>

    <?php foreach ($rows as $row): ?>
        <tr>
            <?php foreach ($row as $cell): ?>
                <td><?= htmlspecialchars((string)$cell) ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>