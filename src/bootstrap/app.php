<?php

(function () {
    define('APP_ROOT', dirname(__DIR__));

    // すべてのエラーが対象
    error_reporting(E_ALL);

    // エラーを例外にする
    set_error_handler(function ($severity, $message, $file, $line) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    });

    require_once APP_ROOT . '/app/helpers.php';

    App\Services\Core\Start::init();
})();