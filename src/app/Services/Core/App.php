<?php

declare(strict_types=1);

namespace App\Services\Core;

/**
 * サービスコンテナ
 */
class App
{
    private static array $data = [
        'pdo' => null,
        'tables' => null,
        'sqlHistory' => [],
    ];

    public static function get(string $key) {
        return self::$data[$key];
    }
    public static function set(string $key, mixed $val) {
        self::$data[$key] = $val;
    }
    public static function push(string $key, mixed $val) {
        self::$data[$key][] = $val;
    }
}
