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
        $rows = $this->db()->select("SELECT * FROM " . $table . " LIMIT 500");

        return $rows;
    }
}
