<?php

declare(strict_types=1);

namespace App\Services\Core;

use App\Services\Table\Table;

use App\Services\Core\App;

/**
 * 起動関連
 */
class Start
{
    public static function init()
    {
        include APP_ROOT . '/env.php';

        // DB接続
        $pdo = new \PDO('sqlite:' . $dbPath);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        App::set('pdo', $pdo);
    }

    public static function web()
    {
        try {
            self::execWeb();
        } catch (\Throwable $e) {
            echo '<body style="background-color: #eee; color: #555;"><pre style="line-height: 1.5rem;">' . h($e) . '</pre></body>';
        }
    }

    private static function execWeb()
    {
        $tables = Table::getTables();

        App::set('tables', $tables);

        $page = $_GET['page'] ?? null;

        $output = match ($page) {
            'table' => \App\Controllers\TableController::table(),
            default => \App\Controllers\HomeController::index(),
        };

        echo $output;
    }
}
