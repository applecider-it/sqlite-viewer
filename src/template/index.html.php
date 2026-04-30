<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SQLite Viewer</title>
</head>

<body>

    <h1>Tables</h1>

    <?php include APP_ROOT . '/template/tables.html.php'; ?>

    <?php if ($table): ?>
        <?php include APP_ROOT . '/template/table.html.php'; ?>
    <?php endif; ?>

</body>

</html>