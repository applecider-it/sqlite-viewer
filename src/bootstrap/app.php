<?php

(function () {
    global $pdo;

    define('APP_ROOT', dirname(__DIR__));

    require_once APP_ROOT . '/lib/table.php';
    require_once APP_ROOT . '/lib/app.php';

    require_once APP_ROOT . '/pages/index_page.php';

    require_once APP_ROOT . '/env.php';

    // ===== 接続 =====
    try {
        $pdo = new PDO('sqlite:' . $dbPath);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('DB接続エラー: ' . htmlspecialchars($e->getMessage()));
    }

    index_page();
})();


