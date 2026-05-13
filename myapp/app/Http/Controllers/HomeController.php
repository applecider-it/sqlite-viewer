<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\DBTable\InfoService;

class HomeController extends Controller
{
    function __construct(private InfoService $infoService) {}

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

        return view('home.table', compact('tables'));
    }
}
