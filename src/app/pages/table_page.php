<?php

namespace App\Pages;

use function App\Lib\getTableData;
use function App\Lib\layout;

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

    return layout('pages/table', compact('table', 'tableData'));
}
