<?php

function table_page()
{
    global $app;

    $tables = $app['tables'];

    $table = $_GET['table'] ?? null;

    // テーブル存在チェック
    if (!in_array($table, $tables)) {
        throw new Exception("Invalid table");
    }

    $tableData = getTableData($table);

    return layout('pages/table', compact('table', 'tableData'));
}
