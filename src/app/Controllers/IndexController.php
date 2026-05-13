<?php

namespace App\Controllers;

use App\Services\Core\Output;

class IndexController{
    public static function index()
    {
        return Output::layout('index/index');
    }
}
