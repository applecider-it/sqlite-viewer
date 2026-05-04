<?php

namespace App\Controllers;

use function App\Services\Table\getTableData;
use function App\Services\Core\layout;

use App\Services\Core\App;

function table_page()
{
    $tables = App::$data['tables'];

    $table = $_GET['table'] ?? null;

    // テーブル存在チェック
    if (!in_array($table, $tables)) {
        throw new \Exception("Invalid table");
    }

    $tableData = getTableData($table);

    return layout('table/table', compact('table', 'tableData'));
}
