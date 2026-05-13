<?php

namespace App\Services\DBTable;

use Illuminate\Support\Facades\DB;

/**
 * DBテーブル管理ベースクラス
 */
class BaseService
{
    protected function db()
    {
        return DB::connection('target_database');
    }
}
