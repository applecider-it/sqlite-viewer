<?php

/** View出力 */
function view(string $name, array $data = [])
{
    include APP_ROOT . '/template/' . $name . '.html.php';
}

/** HTMLエスケープ */
function h(mixed $text)
{
    return htmlspecialchars((string)$text);
}
