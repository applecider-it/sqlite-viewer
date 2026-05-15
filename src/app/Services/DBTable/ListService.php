<?php

namespace App\Services\DBTable;

/**
 * DBテーブル一覧管理
 */
class ListService extends BaseService
{
    /** 一覧 */
    public function getList(string $table)
    {
        $rows = $this->db()->table($table)
            ->limit(500)
            ->get();

        return $rows;
    }
}
