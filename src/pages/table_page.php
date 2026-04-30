<?php

function table_page()
{
    global $tables;

    // ===== 入力取得 =====
    $table = $_GET['table'] ?? null;

    // ===== 簡易バリデーション =====
    if (!in_array($table, $tables)) {
        die("Invalid table");
    }

    list($columns, $rows) = getTableData($table);

    view('table', compact('table', 'tables', 'columns', 'rows'));
}
