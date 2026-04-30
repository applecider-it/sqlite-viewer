<?php

function bootstrap_start()
{
    define('APP_ROOT', dirname(__DIR__));

    // すべてのエラーが対象
    error_reporting(E_ALL);

    // エラーを例外にする
    set_error_handler(function ($severity, $message, $file, $line) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    });

    require_once APP_ROOT . '/lib/table.php';
    require_once APP_ROOT . '/lib/output.php';
    require_once APP_ROOT . '/lib/db.php';

    require_once APP_ROOT . '/pages/index_page.php';
    require_once APP_ROOT . '/pages/table_page.php';

    try {
        bootstrap_start_app();
    } catch (Throwable $e) {
        echo '<body style="background-color: #eee; color: #555;"><pre style="line-height: 1.5rem;">' . h($e) . '</pre></body>';
    }
}

function bootstrap_start_app()
{
    global $app;

    // サービスコンテナ
    $app = [
        'pdo' => null,
        'tables' => null,
        'sqlHistory' => [],
    ];

    include APP_ROOT . '/env.php';

    // DB接続
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $app['pdo'] = $pdo;

    $tables = getTables();

    $app['tables'] = $tables;

    $page = $_GET['page'] ?? null;

    $output = match ($page) {
        'table' => table_page(),
        default => index_page(),
    };

    echo $output;
}

bootstrap_start();
