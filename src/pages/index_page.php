<?php

function index_page()
{
    // ===== 入力取得 =====
    $table = $_GET['table'] ?? null;
    $tables = getTables();

    // ===== 簡易バリデーション =====
    if ($table && !in_array($table, $tables)) {
        die("Invalid table");
    }

    if ($table) {
        list($columns, $rows) = getTableData($table);
    }

    view('index', compact('table', 'tables', 'columns', 'rows'));
}
