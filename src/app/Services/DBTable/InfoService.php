<?php

namespace App\Services\DBTable;

/**
 * DBテーブル情報管理
 */
class InfoService extends BaseService
{
    /** テーブル一覧 */
    public function tables(): array
    {
        return array_column(
            $this->db()->getSchemaBuilder()->getTables(),
            'name'
        );
    }

    /** テーブル詳細 */
    public function tableColumns(string $table)
    {
        return $this->db()->getSchemaBuilder()->getColumnListing($table);
    }

    /** テーブルが存在するか確認 */
    public function existsTable(string $table)
    {
        $tables = $this->tables();

        return in_array($table, $tables);
    }
}
