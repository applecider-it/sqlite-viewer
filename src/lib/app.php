<?php

$sqlHistory = [];

/** View出力 */
function view(string $name, array $data = [])
{
    include APP_ROOT . '/template/' . $name . '.html.php';
}

/** HTMLエスケープ */
function h(mixed $text)
{
    return htmlspecialchars((string)$text);
}

/** 全件取得 */
function fetchAll(string $sql, array $params = [])
{
    global $pdo, $sqlHistory;

    $sqlHistory[] = compact('sql', 'params');

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
