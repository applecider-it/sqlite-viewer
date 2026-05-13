<?php

namespace App\Services\DBTable;

use Illuminate\Support\Facades\DB;

class ListService
{
    private function db()
    {
        return DB::connection('target_database');
    }

    /** 一覧 */
    public function getList(string $table)
    {
        $rows = $this->db()->select("SELECT * FROM " . $table . " LIMIT 500");

        return $rows;
    }
}
