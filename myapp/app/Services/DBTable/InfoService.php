<?php

namespace App\Services\DBTable;

use Illuminate\Support\Facades\DB;

class InfoService
{
    public function tables()
    {
        $rows = DB::connection('target_database')->select("SELECT name FROM sqlite_master WHERE type='table'");

        return array_column($rows, 'name');
    }
}
