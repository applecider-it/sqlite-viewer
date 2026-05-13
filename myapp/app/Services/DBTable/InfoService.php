<?php

namespace App\Services\DBTable;

use Illuminate\Support\Facades\DB;

class InfoService
{
    private function db()
    {
        return DB::connection('target_database');
    }

    public function tables()
    {
        $rows = $this->db()->select("SELECT name FROM sqlite_master WHERE type='table'");

        return array_column($rows, 'name');
    }

    public function tableColumns(string $table)
    {
        $rows = $this->db()->select("PRAGMA table_info(" . $table . ")");

        $columns = array_column($rows, 'name');

        return $columns;
    }

    public function getList(string $table)
    {
        $rows = $this->db()->select("SELECT * FROM " . $table . " LIMIT 500");

        return $rows;
    }
}
