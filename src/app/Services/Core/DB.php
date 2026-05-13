<?php

declare(strict_types=1);

namespace App\Services\Core;

use App\Services\Core\App;

/**
 * DB管理
 */
class DB
{
    /** 全件取得 */
    public static function fetchAll(string $sql, array $params = [])
    {
        $pdo = App::get('pdo');

        App::push('sqlHistory', compact('sql', 'params'));

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /** SQLで利用できる状態にしたテーブル */
    public static function sqlTable(string $table)
    {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $table)) {
            throw new \Exception('invalid name');
        }

        return "\"$table\"";
    }
}
