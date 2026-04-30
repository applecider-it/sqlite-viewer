<?php

/** 全件取得 */
function fetchAll(string $sql, array $params = [])
{
    global $app;

    $pdo = $app['pdo'];

    $app['sqlHistory'][] = compact('sql', 'params');

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/** SQLで利用できる状態にしたテーブル */
function sqlTable(string $table)
{
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $table)) {
        throw new Exception('invalid name');
    }

    return "\"$table\"";
}
