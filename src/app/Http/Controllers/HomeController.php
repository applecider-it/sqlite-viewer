<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\DBTable\InfoService;
use App\Services\DBTable\ListService;

class HomeController extends Controller
{
    function __construct(
        private InfoService $infoService,
        private ListService $listService,
    ) {}

    public function index()
    {
        $tables = $this->infoService->tables();

        return view('home.index', compact('tables'));
    }

    public function table(string $table)
    {
        $tables = $this->infoService->tables();

        // テーブル存在チェック
        if (!in_array($table, $tables)) {
            throw new \Exception("Invalid table");
        }

        $columns = $this->infoService->tableColumns($table);

        $list = $this->listService->getList($table);

        return view('home.table', compact('table', 'columns', 'list'));
    }
}
