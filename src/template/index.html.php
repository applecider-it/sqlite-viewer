<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SQLite Viewer</title>
</head>

<body>

    <h1>Tables</h1>

    <?php view('tables', $data); ?>

    <?php if ($data['table']): ?>
        <?php view('table', $data); ?>
    <?php endif; ?>

</body>

</html>