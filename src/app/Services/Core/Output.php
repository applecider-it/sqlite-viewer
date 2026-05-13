<?php

declare(strict_types=1);

namespace App\Services\Core;

/**
 * 出力関連
 */
class Output
{
    /** View出力 */
    public static function view(string $name, array $data = [])
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
    public static function layout(string $name, array $data = [])
    {
        $output = view($name, $data);

        return view('layout/app', ['CONTENT' => $output]);;
    }

    /** HTMLエスケープ */
    public static function h(mixed $text)
    {
        return htmlspecialchars((string)$text);
    }
}
