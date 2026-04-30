<?php

declare(strict_types=1);

/** View出力 */
function view(string $name, array $data = [])
{
    ob_start();
    try {
        include APP_ROOT . '/template/' . $name . '.html.php';
    } catch (Throwable $e) {
        ob_end_clean();
        throw $e;
    }
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

/** HTMLエスケープ */
function h(mixed $text)
{
    return htmlspecialchars((string)$text);
}
