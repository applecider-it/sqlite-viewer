<h2>Table: <?= h($data['table']) ?></h2>

<table>
    <tr>
        <?php foreach ($data['tableData']['columns'] as $col): ?>
            <th><?= h($col) ?></th>
        <?php endforeach; ?>
    </tr>

    <?php foreach ($data['tableData']['rows'] as $row): ?>
        <tr>
            <?php foreach ($data['tableData']['columns'] as $col): ?>
                <td><?= h($row[$col]) ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>