<?php
global $app;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SQLite Viewer</title>

    <link rel="stylesheet" href="css/app.css">
</head>

<body>

    <div class="nav">
        Sqlite Viewer
        <a href="/">Top</a>
    </div>

    <div class="container">
        <div class="sidebar">
            <?php foreach ($app['tables'] as $t): ?>
                <div><a href="?page=table&table=<?= urlencode($t) ?>"><?= h($t) ?></a></div>
            <?php endforeach; ?>
        </div>
        <div class="content">