<?php

/** View出力 */
function view($name, $data)
{
    include APP_ROOT . '/template/' . $name . '.html.php';
}

/** HTMLエスケープ */
function h($text)
{
    return htmlspecialchars((string)$text);
}

/** 全件取得 */
function fetchAll($sql)
{
    global $pdo;

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
