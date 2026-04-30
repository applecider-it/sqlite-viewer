<?php

/** テーブル一覧取得 */
function getTables()
{
    $rows = fetchAll("SELECT name FROM sqlite_master WHERE type='table'");
    return array_column($rows, 'name');
}

/** テーブルデータ取得 */
function getTableData($table)
{
    $info = fetchAll("PRAGMA table_info(\"$table\")");

    $columns = array_column($info, 'name');

    $rows = fetchAll("SELECT * FROM \"$table\" LIMIT 500");

    return [$columns, $rows];
}
