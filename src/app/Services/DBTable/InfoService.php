<?php

namespace App\Services\DBTable;

use Illuminate\Support\Facades\DB;

class InfoService
{
    private function db()
    {
        return DB::connection('target_database');
    }

    /** テーブル一覧 */
    public function tables()
    {
        $rows = $this->db()->select("SELECT name FROM sqlite_master WHERE type='table'");

        return array_column($rows, 'name');
    }

    /** テーブル詳細 */
    public function tableColumns(string $table)
    {
        $rows = $this->db()->select("PRAGMA table_info(" . $table . ")");

        $columns = array_column($rows, 'name');

        return $columns;
    }
}
