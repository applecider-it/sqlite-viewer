<?php

namespace App\Controllers;

use function App\Services\Table\getTableData;
use function App\Services\Core\layout;

function table_page()
{
    global $app;

    $tables = $app['tables'];

    $table = $_GET['table'] ?? null;

    // テーブル存在チェック
    if (!in_array($table, $tables)) {
        throw new \Exception("Invalid table");
    }

    $tableData = getTableData($table);

    return layout('table/table', compact('table', 'tableData'));
}
