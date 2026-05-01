<?php

declare(strict_types=1);

namespace App\Lib;

/** View出力 */
function view(string $name, array $data = [])
{
    ob_start();
    try {
        include APP_ROOT . '/resources/views/' . $name . '.html.php';
    } catch (\Throwable $e) {
        ob_end_clean();
        throw $e;
    }
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

/** レイアウト付きView出力 */
function layout(string $name, array $data = [])
{
    $output = view($name, $data);

    return view('layout/app', ['CONTENT' => $output]);;
}

/** HTMLエスケープ */
function h(mixed $text)
{
    return htmlspecialchars((string)$text);
}
