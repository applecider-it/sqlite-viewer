<?php

declare(strict_types=1);

namespace App\Services\Core;

class App
{
    public static array $data = [
        'pdo' => null,
        'tables' => null,
        'sqlHistory' => [],
    ];
}
