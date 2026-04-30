<?php

/** テーブル一覧取得 */
function getTables($pdo)
{
    $stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

/** テーブルデータ取得 */
function getTableData($pdo, $table)
{
    $stmt = $pdo->query("SELECT * FROM \"$table\" LIMIT 1");
    $columns = array_keys($stmt->fetch(PDO::FETCH_ASSOC) ?: []);

    // もう一度取り直し
    $stmt = $pdo->query("SELECT * FROM \"$table\" LIMIT 100");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [$columns, $rows];
}
