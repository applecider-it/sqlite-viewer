<?php

namespace App\Controllers;

use function App\Services\Core\layout;

function index_page()
{
    return layout('index/index');
}
