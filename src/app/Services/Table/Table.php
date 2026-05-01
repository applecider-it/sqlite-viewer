<?php

declare(strict_types=1);

namespace App\Services\Table;

use function App\Services\Core\fetchAll;
use function App\Services\Core\sqlTable;

/** テーブル一覧取得 */
function getTables()
{
    $rows = fetchAll("SELECT name FROM sqlite_master WHERE type='table'");
    return array_column($rows, 'name');
}

/** テーブルデータ取得 */
function getTableData(string $table)
{
    $info = fetchAll("PRAGMA table_info(" . sqlTable($table) . ")");

    $columns = array_column($info, 'name');

    $rows = fetchAll("SELECT * FROM " . sqlTable($table) . " LIMIT ?", [500]);

    return compact('columns', 'rows');
}
