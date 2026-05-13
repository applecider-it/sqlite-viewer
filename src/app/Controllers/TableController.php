<?php

namespace App\Controllers;

use App\Services\Table\Table;
use App\Services\Core\Output;

use App\Services\Core\App;

class TableController{
    public static function table()
    {
        $tables = App::$data['tables'];

        $table = $_GET['table'] ?? null;

        // テーブル存在チェック
        if (!in_array($table, $tables)) {
            throw new \Exception("Invalid table");
        }

        $tableData = Table::getTableData($table);

        return Output::layout('table/table', compact('table', 'tableData'));
    }
}