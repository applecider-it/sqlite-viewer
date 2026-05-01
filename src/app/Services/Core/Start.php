<?php

declare(strict_types=1);

namespace App\Services\Core;

use function App\Services\Table\getTables;

class Start
{
    public static function start()
    {
        try {
            self::exec();
        } catch (\Throwable $e) {
            echo '<body style="background-color: #eee; color: #555;"><pre style="line-height: 1.5rem;">' . h($e) . '</pre></body>';
        }
    }

    private static function exec()
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
        $pdo = new \PDO('sqlite:' . $dbPath);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $app['pdo'] = $pdo;

        $tables = getTables();

        $app['tables'] = $tables;

        self::execPage();
    }

    private static function execPage()
    {
        $page = $_GET['page'] ?? null;

        $output = match ($page) {
            'table' => \App\Controllers\table_page(),
            default => \App\Controllers\index_page(),
        };

        echo $output;
    }
}
