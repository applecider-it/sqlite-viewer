<h2>Table: <?= h($data['table']) ?></h2>

<table border="1" cellpadding="5">
    <tr>
        <?php foreach ($data['columns'] as $col): ?>
            <th><?= h($col) ?></th>
        <?php endforeach; ?>
    </tr>

    <?php foreach ($data['rows'] as $row): ?>
        <tr>
            <?php foreach ($data['columns'] as $col): ?>
                <td><?= h($row[$col]) ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>