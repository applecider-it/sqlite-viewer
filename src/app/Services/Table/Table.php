<?php

declare(strict_types=1);

namespace App\Services\Table;

use App\Services\Core\DB;

/**
 * DBテーブル関連
 */
class Table
{
    /** テーブル一覧取得 */
    public static function getTables()
    {
        $rows = DB::fetchAll("SELECT name FROM sqlite_master WHERE type='table'");
        return array_column($rows, 'name');
    }

    /** テーブルデータ取得 */
    public static function getTableData(string $table)
    {
        $info = DB::fetchAll("PRAGMA table_info(" . DB::sqlTable($table) . ")");

        $columns = array_column($info, 'name');

        $rows = DB::fetchAll("SELECT * FROM " . DB::sqlTable($table) . " LIMIT ?", [500]);

        return compact('columns', 'rows');
    }
}
