<?php

(function () {
    global $app;

    // すべてのエラーが対象
    error_reporting(E_ALL);

    // エラーを例外にする
    set_error_handler(function ($severity, $message, $file, $line) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    });

    // サービスコンテナ
    $app = [
        'pdo' => null,
        'tables' => null,
        'sqlHistory' => [],
    ];

    define('APP_ROOT', dirname(__DIR__));

    require_once APP_ROOT . '/lib/table.php';
    require_once APP_ROOT . '/lib/output.php';
    require_once APP_ROOT . '/lib/db.php';

    require_once APP_ROOT . '/pages/index_page.php';
    require_once APP_ROOT . '/pages/table_page.php';

    require_once APP_ROOT . '/env.php';

    // ===== 接続 =====
    try {
        $pdo = new PDO('sqlite:' . $dbPath);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('DB接続エラー: ' . htmlspecialchars($e->getMessage()));
    }

    $app['pdo'] = $pdo;

    $tables = getTables();

    $app['tables'] = $tables;

    $page = $_GET['page'] ?? null;

    $output = match ($page) {
        'table' => table_page(),
        default => index_page(),
    };

    echo $output;
})();
