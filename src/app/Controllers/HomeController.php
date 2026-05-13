<?php

namespace App\Controllers;

use App\Services\Core\Output;

/**
 * ホームコントローラー
 */
class HomeController{
    public static function index()
    {
        return Output::layout('index/index');
    }
}
