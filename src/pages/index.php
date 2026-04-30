<?php

require_once APP_ROOT . '/lib/table.php';
require_once APP_ROOT . '/env.php';

// ===== 接続 =====
try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('DB接続エラー: ' . htmlspecialchars($e->getMessage()));
}

// ===== 入力取得 =====
$table = $_GET['table'] ?? null;
$tables = getTables($pdo);

// ===== 簡易バリデーション =====
if ($table && !in_array($table, $tables)) {
    die("Invalid table");
}

if ($table) {
    list($columns, $rows) = getTableData($pdo, $table);
}

include APP_ROOT . '/template/index.html.php';



